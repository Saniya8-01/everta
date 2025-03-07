<?php get_header(); /*Template name: Homepage*/ ?>

<div id="overlay">
    <div class="loader-container">
        <div class="loaderDiv">
            <div class="circle">
                <h2>Loading...</h2>
                <div id="percentage" class="percentage">1%</div>
            </div>
        </div>
    </div>
</div>

<section class="bannerSection">
    <?php if (have_rows('banner_section')) : ?>
    <?php while (have_rows('banner_section')) : the_row(); ?>
    <div class="bannerSectionWrapper">
        <?php
        // Get the media choice for the current section (either 'Image' or 'Video')
        $mediaChoice = get_sub_field('media_choice');
        ?>

        <!-- Media Section: Image or Video -->
        <?php if ( $mediaChoice == 'Image' ) : ?>
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
            <div class="blackOverlay"></div>
        </div>
        <?php elseif ( $mediaChoice == 'Video' ) : ?>
        <div class="videoDiv">
            <video autoplay="" preload="auto" loop="" muted="" playsinline="" class="desktopVideo">
                <source src="<?php echo esc_url(get_sub_field('video_link')); ?>" type="video/mp4">
            </video>
            <video autoplay="" preload="auto" loop="" muted="" playsinline="" class="mobileVideo">
                <source src="<?php echo esc_url(get_sub_field('video_link_mobile')); ?>" type="video/mp4">
            </video>
        </div>
        <?php endif; ?>

        <div class="bannerSectionContent">
            <h1>
                <?php echo get_sub_field('banner_heading'); ?>
            </h1>
            <p>
                <?php echo get_sub_field('banner_subcontent'); ?>
            </p>
            <?php 
            $banner_cta_link = get_sub_field('banner_cta_link');
            $banner_cta_text = get_sub_field('banner_cta_text');
            
            if ($banner_cta_link && $banner_cta_text) : ?>
            <a href="<?php echo esc_url($banner_cta_link); ?>" class="ctaYellow">
                <?php echo esc_html($banner_cta_text); ?>
            </a>
            <?php endif; ?>
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
                <?php 
                $explore_link = get_sub_field('explore_link');
                $explore_text = get_sub_field('explore_text');
                
                if ($explore_link && $explore_text) : ?>
                <a href="<?php echo $explore_link; ?>" class="ctaWhiteBlack">
                    <?php echo $explore_text; ?>
                </a>
                <?php endif; ?>

            </div>
        </div>
        <div class="rightContent">
            <div class="rightContentWrapper">
                <?php if( have_rows('image_video_box') ): ?>
                    <?php while( have_rows('image_video_box') ): the_row();?>
                        <?php if( get_row_layout() == 'image_box' ): ?>
                            <div class="imageDiv">
                                <?php $rightImage = get_sub_field('image_field'); if (!empty($rightImage)) : ?>
                                    <img src="<?php echo esc_url($rightImage['url']); ?>" loading="lazy" alt="<?php echo esc_attr($rightImage['alt']); ?>" />
                                <?php endif; ?>
                            </div>

                            <?php elseif( get_row_layout() == 'video_box' ): ?>
                                <div class="imageDiv">
                                    <video autoplay="" preload="auto" loop="" muted="" playsinline="" class="desktopVideo">
                                        <source src="<?php echo esc_url(get_sub_field('video_field')); ?>" type="video/mp4">
                                    </video>
                                </div>

                        <?php endif;?>
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
            <?php $counter=1; while (have_rows('hover_section')) : the_row(); ?>
            <div class="hover-box">
                <div class="content">
                    <h3>
                        <?php echo get_sub_field('hovercard_title'); ?>
                    </h3>
                    <p>
                        <?php echo get_sub_field('hovercard_para'); ?>
                    </p>
                    <button class="toggle" data-target="myPopup<?php echo $counter; ?>">read more</button>
                    <?php 
                                        $explore_link = get_sub_field('explore_link');
                                        $explore_text = get_sub_field('explore_text');
                                        
                                        if ($explore_link && $explore_text) : ?>
                    <a href="<?php echo $explore_link; ?>" class="ctaYellowBlack">
                        <?php echo $explore_text; ?>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="image">
                    <?php $hoverImage = get_sub_field('hover_image');
                                    if (!empty($hoverImage)) : ?>
                    <img src="<?php echo esc_url($hoverImage['url']); ?>" loading="lazy"
                        alt="<?php echo esc_attr($hoverImage['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <?php $counter=$counter+1; endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php if (have_rows('hover_section')) : ?>
    <?php $counter=1; while (have_rows('hover_section')) : the_row(); ?>
    <div id="myPopup<?php echo $counter; ?>" class="popup hide">
        <div class="overlay">
            <div class="popup-header">
                <span class="close toggle" data-target="myPopup<?php echo $counter; ?>">
                    <i class="icon-cross fontelloCrossIcon"></i>
                </span>
                <h3>
                    <?php echo get_sub_field('hovercard_title'); ?>
                </h3>
            </div>
            <div class="popup-body">
                <p>
                    <?php echo get_sub_field('hovercard_para'); ?>
                </p>
            </div>
        </div>
    </div>
    <?php $counter=$counter+1; endwhile; ?>
    <?php endif; ?>
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
    <?php if (have_rows('charging_section')) : ?>
        <?php while (have_rows('charging_section')) : the_row(); ?>
            <div class="tab-wrapper">
                <!-- Heading and Tabs -->
                <div class="tab-header">
                    <h2><?php echo get_sub_field('heading'); ?></h2>
                    <p><?php echo get_sub_field('subheading'); ?></p>
                    <div class="tab-buttons">
                        <button class="tab-button active" data-tab="dc">DC</button>
                        <!-- <button class="tab-button" data-tab="ac">AC</button> -->
                    </div>
                </div>

                <!-- Tab Content for DC -->
                <div class="tab-content active" id="dc">
                    <div class="cardDc chargingCards">
                        <?php 
                        $related_post = get_sub_field('related_products_dc'); 
                        if ($related_post) : 
                            foreach ($related_post as $post) : 
                                setup_postdata($post); 
                                $post_id = get_the_ID(); 
                                $post_link = get_permalink($post_id);
                        ?>
                        <div class="card">
                            <div class="card-wrapper">
                                <?php $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                                <img src="<?php echo $full_image_url[0]; ?>" alt="product-image">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
                            </div>
                            <a href="<?php echo esc_url($post_link); ?>">Explore more<i class="icon-right-arrow fontellowRightArrow"></i></a>
                        </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Tab Content for AC -->
                <div class="tab-content" id="ac">
                    <div class="cardAc chargingCards">
                        <?php 
                        $related_post = get_sub_field('related_products_ac'); 
                        if ($related_post) : 
                            foreach ($related_post as $post) : 
                                setup_postdata($post); 
                                $post_id = get_the_ID(); 
                                $post_link = get_permalink($post_id);
                        ?>
                        <div class="card">
                            <div class="card-wrapper">
                                <?php $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                                <img src="<?php echo $full_image_url[0]; ?>" alt="product-image">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
                            </div>
                            <a href="<?php echo esc_url($post_link); ?>">Explore more<i class="icon-right-arrow fontellowRightArrow"></i></a>
                        </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</section>

