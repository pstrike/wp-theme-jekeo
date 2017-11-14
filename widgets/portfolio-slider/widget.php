<?php

class Blahlab_PortfolioSlider_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "PortfolioSlider";
  public $widget_id = 'portfolio-slider';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults;

  public function __construct() {

    $this->defaults = array(
      'title' => '',
      'items' => array(
        array( 'id' => '', 'text_color' => '#fff', 'number_color' => '#ccc', 'title_color' => '#fff', 'client_color' => '#fff' ),
        array( 'id' => '', 'text_color' => '#fff', 'number_color' => '#ccc', 'title_color' => '#fff', 'client_color' => '#fff' ),
        array( 'id' => '', 'text_color' => '#fff', 'number_color' => '#ccc', 'title_color' => '#fff', 'client_color' => '#fff' )
      )
    );

    parent::__construct();
  }

}

add_action( 'wp_ajax_blahlab_widget_ajax_slider', array( 'Blahlab_PortfolioSlider_Widget', 'ajax' ) );
add_action( 'wp_ajax_nopriv_blahlab_widget_ajax_slider', array( 'Blahlab_PortfolioSlider_Widget', 'ajax' ) );


?>