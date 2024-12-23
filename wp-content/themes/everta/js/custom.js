var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $("header").outerHeight();
let menuOpen = false;

$(window).scroll(function () {
    didScroll = true;
});

setInterval(function () {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    if (menuOpen) return; // Disable hasScrolled when menu is open

    var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta) return;

    // Detect if we are scrolling within the `.evertaEveryoneSection`
    var isWithinEvertaSection = isInSection('.evertaEveryoneSection');

    if ($(window).width() <= 820 && isWithinEvertaSection) {
        // Add nav-up class on reverse scroll within `.evertaEveryoneSection`
        $("header").removeClass("nav-down").addClass("nav-up");
    } else if (st > lastScrollTop && st > navbarHeight) {
        // Scrolling down
        $("header").removeClass("nav-down").addClass("nav-up");
    } else {
        // Scrolling up
        if (st + $(window).height() < $(document).height()) {
            $("header").removeClass("nav-up").addClass("nav-down");
        }
    }

    lastScrollTop = st;
}

// Helper function to detect if the scroll position is within a specific section
function isInSection(sectionClass) {
    var section = $(sectionClass);
    if (section.length) {
        var sectionTop = section.offset().top;
        var sectionBottom = sectionTop + section.outerHeight();
        var scrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();

        // Check if the current scroll position overlaps with the section
        return scrollTop + windowHeight > sectionTop && scrollTop < sectionBottom;
    }
    return false;
}

// Menu toggle functionality for <= 1024px width
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

