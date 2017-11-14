<input type="text" v-model="options.small_title" placeholder="Small Title" />
<input type="text" v-model="options.title" placeholder="Title" />

<draggable v-model="options.images" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }">
  <li v-for="image in options.images" class="blahlab-accordion-item"  :key="image">

    <blahlab-accordion-title :item="image" v-on:remove="options.images.splice(options.images.indexOf(image), 1)">
      {{ image.title ? "Image: " + image.title : "Image" }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>
      
      <blahlab-upload-image v-model="image.url">Choose image</blahlab-upload-image>
      
    </blahlab-accordion-content>

  </li>
</draggable>

<p>
  <blahlab-button v-on:click="options.images.push(clone(defaults.images[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Image</blahlab-button>
</p>


<draggable v-model="options.features" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }">
  <li v-for="feature in options.features" class="blahlab-accordion-item"  :key="feature">

    <blahlab-accordion-title :item="feature" v-on:remove="options.features.splice(options.features.indexOf(feature), 1)">
      {{ feature.title ? "Feature: " + feature.title : "Feature" }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>
      
      <input type="text" v-model="feature.title" placeholder="Title" />
      <textarea v-model="feature.desc" placeholder="Description" />
      
    </blahlab-accordion-content>

  </li>
</draggable>

<p>
  <blahlab-button v-on:click="options.features.push(clone(defaults.features[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Feature</blahlab-button>
</p>