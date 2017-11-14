<?php

class Blahlab_ProjectTestimonial_Widget extends Blahlab_Vue_Widget {

  public $widget_title = "Project Testimonial";
  public $widget_id = 'project-testimonial';
  public $post_type = '';
  public $taxonomy = '';
  public $classname = '';

  public $defaults = array(
    'title' => '',
    'quote' => '',
    'author' => '',
    'position' => ''
  );

}

?>