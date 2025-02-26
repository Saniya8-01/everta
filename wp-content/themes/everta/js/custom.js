var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $("header").outerHeight();
var menuOpen = false;

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

    const st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta) return;

    // Detect if we are scrolling within the `.hover-section`, `.cards`, or `.hiringProcessContainer`
    const isWithinEvertaSection = isInSection('.hover-section');
    const isWithinChargingSection = isInSection('.cards');
    const isWithinHiringSection = isInSection('.hiringProcessContainer');

    if ($(window).width() <= 820 && (isWithinEvertaSection || isWithinChargingSection || isWithinHiringSection)) {
        // Add nav-up class on reverse scroll only within the specified sections
        if ((isWithinEvertaSection && !isWithinChargingSection && !isWithinHiringSection) ||
            (isWithinChargingSection && !isWithinEvertaSection && !isWithinHiringSection) ||
            (isWithinHiringSection && !isWithinEvertaSection && !isWithinChargingSection)) {
            $("header").removeClass("nav-down").addClass("nav-up");
        }
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

// Helper function to detect if the scroll position is within a specific section (80% visible)
function isInSection(sectionClass) {
    const section = $(sectionClass);
    if (section.length) {
        const sectionTop = section.offset().top;
        const sectionBottom = sectionTop + section.outerHeight();
        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();

        // Calculate 80% of the section height
        const sectionVisible = scrollTop + windowHeight * 0.2; // 80% from top of the window

        // Check if 80% of the section is visible in the viewport
        return sectionVisible > sectionTop && scrollTop < sectionBottom;
    }
    return false;
}

let customSelects = document.querySelectorAll("#popupSelect");

// Menu toggle functionality for <= 1024px width
$(document).ready(function () {
    if ($(window).width() <= 1024) {
        $("#toggle").click(function () {
            $(this).toggleClass("active");
            $(".navMenu").toggleClass("open");
            if ($(".navMenu").hasClass("open")) {
                menuOpen = true; // Menu is open
                $('body').css("overflow-y", "hidden");
                $('html').css("overflow-y", "hidden");
                $(".languageTranslatorMbl").css("display","none");
            } else {
                menuOpen = false; // Menu is closed
                $('body').css("overflow-y", "visible");
                $('body').css("overflow-x", "hidden");
                $('html').css("overflow-y", "visible");
                $('html').css("overflow-x", "hidden");
                $(".languageTranslatorMbl").css("display","block");
            }
        });
    }
});

// Reinitialize navbar height on window resize
$(window).resize(function () {
    navbarHeight = $("header").outerHeight();
});

//--------------------------- Hide Header on on scroll down-------------------------//

//-------------------Header Dropdown JS----------------------//
$(document).ready(function () {
    const dropdowns = document.querySelectorAll('.mainNavList.dropdown'); 
    const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

    if (isTouchDevice) {
        dropdowns.forEach(dropdown => {
            const toggleDropdown = (event) => {
                // Prevent toggling when clicking inside the .dropdownMenu itself
                if (event.target.closest('.dropdownMenu')) {
                    return;
                }
                event.preventDefault();

                // Close all other dropdowns
                dropdowns.forEach(dd => {
                    if (dd !== dropdown) {
                        dd.classList.remove('active');
                        dd.querySelector('.dropdownMenu').style.height = '0';
                        dd.querySelector('.dropdownMenu').style.opacity = '0';
                    }
                });

                // Toggle the clicked dropdown
                const dropdownMenu = dropdown.querySelector('.dropdownMenu');
                const isActive = dropdown.classList.contains('active');
                dropdown.classList.toggle('active');
                dropdownMenu.style.height = isActive ? '0' : dropdownMenu.scrollHeight + 'px';
                dropdownMenu.style.opacity = isActive ? '0' : '1';
            };

            dropdown.addEventListener('click', toggleDropdown); // Bind directly to .mainNavList
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', (event) => {
            if (!event.target.closest('.mainNavList')) {
                dropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                    const dropdownMenu = dropdown.querySelector('.dropdownMenu');
                    dropdownMenu.style.height = '0';
                    dropdownMenu.style.opacity = '0';
                });
            }
        });
    } else {
        dropdowns.forEach(dropdown => {
            const dropdownMenu = dropdown.querySelector('.dropdownMenu');

            dropdown.addEventListener('mouseenter', () => {
                dropdown.classList.add('active');
                dropdownMenu.style.height = dropdownMenu.scrollHeight + 'px';
                dropdownMenu.style.opacity = '1';
            });

            dropdown.addEventListener('mouseleave', () => {
                dropdown.classList.remove('active');
                dropdownMenu.style.height = '0';
                dropdownMenu.style.opacity = '0';
            });
        });
    }
});
//-------------------Header Dropdown JS----------------------//

