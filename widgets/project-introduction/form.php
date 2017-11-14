<input v-model='options.small_title' type="text" placeholder="Small Title" >
<input v-model='options.title' type="text" placeholder="Title" >
<textarea v-model="options.desc" placeholder="Description"></textarea>
<blahlab-color-picker v-model="options.bg_color">Choose Background Color</blahlab-color-picker>
<div class="spacing"></div>
<label>Gallery type</label>
<div class="spacing"></div>
<select v-model="options.gallery_type" class="short">
  <option value="none">None</option>
  <option value="grid">Grid</option>
  <option value="slider">Slider</option>
</select>

<draggable v-model="options.images" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }" v-if="options.gallery_type != 'none'">
  <li v-for="(image, index) in options.images" class="blahlab-accordion-item"  :key="image">

    <blahlab-accordion-title :item="image" v-on:remove="options.images.splice(options.images.indexOf(image), 1)">
      {{ image.title ? "Image: " + image.title : "Image" }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>
      <blahlab-upload-image v-model="image.url">Choose image</blahlab-upload-image>  

      <p v-if="options.gallery_type == 'grid'">
        <input :id="'<?php echo blahlab_esc($this->get_field_id('wide_style')); ?>-'+index" type="checkbox" v-model="image.wide" class="checkbox">
        <label :for="'<?php echo blahlab_esc($this->get_field_id('wide_style')); ?>-'+index" class="inline-filter">wide style</label>
      </p>

      <p v-if="options.gallery_type == 'grid'">
        <label>Animation type</label>
        <span class="spacing"></span>
        <select v-model="image.animation" class="short">
          <option value="none">None</option>
          <option value="slideInLeft">slideInLeft</option>
          <option value="slideInRight">slideInRight</option>
        </select>
      </p>

      <div class="spacing"></div>

    </blahlab-accordion-content>

  </li>
</draggable>

<p>
  <blahlab-button v-on:click="options.images.push(clone(defaults.images[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Image</blahlab-button>
</p>
