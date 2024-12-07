<?php get_header(); /*Template name: Homepage*/ ?>

<section class="bannerSection">
    <?php if (have_rows('banner_section')) : ?>
    <?php while (have_rows('banner_section')) : the_row(); ?>
    <div class="bannerSectionWrapper">
        <div class="bannerImageWrapper">
            <?php
            $desktop_image = get_sub_field('desktop_image');
            $mobile_image = get_sub_field('mobile_image');
        ?>
            <?php if ( ! empty( $desktop_image ) ): ?>
            <img src="<?php echo esc_url( $desktop_image['url'] ); ?>"
                alt="<?php echo esc_attr( $desktop_image['alt'] ); ?>" class="desktopImage">
            <?php endif; ?>

            <?php if ( ! empty( $mobile_image ) ): ?>

            <img src="<?php echo esc_url( $mobile_image['url'] ); ?>"
                alt="<?php echo esc_attr( $mobile_image['alt'] ); ?>" class="mobileImage">
            <?php endif; ?>

        </div>
        <div class="blackOverlay"></div>
        <div class="bannerSectionContent">
            <h1>
                <?php echo get_sub_field('banner_heading'); ?>
            </h1>
            <p>
                <?php echo get_sub_field('banner_subcontent'); ?>
            </p>
            <a href="<?php echo get_sub_field('banner_cta_link'); ?>" class="ctaYellow">
                <?php echo get_sub_field('banner_cta_text'); ?>
            </a>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="withEaseSection">
    <?php if (have_rows('withease_section')) : ?>
    <?php while (have_rows('withease_section')) : the_row(); ?>
    <div class="divWrapper">
        <div class="leftContent">
            <div class="leftImage">
                <?php $easeImage = get_sub_field('left_image');
                if (!empty($easeImage)) : ?>
                <img src="<?php echo esc_url($easeImage['url']); ?>" loading="lazy"
                    alt="<?php echo esc_attr($easeImage['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="leftMobileTitle">
                <p>
                    <?php echo get_sub_field('subcontent'); ?>
                </p>
                <a href="<?php echo get_sub_field('explore_link'); ?>" class="ctaWhiteBlack">
                    <?php echo get_sub_field('explore_text'); ?>
                </a>
            </div>
        </div>
        <div class="rightContent">
            <div class="rightContentWrapper">
                <?php if (have_rows('right_images')) : ?>
                <?php while (have_rows('right_images')) : the_row(); ?>
                <div class="imageDiv">
                    <?php $rightImage = get_sub_field('right_image');
                    if (!empty($rightImage)) : ?>
                    <img src="<?php echo esc_url($rightImage['url']); ?>" loading="lazy"
                        alt="<?php echo esc_attr($rightImage['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="evertaEveryoneSection">
    <?php if (have_rows('evertaeveryone_section')) : ?>
    <?php while (have_rows('evertaeveryone_section')) : the_row(); ?>
    <div class="evertaEveryoneSectionWrapper">
        <div class="evertaEveryoneSectionHeading">
            <h2>
                <?php echo get_sub_field('evertaeveryone_mainheading'); ?>
            </h2>
            <p>
                <?php echo get_sub_field('evertaeveryone_subheading'); ?>
            </p>
        </div>
        <div class="hover-section">
            <?php if (have_rows('hover_section')) : ?>
            <?php while (have_rows('hover_section')) : the_row(); ?>
            <div class="hover-box">
                <div class="content">
                    <h3>
                        <?php echo get_sub_field('hovercard_title'); ?>
                    </h3>
                    <p>
                        <?php echo get_sub_field('hovercard_para'); ?>
                    </p>
                    <a href="<?php echo get_sub_field('explore_link'); ?>" class="ctaYellowBlack">
                        <?php echo get_sub_field('explore_text'); ?>
                    </a>
                </div>
                <div class="image">
                    <?php $hoverImage = get_sub_field('hover_image');
                    if (!empty($hoverImage)) : ?>
                    <img src="<?php echo esc_url($hoverImage['url']); ?>" loading="lazy"
                        alt="<?php echo esc_attr($hoverImage['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="partnersSection">
    <?php if (have_rows('partners_section')) : ?>
    <?php while (have_rows('partners_section')) : the_row(); ?>
    <div class="partnersSectionWrapper">
        <h3>
            <?php echo get_sub_field('heading'); ?>
        </h3>
        <div class="logoSliderContainer">
            <div class="right-fade"></div>
            <div class="left-fade"></div>
            <div class="logoSlider">
                <?php if (have_rows('partners_logo')) : ?>
                <?php while (have_rows('partners_logo')) : the_row(); ?>
                <div class="logo">
                    <?php $partnerLogo = get_sub_field('partners_logo');
                    if (!empty($partnerLogo)) : ?>
                    <img src="<?php echo esc_url($partnerLogo['url']); ?>" loading="lazy"
                        alt="<?php echo esc_attr($partnerLogo['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="chargingSection">
    <div class="tab-wrapper">
        <!-- Heading and Tabs -->
        <div class="tab-header">
            <h2>CHARGING SOLUTIONS</h2>
            <p>Explore charging solutions for every need — whether it's home charging, business operations, or public
                spaces.
                For homeowners, we provide convenient and reliable options. For businesses — scalable and efficient
                charging systems. </p>
            <div class="tab-buttons">
                <button class="tab-button active" data-tab="dc">DC</button>
                <button class="tab-button" data-tab="ac">AC</button>
            </div>
        </div>

        <!-- Tab Content for DC -->
        <div class="tab-content active" id="dc">
            <div class="cards">
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
            </div>
        </div>

        <!-- Tab Content for AC -->
        <div class="tab-content" id="ac">
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
            </div>
        </div>
    </div>
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

