<?php
  // *-spec.php is optional if you don't need to specify options for the metabox
  // *-view.php is always required
  // $blahlab_framework_mb->the_field('FILED_SLUG');
  // FIELD_SLUG could be any value
?>
<div>
<!--   <p class="inline-hide">
    <label>Tagline</label>
    <input class="full-width" type='text' v-model='options.tagline'></input>
  </p>
  <p class="inline-hide">
    <label>Layout</label>
    <select v-model="options.layout">
      <option value="" disabled>choose layout</option>
      <option value="onecolumn">One Column</option>
      <option value="sidebar">Sidebar</option>
    </select>
  </p> -->
  <p>
    <label>Client</label>
    <input class="full-width" type='text' v-model='options.client'></input>
  </p>
  <p>
    <label>Duration</label>
    <input class="full-width" type='text' v-model='options.duration'></input>
  </p>
  <p>
    <label>Link URL</label>
    <input class="full-width" type='text' v-model='options.link.url'></input>
  </p>
  <p>
    <label>Link text</label>
    <input class="full-width" type='text' v-model='options.link.text'></input>
  </p>
  <div class="spacing"></div>
  <p>
    <blahlab-color-picker v-model="options.header_text_color">Choose Header Text color</blahlab-color-picker>
    <blahlab-color-picker v-model="options.header_client_color">Choose Header Client color</blahlab-color-picker>
    <blahlab-color-picker v-model="options.header_title_color">Choose Header Title color</blahlab-color-picker>
  </p>
  <div class="spacing"></div>
  <div>
    <label>Services</label>
    <ul>
      <li v-for="service in options.services" class="sub_item">
        <input type="text" v-model="service.name" placeholder="service item" class="short">
        <a v-on:click.prevent="options.services.splice(options.services.indexOf(service), 1)" class="delete">[X]</a>
      </li>
    </ul>
    <a class="add" v-on:click.prevent="options.services.push(clone(defaults.services[0]))">Add Service</a>
  </div>

<!--   <p>
    <label>Category</label>
    <input class="full-width" type='text' v-model='options.category'></input>
  </p> -->
<!--   <p class="inline-hide">
    <label>Related projects</label>
    <select size="8" v-model="options.related_projects" multiple="multiple" class="long inline-ui">
      <option value="" disabled>Select projects</option>
      <option v-for="item in themeData.portfolio_items" :value="item.id">{{ item.title }}</option>
    </select>
  </p> -->

</div>