document.addEventListener("DOMContentLoaded", function () {
    // Elements
    const overlay = document.getElementById("overlay");
    const percentage = document.getElementById("percentage");
    let progress = 1; // Start progress at 1%
    const total = 100;
    // Update the progress bar and percentage on page load events
    function updateProgress() {
        if (progress <= total) { // Fixed issue
            percentage.textContent = `${progress}%`; // Correct syntax
        }
    }
    function startLoader() {
        // When the page is fully loaded
        window.onload = function () {
            // Ensure the loader reaches 100% when the page fully loads
            const completeProgress = setInterval(() => {
                if (progress < 100) {
                    progress++;
                    updateProgress();
                } else {
                    clearInterval(completeProgress);
                    // Remove loader after reaching 100%
                    setTimeout(() => {
                        overlay.style.display = "none";
                    }, 300); // Small delay to show 100% before hiding the loader
                }
            }, 30); // Fast increments to reach 100% on page load
        };
    }
    if (!localStorage.getItem('visited')) {
        // First-time visitor, show loader
        startLoader();
        // Set localStorage flag to indicate the user has visited
        localStorage.setItem('visited', 'true');
    } else {
        // Not the first time, hide the loader immediately
        overlay.style.display = "none";
    }
});

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
    var $progressContainer = $(".progresBar");
    var progressTimeout;

    $slider.on("init", function (event, slick) {
        if (slick.slideCount > slick.options.slidesToShow) {
            startProgressBar();
        } else {
            $progressBar.hide();
        }
    });

    $slider.slick({
        dots: false,
        slidesToShow: 2.4,
        arrows: false,
        slidesToScroll: 1,
        autoplay: false, // Custom autoplay logic
        speed: 1000,
        infinite: false,
        initialSlide: 0,
        focusOnSelect: true,
        cssEase: "linear",
        responsive: [
            { breakpoint: 1440, settings: { slidesToShow: 2.2 } },
            { breakpoint: 821, settings: { slidesToShow: 1.5 } },
            { breakpoint: 768, settings: { slidesToShow: 1 } }
        ]
    });

    function startProgressBar() {
        resetProgressBar();
        $progressBar.css({
            width: "100%",
            transition: `width ${autoplaySpeed}ms linear`
        });

        clearTimeout(progressTimeout);
        progressTimeout = setTimeout(() => {
            if ($slider.slick("slickCurrentSlide") < $slider.slick("getSlick").slideCount - $slider.slick("getSlick").options.slidesToShow) {
                $slider.slick("slickNext");
            } else {
                $slider.slick("slickGoTo", 0);
            }
        }, autoplaySpeed);
    }

    function resetProgressBar() {
        clearTimeout(progressTimeout);
        $progressBar.css({
            width: "0%",
            transition: "none"
        });
    }

    // Handle progress reset and sync on all events
    $slider.on("beforeChange", resetProgressBar);
    $slider.on("afterChange", startProgressBar);

    // Handle focus-based slide change sync
    $slider.on("setPosition", function () {
        resetProgressBar();
        startProgressBar();
    });
}

function initializeSlick() {
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();

    if ((windowWidth <= 820) || (windowWidth <= 1024 && windowHeight >= 1366)) {
        if (!$('.rightContentWrapper').hasClass('slick-initialized')) {
            $('.rightContentWrapper').slick({
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
                    }
                ]
            });
        }
    } else {
        if ($('.rightContentWrapper').hasClass('slick-initialized')) {
            $('.rightContentWrapper').slick('unslick');
        }
    }
}

$(window).on('resize', initializeSlick);
$(document).ready(initializeSlick);

