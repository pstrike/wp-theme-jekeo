(function($) {
  $(document).ready(function(){

    'use strict'

    $('#comments-form input[type=submit]').addClass('button boxed small');
    $('.search-submit').addClass('button boxed small');
    $('.search-form').addClass('dark');

    $('.section-title h2').each(function() {
      var html = $(this).html();
      html = html.replace('.', '<span class="dot">.</span>');
      $(this).html(html);
    });

    $('.images-grid').each(function() {
      $(this).masonry({
        itemSelector: 'li',
        columnWidth: ".grid-sizer"
      });
    });

    function update_end_for_normal_posts() {
      $('.normal_posts .columns').removeClass('end');
      $('.normal_posts .columns:last').addClass('end');
    }

    update_end_for_normal_posts();

    $('#load_more_posts').click(function(e) {
      var load_more_button = this;

      e.preventDefault();

      if ($(this).hasClass('disabled')) {
        return false;
      }

      $(this).addClass('disabled');

      $.post(
        ajaxurl,
        {
          page: $(load_more_button).data('page'),
          action: 'blahlab_widget_ajax_blog_posts',
          widget_action: 'load_more_posts'
        },
        function(data){
          var data = $.parseJSON(data);
          $('.row.normal_posts').append(data['posts']);
          update_end_for_normal_posts();
          $(load_more_button).data('page', data['page']);
          $(load_more_button).removeClass('disabled');
          console.log(data);
          if(!data['posts']) {
            $(load_more_button).html('No more').addClass('disabled');
          }

        }
      );

    });

  });

})(jQuery)