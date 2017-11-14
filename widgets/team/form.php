<input v-model='options.small_title' type="text" placeholder="Small Title" >
<input v-model='options.title' type="text" placeholder="Title" >


<draggable v-model="options.sections" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }">
  <li v-for="(section, index) in options.sections" class="blahlab-accordion-item"  :key="section">

    <blahlab-accordion-title :item="section" v-on:remove="options.sections.splice(options.sections.indexOf(section), 1)">
      {{ section.title ? "Section: " + section.title : "Section" }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>
      <input type="text" v-model='section.title' placeholder="Title" >
      <input type="text" v-model='section.number' placeholder="Number" >      
      <blahlab-upload-image v-model="section.image">Choose image</blahlab-upload-image>
    </blahlab-accordion-content>

  </li>
</draggable>

<p>
  <blahlab-button v-on:click="options.sections.push(clone(defaults.sections[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Section</blahlab-button>
</p>

<input type="text" v-model="options.link.text" placeholder="Link Text"></textarea>
<input type="text" v-model="options.link.url" placeholder="Link URL"></textarea>