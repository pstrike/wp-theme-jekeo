<draggable v-model="options.contact_infos" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }">
  <li v-for="info in options.contact_infos" class="blahlab-accordion-item"  :key="info">

    <blahlab-accordion-title :item="info" v-on:remove="options.contact_infos.splice(options.contact_infos.indexOf(info), 1)">
      {{ info.title ? "Info: " + info.title : "Info" }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>
      <ul class="fa-icons">
        <li v-for="icon in themeData.linea_icons" class="fa" v-bind:class="[ { active: icon == info.icon }, 'icon-basic-'+icon ]" v-on:click="info.icon = icon"></li>
      </ul>
      <input type="text" v-model="info.title" placeholder="Title" />
      <textarea v-model="info.text" placeholder="Text"></textarea>
    </blahlab-accordion-content>

  </li>
</draggable>

<p>
  <blahlab-button v-on:click="options.contact_infos.push(clone(defaults.contact_infos[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Info</blahlab-button>
</p>
