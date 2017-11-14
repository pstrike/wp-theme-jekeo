<?php

class Blahlab_Clients_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Clients";
  public $widget_id = 'clients';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';


  public $defaults = array(
    'title' => '',
    'small_title' => '',
    'clients' => array(
      array( 'name' => '', 'logo' => '' ),
      array( 'name' => '', 'logo' => '' ),
      array( 'name' => '', 'logo' => '' )
    )
  );

}

add_action( 'wp_ajax_blahlab_widget_ajax_clients', array( 'Blahlab_Clients_Widget', 'ajax' ) );
add_action( 'wp_ajax_nopriv_blahlab_widget_ajax_clients', array( 'Blahlab_Clients_Widget', 'ajax' ) );


?>