<?php

class Blahlab_LatestPosts_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Latest Posts";
  public $widget_id = 'news';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults = array(
    'small_title' => '',
    'title' => '',
    'posts' => array()
  );

}

?>