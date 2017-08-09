(function($) {
    var contentPlacement = $('#wp-custom-header').position().top + $('#wp-custom-header').height();
    $('#content').css('margin-top',contentPlacement);
})(jQuery);