$(document).ready(function () {
    initializeSlick();
    $(window).resize(function () {
        initializeSlick();
    });
});

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
    const tabs = document.querySelectorAll('.tab-content');
    const hoverBoxes = document.querySelectorAll('.card');

    function setDefaultActiveCards() {
        tabs.forEach((tab) => {
            const firstCard = tab.querySelector('.card');
            if (firstCard) {
                firstCard.classList.add('active');
            }
        });
    }

    function applyInteractionEffect() {
        if (window.innerWidth > 1180) {
            hoverBoxes.forEach((box) => {
                box.removeEventListener('click', handleClick);
                box.addEventListener('mouseenter', handleMouseEnter);
            });
        } else if (window.innerWidth >= 1024 && window.innerWidth <= 1180) {
            hoverBoxes.forEach((box) => {
                box.removeEventListener('mouseenter', handleMouseEnter);
                box.addEventListener('click', handleClick);
            });
        } else {
            hoverBoxes.forEach((box) => {
                box.classList.remove('active');
                box.removeEventListener('mouseenter', handleMouseEnter);
                box.removeEventListener('click', handleClick);
            });
        }
    }

    function handleMouseEnter(event) {
        const currentTab = event.currentTarget.closest('.tab-content');
        const cardsInCurrentTab = currentTab.querySelectorAll('.card');

        cardsInCurrentTab.forEach((item) => item.classList.remove('active'));
        event.currentTarget.classList.add('active');
    }

    function handleClick(event) {
        const currentTab = event.currentTarget.closest('.tab-content');
        const cardsInCurrentTab = currentTab.querySelectorAll('.card');

        cardsInCurrentTab.forEach((item) => item.classList.remove('active'));
        event.currentTarget.classList.add('active');
    }

    setDefaultActiveCards();
    applyInteractionEffect();
    window.addEventListener('resize', applyInteractionEffect);
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