// Reinitialize navbar height on window resize
$(window).resize(function () {
    navbarHeight = $("header").outerHeight();
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
    const dropdowns = document.querySelectorAll('.mainNavList.dropdown'); // Select all dropdown items
    const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

    if (!isTouchDevice) {
        // For desktop: mouseover and mouseleave functionality
        dropdowns.forEach(dropdown => {
            const dropdownMenu = dropdown.querySelector('.dropdownMenu'); // Dropdown menu inside the item

            dropdown.addEventListener('mouseenter', function () {
                dropdown.classList.add('active');
            });

            dropdown.addEventListener('mouseleave', function (event) {
                // Check if the mouse is still over the dropdown or the dropdown menu
                if (!event.relatedTarget || !dropdown.contains(event.relatedTarget)) {
                    dropdown.classList.remove('active');
                }
            });

            // Prevent fluctuation by ensuring dropdownMenu keeps the parent dropdown active
            if (dropdownMenu) {
                dropdownMenu.addEventListener('mouseenter', function () {
                    dropdown.classList.add('active');
                });

                dropdownMenu.addEventListener('mouseleave', function (event) {
                    if (!event.relatedTarget || !dropdown.contains(event.relatedTarget)) {
                        dropdown.classList.remove('active');
                    }
                });
            }
        });
    } else {
        // For mobile: click functionality
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', function (event) {
                event.preventDefault();

                // Close all other dropdowns
                dropdowns.forEach(dd => {
                    if (dd !== dropdown) {
                        dd.classList.remove('active');
                    }
                });

                // Toggle the clicked dropdown
                dropdown.classList.toggle('active');
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function (event) {
            if (!event.target.closest('.mainNavList')) {
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
            },
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 3,
                }
            }
        ]
    });
}
if ($(".chargingSection").length) {
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
}

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
        cssEase: "linear",

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
            },
            {
                breakpoint: 768,
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


$.fn.isInViewport = function (threshold = 0) {
    var elementTop = $(this).offset().top;
    var elementHeight = $(this).outerHeight();
    var elementScrollStart = elementTop + elementHeight * threshold; // Start trigger based on threshold
    var elementScrollEnd = elementTop + elementHeight * (1 - threshold); // End trigger based on threshold

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    // Check if the section is within the desired range
    return viewportBottom > elementScrollStart && viewportTop < elementScrollEnd;
};

$(window).on('resize scroll', function () {
    // Media query for >=1024px
    if (window.innerWidth >= 1024) {
        if ($('.withEaseSection').length) {
            if ($('.withEaseSection').isInViewport(0.2)) {
                setTimeout(() => {
                    $('.leftContent').addClass('image-state');
                }, 800);
            } else {
                setTimeout(() => {
                    $('.leftContent').removeClass('image-state');
                }, 800);
            }
        }
    } else {

        $('.leftContent').removeClass('image-state');
    }
});

$(window).on('resize scroll', function () {
    if ($('.exploreSection').length) {
        if ($('.exploreSection').isInViewport(0.5)) {
            setTimeout(() => {
                $('.rightContent').addClass('image-active');
            }, 800);
        } else {
            setTimeout(() => {
                $('.rightContent').removeClass('image-active');
            }, 800);
        }
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

/******About Us Js Start */

if ($(".ourStorySec").length) {
    $('.sliderBox').slick({
        slidesToShow: 1.4,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        infinite: false,
        // autoplay: true
        responsive: [
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 1.2,
                }
            },
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 1.1,
                }
            },
        ]
    });
}
if ($(".mission").length) {
    document.addEventListener("DOMContentLoaded", () => {
        const mission = document.querySelector(".mission");
        const missionCardIcon = document.querySelector(".mission .hoverContent .cardIcon");
        if (window.innerWidth <= 1024) {
            window.addEventListener('scroll', () => {
                const sectionRect = mission.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                const sectionHalfHeight = sectionRect.height / 2;

                const sectionHalfVisible =
                    sectionRect.top + sectionHalfHeight <= windowHeight &&
                    sectionRect.bottom - sectionHalfHeight >= 0;


                if (sectionHalfVisible) {
                    missionCardIcon.classList.add("iconReset");
                } else {
                    missionCardIcon.classList.remove("iconReset");
                }

            });
        }
    });

}
if ($(".vision").length) {
    document.addEventListener("DOMContentLoaded", () => {
        const vision = document.querySelector(".vision");
        console.log(vision);
        const visionCardIcon = document.querySelector(".vision .hoverContent .cardIcon");
        if (window.innerWidth <= 1024) {
            window.addEventListener('scroll', () => {
                const sectionRect = vision.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                const sectionHalfHeight = sectionRect.height / 2;
                const sectionHalfVisible =
                    sectionRect.top + sectionHalfHeight <= windowHeight &&
                    sectionRect.bottom - sectionHalfHeight >= 0;

                if (sectionHalfVisible) {
                    visionCardIcon.classList.add("visionIconReset");
                } else {
                    visionCardIcon.classList.remove("visionIconReset");
                }
            });
        }
    })
}
if ($(".poweringIdeaSec").length) {
    if (window.innerWidth > 820) {
        document.addEventListener("DOMContentLoaded", () => {
            const section = document.querySelector('.poweringIdeaSec');
            const poweringMainContainer = document.querySelector('.poweringMainContainer');

            window.addEventListener('scroll', () => {
                const sectionRect = section.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                const viewportMidPoint = windowHeight / 2;

                // Add 'activeViewPort' when the section reaches 50% of the viewport
                if (sectionRect.top < viewportMidPoint && sectionRect.bottom > viewportMidPoint) {
                    poweringMainContainer.classList.add('activeViewPort');
                } else {
                    // Remove 'activeViewPort' when the section is no longer in the 50% region
                    poweringMainContainer.classList.remove('activeViewPort');
                }
            });
        })
    }
}
if ($(".visitUsSec").length) {
    $('.visitUsSliderBox').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        centerMode: false,
        focusOnSelect: true,
        infinite: false,
        autoplay: true,
    });

    function showActiveIcon() {
        const activeSlide = document.querySelector(".visitUsSliderBox .slick-current");
        const desktopSVG = document.querySelector(".desktopSVG");
        const INDIA = document.querySelector(".desktopSVG .india");
        const mblINDIA = document.querySelector(".mblSVG .india");
        const UAE = document.querySelector(".desktopSVG .uae");
        const mblUAE = document.querySelector(".mblSVG .uae");
        const POLAND = document.querySelector(".desktopSVG .poland");
        const mblPOLAND = document.querySelector(".mblSVG .poland");

        if (activeSlide) {
            const companyName = activeSlide.getAttribute("data-company");
            if (window.getComputedStyle(desktopSVG).display !== "none") {
                if (companyName === "india") {
                    INDIA.style.opacity = 1;
                    UAE.style.opacity = 0;
                    POLAND.style.opacity = 0;
                } else if (companyName === "poland") {
                    POLAND.style.opacity = 1;
                    INDIA.style.opacity = 0;
                    UAE.style.opacity = 0;
                } else {
                    UAE.style.opacity = 1;
                    POLAND.style.opacity = 0;
                    INDIA.style.opacity = 0;
                }
            } else {
                if (companyName === "india") {
                    mblINDIA.style.opacity = 1;
                    mblUAE.style.opacity = 0;
                    mblPOLAND.style.opacity = 0;
                } else if (companyName === "poland") {
                    mblPOLAND.style.opacity = 1;
                    mblINDIA.style.opacity = 0;
                    mblUAE.style.opacity = 0;
                } else {
                    mblUAE.style.opacity = 1;
                    mblPOLAND.style.opacity = 0;
                    mblINDIA.style.opacity = 0;
                }

            }

        }
    }
    $('.visitUsSliderBox').on('afterChange', function () {
        showActiveIcon();
    });

    showActiveIcon()
}

