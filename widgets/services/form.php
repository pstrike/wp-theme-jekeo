<input v-model='options.small_title' type="text" placeholder="Small Title" >
<input v-model='options.title' type="text" placeholder="Title" >


<draggable v-model="options.services" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }">
  <li v-for="service in options.services" class="blahlab-accordion-item"  :key="service">

    <blahlab-accordion-title :item="service" v-on:remove="options.services.splice(options.services.indexOf(service), 1)">
      {{ service.title ? "Service: " + service.title : "Service" }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>
      <ul class="fa-icons">
        <li v-for="icon in themeData.linea_icons" class="fa" v-bind:class="[ { active: icon == service.icon }, 'icon-basic-'+icon ]" v-on:click="service.icon = icon"></li>
      </ul>
      <input type="text" v-model="service.title" placeholder="Title" />
      
      <div class="subs">
        <ul>
          <li v-for="sub in service.subs" class="sub_item">
            <input type="text" v-model="sub.text" placeholder="sub item" class="short">
            <a v-on:click.prevent="service.subs.splice(service.subs.indexOf(sub), 1)" class="delete">[X]</a>
          </li>
        </ul>
        <a class="add" v-on:click.prevent="service.subs.push(clone(defaults.services[0].subs[0]))">Add Item</a>
      </div>

      <div class="spacing"></div>

    </blahlab-accordion-content>

  </li>
</draggable>

<p>
  <blahlab-button v-on:click="options.services.push(clone(defaults.services[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Service</blahlab-button>
</p>
