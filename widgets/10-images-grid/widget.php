<?php

class Blahlab_10ImagesGrid_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "10 Images Grid";
  public $widget_id = '10-images-grid';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public function __construct() {

    $sub_item = array(
      'text' => ''
    );

    $this->defaults = array(
      'small_title' => '',
      'title' => '',
      'images' => array(
        array( 'url' => '' ),
        array( 'url' => '' ),
        array( 'url' => '' ),
        array( 'url' => '' ),
        array( 'url' => '' ),
        array( 'url' => '' ),
        array( 'url' => '' ),
        array( 'url' => '' ),
        array( 'url' => '' ),
        array( 'url' => '' )
      )
    );

    parent::__construct();

  }

}

add_action( 'wp_ajax_blahlab_widget_ajax_10_images_grid', array( 'Blahlab_10ImagesGrid_Widget', 'ajax' ) );
add_action( 'wp_ajax_nopriv_blahlab_widget_ajax_10_images_grid', array( 'Blahlab_10ImagesGrid_Widget', 'ajax' ) );

?>