/******About Us Js End */

/* Careers page JS Starts */

document.addEventListener("DOMContentLoaded", function () {
    const optionMenus = document.querySelectorAll(".customSelect");
    const applyFilterBtn = document.getElementById("applyFilter");
    const clearFilterBtn = document.getElementById("clearFilter");
    const careerBoxes = document.querySelectorAll(".careerPositionBox");

    const defaultTexts = ["Location", "Department", "Contract type"];

    optionMenus.forEach((optMenu, index) => {
        const selectBtn = optMenu.querySelector(".selectBtn");
        const options = optMenu.querySelectorAll(".option");
        const sBtn_text = optMenu.querySelector(".sBtntext");

        selectBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            optMenu.classList.toggle("active");
        });

        options.forEach((option) => {
            option.addEventListener("click", () => {
                const selectedOption = option.innerText;
                sBtn_text.innerText = selectedOption;
                optMenu.classList.remove("active");
            });
        });
    });

    window.addEventListener("click", function (e) {
        optionMenus.forEach(optMenu => {
            if (!optMenu.contains(e.target)) {
                optMenu.classList.remove("active");
            }
        });
    });

    applyFilterBtn.addEventListener("click", () => {
        const selectedFilters = Array.from(optionMenus).map(menu => menu.querySelector(".sBtntext").innerText.trim().toLowerCase());

        careerBoxes.forEach(box => {
            let isVisible = true;

            const locationText = box.querySelector(".posSubContent h4")?.innerText.trim().toLowerCase();
            const departmentText = box.querySelector(".subBoxContent h3")?.innerText.trim().toLowerCase();
            const contractTypeText = box.querySelector(".posSubContent div:nth-of-type(2) h4")?.innerText.trim().toLowerCase();

            const [locationFilter, departmentFilter, contractTypeFilter] = selectedFilters;

            if (locationFilter !== "Location" && !locationText.includes(locationFilter)) {
                isVisible = false;
            }

            if (departmentFilter !== "Department" && !departmentText.includes(departmentFilter)) {
                isVisible = false;
            }

            if (contractTypeFilter !== "Contract type" && !contractTypeText.includes(contractTypeFilter)) {
                isVisible = false;
            }

            if (isVisible) {
                box.style.display = "flex";
            } else {
                box.style.display = "none";
            }
        });
    });

    clearFilterBtn.addEventListener("click", () => {
        optionMenus.forEach((optMenu, index) => {
            const sBtn_text = optMenu.querySelector(".sBtntext");
            sBtn_text.innerText = defaultTexts[index];
        });

        careerBoxes.forEach(box => {
            box.style.display = "flex";
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // Check if the "custom-tabs-wrapper" exists on the page
    const customTabsWrapper = document.querySelector(".contactForm");
    if (!customTabsWrapper) return; // Exit if the container is not found

    // Select the custom tab buttons and content sections within the custom-tabs-wrapper
    const customTabButtons = customTabsWrapper.querySelectorAll(".contact-tab-btn");
    const customTabContents = customTabsWrapper.querySelectorAll(".contact-tab-content");

    // Ensure the first tab is active initially
    customTabButtons[0].classList.add("active");
    customTabContents[0].classList.add("active");

    customTabButtons.forEach((button) => {
        button.addEventListener("click", () => {
            // Remove the active class from all buttons and content sections
            customTabButtons.forEach((btn) => btn.classList.remove("active"));
            customTabContents.forEach((content) => content.classList.remove("active"));

            // Add the active class to the clicked button and the corresponding content
            button.classList.add("active");
            const tabId = button.getAttribute("data-tab");
            document.getElementById(tabId).classList.add("active");
        });
    });
});

// career opening modal starts
document.addEventListener("DOMContentLoaded", function () {
    var careerBoxes = document.querySelectorAll(".careerPositionBox");
    var closeButtons = document.querySelectorAll(".closeBtn");

    careerBoxes.forEach(function (box) {
        box.addEventListener("click", function () {

            var modalId = box.getAttribute("data-modal");
            var modal = document.getElementById(modalId);

            if (modal) {
                modal.classList.add("show-modal");
                document.body.style.overflow = "hidden";
            } else {
                document.body.style.overflow = "";
            }
        });
    });

    closeButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var modal = button.closest(".careerOpeningModal");
            modal.classList.remove("show-modal");
            document.body.style.overflow = "";
        });
    });

    window.addEventListener("click", function (event) {
        var openModals = document.querySelectorAll(".careerOpeningModal.show-modal");
        openModals.forEach(function (modal) {
            if (event.target === modal) {
                modal.classList.remove("show-modal");
                document.body.style.overflow = "";
            }
        });
    });
});

