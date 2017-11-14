<?php 
  
  $blahlab_previous = get_previous_post();
  $blahlab_next = get_next_post();

?>

<div class="full grey">
  <nav class='wrapper'>
    <div class="row">  
        
      <div class="small-6 columns">
        <?php if ($blahlab_previous): ?>
          <a class="previous button boxed black" href='<?php echo esc_attr(get_permalink($blahlab_previous)); ?>'>
            <i class='fa fa-angle-left'></i> Previous
          </a>
        <?php endif ?>
      </div>
      
      <div class="small-6 columns">
        <?php if ($blahlab_next): ?>          
          <a class="next button boxed black" href='<?php echo esc_attr(get_permalink($blahlab_next)); ?>'>
            Next <i class='fa fa-angle-right'></i>
          </a>          
        <?php endif ?>
      </div>

    </div>
  </nav>
</div>