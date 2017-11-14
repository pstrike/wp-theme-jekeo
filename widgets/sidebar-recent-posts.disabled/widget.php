<?php

class Blahlab_SidebarRecentPosts_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Sidebar Recent Posts";
  public $widget_id = 'sidebar-recent-posts';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults = array(
    'title' => '',
    'desc' => '',
    'posts' => ''
  );

}

?>