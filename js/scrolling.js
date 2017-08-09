(function($) {
    var backgroundImage = $('#header-image').find('img');
    var contentPlacement = backgroundImage.position().top + backgroundImage.height();
    $('#about-panel').css('margin-top',contentPlacement);
})(jQuery);