function openForm() {
    document.getElementById("contactForm").classList.add("open");
    $('body').css("overflow-y", "hidden");
    $('html').css("overflow-y", "hidden");
    $('body').css("background", "hidden");
}

function closeForm() {
    document.getElementById("contactForm").classList.remove("open");
    $('body').css("overflow-y", "visible");
    $('html').css("overflow-y", "visible");
}

if ($('.careerWallSection').length) {
    document.addEventListener("DOMContentLoaded", () => {
        const careerWallSection = document.querySelector('.careerWallSection');
        const evertaWallContainer = document.querySelector(".evertaWallContainer");
        console.log(evertaWallContainer);

        const options = {
            root: null,
            threshold: 0.5
        };

        const observerCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    evertaWallContainer.classList.add("resetImage");
                } else {
                    evertaWallContainer.classList.remove("resetImage");
                }
            });
        };

        const observer = new IntersectionObserver(observerCallback, options);

        observer.observe(careerWallSection);

    })
}

/* Careers page JS Ends */

/*Resources Details Page Start*/
if ($(".resDetailContentSec").length) {
    document.addEventListener("DOMContentLoaded", () => {
        const readMore = document.getElementById("readMore");
        const contentBox = document.querySelector('.contentBox');
        const readMoreBtnBox = document.querySelector('.readMoreBtnBox');

        function ContentShowFunc() {
            contentBox.classList.add("removeFadeEffect");
            contentBox.classList.remove("hideTxt");
            readMoreBtnBox.classList.add("btnHide");
        }
        readMore.addEventListener("click", ContentShowFunc);
    })
}

