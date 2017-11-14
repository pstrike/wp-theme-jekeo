<input v-model='options.small_title' type="text" placeholder="Small Title" >
<input v-model='options.title' type="text" placeholder="Title" >

<draggable v-model="options.clients" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }">
  <li v-for="(client, index) in options.clients" class="blahlab-accordion-item"  :key="client">

    <blahlab-accordion-title :item="client" v-on:remove="options.clients.splice(options.clients.indexOf(client), 1)">
      {{ client.name ? "Client: " + client.name : "Client" }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>
      <input v-model='client.name' type="text" placeholder="Name" >
      <blahlab-upload-image v-model="client.logo">Upload logo</blahlab-upload-image>
    </blahlab-accordion-content>

  </li>
</draggable>

<p>
  <blahlab-button v-on:click="options.clients.push(clone(defaults.clients[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Client</blahlab-button>
</p>