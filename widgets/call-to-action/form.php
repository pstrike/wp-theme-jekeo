<input type="text" v-model="options.title" placeholder="Title"></textarea>
<input type="text" v-model="options.sub_title" placeholder="Sub Title"></textarea>
<!-- <textarea v-model='options.desc' placeholder="Description" ></textarea> -->

<input type="text" v-model='options.video' placeholder="Background mp4 video url" >
<input type="text" v-model='options.webm_video' placeholder="Background webm video url" >

<input type="text" v-model="options.button.text" placeholder="Button Text"></textarea>
<input type="text" v-model="options.button.url" placeholder="Button URL"></textarea>
<!-- <blahlab-color-picker v-model="options.bg_color">Select Background Color</blahlab-color-picker> -->

<label>Excluded this widget from</label>
<div class="spacing"></div>
<select size="1" v-model="options.excluded_from" multiple="multiple" class="long">
  <option v-for="p in themeData.pages" v-bind:value="p.ID">{{ p.post_title }}</option>
  <option value="blahlab-portfolio-single">Portfolio single pages</option>
</select>