<section class="mapSection">
    <?php if (have_rows('map_section')) : ?>
    <?php while (have_rows('map_section')) : the_row(); ?>
    <div class="mapSectionDivider">
        <div class="map">
            <h2>
                <?php echo get_sub_field('heading'); ?>
            </h2>
            <div class="mapImage">
                <?php $mapImage = get_sub_field('map_image');
                if (!empty($mapImage)) : ?>
                <img src="<?php echo esc_url($mapImage['url']); ?>" loading="lazy"
                    alt="<?php echo esc_attr($mapImage['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
        <div class="stats">
            <?php if (have_rows('stats_cards')) : ?>
            <?php while (have_rows('stats_cards')) : the_row(); ?>
            <div class="statCard">
                <h3 data-count="<?php echo get_sub_field('data_count'); ?>">
                    <?php echo get_sub_field('default_symbol'); ?>
                </h3>
                <h4>
                    <?php echo get_sub_field('stats_title'); ?>
                </h4>
                <p>
                    <?php echo get_sub_field('stats_para'); ?>
                </p>
            </div>
            <?php endwhile; ?>
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
                <div class="testimonial">
                    <div class="testimonialImage">
                        <?php $testimonialImage = get_sub_field('testimonial_image');
                        if (!empty($testimonialImage)) : ?>
                        <img src="<?php echo esc_url($testimonialImage['url']); ?>" loading="lazy"
                            alt="<?php echo esc_attr($testimonialImage['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="testimomialInfo">
                        <h3>
                            <?php echo get_sub_field('testimonial_name'); ?>
                        </h3>
                        <p>
                            <?php echo get_sub_field('testimonial_designation'); ?>
                        </p>
                    </div>
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
        <?php
        $shortcode = get_sub_field('contact_form_shortcode');
        if ($shortcode) {
            echo do_shortcode($shortcode);
        }
    ?>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="faqSection" id="faqAccordion">
    <?php if (have_rows('faq_section')) : ?>
    <?php while (have_rows('faq_section')) : the_row(); ?>
    <div class="faq-heading">
        <h2>
            <?php echo get_sub_field('faq_heading'); ?>
        </h2>
    </div>
    <div class="container">
        <div class="accordions-wrapper">
            <?php if (have_rows('faq_accordion')) : ?>
            <?php while (have_rows('faq_accordion')) : the_row(); ?>
            <div class="accordion">
                <div class="accordion-header">
                    <h4>
                        <?php echo get_sub_field('question'); ?>
                    </h4>
                    <div class="accordian-icon-wrapper">
                        <div class="accordion-icon"></div>
                    </div>
                </div>
                <div class="accordion-body">
                    <p>
                        <?php echo get_sub_field('answer'); ?>
                    </p>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>


<?php get_footer(); ?>