<input v-model='options.title' type="text" placeholder="Title" >

<select size="1" v-model="options.posts" multiple="multiple" class="long">
  <option v-for="p in themeData.posts" v-bind:value="p.ID">{{ p.post_title }}</option>
</select>