<!-- <section class="exploreSection">
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
                <?php 
                $solutions_link = get_sub_field('solutions_link');
                $solutions_text = get_sub_field('solutions_text');
                
                if ($solutions_link && $solutions_text) : ?>
                <a href="<?php echo $solutions_link; ?>" class="ctaBlack">
                    <?php echo $solutions_text; ?>
                </a>
                <?php endif; ?>
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
</section> -->

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

<!-- <section class="testimonialSection">
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
                <i class="icon-dquotes fontelloQouteIcon"></i>
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
</section> -->

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
        // $shortcode = get_sub_field('contact_form_shortcode');
        // if ($shortcode) {
        //     echo do_shortcode($shortcode);
        // }            
        ?>
        <div class="formContainer">
            <form method="post" onsubmit="return validateEmail()">
                <div class="input">
                    <label for="">Your Email</label>
                    <input type="text" name="youremail" id="email" placeholder="your@gmail.com" title="Please enter a valid email address (e.g., your@gmail.com)">
                </div>
                <div class="ctaDiv">
                    <input type="submit" name="continue" value="Continue">
                </div>
            </form>
            <span id="error-msg" style="color:red;"></span>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="faqSection homepageFaq" id="faqAccordion">
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
        <div class="toggleCta">
            <a href="<?php echo get_sub_field('faq_link'); ?>" class="ctaWhiteBlack" id="toggleFaqButton">Learn More</a>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<?php get_footer(); ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var emailField = document.getElementById("your-email");
        if (emailField) {
            emailField.value = "<?php echo isset($_SESSION['user_email']) ? esc_js($_SESSION['user_email']) : ''; ?>";
        }
        document.addEventListener('wpcf7mailsent', function(event) {
            document.getElementById('contactFormWrapper').style.display = 'block';
        }, false);
    });

    function validateEmail() {
    const email = document.getElementById('email').value;
    const errorMsg = document.getElementById('error-msg');
    const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!pattern.test(email)) {
      errorMsg.textContent = 'Please enter a valid email address (e.g., your@gmail.com)';
      return false;
    } else {
      errorMsg.textContent = ''; // Clear error if valid
      return true;
    }
  }
</script>