if ($(".backtopCl").length) {
    document.addEventListener("DOMContentLoaded", () => {
        const backtop = document.getElementById("backtop")

        window.addEventListener("scroll", function () {
            if (window.scrollY > 500) {
                backtop.classList.add("show");
            } else {
                backtop.classList.remove("show");
            }
        })

        backtop.addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            })
        })
        HTMLElement.prototype.isInViewport = function () {
            var elementTop = this.getBoundingClientRect().top;
            var elementBottom = this.getBoundingClientRect().bottom;
            var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
            return elementBottom > 0 && elementTop < viewportHeight;
        };
    })
}

/*Resources Details Page End*/

if ($(".resourcesfaqSection").length) {
    document.addEventListener("DOMContentLoaded", function () {
        const accordionWrapper = document.querySelector(".accordions-wrapper");
        const faqItems = accordionWrapper.querySelectorAll(".accordion");
        const toggleButton = document.getElementById("toggleFaqButton");

        const increment = 6; // Number of items to show at a time
        let currentlyVisible = increment;

        // Hide all FAQ items initially except the first set
        if (faqItems.length > increment) {
            toggleButton.style.display = "block"; // Show the button
            faqItems.forEach((item, index) => {
                if (index >= increment) {
                    item.style.display = "none"; // Hide extra items
                }
            });
        } else {
            toggleButton.style.display = "none"; // Hide the button if items are less than or equal to increment
        }

        // Handle button click
        toggleButton.addEventListener("click", function () {
            const isExpanded = toggleButton.getAttribute("data-expanded") === "true";

            if (isExpanded) {
                // Show less: Reset to initial state showing only the first set
                currentlyVisible = increment;
                faqItems.forEach((item, index) => {
                    item.style.display = index < increment ? "block" : "none";
                });
                toggleButton.textContent = "Show More";
                toggleButton.setAttribute("data-expanded", "false");
            } else {
                // Show more: Reveal the next set of items
                const nextVisible = currentlyVisible + increment;
                faqItems.forEach((item, index) => {
                    if (index < nextVisible) {
                        item.style.display = "block";
                    }
                });

                // Update the currently visible count
                currentlyVisible = nextVisible;

                // Check if all items are now visible
                if (currentlyVisible >= faqItems.length) {
                    toggleButton.textContent = "Show Less";
                    toggleButton.setAttribute("data-expanded", "true");
                }
            }
        });
    });
}


