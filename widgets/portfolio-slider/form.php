<input v-model='options.title' type="text" placeholder="Title" >


<draggable v-model="options.items" @start="onDragStart($event)" @end="onDragEnd($event)" class="blahlab-accordions-sortable blahlab-accordions" v-bind:options="{ handle: '.blahlab-accordion-title' }">
  <li v-for="item in options.items" class="blahlab-accordion-item"  :key="item">

    <blahlab-accordion-title :item="item" v-on:remove="options.items.splice(options.items.indexOf(item), 1)">
      {{ themeData.portfolio_items_dictionary[item.id] ? "Item: " + themeData.portfolio_items_dictionary[item.id]['title'] : "Item" | truncate(40) }}
    </blahlab-accordion-title>

    <blahlab-accordion-content>

      <select v-model="item.id">
        <option disabled value="">--</option>
        <option v-for="p in themeData.portfolio_items" v-bind:value="p.id">{{ p.title }}</option>
      </select>

      <blahlab-color-picker v-model="item.text_color">Choose Text color</blahlab-color-picker>
      <blahlab-color-picker v-model="item.number_color">Choose Index Number color</blahlab-color-picker>
      <blahlab-color-picker v-model="item.title_color">Choose Title color</blahlab-color-picker>
      <blahlab-color-picker v-model="item.client_color">Choose Client name color</blahlab-color-picker>

    </blahlab-accordion-content>

  </li>
</draggable>

<p>
  <blahlab-button v-on:click="options.items.push(clone(defaults.items[0]));addClass('.blahlab-accordion-item:last', 'open')">Add New Slide</blahlab-button>
</p>


