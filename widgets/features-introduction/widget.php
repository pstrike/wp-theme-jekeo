<?php

class Blahlab_FeaturesIntroduction_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Features Introduction";
  public $widget_id = 'features-introduction';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults = array(
    'small_title' => '',
    'title' => '',
    'images' => array(
      array( 'url' => '' ),
      array( 'url' => '' ),
      array( 'url' => '' )
    ),
    'features' => array(
      array( 'image' => '', 'title' => '', 'desc' => '' ),
      array( 'image' => '', 'title' => '', 'desc' => '' ),
      array( 'image' => '', 'title' => '', 'desc' => '' )
    )
  );

}

?>