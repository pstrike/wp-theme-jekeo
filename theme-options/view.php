<label>
  <span class="customize-control-title">Footer address</span>
  <textarea rows="2" v-model="options.footer.address"></textarea>
</label>

<label>
  <span class="customize-control-title">Footer phone</span>
  <input type="text" v-model="options.footer.phone">
</label>

<label>
  <span class="customize-control-title">Footer email</span>
  <input type="text" v-model="options.footer.email">
</label>

<label>
  <span class="customize-control-title">Footer copyright messages</span>
  <textarea rows="2" v-model="options.footer.copyright_message"></textarea>
</label>

<div class="socials">
  <span class="customize-control-title">Footer social networks</span>
  <ul>
    <li v-for="social in options.footer.socials" class="social_item">
      <select v-model="social.id" class="short">
        <option disabled value="">Select social network</option>
        <option v-for="s in themeData.member_socials" v-bind:value="s.id">{{ s.desc }}</option>
      </select>
      <input type="text" v-model="social.url" placeholder="url" class="short">
      <a v-on:click.prevent="options.footer.socials.splice(options.footer.socials.indexOf(social), 1)" class="delete">[X]</a>
    </li>
  </ul>
  <a class="add" v-on:click.prevent="options.footer.socials.push(clone(defaults.footer.socials[0]))">Add social network</a>
</div>
<div class="spacing"></div>
<div class="spacing"></div>

<label>
  <span class="customize-control-title">Blog section title</span>
  <input type="text" v-model="options.blog_section_title"></textarea>
</label>

<label>
  <span class="customize-control-title">Blog section small title</span>
  <input type="text" v-model="options.blog_section_small_title"></textarea>
</label>

<label>
  <span class="customize-control-title">Site logo image</span>
  <blahlab-upload-image v-model="options.logo">Choose Image</blahlab-upload-image>
</label>

<label>
  <span class="customize-control-title">Homepage site title color</span>
  <blahlab-color-picker v-model="options.homepage_site_title_color">Select Color</blahlab-color-picker>
</label>

<label>
  <span class="customize-control-title">Inner page site title color</span>
  <blahlab-color-picker v-model="options.inner_page_site_title_color">Select Color</blahlab-color-picker>
</label>

<label>
  <span class="customize-control-title">Page scroll effect</span>
  <select v-model="options.page_scroll_effect" class="short">
    <option value="enabled">Enabled</option>
    <option value="disabled">Disabled</option>
  </select>
</label>