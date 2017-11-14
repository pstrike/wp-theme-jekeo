(function($) {
  $(document).ready(function(){

    $('#comments-form input[type=submit]').addClass('button');

    $('.search-submit').addClass('button');

    $('video').each(function() {
      this.muted = true;
    });

    $('.post-password-form input[type=submit]').addClass('button boxed small');


    var adjustCount = 0;

    function adjustPageHeaderSize() {
      // adjust font size for post header when there are 4 lines and above
      var pageHeader = $('body.single .page-header h1');
      if ( countLines(pageHeader) > 3 && adjustCount < 3 ) {
        var current_font_size = parseInt(pageHeader.css('font-size'), 10);
        pageHeader.css('font-size', (current_font_size - 10) + 'px' );
        adjustCount++;
        adjustPageHeaderSize();
      }
    }

    function countLines(elem) {
      var height = $(elem).height();
      var lineHeight = parseInt($(elem).css('line-height'), 10);
      return height / lineHeight;
    }

    adjustPageHeaderSize();

  });

})(jQuery)