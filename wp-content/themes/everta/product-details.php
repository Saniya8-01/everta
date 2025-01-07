<?php get_header(); /*Template name: Product Details*/ ?>


<section class="productBanner">
    <?php if (have_rows('banner_section')) : ?>
    <?php while (have_rows('banner_section')) : the_row(); ?>
    <div class="productBannerWrapper">
        <div class="bannerHeading">
            <h1><?php echo get_sub_field('banner_heading'); ?></h1>
        </div>
        <div class="productDetails">
            <?php if (have_rows('features_list')) : ?>
            <?php while (have_rows('features_list')) : the_row(); ?>
            <p><?php echo get_sub_field('feature_info'); ?></p>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="bannerImages">
            <?php
            $bgImage = get_sub_field('bg_image');
            $productImage = get_sub_field('product_image');
        ?>
            <?php if ( !empty( $bgImage ) ): ?>
            <img src="<?php echo esc_url( $bgImage['url'] ); ?>"
                alt="<?php echo esc_attr( $bgImage['alt'] ); ?>" class="bannerBg">
            <?php endif; ?>

            <?php if ( !empty( $productImage ) ): ?>

            <img src="<?php echo esc_url( $productImage['url'] ); ?>"
                alt="<?php echo esc_attr( $productImage['alt'] ); ?>" class="productImage">
            <?php endif; ?>
        </div>
        <div class="ctaDiv">
            <a href="<?php echo get_sub_field('buy_link'); ?>" class="ctaYellow"><?php echo get_sub_field('buy_text'); ?></a>
            <a href="<?php echo get_sub_field('download_link'); ?>" class="ctaWhiteBlack" download><?php echo get_sub_field('download_text'); ?></a>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="secondFold">
    <?php if (have_rows('second_fold')) : ?>
    <?php while (have_rows('second_fold')) : the_row(); ?>
    <div class="secondFoldWrapper">
        <?php if (have_rows('vehicles_card')) : ?>
        <?php while (have_rows('vehicles_card')) : the_row(); ?>
        <div class="industryCard">
            <div class="imageDiv">
                <?php $vehicleiconImage = get_sub_field('icon_image');
                if (!empty($vehicleiconImage)) : ?>
                <img src="<?php echo esc_url($vehicleiconImage['url']); ?>" loading="lazy"
                    alt="<?php echo esc_attr($vehicleiconImage['alt']); ?>" />
                <?php endif; ?>
            </div>
            <h3><?php echo get_sub_field('title'); ?></h3>
            <p><?php echo get_sub_field('description'); ?></p>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="industryStandardSection">
    <?php if (have_rows('industry_standard_section')) : ?>
    <?php while (have_rows('industry_standard_section')) : the_row(); ?>
    <div class="sectionWrapper">
        <div class="scaleImage">
            <?php
            $industryDesktopImage = get_sub_field('desktop_image');
            $industryMobileImage = get_sub_field('mobile_image');
        ?>
            <?php if ( !empty( $industryDesktopImage ) ): ?>
            <img src="<?php echo esc_url( $industryDesktopImage['url'] ); ?>"
                alt="<?php echo esc_attr( $industryDesktopImage['alt'] ); ?>" class="desktopImage">
            <?php endif; ?>

            <?php if ( !empty( $industryMobileImage ) ): ?>
            <img src="<?php echo esc_url( $industryMobileImage['url'] ); ?>"
                alt="<?php echo esc_attr( $industryMobileImage['alt'] ); ?>" class="mobileImage">
            <?php endif; ?>
        </div>
        <div class="bottomInfo">
            <h3><?php echo get_sub_field('industry_title'); ?></h3>
            <div class="autoScroller">
                <div class="image">
                    <?php $iconImage = get_sub_field('icon_image');
                    if (!empty($iconImage)) : ?>
                    <img src="<?php echo esc_url($iconImage['url']); ?>" loading="lazy"
                        alt="<?php echo esc_attr($iconImage['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="scrollAnimation">
                    <div class="animationWrapper">
                        <?php if (have_rows('vertical_slider')) : ?>
                        <?php while (have_rows('vertical_slider')) : the_row(); ?>
                        <span class="animate"><?php echo get_sub_field('slider_content'); ?></span>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="productInfoSection">
    <?php if (have_rows('product_info')) : ?>
    <?php while (have_rows('product_info')) : the_row(); ?>
    <div class="productInfoWrapper">
        <div class="headingWrapper">
            <h2><?php echo get_sub_field('section_heading'); ?></h2>
            <p><?php echo get_sub_field('section_subheading'); ?></p>
        </div>
        <div class="productDetails">
            <?php if (have_rows('feature_points')) : ?>
            <?php while (have_rows('feature_points')) : the_row(); ?>
            <div class="feature">
                <?php if (have_rows('product_feature')) : ?>
                <?php while (have_rows('product_feature')) : the_row(); ?>
                <div class="information">
                    <h4><?php echo get_sub_field('desktop_title'); ?></h4>
                    <p><?php echo get_sub_field('desktop_description'); ?></p>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <div class="middle">
                <?php $featureImage = get_sub_field('feature_image');
                if (!empty($featureImage)) : ?>
                <img src="<?php echo esc_url($featureImage['url']); ?>" loading="lazy"
                    alt="<?php echo esc_attr($featureImage['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="mobileUi">
                <div class="mobileSliderContainer">
                    <?php if (have_rows('product_feature_mobile')) : ?>
                    <?php while (have_rows('product_feature_mobile')) : the_row(); ?>
                    <div class="sliderContent">
                        <h4><?php echo get_sub_field('mobile_title'); ?></h4>
                        <p><?php echo get_sub_field('mobile_description'); ?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="technicalDetailsSection">
    <?php if (have_rows('technical_details')) : ?>
    <?php while (have_rows('technical_details')) : the_row(); ?>
    <div class="technicalDetailsWrapper">
        <div class="accordionContainer">
            <div class="accordionHeading">
                <h2><?php echo get_sub_field('section_heading'); ?></h2>
            </div>
            <div class="accordions-wrapper">
                <?php if (have_rows('accordion')) : ?>
                <?php while (have_rows('accordion')) : the_row(); ?>
                <div class="accordion">
                    <div class="accordion-header">
                        <h4><?php echo get_sub_field('accordion_heading'); ?></h4>
                        <div class="accordian-icon-wrapper">
                            <div class="accordion-icon"></div>
                        </div>
                    </div>
                    <div class="accordion-body">
                        <?php echo get_sub_field('list'); ?>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="image">
            <?php
            $desktopImage = get_sub_field('desktop_image');
            $mobileImage = get_sub_field('mobile_image');
        ?>
            <?php if ( !empty( $desktopImage ) ): ?>
            <img src="<?php echo esc_url( $desktopImage['url'] ); ?>"
                alt="<?php echo esc_attr( $desktopImage['alt'] ); ?>" class="desktopImage">
            <?php endif; ?>

            <?php if ( !empty( $mobileImage ) ): ?>
            <img src="<?php echo esc_url( $mobileImage['url'] ); ?>"
                alt="<?php echo esc_attr( $mobileImage['alt'] ); ?>" class="mobileImage">
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="exploreSection">
    <?php if (have_rows('explore_section')) : ?>
    <?php while (have_rows('explore_section')) : the_row(); ?>
    <div class="exploreSectionWrapper">
        <div class="leftContent">
            <div class="contentWrapper">
                <h2>
                    <?php echo get_sub_field('explore_heading'); ?>
                </h2>
                <p>
                    <?php echo get_sub_field('explore_subheading'); ?>
                </p>
                <a href="<?php echo get_sub_field('solutions_link'); ?>" class="ctaBlack">
                    <?php echo get_sub_field('solutions_text'); ?>
                </a>
            </div>
        </div>
        <div class="rightContent">
            <?php $mobileImage = get_sub_field('cellphone_image');
            if (!empty($mobileImage)) : ?>
            <img src="<?php echo esc_url($mobileImage['url']); ?>" loading="lazy"
                alt="<?php echo esc_attr($mobileImage['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="testimonialSection">
    <?php if (have_rows('testimonial_section')) : ?>
    <?php while (have_rows('testimonial_section')) : the_row(); ?>
    <div class="testimonialSectionWrapper">
        <div class="testimonialSectionHeading">
            <h2>
                <?php echo get_sub_field('heading'); ?>
            </h2>
        </div>
        <div class="testimonialCardWrapper">
            <?php if (have_rows('testimonial_card')) : ?>
            <?php while (have_rows('testimonial_card')) : the_row(); ?>
            <div class="testimonialCard">
                <img src="<?php bloginfo('template_directory'); ?>/images/comma-svg.svg" alt="" class="commaImg">
                <p class="testimonialPara">
                    <?php echo get_sub_field('testimonial_words'); ?>
                </p>
                <div class="clientImages">
                    <?php $clientImage = get_sub_field('client_image');
                    if (!empty($clientImage)) : ?>
                    <img src="<?php echo esc_url($clientImage['url']); ?>" loading="lazy"
                        alt="<?php echo esc_attr($clientImage['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="progresBar">
            <div class="progress-bar-container">
                <div class="progress-bar"></div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="formSection">
    <?php if (have_rows('form_section')) : ?>
    <?php while (have_rows('form_section')) : the_row(); ?>
    <div class="formWrapper">
        <div class="formTitle">
            <h2>
                <?php echo get_sub_field('heading'); ?>
            </h2>
            <p>
                <?php echo get_sub_field('subheading'); ?>
            </p>
        </div>
        <div class="productCtas">
            <a href="<?php echo get_sub_field('cta_link_first'); ?>" class="ctaBlack"><?php echo get_sub_field('cta_text_first'); ?></a>
            <a href="<?php echo get_sub_field('cta_link_second'); ?>" class="ctaYellow"><?php echo get_sub_field('cta_text_second'); ?></a>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="productSection">
    <div class="productWrapper">
        <div class="productHeader">
            <h2>CHARGING SOLUTIONS</h2>
        </div>
        <div class="tabContent">
            <div class="cards">
                <div class="card">
                    <div class="card-wrapper">
                        <img src="<?php bloginfo('template_directory'); ?>/images/power-battery-img.png" alt="">
                        <h3>POWER TOWER</h3>
                        <h5>AC Charging • Ranges: 3.2kW to 22kW</h5>
                        <p>Convenient home or workplace charging solutions with robust design and easy installation.</p>
                    </div>
                    <a href="#">Explore more<img
                            src="<?php bloginfo('template_directory'); ?>/images/yellow-cta-arrow.svg" alt=""></a>
                </div>
                <div class="card">
                    <div class="card-wrapper">
                        <img src="<?php bloginfo('template_directory'); ?>/images/power-box-img.png" alt="">
                        <h3>POWER TOWER</h3>
                        <h5>AC Charging • Ranges: 3.2kW to 22kW</h5>
                        <p>Convenient home or workplace charging solutions with robust design and easy installation.</p>
                    </div>
                    <a href="#">Explore more<img
                            src="<?php bloginfo('template_directory'); ?>/images/yellow-cta-arrow.svg" alt=""></a>
                </div>
                <div class="card">
                    <div class="card-wrapper">
                        <img src="<?php bloginfo('template_directory'); ?>/images/power-battery-img.png" alt="">
                        <h3>POWER TOWER</h3>
                        <h5>AC Charging • Ranges: 3.2kW to 22kW</h5>
                        <p>Convenient home or workplace charging solutions with robust design and easy installation.</p>
                    </div>
                    <a href="#">Explore more <img
                            src="<?php bloginfo('template_directory'); ?>/images/yellow-cta-arrow.svg" alt=""></a>
                </div>
                <div class="card">
                    <div class="card-wrapper">
                        <img src="<?php bloginfo('template_directory'); ?>/images/power-battery-img.png" alt="">
                        <h3>POWER TOWER</h3>
                        <h5>AC Charging • Ranges: 3.2kW to 22kW</h5>
                        <p>Convenient home or workplace charging solutions with robust design and easy installation.</p>
                    </div>
                    <a href="#">Explore more <img
                            src="<?php bloginfo('template_directory'); ?>/images/yellow-cta-arrow.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
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
</script>