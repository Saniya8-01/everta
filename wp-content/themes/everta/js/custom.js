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

if ($(".partnersSection").length) {
    $(".logoSlider").slick({
        dots: false,
        slidesToShow: 5,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 4000,
        infinite: true,
        cssEase: 'linear',
        responsive: [
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 4,
                }
            }
        ]
    });
}

// Select the tab buttons and content sections
const tabButtons = document.querySelectorAll(".tab-button");
const tabContents = document.querySelectorAll(".tab-content");

// Add click event listeners to each tab button
tabButtons.forEach((button) => {
    button.addEventListener("click", () => {
        // Remove the active class from all buttons and content
        tabButtons.forEach((btn) => btn.classList.remove("active"));
        tabContents.forEach((content) => content.classList.remove("active"));

        // Add the active class to the clicked button and the corresponding content
        button.classList.add("active");
        const tabId = button.getAttribute("data-tab");
        document.getElementById(tabId).classList.add("active");
    });
});

if ($(".testimonialSection").length) {
    var $slider = $(".testimonialCardWrapper");
    var $progressBar = $(".progress-bar");
    var autoplaySpeed = 5000;
    $(".testimonialCardWrapper").slick({
        dots: false,
        slidesToShow: 2.7,
        arrows: false,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: autoplaySpeed,
        speed: 1000,
        infinite: false,
        initialSlide: 0,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1180,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    // Function to animate the progress bar
    function startProgressBar() {
        $progressBar.css({
            width: "0%", // Reset progress bar
            transition: "none",
        });

        setTimeout(() => {
            $progressBar.css({
                width: "100%",
                transition: `width ${autoplaySpeed}ms linear`,
            });
        }, 10); // Slight delay to ensure transition starts
    }

    // Restart progress bar on slide change
    $slider.on("beforeChange", function () {
        startProgressBar();
    });

    // Start progress bar when slider is initialized
    startProgressBar();
}

function initializeSlick() {
    if ($(window).width() <= 768) {
        if (!$(".rightContentWrapper").hasClass('slick-initialized')) {
            $(".rightContentWrapper").slick({
                dots: false,
                slidesToShow: 1.2,
                arrows: false,
                infinite: false,
                initialSlide:0,
            });
        }
    } else {
        if ($(".rightContentWrapper").hasClass('slick-initialized')) {
            $(".rightContentWrapper").slick('unslick');
        }
    }
}

$(document).ready(function () {
    initializeSlick();
    $(window).resize(function () {
        initializeSlick();
    });
});

if ($(".faqSection").length) {
    jQuery(document).ready(function () {
        const accordionHeaders = document.querySelectorAll(".accordion-header");
        ActivatingFirstAccordion();
        function ActivatingFirstAccordion() {
            accordionHeaders[0].parentElement.classList.add("active");
            accordionHeaders[0].nextElementSibling.style.maxHeight = "fit-content";
        }
        function toggleActiveAccordion(e, header) {
            const activeAccordion = document.querySelector(".accordion.active");
            const clickedAccordion = header.parentElement;
            const accordionBody = header.nextElementSibling;
            if (activeAccordion && activeAccordion != clickedAccordion) {
                activeAccordion.querySelector(".accordion-body").style.maxHeight = 0;
                activeAccordion.classList.remove("active");
            }
            clickedAccordion.classList.toggle("active");
            if (clickedAccordion.classList.contains("active")) {
                accordionBody.style.maxHeight = "fit-content";
            } else {
                accordionBody.style.maxHeight = 0;
            }
        }
        accordionHeaders.forEach(function (header) {
            header.addEventListener("click", function (event) {
                toggleActiveAccordion(event, header);
            });
        });
        function resizeActiveAccordionBody() {
            const activeAccordionBody = document.querySelector(
                ".accordion.active .accordion-body"
            );
            if (activeAccordionBody)
                activeAccordionBody.style.maxHeight = "fit-content";
        }
        window.addEventListener("resize", function () {
            resizeActiveAccordionBody();
        });
    });
}