$(document).ready(function () {
    let hasTriggered = false; // Track whether the animation has triggered

    $(window).on('resize scroll', function () {
        if (hasTriggered) return; // Prevent further execution if already triggered

        // Media query for >=1024px
        if (window.innerWidth >= 1024) {
            if ($('.withEaseSection').length) {
                if ($('.withEaseSection').isInViewport(0.2)) {
                    setTimeout(() => {
                        $('.leftContent').addClass('image-state');
                        hasTriggered = true; // Mark as triggered
                    }, 800);
                }
            }
        } else {
            $('.leftContent').removeClass('image-state');
        }
    });
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
    if (window.innerWidth > 1024) {
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
        infinite: true,
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
            const companyName = activeSlide.getAttribute("data-company").toLowerCase();
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
if ($(".evertaEveryoneSection").length) {
    $(document).on('click', '.toggle', function (event) {
        event.preventDefault();
        var target = $(this).data('target');
        var popup = $('#' + target);
        popup.toggleClass('hide');
        if (!popup.hasClass('hide')) {
            $('body').css('overflow', 'hidden');
        } else {
            $('body').css('overflow', 'auto');
            $('body').css("overflow-x", "hidden");
        }
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('.popup-body, .toggle').length) {
            $('.popup-body').closest('.popup').addClass('hide');
            $('body').css('overflow', 'auto');
            $('body').css("overflow-x", "hidden");
        }
    });
}
/******About Us Js End */

/* Careers page JS Starts */

if($(".careerTeamSection").length){
    document.addEventListener("DOMContentLoaded", function() {
        const optionMenus = document.querySelectorAll(".selFilter .customSelect");
        const applyFilterBtn = document.getElementById("applyFilter");
        const clearFilterBtn = document.getElementById("clearFilter");
        const careerBoxes = document.querySelectorAll(".careerPositionBox");
        const dnfState = document.querySelector(".dnfContainer");
        

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

        window.addEventListener("click", function(e) {
            optionMenus.forEach(optMenu => {
                if (!optMenu.contains(e.target)) {
                    optMenu.classList.remove("active");
                }
            });
        });

        applyFilterBtn.addEventListener("click", () => {
            const selectedFilters = Array.from(optionMenus).map(menu =>
                menu.querySelector(".sBtntext").innerText.trim().toLowerCase()
            );
        
            const [locationFilter, departmentFilter, contractTypeFilter] = selectedFilters;
            let visibleCount = 0;
        
            careerBoxes.forEach(box => {
                const locationText = box.querySelector(".posSubContent h4")?.innerText.trim().toLowerCase() || "";
                const departmentText = box.getAttribute("data-job-department")?.trim().toLowerCase() || "";
                const contractTypeText = box.querySelector(".posSubContent div:nth-of-type(2) h4")?.innerText.trim().toLowerCase() || "";
        
                const isVisible = 
                    (locationFilter === "location" || locationText.includes(locationFilter)) &&
                    (departmentFilter === "department" || departmentText.includes(departmentFilter)) &&
                    (contractTypeFilter === "contract type" || contractTypeText.includes(contractTypeFilter));
        
                
                box.style.display = isVisible ? "flex" : "none";
                
                if(isVisible){
                    visibleCount++;
                }
            });

            if(visibleCount === 0){
                dnfState.style.display = "flex"
            }else{
                dnfState.style.display = "none"
            }
        });

        clearFilterBtn.addEventListener("click", () => {
            optionMenus.forEach((optMenu, index) => {
                const sBtn_text = optMenu.querySelector(".sBtntext");
                sBtn_text.innerText = defaultTexts[index];
                dnfState.style.display = "none"
            });

            careerBoxes.forEach(box => {
                box.style.display = "flex";
            });
        });
    });
}

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

// career opening Job Popup

if($(".careerTeamSection").length){
    document.addEventListener("DOMContentLoaded", function () {
        const elements = document.querySelectorAll(".careerPositionBox");  
        const closeButtons = document.querySelectorAll(".closeBtn"); 
        const body = document.querySelector('body');
        const html = document.querySelector("html");

        
        elements.forEach((element) => {
            element.addEventListener("click", function () {
                const panelId = this.id.replace("careerPositionBox", "careerOpeningModal");
                const modal = document.getElementById(panelId);
                modal.style.display = "block";
                body.classList.add('hideScrollbar');
                html.classList.add('hideScrollbarhtml');
            });
        });
       
        closeButtons.forEach((button) => {
            button.addEventListener("click", function () {
                
                const modal = this.closest('.careerOpeningModal');
                modal.style.display = "none";
                
                body.classList.remove('hideScrollbar');
                html.classList.remove('hideScrollbarhtml');
            });
        });
        
        window.addEventListener("click", function (event) {
            elements.forEach((element) => {
                const panelId = element.id.replace("careerPositionBox", "careerOpeningModal");
                const modal = document.getElementById(panelId);
                if (event.target == modal) {
                    modal.style.display = "none";
                    body.classList.remove('hideScrollbar');
                    html.classList.remove('hideScrollbarhtml');
                }
            });
        });
    });
}

function openForm() {
    const contactForm = document.getElementById("contactFormContainer");
    contactForm.classList.add("open");

    $('body, html').css({
        "overflow-y": "hidden",
    });
}

function closeForm() {
    const contactForm = document.getElementById("contactFormContainer");
    contactForm.classList.remove("open");

    $('body, html').css({
        "overflow-y": "visible",
    });
}

document.addEventListener("click", function (event) {
    const contactForm = document.getElementById("contactForm");
    const contactFormWrapper = document.querySelector(".contactFormWrapper");
    const contactButton = document.querySelector(".ctaContact .mainManu");

    if (
        contactForm.classList.contains("open") &&
        !contactFormWrapper.contains(event.target) &&
        event.target !== contactButton &&
        !contactButton.contains(event.target)
    ) {
        closeForm();
    }
});



if ($('.careerWallSection').length) {
    document.addEventListener("DOMContentLoaded", () => {
        const careerWallSection = document.querySelector('.careerWallSection');
        const evertaWallContainer = document.querySelector(".evertaWallContainer"); 
        
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

        if(contentBox.offsetHeight  <= 400){
            contentBox.classList.remove("hideTxt");
            readMoreBtnBox.style.display = "none"
            contentBox.classList.add("removeFadeEffect");
        }else{
            readMore.addEventListener("click", function () {
                if (contentBox.classList.contains("hideTxt")) {
                  contentBox.style.maxHeight = `${contentBox.scrollHeight}px`; // Set current height
                  contentBox.classList.remove("hideTxt");
                  contentBox.classList.add("removeFadeEffect");
                  readMoreBtnBox.classList.add("btnHide");
                } else {
                  // Expand content
                  contentBox.style.maxHeight = `${contentBox.scrollHeight}px`; // Set dynamic max-height
                  contentBox.classList.add("hideTxt");
                
                }
            });
        }
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
if ($(".relatedPostSec").length) {
    $(".postCardSlider").slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 821,
                settings: {
                    slidesToShow: 2,
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
}

/*Resources Details Page End*/

if($(".mapSection").length){
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
}


// document.addEventListener('DOMContentLoaded', function () {
//     const languageTranslator = document.querySelector('.languageTranslatorMbl');
//     const languageMenu = document.querySelector('.languageMenuMbl');

//     languageTranslator.addEventListener('click', function (event) {
//         languageTranslator.classList.toggle('active');
//         event.stopPropagation();
//     });

//     document.addEventListener('click', function (event) {
//         if (!languageTranslator.contains(event.target)) {
//             languageTranslator.classList.remove('active');
//         }
//     });
// });

  if ($(".homepageFaq").length) {
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

if ($(".manualBrochureSection").length) {
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

if ($(".resourcesfaqSection").length) {
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

if ($(".resourcesfaqSection").length) {
    document.addEventListener("DOMContentLoaded", function () {
        const accordionWrapper = document.querySelector(".accordions-wrapper");
        const faqItems = accordionWrapper.querySelectorAll(".accordion");
        const toggleButton = document.getElementById("toggleFaqButton");

        const increment = 6; // Number of items to show at a time
        let currentlyVisible = increment;

        // Function for smooth slide effect
        function slideDown(element) {
            element.style.display = "block";
            element.style.height = "0px";
            element.style.overflow = "hidden";
            let height = element.scrollHeight;
            element.style.transition = "height 0.5s ease-out";
            element.style.height = height + "px";
            setTimeout(() => {
                element.style.height = "";
                element.style.overflow = "";
            }, 500);
        }

        function slideUp(element) {
            element.style.transition = "height 0.5s ease-out";
            element.style.height = element.scrollHeight + "px";
            setTimeout(() => {
                element.style.height = "0px";
                element.style.overflow = "hidden";
            }, 10);
            setTimeout(() => {
                element.style.display = "none";
                element.style.height = "";
            }, 500);
        }

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
                currentlyVisible = increment;
                faqItems.forEach((item, index) => {
                    if (index >= increment) {
                        slideUp(item);
                    }
                });
                toggleButton.textContent = "Load More";
                toggleButton.setAttribute("data-expanded", "false");
            } else {
                const nextVisible = currentlyVisible + increment;
                faqItems.forEach((item, index) => {
                    if (index < nextVisible && item.style.display === "none") {
                        slideDown(item);
                    }
                });
                currentlyVisible = nextVisible;

                if (currentlyVisible >= faqItems.length) {
                    toggleButton.textContent = "Load Less";
                    toggleButton.setAttribute("data-expanded", "true");
                }
            }
        });
    });
}

if($(".productInfoSection").length){
    document.addEventListener('DOMContentLoaded', function () {
        const productInfoSection = document.querySelector('.productInfoSection');
    
        // Check if viewport width is above 820px
        function isLargeScreen() {
            return window.innerWidth > 820;
        }
    
        if (productInfoSection && isLargeScreen()) {
            const observer = new IntersectionObserver(function (entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        productInfoSection.id = 'product-info';
                        observer.disconnect(); // Stop observing after first trigger
                    }
                });
            }, { threshold: 0.5 }); // Trigger when 50% of the section is visible
    
            observer.observe(productInfoSection);
        } 
    
        // Optional: Re-check on window resize
        window.addEventListener('resize', function () {
            if (isLargeScreen()) {
                const newObserver = new IntersectionObserver(function (entries, observer) {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            productInfoSection.id = 'product-info';
                            observer.disconnect(); // Stop observing after first trigger
                        }
                    });
                }, { threshold: 0.5 });
    
                newObserver.observe(productInfoSection);
            } else {
                productInfoSection.removeAttribute('id'); // Remove ID if resized below 820px
            }
        });
    });
}

