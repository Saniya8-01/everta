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

    // Detect if we are scrolling within the `.evertaEveryoneSection`
    const isWithinEvertaSection = isInSection('.evertaEveryoneSection');

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
    const section = $(sectionClass);
    if (section.length) {
        const sectionTop = section.offset().top;
        const sectionBottom = sectionTop + section.outerHeight();
        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();

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
                breakpoint: 1440,
                settings: {
                    slidesToShow: 1.9,
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
                const departmentText = box.querySelector(".subBoxContent h3")?.innerText.trim().toLowerCase() || "";
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
if($(".relatedPostSec").length){
    document.addEventListener("DOMContentLoaded", () => {
        let contentBox = document.querySelectorAll(".contentBox .cardHeading");
        function truncateTextElement(maxLength) {
            contentBox.forEach((boxHead) => {
                let headTxt = boxHead.textContent.trim(); 
                if (headTxt.length > maxLength) {
                    boxHead.textContent = headTxt.substring(0, maxLength).trim() + "..."; 
                }
            });
        }
        truncateTextElement(50);
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

    let customSelects = document.querySelectorAll("#popupSelect");

    customSelects.forEach((customSelect) => {
        const selectBtn = customSelect.querySelector(".selectBtn");
        const options = customSelect.querySelectorAll(".option");
        const sBtn_text = customSelect.querySelector(".sBtntext");

        // Toggle dropdown menu for this customSelect
        selectBtn.addEventListener("click", (e) => {
            e.stopPropagation(); // Prevent event bubbling
            customSelect.classList.toggle("active");
        });

        // Handle option selection for this customSelect
        options.forEach((option) => {
            option.addEventListener("click", () => {
                const selectedText = option.textContent.trim();
                sBtn_text.textContent = selectedText; // Update button text
                customSelect.classList.remove("active"); // Close dropdown
            });
        });
    });

    // Close all dropdowns if clicking outside any customSelect
    document.addEventListener("click", () => {
        customSelects.forEach((customSelect) => {
            customSelect.classList.remove("active");
        });
    });


    



  






















