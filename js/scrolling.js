/**
 * @desc javascript file that sets up parallax scrolling
 * @package spg
 * @version 1.0
 */

(function($) {

  /**
   * @desc app setup
   */
  // sizing();
  // $(window).resize(sizing);
  // sticky();

  /**
   * @function sizing
   * @desc functions that are run when the window resizes
   */
  function sizing() {
    sticky();
  }

  /**
   * @function sticky
   * @desc sets the divs that are going to stick to the top of the screen on scroll
   */
  function sticky() {
    var navSticky = $('#site-navigation');
    var firstSticky = $('#about-panel');
    var secondSticky = $('#shows-panel-image');
    stickyNav(navSticky);
    // stickyDiv (firstSticky);
    stickyDiv(secondSticky);
  }

  /**
   * @function stickyNav
   * @desc adds an affix class to the provided element
   * @param element, either an ID or a class
   * @return adds affix class, CSS in the stylesheet needs to match up
   */
  function stickyNav(el) {
    var sticky = el.offset().top;
    $(window).scroll(function() {
      // console.log('scroll ', $(window).scrollTop());
      // console.log('sticky ', sticky);
      if ($(window).scrollTop() > (sticky)) {
        el.addClass('affix');
      } else {
        el.removeClass('affix');
      }
    });
  }

  /**
   * @function stickyDiv
   * @desc adds an affix class plus the height of the nav to the element
   * @param element, either ID or Class
   * @return adds affix class, CSS in stylesheet
   */
  function stickyDiv(el) {
    var sticky = el.offset().top;
    $(window).scroll(function () {
    if (($(window).scrollTop() + 56) > (sticky)) {
      el.addClass('affix');
    } else {
      el.removeClass('affix');
    }
  });
  }

})(jQuery);