if($(".industryStandardSection").length){
    document.addEventListener('DOMContentLoaded', function () {
        const industrySection = document.querySelector('.industryStandardSection');
        const technicalSection = document.querySelector('.technicalDetailsSection');
    
        if (industrySection) {
            const industryObserver = new IntersectionObserver(function (entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        industrySection.id = 'industry-standard';
                    } else {
                        industrySection.removeAttribute('id');
                    }
                });
            }, { threshold: 0.5 }); 
    
            industryObserver.observe(industrySection);
        }
    
        if (technicalSection) {
            const technicalObserver = new IntersectionObserver(function (entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        technicalSection.id = 'technical-details';
                    } else {
                        technicalSection.removeAttribute('id');
                    }
                });
            }, { threshold: 0.5 });
    
            technicalObserver.observe(technicalSection);
        }
    });
}

if($(".productBanner").length){
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            const productBanner = document.querySelector('.productBanner');
            if (productBanner) {
                productBanner.setAttribute('id', 'animatedBanner');
            }
        }, 1000); 
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tabContent'); // Get all tab content sections
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
        const currentTab = event.currentTarget.closest('.tabContent'); // Get the parent tab of the hovered card
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

if ($(".productSection").length) {
    $(".cards").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
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
}

if ($(".chargingSection").length) {
    $(".cards").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
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
}

