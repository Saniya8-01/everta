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

<section class="formSection" id="productFormSection">
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

<div class="contactTop">
    <div class="formFields">
        <label for="first-name">First Name*</label>
        [text* first-name id:first-name placeholder "First name"]
    </div>
    <div class="formFields">
        <label for="your-email">Your Email*</label>
        [email* your-email id:your-email placeholder "Your Email"]
    </div>
    <div class="formFields">
        <label for="mobile-number">Mobile Number*</label>
[phonetext phonenumber autocomplete:tel placeholder "9987563984"]
    </div>
</div>

<div class="contactBottom">
    <h3>I am looking to</h3>
    <div class="contactTab">
        <button type="button" class="contact-tab-btn" data-tab="contact-tab-partner">Partner with Everta</button>
        <button type="button" class="contact-tab-btn" data-tab="contact-tab-charger">Buy Everta Charger</button>
    </div>

    <!-- Partner Tab Content -->
    <div id="contact-tab-partner" class="contact-tab-content active">
        <div class="contact-tab-wrapper">
            <div class="formFields">
                <label for="company-name">Company Name*</label>
                [text* text-560 placeholder "Company Name"]
            </div>

            <div class="formFields">
                <label for="target-market">Your Target Market</label>
                [select* select-391 class:options "India" "USA" "Poland"]
            </div>
        </div>
    </div>

    <!-- Charger Tab Content -->
    <div id="contact-tab-charger" class="contact-tab-content">
        <div class="contact-tab-wrapper">
            <div class="formFields">
                <label for="charger-location">Location</label>
                [select* select-81 "India" "USA" "Poland" "UAE"]
            </div>

            <div class="formFields">
                <label for="chargers-needed" class="lowercase">How many chargers do you need?*</label>
                <div class="charges">
                    <span class="chargesCount">
                        <label><input type="radio" name="chargers-needed" value="1-4"><span>1-4</span></label>
                    </span>
                    <span class="chargesCount">
                        <label><input type="radio" name="chargers-needed" value="5-9"><span>5-9</span></label>
                    </span>
                    <span class="chargesCount">
                        <label><input type="radio" name="chargers-needed" value="10-24"><span>10-24</span></label>
                    </span>
                    <span class="chargesCount">
                        <label><input type="radio" name="chargers-needed" value="24-49"><span>24-49</span></label>
                    </span>
                    <span class="chargesCount">
                        <label><input type="radio" name="chargers-needed" value="50+"><span>50+</span></label>
                    </span>
                </div>
            </div>

 
        </div>
    </div>
    <div class="formFields">
        <label for="charger-message">Write a Message</label>
        [textarea* textarea-262 placeholder "Write your message here..."]
    </div>

    <div class="submitDiv">
        [submit class:submitDiv "Send Contact Request"]
    </div>
</div>

<?php get_footer(); ?>

