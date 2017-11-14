<input v-model='options.small_title' type="text" placeholder="Small Title" >
<input v-model='options.title' type="text" placeholder="Title" >

<draggable v-model="options.steps" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }">
  <li v-for="step in options.steps" class="blahlab-accordion-item" :key="step">

    <blahlab-accordion-title :item="step" v-on:remove="options.steps.splice(options.steps.indexOf(step), 1)">
      {{ step.title ? "Step: " + step.title : "Step" }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>
      <ul class="fa-icons">
        <li v-for="icon in themeData.linea_icons" class="fa" v-bind:class="[ { active: icon == step.icon }, 'icon-basic-'+icon ]" v-on:click="step.icon = icon"></li>
      </ul>
      <input type="text" v-model='step.title' placeholder="Title" >
      <textarea v-model='step.desc' placeholder="Description"></textarea>
    </blahlab-accordion-content>

  </li>
</draggable>

<p>
  <blahlab-button v-on:click="options.steps.push(clone(defaults.steps[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Step</blahlab-button>
</p>