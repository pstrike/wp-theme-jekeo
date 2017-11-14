<?php

class Blahlab_ContactInfos_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Contact Infos";
  public $widget_id = 'contact-infos';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public function __construct() {

    $sub_item = array(
      'text' => ''
    );

    $this->defaults = array(
      'contact_infos' => array(
        array( 'icon' => '', 'title' => '', 'text' => '' ),
        array( 'icon' => '', 'title' => '', 'text' => '' ),
        array( 'icon' => '', 'title' => '', 'text' => '' )
      )
    );

    parent::__construct();

  }

}

add_action( 'wp_ajax_blahlab_widget_ajax_contact_infos', array( 'Blahlab_ContactInfos_Widget', 'ajax' ) );
add_action( 'wp_ajax_nopriv_blahlab_widget_ajax_contact_infos', array( 'Blahlab_ContactInfos_Widget', 'ajax' ) );

?>