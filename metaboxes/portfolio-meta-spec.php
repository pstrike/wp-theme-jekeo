<?php

  return array(
    'types' => array('portfolio'),
    // 'title' => 'Portfolio Meta',
    // 'context' => 'normal',
    // 'priority' => 'high',
    // 'autosave' => TRUE,
    // 'mode' => WPALCHEMY_MODE_ARRAY,
    // 'include_template' => array('page.php', 'template-portfolio.php')
    'defaults' => array(
      'client' => '',
      'duration' => '',
      'link' => array( 'url' => '', 'text' => '' ),
      'header_text_color' => '#fff',
      'header_client_color' => '#fff',
      'header_title_color' => '#fff',
      'services' => array(
        array( 'name' => '' ),
        array( 'name' => '' ),
        array( 'name' => '' )
      )
    )
  );

?>