function equalizeCardHeights() {
    const cards = document.querySelectorAll('.card'); // Select all cards
    let maxHeight = 0;

    // Reset heights
    cards.forEach((card) => {
        card.style.height = 'auto'; // Reset any previously set heights
    });

    // Find the maximum height
    cards.forEach((card) => {
        const cardHeight = card.offsetHeight;
        if (cardHeight > maxHeight) {
            maxHeight = cardHeight;
        }
    });

    // Apply the maximum height to all cards
    cards.forEach((card) => {
        card.style.height = `${maxHeight}px`;
    });
}

$(document).ready(function () {
    $(".cards").on('setPosition', function () {
        equalizeCardHeights();
    });

    // Trigger the function on window resize
    $(window).on('resize', function () {
        equalizeCardHeights();
    });
});

if ($(".productInfoSection").length) {
    $(".mobileSliderContainer").slick({
        dots: false,
        slidesToShow: 1,
        arrows: true,
        infinite: false,
    });

    // Custom opacity handling for seamless loop
    $(".animationWrapper").on("afterChange", function (event, slick, currentSlide) {
        const $slider = $(this); // Restrict to current slider

        // Reset opacity for all slides within this slider
        $slider.find(".slick-slide").css("opacity", "0.2");

        // Get the indexes of the visible slides
        const totalSlides = slick.$slides.length;
        const firstIndex = currentSlide;
        const secondIndex = (currentSlide + 1) % totalSlides;
        const thirdIndex = (currentSlide + 2) % totalSlides;

        // Set opacity for the visible slides within this slider
        $slider.find(`.slick-slide[data-slick-index="${firstIndex}"]`).css("opacity", "1"); // First slide (active)
        $slider.find(`.slick-slide[data-slick-index="${secondIndex}"]`).css("opacity", "0.5"); // Second slide
        $slider.find(`.slick-slide[data-slick-index="${thirdIndex}"]`).css("opacity", "0.2"); // Third slide
    });
}

$(document).ready(function () {
    if ($(".industryStandardSection").length) {
        $(".animationWrapper").slick({
            vertical: true,
            dots: false,
            slidesToShow: 3,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 1000,
            infinite: true,
        });
    }
});


