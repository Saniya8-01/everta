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
            $(".navMenu").toggleClass("open");
            if ($(".navMenu").hasClass("open")) {
                menuOpen = true; // Menu is open
                $('body').css("overflow", "hidden");
                $('html').css("overflow", "hidden");
            } else {
                menuOpen = false; // Menu is closed
                $('body').css("overflow", "visible");
                $('html').css("overflow", "visible");
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

//-------------------Header Dropdown JS----------------------//
$(document).ready(function () {
    const dropdowns = document.querySelectorAll('.dropdown');
    const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

    if (!isTouchDevice) {
        // Handle mouseover and mouseleave for desktop
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('mouseover', function () {
                dropdown.classList.add('active');
            });

            dropdown.addEventListener('mouseleave', function () {
                dropdown.classList.remove('active');
            });
        });
    } else {
        // Handle click for touch devices
        dropdowns.forEach(dropdown => {
            const dropbtn = dropdown.querySelector('.mainManu');
            dropbtn.addEventListener('click', function (event) {
                event.preventDefault();

                // Close other dropdowns
                dropdowns.forEach(dd => {
                    if (dd !== dropdown) {
                        dd.classList.remove('active');
                    }
                });

                // Toggle the current dropdown
                dropdown.classList.toggle('active');
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function (event) {
            if (!event.target.closest('.dropdown')) {
                dropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            }
        });
    }
});

//-------------------Header Dropdown JS----------------------//

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
                breakpoint: 1181,
                settings: {
                    slidesToShow: 2.1,
                }
            },
            {
                breakpoint: 821,
                settings: {
                    slidesToShow: 1.5,
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
    if ($(window).width() <= 820) {
        if (!$(".rightContentWrapper").hasClass('slick-initialized')) {
            $(".rightContentWrapper").slick({
                dots: false,
                slidesToShow: 1.5,
                arrows: false,
                infinite: false,
                initialSlide: 0,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1.2,
                        }
                    },
                ]
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

document.addEventListener('DOMContentLoaded', () => {
    const hoverBoxes = document.querySelectorAll('.hover-box');

    // Function to handle hover or click effect
    function applyHoverOrClickEffect() {
        const screenWidth = window.innerWidth;

        if (screenWidth > 1180) {
            // Hover effect for screens greater than 1180px
            if (hoverBoxes.length) {
                hoverBoxes.forEach((box) => box.classList.remove('active')); // Remove all active classes
                hoverBoxes[0].classList.add('active'); // Set the first box as active by default
            }

            hoverBoxes.forEach((box) => {
                box.removeEventListener('click', handleClick); // Remove click event if previously added
                box.addEventListener('mouseenter', handleMouseEnter); // Add mouseenter event
            });
        } else if (screenWidth >= 1024 && screenWidth <= 1180) {
            // Click effect for screens between 1024px and 1180px
            if (hoverBoxes.length) {
                hoverBoxes.forEach((box) => box.classList.remove('active')); // Remove all active classes
                hoverBoxes[0].classList.add('active'); // Set the first box as active by default
            }

            hoverBoxes.forEach((box) => {
                box.removeEventListener('mouseenter', handleMouseEnter); // Remove mouseenter event
                box.addEventListener('click', handleClick); // Add click event
            });
        } else {
            // Disable hover/click effects for screens <= 820px
            hoverBoxes.forEach((box) => {
                box.classList.remove('active'); // Remove the active class
                box.removeEventListener('mouseenter', handleMouseEnter); // Remove mouseenter event
                box.removeEventListener('click', handleClick); // Remove click event
            });
        }
    }

    // Event handler for mouse enter
    function handleMouseEnter(event) {
        hoverBoxes.forEach((item) => item.classList.remove('active'));
        event.currentTarget.classList.add('active');
    }

    // Event handler for click
    function handleClick(event) {
        hoverBoxes.forEach((item) => item.classList.remove('active'));
        event.currentTarget.classList.add('active');
    }

    // Apply the hover or click effect on load
    applyHoverOrClickEffect();

    // Re-apply the effect on window resize
    window.addEventListener('resize', applyHoverOrClickEffect);
});

document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-content'); // Get all tab content sections
    const hoverBoxes = document.querySelectorAll('.card'); // Get all cards (hover boxes)

    function setDefaultActiveCards() {
        // Loop through all tabs and set the first card as active
        tabs.forEach((tab) => {
            const firstCard = tab.querySelector('.card'); // Get the first card in each tab
            if (firstCard) {
                firstCard.classList.add('active'); // Add 'active' class to the first card
            }
        });
    }

    function applyHoverEffect() {
        if (window.innerWidth > 820) {
            // On larger screens, add hover functionality
            hoverBoxes.forEach((box) => {
                box.addEventListener('mouseenter', handleMouseEnter);
            });
        } else {
            // On smaller screens, remove the 'active' class and event listeners
            hoverBoxes.forEach((box) => {
                box.classList.remove('active');
                box.removeEventListener('mouseenter', handleMouseEnter);
            });
        }
    }

    function handleMouseEnter(event) {
        const currentTab = event.currentTarget.closest('.tab-content'); // Get the parent tab of the hovered card
        const cardsInCurrentTab = currentTab.querySelectorAll('.card'); // Get all cards in the current tab

        // Remove 'active' class from all cards in the current tab
        cardsInCurrentTab.forEach((item) => item.classList.remove('active'));

        // Add 'active' class to the hovered card
        event.currentTarget.classList.add('active');
    }

    // Set the first card as active by default on page load
    setDefaultActiveCards();

    // Apply hover effect on load
    applyHoverEffect();

    // Re-apply hover effect on window resize
    window.addEventListener('resize', applyHoverEffect);
});


$.fn.isInViewport = function () {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();
    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on('resize scroll', function () {
    if ($('.exploreSection').length) {
        if ($('.exploreSection').isInViewport()) {
            setTimeout(() => {
                $('.rightContent').addClass('image-active');
            }, 800);
        }
        else {
            setTimeout(() => {
                $('.rightContent').removeClass('image-active');
            }, 800);
        }
    }
});

$(window).on('resize scroll', function () {
    if (window.innerWidth >= 1024) { // Apply media query for >=1024px
        if ($('.withEaseSection').length) {
            if ($('.withEaseSection').isInViewport()) {
                setTimeout(() => {
                    $('.leftContent').addClass('image-state');
                }, 1500);
            } else {
                setTimeout(() => {
                    $('.leftContent').removeClass('image-state');
                }, 1500);
            }
        }
    } else {
        // Remove the class when the screen width is less than 1024px
        $('.leftContent').removeClass('image-state');
    }
});


var counted = 0;
$(window).scroll(function () {
    var oTop = $('.mapSectionDivider').offset().top - window.innerHeight;
    if (counted == 0 && $(window).scrollTop() > oTop) {
        $('.statCard h3').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-count');
            var symbol = $this.text().replace(/[0-9]/g, ''); // Extract the non-numeric characters (e.g., "+" or "M")

            $({
                countNum: 0
            }).animate(
                {
                    countNum: countTo
                },
                {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.floor(this.countNum) + symbol); // Add the symbol during the animation
                    },
                    complete: function () {
                        $this.text(this.countNum + symbol); // Ensure the symbol is added after the animation
                    }
                }
            );
        });
        counted = 1;
    }
});




