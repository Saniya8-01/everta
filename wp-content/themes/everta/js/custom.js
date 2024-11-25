//--------------------------- Hide Header on on scroll down-------------------------//
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $("header").outerHeight();

$(window).scroll(function (event) {
  didScroll = true;
});

setInterval(function () {
  if (didScroll) {
    hasScrolled();
    didScroll = false;
  }
}, 250);
let menuOpen = false;

function hasScrolled() {
  if (menuOpen) return; // Disable hasScrolled when menu is open

  var st = $(this).scrollTop();
  // Make sure they scroll more than delta
  if (Math.abs(lastScrollTop - st) <= delta) return;
  // If they scrolled down and are past the navbar, add class .nav-up.
  // This is necessary so you never see what is "behind" the navbar.
  if (st > lastScrollTop && st > navbarHeight) {
    $("header").removeClass("nav-down").addClass("nav-up");
  } else {
    // Scroll Up
    if (st + $(window).height() < $(document).height()) {
      $("header").removeClass("nav-up").addClass("nav-down");
    }
  }

  lastScrollTop = st;
}

$(document).ready(function () {
  if ($(window).width() <= 1024) {
    $("#toggle").click(function () {
      $(this).toggleClass("active");
      $("#overlay").toggleClass("open");
      if ($("#overlay").hasClass("open")) {
        menuOpen = true; // Menu is open
        $('body').css("overflow", "hidden");
        $('html').css("overflow", "hidden");
        $('body').addClass("overlay");
      } else {
        menuOpen = false; // Menu is closed
        $('body').css("overflow", "visible");
        $('html').css("overflow", "visible");
        $('body').removeClass("overlay");
      }
    });
  }
});

var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function (event) {
  hasScrolled();
});
//--------------------------- Hide Header on on scroll down-------------------------//