if ($(".technicalDetailsSection").length) {
    jQuery(document).ready(function () {
        const accordionHeaders = document.querySelectorAll(".accordion-header");
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
  
// Pagination fix for first code block
if ($(".newsCards").length) {
    document.addEventListener('DOMContentLoaded', () => {
        const cardGrid = document.getElementById('cardGrid');
        const pagination = document.getElementById('pagination');
        const searchInput = document.querySelector('.searchWrapper input[type="text"]');
        const optionMenu = document.querySelector("#customSelect");
        const selectBtn = optionMenu.querySelector("#selectBtn");
        const options = optionMenu.querySelectorAll(".option");
        const sBtn_text = optionMenu.querySelector(".sBtntext");

        const noPostsMessage = document.createElement('div');
        noPostsMessage.classList.add('no-posts-message');
        noPostsMessage.textContent = "No posts found.";

        function getCards() {
            return Array.from(cardGrid.querySelectorAll('.cards'));
        }

        function getCardsPerPage() {
            return window.innerWidth < 680 ? 4 : 6;
        }

        let cardsPerPage = getCardsPerPage();
        let currentPage = 1;
        let allCards = getCards();
        let sortedCards = [...allCards];
        let filteredCards = [...sortedCards];

        function renderCards(page, filteredCards = sortedCards) {
            cardGrid.innerHTML = '';

            if (filteredCards.length === 0) {
                cardGrid.appendChild(noPostsMessage);
                pagination.style.display = 'none';
                return;
            }

            const startIndex = (page - 1) * cardsPerPage;
            const endIndex = startIndex + cardsPerPage;
            const visibleCards = filteredCards.slice(startIndex, endIndex);

            visibleCards.forEach(card => cardGrid.appendChild(card));
            renderPagination(filteredCards);
        }

        function renderPagination(filteredCards) {
            pagination.innerHTML = '';
            const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

            if (totalPages <= 1) {
                pagination.style.display = 'none';
                return;
            }

            pagination.style.display = 'flex';

            const prevButton = document.createElement('button');
            const prevImage = document.createElement('img');
            prevImage.src = site_url + '/wp-content/themes/everta/images/prev-arrow.svg';
            prevImage.alt = 'Previous';
            prevButton.appendChild(prevImage);
            prevButton.classList.add('pagination-prev');
            prevButton.disabled = currentPage === 1;
            prevButton.addEventListener('click', () => {
                currentPage--;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(prevButton);

            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.classList.toggle('active', i === currentPage);
                pageButton.addEventListener('click', () => {
                    currentPage = i;
                    renderCards(currentPage, filteredCards);
                });
                pagination.appendChild(pageButton);
            }

            const nextButton = document.createElement('button');
            const nextImage = document.createElement('img');
            nextImage.src = site_url + '/wp-content/themes/everta/images/black-cta-arrow.svg';
            nextImage.alt = 'Next';
            nextButton.appendChild(nextImage);
            nextButton.classList.add('pagination-next');
            nextButton.disabled = currentPage === totalPages;
            nextButton.addEventListener('click', () => {
                currentPage++;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(nextButton);
        }

        function filterCards(query) {
            filteredCards = sortedCards.filter(card => {
                const title = card.querySelector('.cardContent h3').textContent.toLowerCase();
                const description = card.querySelector('.cardContent p').textContent.toLowerCase();
                const tag = card.querySelector('.cardContent .tag').textContent.toLowerCase();
                return title.includes(query.toLowerCase()) || description.includes(query.toLowerCase()) || tag.includes(query.toLowerCase());
            });
            currentPage = 1;
            renderCards(currentPage, filteredCards);
        }

        searchInput.addEventListener('input', (e) => {
            filterCards(e.target.value.trim());
        });

        function sortCards(sortType) {
            sortedCards = [...allCards];
            if (sortType === "latest") {
                sortedCards.sort((a, b) => new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date')));
            } else if (sortType === "oldest") {
                sortedCards.sort((a, b) => new Date(a.getAttribute('data-date')) - new Date(b.getAttribute('data-date')));
            } else if (sortType === "az") {
                sortedCards.sort((a, b) => a.getAttribute('data-title').localeCompare(b.getAttribute('data-title')));
            } else if (sortType === "za") {
                sortedCards.sort((a, b) => b.getAttribute('data-title').localeCompare(a.getAttribute('data-title')));
            }
            filterCards(searchInput.value.trim());
        }

        options.forEach(option => {
            option.addEventListener("click", function () {
                const sortType = this.getAttribute('data-sort');
                sBtn_text.textContent = this.textContent;
                optionMenu.classList.remove("active");
                sortCards(sortType);
            });
        });

        selectBtn.addEventListener('click', () => {
            optionMenu.classList.toggle('active');
        });

        window.addEventListener('resize', () => {
            cardsPerPage = getCardsPerPage();
            renderCards(currentPage, filteredCards);
        });

        renderCards(currentPage);
    });
}

if ($(".blogsCards").length) {
    document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".blogsTabWrapper a");
        const cardGrid = document.getElementById("cardGrid");
        const pagination = document.getElementById("pagination");
        const searchInput = document.querySelector(".searchWrapper input[type='text']");
        const noPostsMessage = document.createElement("div");
        noPostsMessage.classList.add("no-posts-message");
        noPostsMessage.textContent = "No posts found.";
        cardGrid.appendChild(noPostsMessage);
        noPostsMessage.style.display = "none";

        function getCards() {
            return Array.from(cardGrid.querySelectorAll(".cards"));
        }

        function getCardsPerPage() {
            return window.innerWidth < 680 ? 4 : 6;
        }

        let cardsPerPage = getCardsPerPage();
        let currentPage = 1;
        let activeTabFilter = "all"; 

        function renderCards(page, filteredCards = getCards()) {
            const allCards = getCards();
            const startIndex = (page - 1) * cardsPerPage;
            const endIndex = startIndex + cardsPerPage;
            const visibleCards = filteredCards.slice(startIndex, endIndex);

            allCards.forEach((card) => card.style.display = "none");
            visibleCards.forEach((card) => card.style.display = "block");

            if (filteredCards.length === 0) {
                noPostsMessage.style.display = "block";
                pagination.style.display = "none";
            } else {
                noPostsMessage.style.display = "none";
                renderPagination(filteredCards);
            }
        }

        function renderPagination(filteredCards) {
            pagination.innerHTML = "";
            const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

            if (filteredCards.length <= cardsPerPage) {
                pagination.style.display = "none";
                return;
            } else {
                pagination.style.display = "flex";
            }

            const prevButton = document.createElement("button");
            const prevImage = document.createElement("img");
            prevImage.src = site_url + '/wp-content/themes/everta/images/prev-arrow.svg';
            prevImage.alt = "Previous";
            prevButton.appendChild(prevImage);
            prevButton.classList.add('pagination-prev');
            prevButton.disabled = currentPage === 1;
            prevButton.addEventListener("click", () => {
                currentPage--;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(prevButton);

            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement("button");
                pageButton.textContent = i;
                pageButton.classList.toggle("active", i === currentPage);
                pageButton.addEventListener("click", () => {
                    currentPage = i;
                    renderCards(currentPage, filteredCards);
                });
                pagination.appendChild(pageButton);
            }

            const nextButton = document.createElement("button");
            const nextImage = document.createElement("img");
            nextImage.src = site_url + '/wp-content/themes/everta/images/black-cta-arrow.svg';
            nextImage.alt = "Next";
            nextButton.appendChild(nextImage);
            nextButton.classList.add('pagination-next');
            nextButton.disabled = currentPage === totalPages;
            nextButton.addEventListener("click", () => {
                currentPage++;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(nextButton);
        }

        function filterCardsBySearch(query = "") {
            return getCards().filter((card) => {
                const title = card.querySelector(".cardContent h3").textContent.toLowerCase();
                return title.includes(query.toLowerCase());
            });
        }

        function filterCardsByCategory(filter = "all") {
        return getCards().filter((card) => {
            const categories = card.getAttribute("data-category").split(","); // Changed from space to comma
            return filter === "all" || categories.includes(filter);
        });
    }

        function filterCards(query = "", filter = "all") {
            const filteredByCategory = filterCardsByCategory(filter);
            const filteredCards = filterCardsBySearch(query).filter((card) => filteredByCategory.includes(card));
            currentPage = 1;
            renderCards(currentPage, filteredCards);
        }

        tabs.forEach((tab) => {
            tab.addEventListener("click", (e) => {
                e.preventDefault();
                tabs.forEach((t) => t.classList.remove("active"));
                tab.classList.add("active");
                activeTabFilter = tab.getAttribute("data-filter");
                filterCards(searchInput.value.trim(), activeTabFilter);
            });
        });

        searchInput.addEventListener("input", (e) => {
            filterCards(e.target.value.trim(), activeTabFilter);
        });

        window.addEventListener("resize", () => {
            cardsPerPage = getCardsPerPage();
            renderCards(currentPage);
        });

        renderCards(currentPage);
    });
}
