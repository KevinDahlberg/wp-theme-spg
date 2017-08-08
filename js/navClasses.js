/**
 * adds the proper class names to make the nav manus work with Bootstrap 4
 */
(function($) {
  $('#site-navigation').find('ul').addClass('navbar-nav mr-auto');
  $('#site-navigation').find('li').removeClass().addClass('navbar-nav mr-auto');
  $('#site-navigation').find('a').addClass('nav-link');
})(jQuery);