document.addEventListener('DOMContentLoaded', () => {
    const cardGrid = document.getElementById('cardGrid');
    const pagination = document.getElementById('pagination');
    const searchInput = document.querySelector('.searchWrapper input[type="search"]');

    // Select all `.cards` inside `.cardGrid`
    const cards = Array.from(cardGrid.querySelectorAll('.cards'));

    // Function to get the number of cards per page based on screen width
    function getCardsPerPage() {
        if (window.innerWidth < 680) {
            return 4; // 4 cards per page for mobile
        } else {
            return 6; // 6 cards per page for desktop/iPad
        }
    }

    // Initial cards per page based on screen size
    let cardsPerPage = getCardsPerPage();
    let currentPage = 1; // Start at page 1

    // Function to render cards for the current page
    function renderCards(page, filteredCards = cards) {
        console.log(`Rendering cards for page: ${page}`); // Debug log

        // Clear the current content in the card grid
        cardGrid.innerHTML = '';

        // Calculate the start and end index for cards to display
        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;

        // Get the cards for the current page
        const visibleCards = filteredCards.slice(startIndex, endIndex);

        if (visibleCards.length === 0) {
            console.log('No cards to display'); // Handle empty pages
        } else {
            // Append the visible cards to the card grid
            visibleCards.forEach((card) => {
                cardGrid.appendChild(card);
            });
        }

        // Render the pagination buttons
        renderPagination(filteredCards);
    }

    // Function to render pagination buttons
    function renderPagination(filteredCards) {
        pagination.innerHTML = ''; // Clear existing pagination
    
        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);
        console.log(`Total pages: ${totalPages}`); // Debug log
    
        if (totalPages > 1) {
            // Add "Previous" button with image and extra class
            const prevButton = document.createElement('button');
            const prevImage = document.createElement('img');
            prevImage.src = `${theme_vars.template_dir}/images/prev-arrow.svg`;
            prevImage.alt = 'Previous';
            prevButton.appendChild(prevImage);
            prevButton.classList.add('pagination-prev'); // Extra class for styling
            prevButton.disabled = currentPage === 1; // Disable if on the first page
            prevButton.addEventListener('click', () => {
                currentPage--;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(prevButton);
    
            // Pagination logic with ellipsis for mobile
            const maxVisiblePages = window.innerWidth <= 680 ? 3 : 6; // 3 pages for mobile, 6 for desktop/tablet
            let pageButtons = [];
    
            // Show the first and last page buttons, and a few neighboring ones
            if (totalPages <= maxVisiblePages) {
                // If total pages are less than or equal to maxVisiblePages, show all page numbers
                for (let i = 1; i <= totalPages; i++) {
                    pageButtons.push(i);
                }
            } else {
                // Show first page, current page, and last page with ellipsis
                if (currentPage <= 2) {
                    // Show first 3 pages (1, 2, 3 and ... if needed)
                    pageButtons = [1, 2, 3, '...', totalPages];
                } else if (currentPage >= totalPages - 1) {
                    // Show last 3 pages (..., second last, last page)
                    pageButtons = [1, '...', totalPages - 2, totalPages - 1, totalPages];
                } else {
                    // Show 1 page before and after the current page with ellipsis
                    pageButtons = [1, '...', currentPage - 1, currentPage, currentPage + 1, '...', totalPages];
                }
            }
    
            // Add the page number buttons to pagination
            pageButtons.forEach((button) => {
                const pageButton = document.createElement('button');
                if (button === '...') {
                    pageButton.textContent = '...';
                    pageButton.disabled = true; // Disable the ellipsis button
                } else {
                    pageButton.textContent = button;
                    pageButton.classList.toggle('active', button === currentPage); // Highlight the active page
                    pageButton.addEventListener('click', () => {
                        currentPage = button;
                        renderCards(currentPage, filteredCards);
                    });
                }
                pagination.appendChild(pageButton);
            });
    
            // Add "Next" button with image and extra class
            const nextButton = document.createElement('button');
            const nextImage = document.createElement('img');
            nextImage.src = `${theme_vars.template_dir}/images/black-cta-arrow.svg`;
            nextImage.alt = 'Next';
            nextButton.appendChild(nextImage);
            nextButton.classList.add('pagination-next'); // Extra class for styling
            nextButton.disabled = currentPage === totalPages; // Disable if on the last page
            nextButton.addEventListener('click', () => {
                currentPage++;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(nextButton);
        }
    }
    
    

    // Function to filter cards based on search input
    // Function to filter cards based on search input
    function filterCards(query) {
        const filteredCards = cards.filter((card) => {
            const title = card.querySelector('.cardContent h3').textContent.toLowerCase();
            const description = card.querySelector('.cardContent p').textContent.toLowerCase();
            const tag = card.querySelector('.cardContent .tag').textContent.toLowerCase();

            // Check if any of the three elements contains the search query
            return title.includes(query.toLowerCase()) || description.includes(query.toLowerCase()) || tag.includes(query.toLowerCase());
        });
        renderCards(currentPage, filteredCards);
    }


    // Listen for input changes in the search field
    searchInput.addEventListener('input', (e) => {
        const query = e.target.value.trim(); // Get the search query
        filterCards(query); // Filter cards based on the query
    });

    // Listen for window resize events to update cards per page
    window.addEventListener('resize', () => {
        // Update the cards per page when the window is resized
        cardsPerPage = getCardsPerPage();
        renderCards(currentPage); // Re-render cards based on the new screen size
    });

    // Initial render of the first page with all cards
    renderCards(currentPage);
});






