<input v-model='options.small_title' type="text" placeholder="Small Title" >
<input v-model='options.title' type="text" placeholder="Title" >


<draggable v-model="options.images" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }">
  <li v-for="image in options.images" class="blahlab-accordion-item"  :key="image">

    <blahlab-accordion-title :item="image">
      {{ image.title ? "Image: " + image.title : "Image" }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>

      <blahlab-upload-image v-model="image.url">Choose Image</blahlab-upload-image>
      
<!--       <select v-model="image.width" class="short">
        <option disabled value="">Select image width</option>
        <option value="full">Full</option>
        <option value="half">1/2</option>
        <option value="one-fourth">1/4</option>
        <option value="one-sixth">1/6</option>
      </select> -->

    </blahlab-accordion-content>

  </li>
</draggable>

<!-- <p>
  <blahlab-button v-on:click="options.images.push(clone(defaults.images[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Image</blahlab-button>
</p> -->
