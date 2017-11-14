<input type="text" v-model="options.title" placeholder="Title" />
<textarea v-model="options.desc" placeholder="Description"></textarea>
<input type="text" v-model="options.button.text" placeholder="Button Text" />
<input type="text" v-model="options.button.url" placeholder="Button URL" />
<blahlab-upload-image v-model="options.bg_image">Choose background image</blahlab-upload-image>