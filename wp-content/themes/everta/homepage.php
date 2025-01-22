<?php get_header(); /*Template name: Homepage*/ ?>

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
            <h2>
                <?php echo get_sub_field('heading'); ?>
            </h2>
            <p>
                <?php echo get_sub_field('subheading'); ?>
            </p>
            <div class="tab-buttons">
                <button class="tab-button active" data-tab="dc">DC</button>
                <button class="tab-button" data-tab="ac">AC</button>
            </div>
        </div>
        <!-- Tab Content for DC -->
        <div class="tab-content active" id="dc">
            <div class="cards">
                <?php 
            $related_post = get_sub_field('related_products_dc'); 
            if ($related_post) : 
                $counter = 0; // Initialize counter
                foreach ($related_post as $post) : 
                    setup_postdata($post); 
                    $post_id = get_the_ID(); 
                    $post_link = get_permalink($post_id);
                    if ($counter >= 3) break; // Stop loop after 3 cards
                    $counter++;
            ?>
                <div class="card">
                    <div class="card-wrapper">
                        <?php $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                        <img src="<?php echo $full_image_url[0]; ?>" alt="product-image">
                        <h3>
                            <?php the_title(); ?>
                        </h3>
                        <?php 
                    $features = [];
                    if (have_rows('banner_section', $post_id)) : 
                        while (have_rows('banner_section', $post_id)) : the_row(); 
                            if (have_rows('features_list')) : 
                                while (have_rows('features_list')) : the_row(); 
                                    $features[] = get_sub_field('feature_info');
                                endwhile; 
                            endif; 
                        endwhile; 
                    endif; 
                    ?>
                        <h5>
                            <?php echo implode(' • ', $features); ?>
                        </h5>
                        <p>
                            <?php echo wp_trim_words(get_the_content(), 40, '...'); ?>
                        </p>
                    </div>
                    <a href="<?php echo esc_url($post_link); ?>">Explore more
                        <i class="icon-right-arrow fontellowRightArrow"></i>
                    </a>
                </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- Tab Content for AC -->
        <div class="tab-content" id="ac">
            <div class="cards">
                <?php 
                    $related_post = get_sub_field('related_products_ac'); 
                    if ($related_post) : 
                        $counter = 0; // Initialize counter
                        foreach ($related_post as $post) : 
                            setup_postdata($post); 
                            $post_id = get_the_ID(); 
                            $post_link = get_permalink($post_id);
                            if ($counter >= 3) break; // Stop loop after 3 cards
                            $counter++;
                    ?>
                <div class="card">
                    <div class="card-wrapper">
                        <?php $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                        <img src="<?php echo $full_image_url[0]; ?>" alt="product-image">
                        <h3>
                            <?php the_title(); ?>
                        </h3>
                        <?php 
                            $features = [];
                            if (have_rows('banner_section', $post_id)) : 
                                while (have_rows('banner_section', $post_id)) : the_row(); 
                                    if (have_rows('features_list')) : 
                                        while (have_rows('features_list')) : the_row(); 
                                            $features[] = get_sub_field('feature_info');
                                        endwhile; 
                                    endif; 
                                endwhile; 
                            endif; 
                            ?>
                        <h5>
                            <?php echo implode(' • ', $features); ?>
                        </h5>
                        <p>
                            <?php echo wp_trim_words(get_the_content(), 40, '...'); ?>
                        </p>
                    </div>
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1515 781">
                    <defs>
                      <style>
                        .cls-1 {
                          fill: #1e1e1e;
                        }
                  
                        .cls-2 {
                          fill: #f5f75e;
                        }
                  
                        .cls-3 {
                          fill: #e5e7e8;
                        }
                      </style>
                    </defs>
                    <g id="Layer_1">
                      <g>
                        <ellipse class="cls-3" cx="514.04" cy="475.66" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="514.04" cy="491.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M529.49,470.18c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.49,486c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="475.66" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="545.09" cy="491.48" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="560.84" cy="475.66" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="560.84" cy="491.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M576.28,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M576.28,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M514.04,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="514.04" cy="523.18" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M529.49,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.49,517.7c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M545.09,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="523.18" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M560.84,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="560.84" cy="523.18" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M576.28,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M576.28,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="514.04" cy="538.2" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M514.04,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M529.49,532.72c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.49,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="538.2" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M545.09,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="560.84" cy="538.2" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M560.84,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M576.28,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M576.28,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M514.04,564.39c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="514.04" cy="585.71" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M529.49,564.39c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.49,580.23c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M545.09,564.39c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="585.71" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M560.84,564.39c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="560.84" cy="585.71" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M576.28,564.39c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M576.28,580.23c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M483.02,481.14c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M483.02,496.96c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.51,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.51,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M483.02,512.84c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.44,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M483.02,528.66c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.51,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.51,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M451.72,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M467.31,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M483.02,543.68c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M483.02,559.5c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.51,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.51,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M389.18,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="475.66" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="404.62" cy="491.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M420.22,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M420.22,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M404.62,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="523.18" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M420.22,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M420.22,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="538.2" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M404.62,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M420.22,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M420.22,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M311.38,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="342.41" cy="475.66" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="342.41" cy="491.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M358.16,470.18c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M358.16,486c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M296.73,470.18c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M296.73,486c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M278.9,486c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M296.73,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M296.73,517.7c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M342.41,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="342.41" cy="523.18" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M358.16,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M358.16,517.7c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M326.83,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="342.41" cy="538.2" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M342.41,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M358.16,532.72c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M358.16,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M373.63,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M389.18,564.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,564.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M342.41,564.36c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M358.16,564.36c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,564.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,564.39c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,564.39c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,564.39c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,591.19c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M483.02,575.38c3,0,5.44-2.45,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.44,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M483.02,591.19c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.51,564.39c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.51,580.23c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="514.04" cy="601.45" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M514.04,611.81c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M529.49,595.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.49,611.81c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="601.45" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M545.09,611.81c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="560.84" cy="601.45" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M560.84,611.81c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M576.28,595.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M576.28,611.81c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M514.04,627.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="514.04" cy="648.99" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M529.49,627.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.49,643.51c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M545.09,627.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="648.99" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M560.84,627.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="560.84" cy="648.99" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M467.4,611.81c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M482.97,606.93c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M482.97,622.8c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.7,595.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.7,611.81c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M467.4,627.67c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M482.97,638.63c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M482.97,654.47c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.7,627.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.7,643.51c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M576.28,627.67c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M576.28,643.51c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,470.18c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,486c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="475.66" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="622.88" cy="491.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,470.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,486c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,517.7c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M622.88,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="523.18" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,517.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M607.28,532.72c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M622.88,532.72c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M622.88,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M638.61,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M654.05,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M591.85,564.39c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,580.23c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,564.39c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,580.23c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M622.88,564.39c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="585.71" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,564.39c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,580.23c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,564.39c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,580.23c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,595.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,611.81c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M607.28,595.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,611.81c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="601.45" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M622.88,611.81c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M638.61,595.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,611.81c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M654.05,595.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,611.81c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M591.85,627.67c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,643.51c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,627.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,643.51c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M622.88,627.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="648.99" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,627.67c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,643.51c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,627.67c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,643.51c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,659.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,675.08c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,659.24c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,675.08c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="664.72" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="622.88" cy="680.56" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,659.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,675.08c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,659.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,675.08c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,690.93c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,706.78c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M622.88,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M622.88,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,721.8c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,737.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,721.8c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,737.63c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="727.28" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="622.88" cy="743.11" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,721.8c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,737.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,721.8c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,737.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,753.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,769.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,753.47c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,769.33c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="758.95" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="622.88" cy="774.81" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,753.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,769.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,753.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="669.75" cy="475.66" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="669.75" cy="491.48" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="514.04" cy="444.74" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="514.04" cy="460.57" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M529.49,439.26c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.49,455.09c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="444.74" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="545.09" cy="460.57" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="560.84" cy="444.74" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="560.84" cy="460.57" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M576.28,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M576.28,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M483.02,450.22c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M483.02,466.05c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.51,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.51,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="444.74" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="404.62" cy="460.57" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M420.22,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M420.22,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="342.41" cy="444.74" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="342.41" cy="460.57" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M358.16,439.26c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M358.16,455.09c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M296.73,439.26c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M296.73,455.09c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,439.26c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,455.09c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="444.74" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="622.88" cy="460.57" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,439.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.05,455.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="514.04" cy="412.37" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="514.04" cy="428.21" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M529.49,406.89c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.49,422.73c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="412.37" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="545.09" cy="428.21" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="560.84" cy="412.37" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="560.84" cy="428.21" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M576.28,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M576.28,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M483.02,417.85c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M483.02,433.69c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.51,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.51,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="412.37" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="404.62" cy="428.21" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M420.22,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M420.22,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M326.83,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="342.41" cy="412.37" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="342.41" cy="428.21" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M358.16,406.89c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M358.16,422.73c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M296.73,422.73c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,406.89c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,422.73c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M622.88,406.89c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="428.21" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,406.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="514.04" cy="397.45" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M529.49,391.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="397.45" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="560.84" cy="397.45" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M576.28,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M483.02,402.93c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.51,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="397.45" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M420.22,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M311.38,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="326.83" cy="397.45" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="342.41" cy="397.45" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M358.16,391.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M249.1,78.19c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M264.59,78.19c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M280.18,78.19c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="202.03" cy="83.67" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="217.47" cy="83.67" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M238.51,83.67c0-3.03-2.44-5.48-5.44-5.48s-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48Z"/>
                        <path class="cls-3" d="M155.3,89.15c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M171.02,89.15c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M186.47,89.15c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M219.26,94.39c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M234.73,94.39c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M172.15,94.39c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M187.6,94.39c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M203.22,94.39c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M141.14,94.39c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M156.63,94.39c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M172.15,110.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M187.6,110.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M141.14,110.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="156.63" cy="116.18" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M172.15,125.59c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M141.14,125.59c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="156.63" cy="131.07" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M156.63,141.17c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M249.1,47.27c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M249.1,63.11c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M264.59,47.27c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M264.59,63.11c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M280.18,47.27c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M280.18,63.11c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M295.9,58.23c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M295.9,74.07c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M311.36,58.23c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M202.03,58.23c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="202.03" cy="68.59" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="217.47" cy="52.75" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M217.47,74.07c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M233.07,58.23c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M233.07,74.07c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M155.3,58.23c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M155.3,74.07c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M171.02,58.23c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M171.02,74.07c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M186.47,58.23c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M186.47,74.07c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="326.91" cy="20.4" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M326.91,41.72c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M249.1,14.92c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M249.1,30.76c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M264.59,14.92c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M264.59,30.76c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M280.18,14.92c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M280.18,30.76c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M295.9,25.88c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M295.9,41.72c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M311.36,25.88c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M311.36,41.72c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M202.03,25.88c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M202.03,41.72c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="217.47" cy="20.4" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M217.47,41.72c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M233.07,25.88c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M233.07,41.72c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M124.25,14.92c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M94.14,14.92c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M124.25,30.76c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M139.71,25.88c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M139.71,41.72c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M155.3,25.88c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M155.3,41.72c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M171.02,25.88c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M171.02,41.72c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M186.47,25.88c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M186.47,41.72c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M109.61,41.72c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="326.91" cy="5.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M249.1,0c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M264.59,0c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M280.18,0c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M295.9,10.96c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M311.36,10.96c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M124.25,0c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M108.76,10.96c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M139.71,10.96c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M77.81,25.88c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M47.57,25.88c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M63.02,25.88c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M93.27,41.72c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M46.28,41.72c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M77.81,10.96c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="93.27" cy="5.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M591.85,391.97c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,391.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="397.45" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="514.04" cy="381.65" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M529.49,376.17c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="381.65" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="560.84" cy="381.65" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M576.28,376.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,376.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,376.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,376.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M483.02,387.13c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.51,376.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,376.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="381.65" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M420.22,376.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="342.41" cy="381.65" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M358.16,376.17c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,376.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,361.06c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,361.06c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,361.06c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M483.02,372.02c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M498.51,361.06c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,361.06c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="366.54" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M420.22,361.06c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="342.41" cy="366.54" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M358.16,361.06c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,361.06c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,344.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,344.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,344.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M389.18,344.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="350.02" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M420.22,344.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M436.28,329.44c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M451.72,329.44c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M467.31,329.44c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="404.62" cy="334.92" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="404.62" cy="303.27" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M420.22,329.44c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M358.16,344.54c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M373.63,344.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M389.18,312.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M358.16,312.89c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M373.63,312.89c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M389.18,298.52c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M358.16,298.52c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M343.9,298.52c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M373.63,298.52c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="404.62" cy="286.74" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M420.33,281.26c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="404.62" cy="271.63" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M420.33,266.15c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M435.18,277.11c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M450.88,277.11c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M404.62,251.08c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M420.33,251.08c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M435.18,262.04c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M450.88,262.04c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M404.62,235.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M388.94,246.93c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M373.81,188.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="358.12" cy="193.98" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M327.44,110.15c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M311.74,110.15c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M297.48,110.15c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="404.62" cy="209.09" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M388.94,214.57c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M357.52,214.57c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M420.33,235.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M435.18,246.93c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M450.88,246.93c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M420.33,220.16c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M390.23,172.69c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M404.5,199.46c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M435.18,231.12c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M450.88,231.12c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M389.18,281.95c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M358.16,281.95c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M373.63,281.95c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M358.16,268.31c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M373.63,268.31c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M591.85,376.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,376.17c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="381.65" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="636.96" cy="381.65" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,422.73c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="514.04" cy="302.82" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M497.26,314.32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="466.58" cy="303.27" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="545.09" cy="286.98" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="545.09" cy="302.82" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="560.84" cy="286.98" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M576.28,281.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="560.84" cy="318.66" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M576.28,329.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="545.09" cy="365.37" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="560.84" cy="365.37" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M591.85,281.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,297.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M607.28,297.34c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="286.98" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="622.88" cy="302.82" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,281.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M638.61,297.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,313.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M612.71,318.88c.11-3.03-2.22-5.56-5.22-5.67-3-.11-5.52,2.24-5.63,5.26-.11,3.03,2.22,5.59,5.22,5.7,3,.11,5.52-2.26,5.63-5.29Z"/>
                        <ellipse class="cls-3" cx="622.88" cy="318.66" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M638.61,313.18c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="514.04" cy="256.07" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="514.04" cy="271.91" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M529.49,250.59c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M529.49,266.43c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="545.09" cy="256.07" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="545.09" cy="271.91" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="560.84" cy="256.07" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="560.84" cy="271.91" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M576.28,250.59c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M576.28,266.43c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,250.59c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,266.43c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="622.88" cy="256.07" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="514.04" cy="223.71" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="514.04" cy="239.54" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M529.49,218.23c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M529.49,234.06c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="545.09" cy="223.71" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="545.09" cy="239.54" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="560.84" cy="223.71" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="560.84" cy="239.54" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M576.28,218.23c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M576.28,234.06c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,218.23c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,234.06c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M607.28,218.23c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M607.28,234.06c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="622.88" cy="223.71" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="622.88" cy="239.54" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M638.61,199.62c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M514.04,203.3c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M529.49,203.3c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M545.09,203.3c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M560.84,203.3c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M576.28,203.3c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,203.3c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M607.28,203.3c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M622.88,203.3c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="514.04" cy="192.97" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M529.49,187.49c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="483.25" cy="256.07" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="483.25" cy="271.91" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M498.7,250.59c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M498.7,282.7c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="483.25" cy="223.71" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="483.25" cy="239.54" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M498.7,218.23c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M498.7,234.06c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M483.25,214.27c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M498.7,203.3c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="483.25" cy="192.97" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M467.55,172.39c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M467.31,261.55c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M467.31,229.19c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M467.31,245.02c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M467.31,214.27c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M451.86,203.3c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M435.92,214.27c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M467.31,198.45c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M498.7,187.49c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="545.09" cy="192.97" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="560.84" cy="192.97" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M576.28,187.49c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,187.49c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M607.28,187.49c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="622.88" cy="192.97" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="685.32" cy="224.44" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="224.44" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="716.36" cy="224.44" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M732.1,218.96c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M747.52,229.92c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M763.1,229.92c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M778.54,218.96c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,229.92c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M809.89,218.96c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="685.32" cy="209.5" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="209.5" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="716.36" cy="209.5" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M732.1,204.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M747.52,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M763.1,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M778.54,204.02c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="685.32" cy="193.72" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="193.72" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M654.52,218.96c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,218.96c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M654.52,204.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,204.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M685.32,250.83c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-1" d="M700.77,250.83c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-1" d="M716.36,261.81c3,0,5.44-2.45,5.44-5.48s-2.43-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="685.32" cy="241.39" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="241.39" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="716.36" cy="241.39" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M654.52,250.83c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-1" d="M669.97,250.83c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-1" d="M654.52,235.91c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M638.67,218.96c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M638.67,235.91c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,235.91c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="685.32" cy="287.75" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="700.77" cy="287.75" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="716.36" cy="287.75" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="716.36" cy="304" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="685.32" cy="272.81" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="272.81" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="716.36" cy="272.81" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M669.97,267.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M654.52,188.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,188.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="716.36" cy="193.72" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M732.1,188.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M747.52,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M763.1,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M778.54,188.24c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="545.09" cy="177.82" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="560.84" cy="177.82" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M576.28,172.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,172.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M607.28,172.34c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="622.88" cy="177.82" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M638.61,183.29c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M560.84,157.42c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M576.28,157.42c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,157.42c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M607.28,157.42c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="622.88" cy="162.9" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="514.04" cy="147.08" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="514.04" cy="131.5" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="483.25" cy="177.82" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M498.7,172.34c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M483.25,168.38c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M498.7,157.42c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="483.25" cy="147.08" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M467.55,126.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M467.31,152.56c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="451.75" cy="132.01" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M451.52,152.56c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M498.7,141.6c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="483.25" cy="131.07" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M498.7,125.59c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="483.25" cy="115.24" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M498.7,109.76c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M498.7,94.17c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="545.09" cy="147.08" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="560.84" cy="147.08" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M576.28,141.6c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.85,141.6c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M607.28,141.6c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="622.88" cy="147.08" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="685.32" cy="178.55" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="178.55" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="716.36" cy="178.55" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M732.1,173.07c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M747.52,184.03c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M763.1,184.03c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M778.54,173.07c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,184.03c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M809.89,173.07c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="685.32" cy="163.65" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="163.65" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="716.36" cy="163.65" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M732.1,158.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M747.52,169.13c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M763.1,169.13c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M778.54,158.17c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,169.13c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="685.32" cy="147.82" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="147.82" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M654.52,173.07c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,173.07c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="685.32" cy="349.16" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="700.77" cy="349.16" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="685.32" cy="334.25" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="700.77" cy="334.25" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M685.32,312.94c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M700.77,312.94c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M669.97,343.68c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M669.97,328.77c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="685.32" cy="381.07" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="700.77" cy="381.07" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M685.32,360.65c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M700.77,360.65c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M669.97,375.59c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M669.97,360.65c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-1" cx="685.32" cy="412.49" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="669.83" cy="412.49" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="412.49" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M685.32,392.09c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M700.77,392.09c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,392.09c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M653.79,403.08c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <ellipse class="cls-1" cx="685.32" cy="443.67" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="685.32" cy="460.66" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="443.67" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M685.32,423.28c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M700.77,423.28c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M669.97,423.28c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M669.97,312.94c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="685.32" cy="303.28" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M700.77,297.8c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M669.97,297.8c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M654.52,158.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,158.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M654.52,142.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.52,374.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.52,359.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.52,343.42c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M654.52,328.28c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.52,313.37c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M654.52,297.57c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,142.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="716.36" cy="147.82" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M732.1,142.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M747.52,153.3c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M763.1,153.3c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M778.54,142.34c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,153.3c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="685.32" cy="131.03" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M700.77,125.55c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M716.36,136.51c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M732.1,125.55c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M747.52,136.51c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M763.1,136.51c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M778.54,125.55c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,136.51c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="685.32" cy="115.22" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="115.22" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M654.52,125.55c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,125.55c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M654.52,109.74c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M669.97,109.74c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="716.36" cy="115.22" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M732.1,109.74c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M747.52,120.71c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M778.54,109.74c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,120.71c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M685.32,94.15c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M700.77,94.15c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M654.52,94.15c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M622.47,105.11c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M639.01,158.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="639.03" cy="147.82" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="639.03" cy="131.03" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M622.47,136.51c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="639.03" cy="115.22" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M591.73,136.51c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M607.19,136.51c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M591.73,120.71c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M607.19,120.71c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M560.95,125.55c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M576.39,125.55c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M560.95,109.74c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M576.39,109.74c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M545.47,125.55c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M545.47,109.74c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.73,105.11c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M607.19,105.11c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M560.95,94.15c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M576.39,94.15c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M545.47,94.15c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M591.73,89.75c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M607.19,89.75c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M560.95,78.79c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M576.39,78.79c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M545.47,78.79c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M529.6,109.74c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M529.6,94.15c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M529.6,78.79c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="514.12" cy="115.22" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M514.12,94.15c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M514.12,78.79c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M545.47,32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M529.6,32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M545.47,14.99c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M529.6,14.99c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="514.12" cy="37.48" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M497.24,42.96c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M669.97,94.15c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M716.36,105.11c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="700.77" cy="67.73" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="700.77" cy="52.12" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="716.36" cy="52.12" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M732.1,94.15c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M747.52,105.11c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M732.1,78.55c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M747.52,89.51c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M763.1,105.11c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M778.54,94.15c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,105.11c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M778.54,78.55c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M794.16,89.51c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M855.73,218.96c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M871.18,229.92c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M886.77,229.92c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="902.5" cy="224.44" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M917.93,229.92c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M933.49,229.92c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="948.95" cy="224.44" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="964.54" cy="224.44" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M980.25,229.92c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M855.73,204.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M871.18,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M886.77,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="902.5" cy="209.5" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M917.93,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M933.49,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="948.95" cy="209.5" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="964.54" cy="209.5" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M855.73,188.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M871.18,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M824.91,218.96c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M840.35,218.96c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M819.73,209.09c0,2.86,2.33,5.18,5.17,5.18s5.17-2.32,5.17-5.18-2.3-5.21-5.17-5.21-5.17,2.34-5.17,5.21Z"/>
                        <path class="cls-3" d="M840.35,204.02c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M824.9,188.93c-2.87,0-5.17,2.29-5.17,5.18s2.33,5.21,5.17,5.21,5.17-2.35,5.17-5.21-2.3-5.18-5.17-5.18Z"/>
                        <path class="cls-3" d="M808.91,214.27c2.87,0,5.17-2.32,5.17-5.18s-2.33-5.21-5.17-5.21-5.14,2.34-5.14,5.21,2.27,5.18,5.14,5.18Z"/>
                        <path class="cls-3" d="M808.91,199.32c2.87,0,5.17-2.35,5.17-5.21s-2.33-5.18-5.17-5.18-5.14,2.29-5.14,5.18,2.27,5.21,5.14,5.21Z"/>
                        <path class="cls-3" d="M840.35,188.24c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.77,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="902.5" cy="193.72" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M917.93,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M933.49,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="948.95" cy="193.72" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="964.54" cy="193.72" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M638.61,215.46c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M669.75,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="669.75" cy="523.18" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="669.75" cy="538.2" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M669.75,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M669.75,564.39c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="669.75" cy="585.71" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="669.75" cy="601.45" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M669.75,611.81c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M669.75,627.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="669.75" cy="648.99" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="669.75" cy="664.72" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="669.75" cy="680.56" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="669.75" cy="696.41" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="669.75" cy="712.26" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="669.75" cy="727.28" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="669.75" cy="743.11" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M684.75,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M684.75,517.7c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M684.75,532.72c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M684.75,559.5c3,0,5.44-2.45,5.44-5.48s-2.43-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M684.75,564.39c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M684.75,580.23c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M684.75,595.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M684.75,622.8c3,0,5.44-2.45,5.44-5.48s-2.43-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M684.75,627.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M700.44,501.85c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M700.44,517.7c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M700.44,532.72c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M700.44,548.52c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M700.44,564.39c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M700.44,580.23c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M700.44,595.97c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M700.44,611.81c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M715.44,512.84c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.44,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M715.44,543.68c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M715.44,559.5c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M715.44,575.38c3,0,5.44-2.45,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.44,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M715.44,591.19c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M715.44,606.93c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M731.86,501.85c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M731.86,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M731.86,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M731.86,564.39c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M731.86,591.19c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M747.52,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M747.52,548.52c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M747.52,575.38c3,0,5.44-2.45,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.44,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M763.44,532.72c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="684.75" cy="696.41" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="684.75" cy="712.26" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M684.75,721.8c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M684.75,737.63c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M731.9,737.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M716.45,753.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M716.45,769.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M731.9,753.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M731.9,767.98c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M747.6,721.8c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M747.6,737.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M747.6,753.2c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M544.72,659.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M544.72,675.08c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M560.18,659.24c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M560.18,675.08c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M575.77,659.24c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.34,659.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M513.8,659.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.39,659.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M575.77,675.08c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M544.72,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M544.72,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M560.19,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M560.19,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M575.77,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M575.77,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M544.72,721.8c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M544.72,737.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M560.18,721.8c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M560.18,737.63c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M575.77,721.8c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M575.77,737.63c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M544.72,753.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M544.72,769.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M560.18,753.47c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M560.18,769.33c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M575.77,753.47c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M575.77,769.33c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.34,675.08c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M513.8,675.08c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.39,675.08c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.34,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.34,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M513.8,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M513.8,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.39,690.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.39,706.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.34,721.8c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.34,737.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="483.7" cy="743.11" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M513.8,721.8c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M513.8,737.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.39,721.8c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.39,737.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M949.22,297.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M949.22,313.71c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="964.67" cy="303.34" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="964.67" cy="319.19" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M980.27,297.86c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M980.27,313.71c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="995.99" cy="303.34" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="995.99" cy="319.19" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1011.43" cy="303.34" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1011.43" cy="319.19" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M949.22,329.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M949.22,345.35c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-1" cx="964.67" cy="335.02" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M964.67,345.35c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M980.27,329.54c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M980.27,345.35c-3.03,0-5.47,2.48-5.47,5.51s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="995.99" cy="335.02" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M995.99,345.35c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="1011.43" cy="335.02" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1011.43,345.35c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-1" d="M949.22,360.4c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M949.22,376.24c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="964.67" cy="365.88" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M964.67,376.24c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M980.27,360.4c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M980.27,376.24c-3.03,0-5.47,2.43-5.47,5.48s2.46,5.51,5.47,5.51,5.44-2.48,5.44-5.51-2.41-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="995.99" cy="365.88" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M995.99,376.24c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1011.43" cy="365.88" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1011.43,376.24c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M949.22,392.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M949.22,407.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M964.67,392.09c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M964.67,407.93c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M980.27,392.09c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M980.27,407.93c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.43,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M995.99,392.09c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M995.99,407.93c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M1011.43,392.09c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M1011.43,407.93c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="871.41" cy="303.34" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="871.41" cy="319.19" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M886.87,297.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,313.71c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M902.46,308.82c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M902.46,324.67c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="918.21" cy="303.34" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="918.21" cy="319.19" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M933.67,297.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.67,313.71c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="871.41" cy="335.02" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M871.41,345.35c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M886.87,329.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,345.35c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M902.46,340.5c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M902.46,356.34c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="918.21" cy="335.02" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M918.21,345.35c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-1" d="M933.67,329.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.67,345.35c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="871.41" cy="365.88" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M871.41,376.24c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,360.4c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,376.24c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M902.46,371.36c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M902.46,387.23c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.44,5.51,5.44,5.51Z"/>
                        <ellipse class="cls-3" cx="918.21" cy="365.88" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M918.21,376.24c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.67,360.4c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.67,376.24c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M824.33,297.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M824.33,313.71c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M839.77,297.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M839.77,313.71c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="855.37" cy="303.34" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="855.37" cy="319.19" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M824.33,329.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M824.33,345.35c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M839.77,329.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M839.77,345.35c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="855.37" cy="335.02" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M855.37,345.35c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M824.33,360.4c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M824.33,376.24c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M839.77,360.4c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M839.77,376.24c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="855.37" cy="365.88" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M855.37,376.24c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M839.77,391.84c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M839.77,407.68c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="855.37" cy="397.32" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="855.37" cy="413.16" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M746.53,308.82c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M746.53,324.67c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M762.01,308.82c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M762.01,324.67c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M793.31,313.71c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M808.78,308.82c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M808.78,324.67c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M746.53,340.5c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M746.53,356.34c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.51-5.47-5.51-5.44,2.48-5.44,5.51,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M731.92,297.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M731.92,313.71c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M716.22,324.67c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M716.36,374.88c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="716.36" cy="365.45" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M716.36,406.79c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="716.36" cy="397.35" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="716.36" cy="443.67" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="716.36" cy="459.94" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M716.36,423.28c-3,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="716.36" cy="349.63" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="716.36" cy="334.47" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M716.22,480.64c3,0,5.44-2.48,5.44-5.51s-2.43-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.44,5.51,5.44,5.51Z"/>
                        <path class="cls-1" d="M700.01,465.42c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M699.33,480.59c2.98.3,5.66-1.88,5.95-4.91l.03-.03c.3-3-1.9-5.7-4.87-6-3-.3-5.68,1.88-5.98,4.91-.3,3.03,1.89,5.73,4.87,6.03Z"/>
                        <path class="cls-3" d="M731.92,329.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M731.92,345.35c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M762.01,340.5c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M762.01,356.34c3,0,5.44-2.45,5.44-5.48s-2.43-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M777.6,345.35c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M793.31,329.54c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M793.31,345.35c-3.03,0-5.47,2.48-5.47,5.51s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M808.78,340.5c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M808.78,356.34c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M746.53,371.36c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M762.01,371.36c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M762.01,387.23c3,0,5.44-2.48,5.44-5.51s-2.43-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.44,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M777.6,360.4c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M777.6,376.24c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M793.31,360.4c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M787.84,381.72c0,3.05,2.46,5.51,5.47,5.51s5.44-2.48,5.44-5.51-2.41-5.48-5.44-5.48-5.47,2.43-5.47,5.48Z"/>
                        <path class="cls-3" d="M808.78,371.36c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M808.78,387.23c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.44,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M824.33,392.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M762.01,403.05c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M777.6,392.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M793.31,403.05c3,0,5.44-2.45,5.44-5.48s-2.41-5.48-5.44-5.48-5.47,2.45-5.47,5.48,2.46,5.48,5.47,5.48Z"/>
                        <path class="cls-3" d="M808.78,403.05c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M824.33,408.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M808.78,419.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M871.41,403.05c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M886.87,403.05c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M902.46,403.05c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M902.46,418.89c3,0,5.44-2.43,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-1" cx="918.21" cy="397.57" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M918.21,407.93c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M872.23,407.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M887.96,418.89c3,0,5.44-2.43,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M933.67,392.09c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.67,407.93c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M949.22,423.68c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M949.22,439.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="964.67" cy="429.16" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="964.67" cy="445.01" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M980.27,423.68c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M980.27,439.53c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="995.99" cy="429.16" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="995.99" cy="445.01" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="1011.43" cy="429.16" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="1011.43" cy="445.01" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M949.22,455.37c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M949.22,471.2c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="964.67" cy="460.85" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="964.67" cy="476.68" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M980.27,455.37c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M980.27,471.2c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="995.99" cy="460.85" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M902.54,439.53c-3,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M918.12,423.68c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M918.12,439.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.85,423.68c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="888.59" cy="429.16" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="904.3" cy="429.16" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M933.85,439.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M918.12,455.37c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M918.12,471.2c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.85,455.37c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.85,471.2c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="303.34" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1026.96" cy="319.19" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1042.46" cy="303.34" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1042.46" cy="319.19" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1058.03,297.86c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.03,313.71c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,297.86c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,313.71c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="335.02" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1026.96,345.35c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="1042.46" cy="335.02" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1042.46,345.35c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1058.03,329.54c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.03,345.35c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1073.75,329.54c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,345.35c-3,0-5.43,2.48-5.43,5.51s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="365.88" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1026.96,376.24c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1042.46" cy="365.88" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1042.46,376.24c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.03,360.4c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.03,376.24c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,360.4c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,376.24c-3,0-5.43,2.43-5.43,5.48s2.43,5.51,5.43,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M1026.96,392.09c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M1026.96,407.93c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M1042.46,392.09c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M1042.46,407.93c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M1058.03,392.09c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.03,407.93c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,392.09c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,407.93c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.43,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="429.16" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="1042.46" cy="429.16" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1058.03,423.68c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.03,439.53c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,423.68c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,439.53c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,455.37c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,471.2c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M949.22,266.95c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M949.22,282.78c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="964.67" cy="272.43" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M964.67,282.78c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M980.27,266.95c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M980.27,282.78c-3.03,0-5.47,2.48-5.47,5.51s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="995.99" cy="272.43" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M995.99,282.78c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1011.43,266.95c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1011.43,282.78c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="871.41" cy="272.43" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M871.41,282.78c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M886.87,266.95c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,282.78c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M902.46,277.91c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M902.46,293.77c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="918.21" cy="272.43" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M918.21,282.78c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M933.67,266.95c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M933.67,282.78c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M824.33,282.78c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M839.77,282.78c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="855.37" cy="272.43" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M855.37,282.78c-3,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M746.53,293.77c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.51-5.47-5.51-5.44,2.48-5.44,5.51,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M746.53,435c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M746.53,450.83c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M746.53,466.67c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M746.53,482.52c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.51-5.47-5.51-5.44,2.48-5.44,5.51,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M746.53,497.54c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M746.53,419.91c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M808.78,293.77c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M731.92,282.78c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1026.96,266.95c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1026.96,282.78c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <ellipse class="cls-3" cx="1042.46" cy="272.43" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1042.46,282.78c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1058.03,266.95c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.03,282.78c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1073.75,266.95c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,282.78c-3,0-5.43,2.48-5.43,5.51s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M949.22,234.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M949.22,250.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="964.67" cy="240.06" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="964.67" cy="255.93" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M980.27,234.58c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M980.27,250.45c-3.03,0-5.47,2.45-5.47,5.48s2.46,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="995.99" cy="240.06" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="995.99" cy="255.93" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1011.43" cy="240.06" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1011.43" cy="255.93" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="871.41" cy="240.06" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="871.41" cy="255.93" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M886.87,234.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,250.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M902.46,245.54c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M902.46,261.41c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="918.21" cy="240.06" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="918.21" cy="255.93" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M933.67,234.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M933.67,250.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M839.77,234.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="855.37" cy="240.06" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="855.37" cy="255.93" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M855.73,78.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M871.18,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M886.77,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="902.5" cy="83.84" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M917.93,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M933.49,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="948.95" cy="83.84" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="964.54" cy="83.84" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M855.73,63.43c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M871.18,74.39c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M886.77,74.39c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="902.5" cy="68.91" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M917.93,74.39c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M933.49,74.39c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="948.95" cy="68.91" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M964.54,74.39c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M855.73,47.63c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M871.18,58.59c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M855.73,16c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M841.07,16c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M871.18,26.96c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M824.91,78.36c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M840.35,78.36c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M824.91,63.43c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M809.42,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M809.42,74.39c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="778.66" cy="68.91" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M763.17,74.39c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M840.35,63.43c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.77,58.59c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M902.5,58.59c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M917.93,58.59c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M933.49,58.59c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="948.95" cy="53.11" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M902.5,42.18c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M917.93,42.18c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M933.49,42.18c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M948.95,42.18c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M949.22,157.28c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M949.22,173.12c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="964.67" cy="162.76" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="964.67" cy="178.6" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="871.41" cy="162.76" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="871.41" cy="178.6" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M886.87,157.28c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,173.12c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M902.46,168.24c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M902.46,184.08c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="918.21" cy="162.76" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="918.21" cy="178.6" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M933.67,157.28c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M933.67,173.12c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M824.33,168.24c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M824.33,184.08c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M839.77,168.24c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M839.77,184.08c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="855.37" cy="162.76" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="855.37" cy="178.6" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M949.22,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M949.22,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="964.67" cy="131.84" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M964.67,142.21c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="871.41" cy="131.84" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M871.41,142.21c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M902.46,137.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M902.46,153.17c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="918.21" cy="131.84" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="918.21" cy="147.69" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M933.67,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M933.67,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M824.33,137.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M824.33,153.17c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M839.77,137.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M839.77,153.17c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="855.37" cy="131.84" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="855.37" cy="147.69" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M949.22,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M949.22,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M964.67,94.01c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="964.67" cy="115.33" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M871.41,94.01c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="871.41" cy="115.33" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M886.87,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M886.87,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M902.46,104.97c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M902.46,120.81c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M918.21,94.01c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="918.21" cy="115.33" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M933.67,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M933.67,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M824.33,104.97c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M824.33,120.81c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M809.56,157.28c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M809.56,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M809.56,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M809.56,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M809.56,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M839.77,104.97c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M839.77,120.81c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M855.37,104.97c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="855.37" cy="115.33" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1011.51,204.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="209.5" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1042.56,204.02c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.46-2.45,5.46-5.48-2.46-5.48-5.46-5.48Z"/>
                        <path class="cls-3" d="M1058.31,204.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,204.02c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.3,214.98c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1104.78,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1011.51,188.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="193.72" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M980.72,204.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="996.17" cy="209.5" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1011.51,219.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="225.33" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1042.56,219.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.46-2.45,5.46-5.48-2.46-5.48-5.46-5.48Z"/>
                        <path class="cls-3" d="M1058.31,219.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,219.85c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="996.17" cy="225.33" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M980.72,188.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="996.17" cy="193.72" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1042.56,188.24c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.46-2.45,5.46-5.48-2.46-5.48-5.46-5.48Z"/>
                        <path class="cls-3" d="M1058.31,188.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,188.24c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.3,199.2c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1104.78,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1011.51,78.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="83.84" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1042.56,89.32c3,0,5.46-2.45,5.46-5.48s-2.46-5.48-5.46-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1058.31,78.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,89.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.43,2.45-5.43,5.48,2.43,5.48,5.43,5.48Z"/>
                        <path class="cls-3" d="M1089.3,89.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1104.78,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1011.51,63.43c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="68.91" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1042.56,74.39c3,0,5.46-2.45,5.46-5.48s-2.46-5.48-5.46-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1058.31,63.43c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,74.39c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.43,2.45-5.43,5.48,2.43,5.48,5.43,5.48Z"/>
                        <path class="cls-3" d="M980.72,78.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="996.17" cy="83.84" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M980.72,63.43c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M996.17,63.43c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1105,157.28c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1105,173.12c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1120.46" cy="162.76" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1120.46" cy="178.6" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1027.24,157.28c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1027.24,173.12c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1042.68,157.28c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1042.68,173.12c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.28,168.24c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1058.28,184.08c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1074.01,157.28c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1074.01,173.12c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.48,157.28c-3.03,0-5.47,2.45-5.47,5.48s2.47,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.48,173.12c-3.03,0-5.47,2.45-5.47,5.48s2.47,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="980.15" cy="162.76" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="980.15" cy="178.6" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M995.61,168.24c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M995.61,184.08c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="1011.21" cy="162.76" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1011.21" cy="178.6" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1105,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1105,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1120.46" cy="131.84" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1120.46,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1027.24,126.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1027.24,142.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1042.68,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1042.68,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.28,137.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1058.28,153.17c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1074.01,126.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1074.01,142.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.48,126.36c-3.03,0-5.47,2.45-5.47,5.48s2.47,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.48,142.21c-3.03,0-5.47,2.45-5.47,5.48s2.47,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="980.15" cy="131.84" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M980.15,153.17c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M995.61,137.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M995.61,153.17c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="1011.21" cy="131.84" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1011.21,153.17c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1105,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1105,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1120.46,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1120.46" cy="115.33" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1027.24,94.01c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1027.24,109.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1042.68,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1042.68,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.28,104.97c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1058.28,120.81c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1074.01,94.01c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1074.01,109.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.48,94.01c-3.03,0-5.47,2.45-5.47,5.48s2.47,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.48,109.85c-3.03,0-5.47,2.45-5.47,5.48s2.47,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M980.15,104.97c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="980.15" cy="115.33" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M995.61,104.97c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M995.61,120.81c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1011.21,104.97c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="1011.21" cy="115.33" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1152.22,204.02c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1183.27,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1199,204.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,214.98c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1230.02,214.98c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1245.47,214.98c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1261.05,204.02c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1245.47,229.65c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1261.05,218.69c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,188.24c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1136.91,204.02c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1136.91,188.24c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1183.27,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1199,188.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,199.2c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1230.02,199.2c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1245.47,199.2c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1261.05,188.24c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,78.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1183.27,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1199,78.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,89.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1230.02,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1245.47,89.32c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1261.05,89.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1136.91,78.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1152.22,63.04c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,74c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1136.91,63.04c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1136.91,44.28c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1167.92,157.28c-2.97,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.46-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.92,173.12c-2.97,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.46-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.39,157.28c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1183.39,173.12c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1198.97,168.24c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1198.97,184.08c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1214.72,157.28c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.72,173.12c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.17,157.28c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.17,173.12c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.3,168.24c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1136.3,184.08c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1151.89,168.24c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1151.89,184.08c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1089.3,250.31c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,261.27c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,261.27c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1089.3,234.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,245.46c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,245.46c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1105,219.4c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1120.46" cy="224.88" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1089.48,219.4c-3.03,0-5.47,2.45-5.47,5.48s2.47,5.48,5.47,5.48,5.44-2.45,5.44-5.48-2.41-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,250.31c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,250.31c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.27,250.31c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,250.31c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,250.31c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.02,250.31c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1245.47,261.27c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1261.05,250.31c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,234.5c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,234.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.91,250.31c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1136.91,234.5c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1183.27,234.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,234.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,234.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.02,234.5c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1245.47,245.46c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1261.05,234.5c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.3,282.67c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,293.65c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1120.35,293.65c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1089.3,266.87c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,277.83c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,277.83c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,282.67c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,282.67c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.27,282.67c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,282.67c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,282.67c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.02,282.67c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1245.47,293.65c3,0,5.43-2.48,5.43-5.51s-2.43-5.48-5.43-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1261.05,282.67c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,266.87c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,266.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.91,282.67c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.43-2.48,5.43-5.51-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1136.91,266.86c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1183.27,266.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,266.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,266.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.02,266.86c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1245.47,277.83c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1261.05,266.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1276.18,214.98c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1276.18,229.65c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1276.18,261.27c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1276.18,245.46c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1307.57,229.65c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1307.57,245.46c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1291.14,215.33c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1291.87,234.5c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1276.18,277.83c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1089.3,314.32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,325.28c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,325.28c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1089.3,298.52c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,309.48c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,309.48c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,314.32c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,314.32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.27,314.32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,314.32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,314.32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1245.47,325.28c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1261.05,314.32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1260.56,340.5c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1276.18,340.5c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1338.95,266.86c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1338.95,296.74c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1323.84,277.83c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1338.95,314.32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1338.48,340.5c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1324.54,329.54c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1307.57,340.5c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,298.52c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,298.52c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.91,314.32c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1136.91,298.52c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1183.27,298.52c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,298.52c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,298.52c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.3,345.19c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,356.15c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,356.15c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1089.3,329.38c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,340.34c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,340.34c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,345.19c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,345.19c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.27,345.19c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,345.19c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,345.19c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,329.38c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,329.38c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.91,345.19c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1136.91,329.38c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1183.27,329.38c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,329.38c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,329.38c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.3,377.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,388.54c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,388.54c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1089.3,361.77c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,372.73c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,372.73c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,377.58c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,377.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.27,377.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,377.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,377.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,361.77c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,361.77c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.87,388.54c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1136.91,361.77c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1183.27,361.77c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,361.77c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,361.77c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.3,409.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,420.17c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,420.17c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1089.3,393.37c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1104.78,404.35c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,404.35c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,409.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,409.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.27,409.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,409.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,409.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,393.37c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1167.7,393.37c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1136.91,409.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1136.91,393.37c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.51-5.43-5.51Z"/>
                        <path class="cls-3" d="M1183.27,393.37c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1199,393.37c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1214.44,393.37c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1229.55,377.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1247.82,383.06c0-3.03-2.44-5.48-5.44-5.48s-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48Z"/>
                        <path class="cls-3" d="M1249.93,425.02c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.43,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <ellipse class="cls-3" cx="1260.96" cy="475.4" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1260.96,486.31c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1276.08,514.28c3.01,0,5.44-2.45,5.44-5.48s-2.4-5.48-5.44-5.48-5.46,2.45-5.46,5.48,2.46,5.48,5.46,5.48Z"/>
                        <path class="cls-3" d="M1292.36,517.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1278.98,532.79c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1245.28,532.79c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1291.78,548.62c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1310.6,554.12c0-3.05-2.43-5.51-5.44-5.51s-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48Z"/>
                        <path class="cls-3" d="M1229.54,372.73c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1229.54,409.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1229.54,393.37c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1089.3,438.9c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1104.78,449.89c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,449.89c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1089.3,423.1c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,434.06c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,434.06c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,438.9c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1167.7,438.9c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1183.27,438.9c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M1152.22,423.1c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,423.1c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.91,438.9c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.51-5.43-5.51Z"/>
                        <path class="cls-3" d="M1136.87,434.06c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1183.27,423.1c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1199,423.1c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.44,423.1c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1291.28,689.77c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1322.68,619.31c3,0,5.44-2.43,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1322.68,605.27c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1338.6,720.64c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.19,720.64c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1307.81,720.64c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.19,704.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1369.93,704.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1291.28,753.03c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1291.28,737.25c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1323.16,753.03c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1338.6,753.03c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.19,753.03c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1369.93,753.03c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1385.37,626.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.58,626.53c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1323.16,737.25c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1338.6,737.25c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1307.81,753.03c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1307.81,737.25c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.19,737.25c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1369.93,737.25c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1291.28,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1323.16,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1338.6,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1307.81,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.19,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1369.93,768.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1385.37,642.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1369.67,653.3c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.43,2.45-5.43,5.48,2.43,5.48,5.43,5.48Z"/>
                        <path class="cls-3" d="M1276.74,753.03c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1276.74,768.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1260.48,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1244.78,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1464.09,689.77c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1479.81,689.77c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1433.06,720.64c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1417.68,720.64c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1417.68,704.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1401.17,626.53c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1433.06,753.03c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1433.06,737.25c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1417.68,753.03c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1417.68,737.25c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1401.17,658.16c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1401.17,642.34c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1433.06,768.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1448.5,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1417.68,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1401.17,672.03c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1416.29,658.16c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1416.29,642.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1416.29,682.99c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1431.92,658.16c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1431.92,642.34c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1431.92,682.99c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1447.67,669.12c3.03,0,5.47-2.45,5.47-5.48s-2.47-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1447.67,682.99c3.03,0,5.47-2.45,5.47-5.48s-2.47-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1462.79,682.99c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1478.41,669.12c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1495.27,642.34c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1506.88,659.32c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1385.02,753.03c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1400.72,753.03c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1385.02,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1400.72,768.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1089.3,471.29c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,482.27c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1120.35,482.27c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1089.3,455.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,466.43c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,466.43c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,471.29c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.91,471.29c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.43-2.48,5.43-5.51-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1136.91,455.47c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1213.52,580.83c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1228.98,580.83c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1244.56,580.83c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1244.56,565.6c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1213.52,612.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1228.98,612.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1244.56,623.43c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1260.28,612.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1260.28,627.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1274.94,638.66c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1260.28,653.3c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1275.98,653.3c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1213.52,596.65c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1228.98,596.65c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1198.19,612.47c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1198.19,596.65c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1244.56,596.65c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1213.52,626.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1228.98,626.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1198.19,626.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1213.52,673.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1198.19,673.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.36,659.16c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1104.78,513.91c3,0,5.44-2.45,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1120.35,513.91c3,0,5.44-2.45,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1104.78,498.09c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1120.35,498.09c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1105.36,596.48c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1120.85,596.48c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.43,596.48c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.43,626.2c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1120.85,610.39c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.43,610.39c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.43,642.78c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1151.52,626.2c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1151.52,642.78c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.43,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,502.92c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,502.92c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.45,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1152.22,487.1c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,487.1c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.91,502.92c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.43-2.45,5.43-5.51-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1136.91,487.1c-3.01,0-5.44,2.43-5.44,5.48s2.43,5.51,5.44,5.51,5.43-2.48,5.43-5.51-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1104.78,528.54c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,517.58c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.7,517.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.27,517.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.91,517.58c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1120.35,560.9c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1104.78,545.13c3,0,5.44-2.48,5.44-5.51s-2.44-5.48-5.44-5.48-5.44,2.43-5.44,5.48,2.43,5.51,5.44,5.51Z"/>
                        <path class="cls-3" d="M1104.78,592.56c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1120.35,576.75c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1152.22,533.56c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.87,581.6c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.91,565.77c-3.01,0-5.44,2.48-5.44,5.51s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.51-5.43-5.51Z"/>
                        <path class="cls-3" d="M1245.47,309.48c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1167.92,219.4c-2.97,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.46-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.39,219.4c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1198.97,230.36c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1214.72,219.4c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.17,219.4c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.3,230.35c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1151.89,230.35c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1245.69,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1245.69,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1261.19,126.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1261.19,142.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.92,126.36c-2.97,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.46-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.92,142.21c-2.97,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.46-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.39,126.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1183.39,142.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1198.97,137.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1198.97,153.17c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1214.72,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.72,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.17,126.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.17,142.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.3,137.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1136.3,153.17c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1151.89,137.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1151.89,153.17c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1245.69,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1245.69,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1261.19,94.01c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1261.19,109.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.92,94.01c-2.97,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.46-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1167.92,109.85c-2.97,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.46-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1183.39,94.01c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1183.39,109.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.43-2.45,5.43-5.48-2.43-5.48-5.43-5.48Z"/>
                        <path class="cls-3" d="M1198.97,104.97c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1198.97,120.81c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1214.72,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1214.72,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.17,94.01c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1230.17,109.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1276.39,89.32c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1291.99,89.32c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1307.69,89.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.43,2.45-5.43,5.48,2.43,5.48,5.43,5.48Z"/>
                        <path class="cls-3" d="M1323.16,89.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1338.73,89.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1354.15,89.32c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1354.43,126.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.43,142.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1369.89,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1369.89,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1369.87,184.77c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1369.87,200.61c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1276.66,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1276.66,142.21c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1292.11,126.36c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1292.11,142.21c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1307.69,137.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.43,2.45-5.43,5.48,2.43,5.48,5.43,5.48Z"/>
                        <path class="cls-3" d="M1323.42,137.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1338.88,126.36c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.43,94.01c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.43,109.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1369.87,104.97c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1369.87,120.81c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1385.02,137.32c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1400.7,137.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1415.24,137.32c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1431.81,120.65c3,0,5.43-2.45,5.43-5.48s-2.43-5.48-5.43-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1385.02,153.17c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1339.31,157.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.75,157.45c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1354.43,184.22c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1354.75,188.47c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1385.02,104.97c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1400.52,104.97c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1385.02,120.81c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1276.66,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1276.66,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1292.11,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1292.11,109.85c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1307.69,104.97c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.43,2.45-5.43,5.48,2.43,5.48,5.43,5.48Z"/>
                        <path class="cls-3" d="M1307.69,120.81c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.43,2.45-5.43,5.48,2.43,5.48,5.43,5.48Z"/>
                        <path class="cls-3" d="M1323.43,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1323.43,120.81c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1338.88,94.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1338.88,109.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1136.3,104.97c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1136.3,120.81c3.01,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1151.89,104.97c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M1151.89,120.81c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.43,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M746.53,245.54c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M731.54,245.54c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M762.01,245.54c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M762.01,261.41c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M793.31,245.54c3,0,5.44-2.45,5.44-5.48s-2.41-5.48-5.44-5.48-5.47,2.45-5.47,5.48,2.46,5.48,5.47,5.48Z"/>
                        <path class="cls-3" d="M808.78,245.54c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M731.92,250.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M731.92,424.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M731.92,440.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M731.92,455.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M731.92,471.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M716.22,496.21c3,0,5.44-2.45,5.44-5.48s-2.43-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M731.92,487.26c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-1" d="M777.51,424.04c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M777.51,439.87c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M777.51,455.71c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M777.51,471.54c-3,0-5.44,2.48-5.44,5.51s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.51-5.44-5.51Z"/>
                        <path class="cls-3" d="M777.51,486.58c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M762.88,424.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M762.88,440.01c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M762.88,455.85c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M762.88,471.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="809.16" cy="445.35" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="809.16" cy="461.19" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="794.54" cy="445.49" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="809.16" cy="429.33" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="794.54" cy="429.47" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M794.54,407.67c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="794.54" cy="461.33" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="794.54" cy="477.18" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M762.88,498.25c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M731.92,393.26c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M731.92,409.1c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M731.54,371.86c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M731.92,376.76c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="1026.96" cy="240.06" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1026.96" cy="255.93" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1042.46" cy="240.06" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="1042.46" cy="255.93" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M1058.03,234.58c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1058.03,250.45c-3.01,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,234.58c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M1073.75,250.45c-3,0-5.43,2.45-5.43,5.48s2.43,5.48,5.43,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.49,486.93c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="948.95" cy="492.41" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="964.54" cy="492.41" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M957.9,549c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-1" d="M933.49,502.78c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="948.95" cy="508.26" rx="5.44" ry="5.48"/>
                        <path class="cls-1" d="M964.56,502.78c-3,0-5.44,2.45-5.44,5.48s2.43,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-1" cx="948.95" cy="524.1" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="948.95" cy="539.96" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="964.56" cy="524.1" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-1" cx="964.56" cy="539.96" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M498.34,753.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M498.34,769.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M513.8,753.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M513.8,769.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.39,753.47c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M529.39,769.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,673.61c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,689.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="32.26" cy="679.09" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="32.26" cy="694.93" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M47.72,673.61c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.72,689.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,705.29c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,721.14c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="32.26" cy="710.77" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="32.26" cy="726.61" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M47.72,705.29c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.72,721.14c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,736.13c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M32.26,736.13c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.72,736.13c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.72,752c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="16.55" cy="773.32" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="32.26" cy="773.32" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M47.72,767.84c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,673.61c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,689.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="78.74" cy="679.09" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="78.73" cy="694.93" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="94.33" cy="679.09" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="94.33" cy="694.93" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M110.04,673.61c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M110.04,689.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,705.29c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,721.14c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="78.74" cy="710.77" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="78.74" cy="726.61" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="94.33" cy="710.77" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="94.33" cy="726.61" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M110.04,705.29c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M110.04,721.14c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,736.13c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,752c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M78.74,736.13c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="78.74" cy="757.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M94.33,736.13c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="94.33" cy="757.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M110.04,736.13c-3,0-5.44,2.43-5.44,5.48s2.44,5.51,5.44,5.51,5.44-2.48,5.44-5.51-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M110.04,752c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,767.84c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="78.73" cy="773.32" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="94.33" cy="773.32" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M110.04,767.84c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,642.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,658.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="32.26" cy="648.18" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="32.26" cy="664.01" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M47.72,642.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.72,658.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,642.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,658.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="78.73" cy="648.18" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="78.74" cy="664.01" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="94.33" cy="648.18" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="94.33" cy="664.01" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M110.04,642.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M110.04,658.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M124.13,673.61c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M124.13,689.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M124.13,705.29c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M124.13,642.7c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M124.13,658.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.43-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M141.01,673.61c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M141.01,689.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M141.01,658.53c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,610.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,626.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="32.26" cy="615.81" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M32.26,626.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.72,610.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.72,626.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M63.28,626.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M777.59,308.82c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M777.59,324.67c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M793.3,308.82c3,0,5.44-2.45,5.44-5.48s-2.41-5.48-5.44-5.48-5.47,2.45-5.47,5.48,2.46,5.48,5.47,5.48Z"/>
                        <path class="cls-3" d="M777.59,340.5c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M824.33,277.91c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M839.77,277.91c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M746.53,277.91c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M762.01,277.91c3,0,5.44-2.45,5.44-5.48s-2.43-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M762.01,293.77c3,0,5.44-2.45,5.44-5.48s-2.43-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M777.59,277.91c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M777.59,293.77c3,0,5.44-2.45,5.44-5.48s-2.44-5.51-5.44-5.51-5.44,2.48-5.44,5.51,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M793.3,277.91c3,0,5.44-2.45,5.44-5.48s-2.41-5.48-5.44-5.48-5.47,2.45-5.47,5.48,2.46,5.48,5.47,5.48Z"/>
                        <path class="cls-3" d="M793.3,293.77c3,0,5.44-2.45,5.44-5.48s-2.41-5.51-5.44-5.51-5.47,2.48-5.47,5.51,2.46,5.48,5.47,5.48Z"/>
                        <path class="cls-3" d="M808.78,277.91c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="731.92" cy="272.43" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M824.33,245.54c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M824.33,261.41c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M839.77,261.41c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M746.53,261.41c3.03,0,5.47-2.45,5.47-5.48s-2.46-5.48-5.47-5.48-5.44,2.45-5.44,5.48,2.41,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M777.59,245.54c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-1" d="M777.59,261.41c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M793.3,261.41c3,0,5.44-2.45,5.44-5.48s-2.41-5.48-5.44-5.48-5.47,2.45-5.47,5.48,2.46,5.48,5.47,5.48Z"/>
                        <path class="cls-3" d="M808.78,261.41c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="16.55" cy="757.48" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="32.26" cy="757.48" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M47.59,219.77c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.59,246.6c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <ellipse class="cls-3" cx="63.07" cy="241.12" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="31.9" cy="192.92" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="31.9" cy="208.75" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M47.59,187.44c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.59,203.27c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="63.07" cy="192.92" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M31.9,172.37c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="31.9" cy="162.25" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="63.07" cy="208.75" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="31.74" cy="116.8" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="31.74" cy="131.76" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M47.22,122.28c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M47.22,106.41c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M63.17,95.45c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M47.22,91.18c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                        <path class="cls-3" d="M63.17,80.22c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="31.74" cy="85.7" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="32.43" cy="69.42" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="16.98" cy="69.42" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M78.74,626.17c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <ellipse class="cls-3" cx="16.55" cy="600.9" rx="5.44" ry="5.48"/>
                        <ellipse class="cls-3" cx="32.26" cy="600.9" rx="5.44" ry="5.48"/>
                        <path class="cls-3" d="M16.55,579.61c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M32.26,579.61c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M16.55,563.33c-3,0-5.44,2.45-5.44,5.48s2.44,5.48,5.44,5.48,5.44-2.45,5.44-5.48-2.44-5.48-5.44-5.48Z"/>
                        <path class="cls-3" d="M763.1,120.71c3,0,5.44-2.45,5.44-5.48s-2.44-5.48-5.44-5.48-5.44,2.45-5.44,5.48,2.44,5.48,5.44,5.48Z"/>
                      </g>
                    </g>
                    <g id="Layer_4">
                      <g>
                        <path class="cls-2" d="M614.97,547.75c-.97,0-1.74.29-2.32.86-.57.57-.89,1.28-.97,2.13h6.16c0-.95-.25-1.69-.72-2.21-.47-.52-1.18-.78-2.15-.78Z"/>
                        <path class="cls-2" d="M702.46,485h-117c-27.61,0-50,22.39-50,50s22.39,50,50,50h117c27.61,0,50-22.39,50-50s-22.39-50-50-50ZM600.3,509.55h3.96v6.05c.61-.48,1.23-.88,1.86-1.18.64-.3,1.37-.45,2.2-.45,1.56,0,2.77.57,3.61,1.7.84,1.12,1.27,2.68,1.27,4.66s-.54,3.53-1.62,4.76c-1.07,1.23-2.41,1.84-4.02,1.84-.69,0-1.29-.07-1.82-.22-.52-.15-1.02-.36-1.49-.64l-.17.62h-3.8v-17.13ZM584.13,514.32h3.98v6.13c0,.62.02,1.15.05,1.56.04.41.14.75.29,1.02.14.27.35.47.63.59.29.12.68.19,1.19.19.34,0,.71-.06,1.12-.19s.81-.31,1.19-.55v-8.76h3.96v12.36h-3.96v-1.36c-.73.56-1.41.98-2.01,1.28-.61.29-1.34.43-2.18.43-1.37,0-2.42-.39-3.16-1.18-.73-.78-1.1-1.94-1.1-3.48v-8.05ZM577.67,553.33c-.32.93-.76,1.71-1.33,2.33-.59.65-1.29,1.14-2.1,1.46-.8.33-1.72.49-2.76.49s-1.93-.17-2.76-.5c-.82-.33-1.52-.82-2.1-1.46-.58-.64-1.03-1.42-1.34-2.34-.31-.92-.46-1.98-.46-3.17s.15-2.22.46-3.14c.31-.93.76-1.73,1.35-2.39.57-.63,1.27-1.11,2.1-1.45.84-.33,1.76-.5,2.75-.5s1.95.17,2.76.51c.82.33,1.52.81,2.09,1.43.59.64,1.03,1.43,1.34,2.36.32.93.47,1.99.47,3.17s-.16,2.24-.48,3.18ZM577.54,525.38c-.8.48-1.68.82-2.63,1.01-.95.19-2.08.29-3.39.29h-5.78v-16.39h5.94c1.34,0,2.49.11,3.46.34.97.22,1.78.53,2.44.95,1.13.69,2.02,1.62,2.66,2.8.65,1.17.98,2.54.98,4.13s-.35,2.89-1.04,4.11c-.7,1.2-1.58,2.13-2.64,2.78ZM586.82,544.08h-.1c-.2-.06-.46-.12-.78-.17-.32-.06-.6-.1-.85-.1-.78,0-1.34.17-1.7.52-.35.34-.52.96-.52,1.86v.37h3.27v1.52h-3.21v9.24h-1.81v-9.24h-1.22v-1.52h1.22v-.36c0-1.28.32-2.26.95-2.94.64-.69,1.55-1.03,2.76-1.03.4,0,.77.02,1.09.06.33.04.63.08.9.14v1.66ZM593.75,544.08h-.1c-.2-.06-.46-.12-.78-.17-.32-.06-.6-.1-.85-.1-.78,0-1.34.17-1.7.52-.35.34-.52.96-.52,1.86v.37h3.27v1.52h-3.21v9.24h-1.81v-9.24h-1.22v-1.52h1.22v-.36c0-1.28.32-2.26.95-2.94.64-.69,1.55-1.03,2.76-1.03.4,0,.77.02,1.09.06.33.04.63.08.9.14v1.66ZM596.73,557.32h-1.81v-10.76h1.81v10.76ZM596.84,544.76h-2.04v-1.88h2.04v1.88ZM608.27,549.22h-.1c-.55-.43-1.12-.76-1.71-.99-.58-.23-1.16-.35-1.71-.35-1.03,0-1.84.35-2.44,1.04-.59.69-.89,1.7-.89,3.03s.29,2.3.87,3c.59.69,1.4,1.04,2.46,1.04.37,0,.74-.05,1.12-.15.38-.1.72-.22,1.02-.38.26-.14.51-.28.74-.42.23-.15.41-.29.55-.39h.1v1.99c-.6.29-1.18.51-1.72.67-.54.16-1.11.24-1.72.24-.78,0-1.49-.11-2.14-.34-.65-.23-1.2-.58-1.67-1.04-.47-.46-.83-1.05-1.09-1.75-.26-.71-.39-1.53-.39-2.47,0-1.76.48-3.14,1.45-4.14.97-1,2.25-1.5,3.83-1.5.62,0,1.22.09,1.81.26.6.17,1.14.39,1.64.64v2.01ZM619.61,552.13h-7.93c0,.66.1,1.24.3,1.73.2.49.47.89.82,1.2.33.31.73.54,1.18.69.46.15.97.23,1.52.23.73,0,1.47-.15,2.21-.43.74-.29,1.27-.58,1.59-.87h.1v1.97c-.61.26-1.23.47-1.87.65-.64.17-1.3.26-2,.26-1.79,0-3.18-.48-4.18-1.44-1-.97-1.5-2.34-1.5-4.12s.48-3.16,1.43-4.19c.96-1.03,2.23-1.55,3.79-1.55,1.45,0,2.57.42,3.35,1.27.79.85,1.18,2.05,1.18,3.61v.98ZM627.48,526.68h-3.93v-1.31c-.21.16-.48.36-.79.58-.32.23-.61.41-.89.54-.39.18-.79.3-1.21.39-.42.09-.88.13-1.38.13-1.17,0-2.16-.36-2.95-1.09-.79-.73-1.19-1.65-1.19-2.78,0-.9.2-1.64.61-2.21.4-.57.98-1.02,1.72-1.35.73-.33,1.64-.57,2.73-.71,1.09-.14,2.21-.24,3.38-.31v-.07c0-.68-.28-1.15-.84-1.41-.56-.26-1.38-.4-2.47-.4-.65,0-1.35.12-2.09.35-.74.23-1.27.4-1.6.53h-.36v-2.98c.42-.11,1.1-.24,2.04-.39.95-.15,1.89-.23,2.84-.23,2.25,0,3.88.35,4.88,1.05,1.01.69,1.51,1.78,1.51,3.26v8.41ZM635.09,526.68h-3.96v-12.36h3.96v12.36ZM635.2,512.56h-4.18v-3.01h4.18v3.01ZM639.8,530.76h-2.46l2.17-8.4h4.25l-3.96,8.4ZM669.26,520.75c0,2.03-.62,3.58-1.85,4.66-1.23,1.08-3.05,1.62-5.45,1.62s-4.22-.54-5.45-1.62c-1.23-1.08-1.84-2.63-1.84-4.65v-10.47h4.25v10.23c0,1.14.24,1.98.72,2.54.48.56,1.25.84,2.32.84s1.83-.27,2.31-.8c.49-.54.74-1.4.74-2.58v-10.23h4.25v10.46ZM684,526.68l-1.13-3.31h-6.08l-1.13,3.31h-4.26l6.05-16.39h4.87l6.05,16.39h-4.37ZM702.59,513.46h-7.65v2.83h7.1v3.17h-7.1v4.05h7.65v3.17h-11.86v-16.39h11.86v3.17Z"/>
                        <path class="cls-2" d="M571.49,544.32c-1.46,0-2.6.51-3.44,1.52-.83,1.01-1.24,2.44-1.24,4.3s.42,3.32,1.27,4.33c.85.99,1.98,1.49,3.41,1.49s2.56-.5,3.4-1.49c.85-1,1.27-2.44,1.27-4.33s-.42-3.3-1.25-4.3c-.84-1.02-1.98-1.52-3.42-1.52Z"/>
                        <path class="cls-2" d="M620.39,521.33c-.4.12-.7.31-.91.55-.21.23-.31.55-.31.94,0,.26.02.47.07.63.04.16.15.32.33.46.17.15.37.26.6.33.23.07.6.1,1.1.1.4,0,.8-.08,1.2-.24.41-.16.77-.38,1.08-.64v-2.58c-.54.04-1.12.11-1.74.19-.62.07-1.1.16-1.42.26Z"/>
                        <path class="cls-2" d="M606.01,524.11c1.05,0,1.83-.31,2.34-.92.51-.62.77-1.54.77-2.77,0-1.1-.19-1.95-.56-2.54-.38-.59-1.04-.89-2-.89-.37,0-.76.06-1.16.18-.4.11-.77.27-1.13.48v6.21c.29.1.56.17.81.21.26.04.57.05.93.05Z"/>
                        <path class="cls-2" d="M574.4,513.9c-.43-.21-.88-.36-1.33-.43-.45-.08-1.13-.12-2.04-.12h-1.07v10.26h1.07c1.01,0,1.74-.04,2.21-.13.47-.1.93-.26,1.38-.51.77-.44,1.34-1.03,1.7-1.76.36-.74.54-1.66.54-2.74s-.2-2-.59-2.76c-.39-.77-1.01-1.37-1.86-1.81Z"/>
                        <polygon class="cls-2" points="677.82 520.36 681.85 520.36 679.83 514.48 677.82 520.36"/>
                        <path class="cls-1" d="M604.27,526.07c.47.28.96.49,1.49.64.52.15,1.13.22,1.82.22,1.61,0,2.95-.61,4.02-1.84,1.08-1.23,1.62-2.81,1.62-4.76s-.42-3.53-1.27-4.66c-.84-1.13-2.05-1.7-3.61-1.7-.83,0-1.56.15-2.2.45-.63.3-1.25.69-1.86,1.18v-6.05h-3.96v17.13h3.8l.17-.62ZM604.27,517.63c.36-.21.74-.37,1.13-.48.4-.12.78-.18,1.16-.18.96,0,1.63.3,2,.89.37.6.56,1.44.56,2.54,0,1.23-.26,2.16-.77,2.77-.51.62-1.3.92-2.34.92-.36,0-.67-.02-.93-.05-.26-.04-.53-.11-.81-.21v-6.21Z"/>
                        <path class="cls-1" d="M581.22,518.5c0-1.59-.33-2.96-.98-4.13-.65-1.18-1.53-2.11-2.66-2.8-.66-.41-1.47-.73-2.44-.95-.97-.23-2.12-.34-3.46-.34h-5.94v16.39h5.78c1.31,0,2.44-.1,3.39-.29.95-.19,1.83-.53,2.63-1.01,1.07-.65,1.95-1.57,2.64-2.78.7-1.21,1.04-2.58,1.04-4.11ZM576.31,521.21c-.36.73-.92,1.32-1.7,1.76-.45.24-.91.41-1.38.51-.47.09-1.21.13-2.21.13h-1.07v-10.26h1.07c.91,0,1.59.04,2.04.12.46.07.9.22,1.33.43.85.43,1.47,1.03,1.86,1.81.4.76.59,1.68.59,2.76s-.18,2-.54,2.74Z"/>
                        <path class="cls-1" d="M588.39,527.02c.84,0,1.57-.14,2.18-.43.61-.29,1.28-.72,2.01-1.28v1.36h3.96v-12.36h-3.96v8.76c-.38.24-.78.43-1.19.55s-.79.19-1.12.19c-.51,0-.9-.06-1.19-.19-.28-.12-.49-.32-.63-.59-.15-.27-.24-.61-.29-1.02-.04-.42-.05-.94-.05-1.56v-6.13h-3.98v8.05c0,1.53.37,2.69,1.1,3.48.74.79,1.79,1.18,3.16,1.18Z"/>
                        <polygon class="cls-1" points="690.73 526.68 702.59 526.68 702.59 523.51 694.94 523.51 694.94 519.46 702.04 519.46 702.04 516.29 694.94 516.29 694.94 513.46 702.59 513.46 702.59 510.29 690.73 510.29 690.73 526.68"/>
                        <polygon class="cls-1" points="637.35 530.76 639.8 530.76 643.77 522.35 639.52 522.35 637.35 530.76"/>
                        <path class="cls-1" d="M625.98,515.01c-1-.7-2.62-1.05-4.88-1.05-.95,0-1.89.08-2.84.23-.94.15-1.62.28-2.04.39v2.98h.36c.32-.12.85-.3,1.6-.53.74-.24,1.44-.35,2.09-.35,1.09,0,1.91.13,2.47.4.56.26.84.73.84,1.41v.07c-1.17.07-2.29.17-3.38.31-1.09.14-2,.38-2.73.71-.74.33-1.31.78-1.72,1.35-.4.57-.61,1.31-.61,2.21,0,1.13.4,2.06,1.19,2.78.79.73,1.78,1.09,2.95,1.09.5,0,.96-.04,1.38-.13.42-.08.82-.21,1.21-.39.28-.13.58-.31.89-.54.32-.23.58-.42.79-.58v1.31h3.93v-8.41c0-1.48-.5-2.57-1.51-3.26ZM623.55,523.46c-.31.26-.67.48-1.08.64-.4.16-.8.24-1.2.24-.5,0-.87-.03-1.1-.1-.23-.07-.44-.18-.6-.33-.18-.15-.29-.3-.33-.46-.04-.16-.07-.37-.07-.63,0-.39.1-.7.31-.94.21-.24.52-.43.91-.55.32-.1.8-.19,1.42-.26.62-.08,1.2-.14,1.74-.19v2.58Z"/>
                        <path class="cls-1" d="M677.45,510.29l-6.05,16.39h4.26l1.13-3.31h6.08l1.13,3.31h4.37l-6.05-16.39h-4.87ZM677.82,520.36l2.02-5.88,2.02,5.88h-4.03Z"/>
                        <path class="cls-1" d="M665.01,520.52c0,1.18-.25,2.04-.74,2.58-.48.54-1.26.8-2.31.8s-1.85-.28-2.32-.84c-.48-.56-.72-1.41-.72-2.54v-10.23h-4.25v10.47c0,2.02.61,3.57,1.84,4.65,1.23,1.08,3.05,1.62,5.45,1.62s4.22-.54,5.45-1.62c1.23-1.08,1.85-2.63,1.85-4.66v-10.46h-4.25v10.23Z"/>
                        <rect class="cls-1" x="631.02" y="509.55" width="4.18" height="3.01"/>
                        <rect class="cls-1" x="631.13" y="514.32" width="3.96" height="12.36"/>
                        <path class="cls-1" d="M576.34,544.62c-.57-.62-1.27-1.1-2.09-1.43-.82-.34-1.74-.51-2.76-.51s-1.9.17-2.75.5c-.84.33-1.54.82-2.1,1.45-.59.66-1.04,1.46-1.35,2.39-.31.92-.46,1.97-.46,3.14s.15,2.24.46,3.17c.31.92.76,1.71,1.34,2.34.58.64,1.28,1.12,2.1,1.46.83.33,1.75.5,2.76.5s1.95-.16,2.76-.49c.81-.33,1.51-.82,2.1-1.46.57-.62,1.02-1.4,1.33-2.33.32-.94.48-2,.48-3.18s-.16-2.24-.47-3.17c-.31-.93-.75-1.72-1.34-2.36ZM574.89,554.48c-.84.99-1.98,1.49-3.4,1.49s-2.56-.5-3.41-1.49c-.85-1-1.27-2.44-1.27-4.33s.41-3.3,1.24-4.3c.84-1.02,1.98-1.52,3.44-1.52s2.58.51,3.42,1.52c.83,1.01,1.25,2.44,1.25,4.3s-.42,3.32-1.27,4.33Z"/>
                        <path class="cls-1" d="M604.82,546.31c-1.59,0-2.86.5-3.83,1.5-.96,1-1.45,2.38-1.45,4.14,0,.94.13,1.77.39,2.47.26.71.62,1.29,1.09,1.75.46.46,1.02.81,1.67,1.04.65.23,1.36.34,2.14.34.61,0,1.18-.08,1.72-.24.55-.16,1.12-.39,1.72-.67v-1.99h-.1c-.13.11-.32.24-.55.39-.23.15-.48.29-.74.42-.3.15-.64.28-1.02.38-.38.1-.75.15-1.12.15-1.05,0-1.87-.35-2.46-1.04-.58-.7-.87-1.7-.87-3s.29-2.35.89-3.03c.6-.69,1.41-1.04,2.44-1.04.56,0,1.13.12,1.71.35.59.23,1.16.56,1.71.99h.1v-2.01c-.49-.25-1.04-.46-1.64-.64-.59-.17-1.2-.26-1.81-.26Z"/>
                        <path class="cls-1" d="M615.07,546.26c-1.57,0-2.83.52-3.79,1.55-.96,1.03-1.43,2.43-1.43,4.19s.5,3.15,1.5,4.12c1,.96,2.4,1.44,4.18,1.44.7,0,1.37-.09,2-.26.64-.17,1.26-.39,1.87-.65v-1.97h-.1c-.32.28-.84.57-1.59.87-.74.29-1.47.43-2.21.43-.55,0-1.06-.08-1.52-.23-.46-.15-.85-.39-1.18-.69-.35-.31-.62-.72-.82-1.2-.2-.49-.3-1.07-.3-1.73h7.93v-.98c0-1.56-.4-2.76-1.18-3.61-.78-.85-1.9-1.27-3.35-1.27ZM611.68,550.74c.08-.85.4-1.56.97-2.13.58-.57,1.35-.86,2.32-.86s1.68.26,2.15.78c.47.52.72,1.26.72,2.21h-6.16Z"/>
                        <path class="cls-1" d="M584.83,542.23c-1.2,0-2.12.34-2.76,1.03-.64.68-.95,1.66-.95,2.94v.36h-1.22v1.52h1.22v9.24h1.81v-9.24h3.21v-1.52h-3.27v-.37c0-.9.17-1.52.52-1.86.35-.35.92-.52,1.7-.52.24,0,.53.03.85.1.32.06.58.12.78.17h.1v-1.66c-.27-.05-.57-.1-.9-.14-.32-.04-.68-.06-1.09-.06Z"/>
                        <rect class="cls-1" x="594.8" y="542.88" width="2.04" height="1.88"/>
                        <path class="cls-1" d="M591.77,542.23c-1.2,0-2.12.34-2.76,1.03-.64.68-.95,1.66-.95,2.94v.36h-1.22v1.52h1.22v9.24h1.81v-9.24h3.21v-1.52h-3.27v-.37c0-.9.17-1.52.52-1.86.35-.35.92-.52,1.7-.52.24,0,.53.03.85.1.32.06.58.12.78.17h.1v-1.66c-.27-.05-.57-.1-.9-.14-.32-.04-.68-.06-1.09-.06Z"/>
                        <rect class="cls-1" x="594.92" y="546.56" width="1.81" height="10.76"/>
                      </g>
                    </g>
                    <g id="Layer_3">
                      <g>
                        <path class="cls-2" d="M796.9,118.92c-1.01,0-1.8.35-2.37,1.06-.57.71-.85,1.71-.85,3.01s.22,2.25.65,2.92c.44.66,1.14.99,2.1.99.51,0,1.03-.11,1.56-.34.53-.23,1.02-.53,1.47-.89v-6.17c-.49-.22-.92-.37-1.31-.45-.39-.08-.81-.12-1.26-.12Z"/>
                        <path class="cls-2" d="M657.21,118.98c-.53,0-1.06.12-1.6.35-.54.22-1.04.52-1.5.88v6.17c.51.23.95.39,1.32.48.37.09.79.14,1.26.14,1,0,1.78-.33,2.35-.98.57-.66.86-1.7.86-3.1,0-1.28-.21-2.26-.64-2.92-.42-.67-1.11-1-2.05-1Z"/>
                        <path class="cls-2" d="M828.02,121.18c-.2.15-.4.37-.6.64-.18.25-.33.55-.44.91-.11.35-.17.75-.17,1.19,0,.94.27,1.7.82,2.27.55.57,1.33.86,2.34.86.6,0,1.19-.15,1.77-.43.59-.29,1.08-.74,1.48-1.33l-4.6-4.49c-.2.1-.4.23-.6.39Z"/>
                        <path class="cls-2" d="M819.12,119.35c.14-.35.21-.8.21-1.34,0-.41-.07-.77-.22-1.09-.14-.32-.38-.59-.71-.81-.28-.19-.6-.31-.98-.39-.38-.08-.83-.11-1.34-.11h-2.24v5.41h1.93c.6,0,1.13-.05,1.58-.15.45-.11.83-.31,1.15-.6.29-.27.5-.58.64-.93Z"/>
                        <path class="cls-2" d="M829.43,119.52c.63-.22,1.1-.55,1.42-.98.33-.44.49-1,.49-1.7,0-.61-.18-1.09-.55-1.44-.36-.35-.82-.53-1.39-.53s-1.07.2-1.44.6c-.37.39-.56.87-.56,1.45,0,.48.12.91.38,1.28.26.37.81.81,1.65,1.32Z"/>
                        <path class="cls-2" d="M642.96,92.33c-.4.12-.7.31-.91.55-.21.23-.31.55-.31.94,0,.26.02.47.07.63.04.16.15.32.33.46.17.15.37.26.61.33.23.07.6.1,1.1.1.4,0,.8-.08,1.2-.24.41-.16.77-.37,1.08-.64v-2.58c-.53.04-1.11.11-1.74.19-.62.07-1.1.16-1.42.26Z"/>
                        <path class="cls-2" d="M771.06,123.1c-.52.15-.94.38-1.26.69-.32.31-.48.73-.48,1.28,0,.62.19,1.08.56,1.4.37.31.94.46,1.71.46.63,0,1.22-.12,1.74-.37.53-.25,1.02-.55,1.46-.9v-3c-.55.03-1.2.08-1.96.15-.74.06-1.34.16-1.77.28Z"/>
                        <path class="cls-2" d="M738.84,94.46v-2.58c-.54.04-1.11.11-1.74.19-.62.07-1.1.16-1.42.26-.4.12-.7.31-.91.55-.21.23-.31.55-.31.94,0,.26.02.47.07.63.04.16.15.32.33.46.17.15.37.26.61.33.23.07.6.1,1.1.1.4,0,.8-.08,1.2-.24.41-.16.77-.37,1.08-.64Z"/>
                        <path class="cls-2" d="M753.91,118.98c-.53,0-1.06.12-1.6.35-.54.22-1.04.52-1.5.88v6.17c.51.23.95.39,1.32.48.37.09.79.14,1.26.14,1,0,1.78-.33,2.35-.98.57-.66.86-1.7.86-3.1,0-1.28-.21-2.26-.64-2.92-.42-.67-1.11-1-2.05-1Z"/>
                        <path class="cls-2" d="M770.55,94.27v-6.07c-.28-.12-.57-.2-.88-.25-.31-.05-.59-.08-.85-.08-1.04,0-1.82.33-2.34.98-.52.65-.78,1.54-.78,2.7,0,1.21.21,2.09.63,2.64.42.54,1.09.81,2.01.81.36,0,.74-.07,1.15-.2.4-.14.76-.32,1.07-.54Z"/>
                        <path class="cls-2" d="M694.48,118.82c-.98,0-1.75.34-2.29,1.02-.54.67-.81,1.71-.81,3.1s.27,2.37.82,3.07c.55.69,1.31,1.04,2.28,1.04s1.72-.34,2.26-1.03c.55-.69.83-1.72.83-3.08s-.27-2.43-.82-3.1c-.55-.68-1.3-1.02-2.27-1.02Z"/>
                        <path class="cls-2" d="M699.77,84.67c-.44-.18-.87-.27-1.29-.29-.42-.02-.98-.03-1.67-.03h-.73v4.91h1.21c.72,0,1.31-.04,1.77-.13.47-.09.86-.26,1.18-.53.27-.23.47-.51.58-.84.12-.33.19-.73.19-1.2s-.12-.86-.37-1.19c-.25-.34-.54-.57-.87-.7Z"/>
                        <path class="cls-2" d="M715.95,88.52c-.23-.3-.52-.51-.85-.64-.33-.12-.69-.19-1.07-.19s-.72.05-1.02.15c-.29.1-.58.31-.85.62-.24.29-.44.68-.58,1.18-.14.5-.21,1.13-.21,1.88,0,.68.06,1.26.19,1.76.12.49.31.89.55,1.19.23.29.51.5.84.63.33.13.71.2,1.12.2.36,0,.7-.06,1.02-.18.33-.12.61-.33.84-.62.26-.32.45-.69.57-1.13.13-.45.2-1.06.2-1.85,0-.73-.07-1.34-.2-1.83-.13-.49-.32-.88-.55-1.18Z"/>
                        <path class="cls-2" d="M880.12,118.75c-.97,0-1.74.29-2.32.86-.57.57-.89,1.28-.97,2.13h6.16c0-.95-.25-1.69-.72-2.21-.47-.52-1.18-.78-2.15-.78Z"/>
                        <path class="cls-2" d="M912.14,118.75c-.97,0-1.74.29-2.32.86-.57.57-.9,1.28-.97,2.13h6.17c0-.95-.25-1.69-.72-2.21-.47-.52-1.18-.78-2.15-.78Z"/>
                        <path class="cls-2" d="M904.83,56h-319.37c-27.61,0-50,22.39-50,50s22.39,50,50,50h319.37c27.61,0,50-22.39,50-50s-22.39-50-50-50ZM723.65,80.55h3.96v17.13h-3.96v-17.13ZM630.93,80.55h3.96v17.13h-3.96v-17.13ZM575.51,115.67h-7.54v3.93h7.54v1.7h-7.54v5.33h7.54v1.7h-9.45v-14.34h9.45v1.7ZM573.46,97.68h-4.68l-4.41-16.39h4.41l2.52,11.28,3.02-11.28h4.22l2.87,11.28,2.64-11.28h4.3l-4.41,16.39h-4.68l-2.94-10.68-2.86,10.68ZM589.34,122.56c0,1.04-.12,1.95-.35,2.73-.22.77-.6,1.41-1.12,1.93-.49.49-1.07.84-1.73,1.07-.66.23-1.43.34-2.31.34s-1.68-.12-2.35-.36c-.67-.24-1.23-.59-1.68-1.05-.52-.53-.9-1.16-1.13-1.91-.23-.74-.34-1.66-.34-2.74v-8.58h1.91v8.68c0,.78.05,1.39.15,1.84.11.45.29.86.54,1.22.28.42.66.73,1.15.94.49.21,1.07.32,1.75.32s1.27-.1,1.75-.31c.48-.21.87-.53,1.16-.95.25-.37.43-.78.53-1.25.11-.47.16-1.06.16-1.76v-8.73h1.91v8.58ZM598.76,88.96c-.38-.03-.69-.04-.94-.04-.57,0-1.06.04-1.5.11-.43.07-.9.2-1.4.37v8.28h-3.96v-12.36h3.96v1.82c.87-.75,1.63-1.24,2.28-1.49.65-.25,1.24-.37,1.78-.37.14,0,.3,0,.47.01.18,0,.33.02.46.03v3.78h-.35c-.17-.06-.44-.1-.81-.13ZM611.19,124.71c-.57,1.06-1.32,1.88-2.26,2.47-.66.41-1.39.7-2.2.88-.8.18-1.86.27-3.18.27h-3.62v-14.34h3.58c1.4,0,2.51.1,3.33.31.83.2,1.53.47,2.1.83.98.61,1.74,1.42,2.28,2.44.55,1.01.82,2.22.82,3.61,0,1.3-.29,2.48-.86,3.54ZM613.03,96.32c-1.18,1.17-2.84,1.75-4.99,1.75s-3.81-.58-5-1.75c-1.18-1.17-1.77-2.78-1.77-4.81s.59-3.65,1.78-4.82c1.2-1.17,2.86-1.75,4.99-1.75s3.82.59,5,1.76c1.18,1.17,1.77,2.78,1.77,4.81s-.6,3.64-1.78,4.81ZM616.81,128.32h-1.81v-10.76h1.81v10.76ZM616.93,115.76h-2.04v-1.88h2.04v1.88ZM626.86,127.63c-.81.63-1.92.94-3.32.94-.8,0-1.53-.09-2.2-.28-.66-.19-1.22-.4-1.67-.63v-2.03h.1c.57.43,1.21.77,1.91,1.03.7.25,1.37.38,2.01.38.8,0,1.42-.13,1.87-.39.45-.26.67-.66.67-1.21,0-.42-.12-.74-.37-.96-.24-.22-.71-.4-1.41-.56-.26-.06-.59-.13-1.01-.2-.41-.08-.79-.16-1.13-.25-.94-.25-1.61-.62-2.01-1.1-.39-.49-.59-1.09-.59-1.79,0-.44.09-.86.27-1.25.19-.39.46-.74.84-1.05.36-.3.82-.54,1.37-.71.56-.18,1.18-.27,1.87-.27.64,0,1.29.08,1.95.24.66.15,1.21.34,1.65.57v1.94h-.1c-.46-.34-1.02-.63-1.69-.86-.66-.24-1.31-.36-1.95-.36s-1.22.13-1.68.38c-.46.25-.68.63-.68,1.13,0,.44.14.78.41,1,.27.22.71.41,1.31.55.33.08.71.15,1.12.23.42.08.76.15,1.04.21.84.19,1.49.52,1.95.99.46.48.68,1.1.68,1.89,0,.98-.41,1.79-1.22,2.42ZM628.3,89.35h-.56c-.15-.13-.34-.29-.56-.46-.21-.18-.48-.35-.79-.52-.3-.16-.63-.29-.99-.4-.36-.11-.78-.17-1.26-.17-1.06,0-1.87.34-2.44,1.01-.57.67-.85,1.58-.85,2.73s.29,2.09.87,2.71c.59.62,1.42.92,2.49.92.5,0,.95-.06,1.34-.17.4-.12.74-.25,1-.41.25-.15.47-.3.66-.46.19-.16.37-.32.53-.47h.56v3.38c-.62.29-1.28.52-1.96.69-.68.18-1.42.26-2.25.26-1.08,0-2.07-.13-2.96-.39-.89-.26-1.66-.65-2.32-1.19-.65-.54-1.16-1.21-1.52-2.03-.36-.81-.54-1.77-.54-2.86,0-1.15.19-2.15.57-2.98.39-.84.93-1.53,1.62-2.08.67-.52,1.44-.9,2.31-1.14.87-.24,1.78-.36,2.72-.36.84,0,1.62.09,2.33.28.71.18,1.38.42,1.99.72v3.38ZM636.27,119.08h-3.74v4.9c0,.57.01,1.01.04,1.33.03.32.12.61.27.89.14.26.33.45.58.57.25.12.63.17,1.14.17.29,0,.6-.04.92-.12.32-.09.55-.16.69-.22h.1v1.63c-.34.09-.71.16-1.12.22-.4.06-.76.09-1.07.09-1.1,0-1.93-.29-2.51-.89-.57-.59-.86-1.54-.86-2.84v-5.72h-1.22v-1.52h1.22v-3.09h1.81v3.09h3.74v1.52ZM645.18,119.53h-.1c-.27-.06-.53-.11-.79-.14-.25-.03-.55-.05-.9-.05-.56,0-1.1.12-1.62.38-.52.24-1.02.56-1.5.95v7.64h-1.81v-10.76h1.81v1.59c.72-.58,1.35-.99,1.9-1.22.55-.24,1.11-.37,1.69-.37.32,0,.54.01.68.03.14.01.35.04.64.09v1.86ZM648.72,128.32h-1.81v-10.76h1.81v10.76ZM648.83,115.76h-2.04v-1.88h2.04v1.88ZM650.05,97.68h-3.93v-1.31c-.21.16-.48.36-.79.58-.32.23-.61.41-.89.54-.39.18-.79.3-1.21.39-.42.09-.88.13-1.38.13-1.17,0-2.16-.36-2.95-1.09-.79-.73-1.19-1.66-1.19-2.79,0-.9.2-1.64.6-2.21s.98-1.02,1.72-1.35c.73-.33,1.64-.57,2.73-.7,1.09-.14,2.21-.24,3.38-.31v-.07c0-.68-.28-1.15-.84-1.41-.56-.26-1.38-.4-2.47-.4-.65,0-1.35.12-2.09.35-.74.23-1.27.4-1.6.53h-.36v-2.98c.42-.11,1.1-.24,2.04-.39.95-.15,1.89-.23,2.84-.23,2.25,0,3.88.35,4.88,1.05,1.01.69,1.51,1.78,1.51,3.26v8.41ZM661.39,125.28c-.25.72-.59,1.32-1.02,1.81-.46.51-.96.89-1.5,1.15-.55.25-1.15.38-1.8.38-.61,0-1.14-.07-1.6-.22-.46-.14-.91-.33-1.35-.58l-.11.5h-1.7v-14.99h1.81v5.35c.51-.42,1.05-.76,1.62-1.02.57-.27,1.21-.4,1.93-.4,1.27,0,2.27.49,3.01,1.46.74.98,1.11,2.35,1.11,4.13,0,.9-.13,1.71-.39,2.43ZM660.38,97.68h-4.26l-3.8-12.36h4.16l2.11,8.52,2.64-8.52h3.51l2.51,8.52,2.08-8.52h4.07l-3.83,12.36h-4.21l-2.52-8.33-2.48,8.33ZM673.51,128.32h-1.81v-1.19c-.61.48-1.19.85-1.75,1.11-.56.26-1.17.39-1.85.39-1.13,0-2.01-.34-2.64-1.03-.63-.69-.94-1.71-.94-3.04v-6.98h1.81v6.13c0,.55.03,1.02.08,1.41.05.39.16.72.33.99.17.28.4.49.67.62s.68.19,1.2.19c.47,0,.98-.12,1.53-.37.56-.24,1.08-.56,1.56-.93v-8.03h1.81v10.76ZM676.46,93.36h4.25l-3.96,8.4h-2.45l2.17-8.4ZM682.66,119.08h-3.74v4.9c0,.57.01,1.01.04,1.33.03.32.12.61.27.89.14.26.33.45.58.57.25.12.63.17,1.14.17.29,0,.6-.04.92-.12.32-.09.55-.16.69-.22h.1v1.63c-.34.09-.71.16-1.12.22-.4.06-.76.09-1.07.09-1.1,0-1.93-.29-2.51-.89s-.86-1.54-.86-2.84v-5.72h-1.22v-1.52h1.22v-3.09h1.81v3.09h3.74v1.52ZM686.69,128.32h-1.81v-10.76h1.81v10.76ZM686.81,115.76h-2.04v-1.88h2.04v1.88ZM698.1,127.09c-.9,1.02-2.1,1.52-3.61,1.52s-2.73-.51-3.63-1.52c-.89-1.01-1.34-2.4-1.34-4.15s.45-3.14,1.34-4.15c.9-1.02,2.11-1.53,3.63-1.53s2.71.51,3.61,1.53c.9,1.01,1.35,2.4,1.35,4.15s-.45,3.14-1.35,4.15ZM698.71,92.34h-2.63v5.34h-4.23v-16.39h6.96c1.04,0,1.92.09,2.63.28.72.18,1.35.44,1.9.8.66.43,1.16.99,1.51,1.66.35.68.53,1.49.53,2.43,0,.73-.13,1.45-.39,2.16-.26.7-.62,1.28-1.1,1.76-.65.65-1.38,1.13-2.19,1.46-.8.33-1.8.5-2.99.5ZM711.26,128.32h-1.81v-6.13c0-.49-.03-.96-.09-1.39-.06-.44-.16-.78-.32-1.02-.16-.27-.39-.47-.69-.6-.3-.13-.69-.2-1.17-.2s-1.01.12-1.55.37c-.54.24-1.06.56-1.55.93v8.03h-1.81v-10.76h1.81v1.2c.57-.47,1.15-.84,1.75-1.1.6-.26,1.22-.39,1.86-.39,1.16,0,2.05.35,2.66,1.05.61.7.92,1.71.92,3.02v6.98ZM719.02,96.32c-1.18,1.17-2.84,1.75-4.99,1.75s-3.81-.58-5-1.75c-1.18-1.17-1.77-2.78-1.77-4.81s.59-3.65,1.78-4.82c1.2-1.17,2.86-1.75,4.99-1.75s3.82.59,5,1.76c1.18,1.17,1.77,2.78,1.77,4.81s-.6,3.64-1.78,4.81ZM732.79,128.32h-1.91v-7.02h-7.16v7.02h-1.91v-14.34h1.91v5.63h7.16v-5.63h1.91v14.34ZM734.57,98.01c-1.17,0-2.16-.36-2.95-1.09-.79-.73-1.19-1.66-1.19-2.79,0-.9.2-1.64.61-2.21s.98-1.02,1.72-1.35c.73-.33,1.64-.57,2.73-.7,1.09-.14,2.21-.24,3.38-.31v-.07c0-.68-.28-1.15-.84-1.41-.56-.26-1.38-.4-2.47-.4-.65,0-1.35.12-2.09.35-.74.23-1.27.4-1.6.53h-.36v-2.98c.42-.11,1.1-.24,2.04-.39.95-.15,1.89-.23,2.84-.23,2.25,0,3.88.35,4.88,1.05,1.01.69,1.51,1.78,1.51,3.26v8.41h-3.93v-1.31c-.21.16-.48.36-.79.58-.32.23-.61.41-.89.54-.39.18-.79.3-1.21.39-.42.09-.88.13-1.38.13ZM745.43,128.32h-1.81v-1.19c-.61.48-1.19.85-1.75,1.11-.56.26-1.18.39-1.85.39-1.13,0-2.01-.34-2.64-1.03-.63-.69-.94-1.71-.94-3.04v-6.98h1.81v6.13c0,.55.03,1.02.08,1.41.05.39.16.72.33.99.17.28.4.49.67.62s.68.19,1.2.19c.47,0,.98-.12,1.53-.37.56-.24,1.08-.56,1.56-.93v-8.03h1.81v10.76ZM758.08,125.28c-.25.72-.59,1.32-1.02,1.81-.46.51-.96.89-1.5,1.15-.55.25-1.15.38-1.8.38-.61,0-1.14-.07-1.6-.22-.46-.14-.91-.33-1.35-.58l-.11.5h-1.7v-14.99h1.81v5.35c.51-.42,1.05-.76,1.62-1.02.57-.27,1.21-.4,1.93-.4,1.27,0,2.27.49,3.01,1.46.74.98,1.11,2.35,1.11,4.13,0,.9-.13,1.71-.39,2.43ZM758.83,97.68h-3.99v-6.13c0-.5-.03-.99-.08-1.49-.05-.5-.14-.87-.26-1.1-.15-.27-.36-.47-.65-.59-.28-.12-.67-.19-1.18-.19-.36,0-.73.06-1.1.18-.37.12-.77.3-1.2.56v8.76h-3.96v-12.36h3.96v1.37c.7-.55,1.38-.97,2.02-1.27.65-.29,1.38-.44,2.17-.44,1.34,0,2.38.39,3.13,1.17.76.78,1.13,1.94,1.13,3.49v8.05ZM762.96,96.28c-.9-1.16-1.35-2.72-1.35-4.69,0-1.05.15-1.98.45-2.79.31-.81.73-1.51,1.26-2.09.5-.55,1.1-.98,1.82-1.28.71-.31,1.42-.46,2.14-.46s1.35.08,1.82.24c.48.15.96.35,1.46.59v-5.26h3.96v17.13h-3.96v-1.29c-.68.56-1.32.97-1.91,1.23-.6.26-1.28.4-2.06.4-1.51,0-2.71-.58-3.61-1.74ZM776.59,128.32h-1.8v-1.15c-.16.11-.38.26-.65.46-.27.19-.53.35-.79.46-.3.15-.65.27-1.04.37-.39.1-.85.15-1.38.15-.97,0-1.79-.32-2.47-.96-.67-.64-1.01-1.46-1.01-2.46,0-.82.17-1.47.52-1.97.35-.51.85-.91,1.5-1.2.66-.29,1.44-.49,2.36-.59.92-.1,1.9-.18,2.96-.23v-.28c0-.41-.07-.75-.22-1.02-.14-.27-.35-.48-.62-.64-.26-.15-.57-.25-.92-.3-.36-.05-.74-.08-1.13-.08-.48,0-1.01.07-1.59.19-.58.12-1.19.3-1.81.54h-.1v-1.84c.35-.1.86-.2,1.53-.32.67-.12,1.33-.17,1.97-.17.76,0,1.42.07,1.98.19.56.12,1.05.33,1.46.64.4.29.71.68.92,1.15.21.47.32,1.05.32,1.74v7.3ZM789.07,128.32h-1.81v-6.13c0-.49-.03-.96-.09-1.39-.06-.44-.16-.78-.32-1.02-.16-.27-.39-.47-.69-.6-.3-.13-.69-.2-1.17-.2s-1.01.12-1.55.37c-.54.24-1.06.56-1.55.93v8.03h-1.81v-10.76h1.81v1.2c.57-.47,1.15-.84,1.75-1.1.6-.26,1.22-.39,1.86-.39,1.16,0,2.05.35,2.66,1.05.61.7.92,1.71.92,3.02v6.98ZM801.28,128.32h-1.81v-1.13c-.52.45-1.06.8-1.63,1.05-.57.25-1.18.38-1.84.38-1.28,0-2.31-.49-3.06-1.48-.75-.99-1.13-2.36-1.13-4.11,0-.91.13-1.72.39-2.44.26-.71.62-1.32,1.06-1.82.44-.49.94-.86,1.52-1.12.59-.26,1.19-.39,1.81-.39.57,0,1.07.06,1.5.18.44.11.9.3,1.38.55v-4.66h1.81v14.99ZM821.32,128.32l-4.8-5.7h-2.69v5.7h-1.91v-14.34h4.02c.87,0,1.59.06,2.17.17.58.11,1.1.31,1.56.6.52.33.92.74,1.21,1.24.3.49.44,1.12.44,1.89,0,1.03-.26,1.9-.78,2.6-.52.69-1.24,1.22-2.15,1.57l5.39,6.27h-2.48ZM836.33,128.32l-2.21-2.16c-.74.91-1.49,1.55-2.26,1.92-.77.36-1.56.54-2.38.54-1.34,0-2.45-.39-3.33-1.17-.88-.78-1.32-1.81-1.32-3.07,0-.59.08-1.1.25-1.53s.36-.8.59-1.12c.23-.3.5-.58.84-.85.33-.27.67-.5,1.01-.7-.71-.46-1.22-.93-1.53-1.4-.31-.47-.46-1.06-.46-1.77,0-.43.08-.84.25-1.22.17-.39.43-.75.77-1.07.32-.31.74-.56,1.25-.75.52-.19,1.09-.29,1.71-.29,1.11,0,2.01.28,2.7.85.69.56,1.03,1.27,1.03,2.13,0,.28-.04.6-.12.96-.08.35-.21.67-.39.95-.21.32-.5.62-.88.9-.38.29-.87.54-1.47.74l3.57,3.49c.09-.26.16-.54.2-.85.05-.31.07-.63.08-.96.01-.36.02-.76.01-1.2v-1.13h1.88v.92c0,.62-.08,1.31-.24,2.08-.16.77-.43,1.51-.82,2.21l3.64,3.54h-2.37ZM851.24,124.71c-.57,1.06-1.32,1.88-2.26,2.47-.65.41-1.39.7-2.2.88-.8.18-1.86.27-3.18.27h-3.62v-14.34h3.58c1.4,0,2.51.1,3.33.31.83.2,1.53.47,2.1.83.98.61,1.74,1.42,2.28,2.44.55,1.01.82,2.22.82,3.61,0,1.3-.29,2.48-.86,3.54ZM873.19,117.24h-.14c-.79-.66-1.57-1.14-2.35-1.44-.78-.3-1.61-.45-2.49-.45-.73,0-1.38.12-1.96.36-.58.23-1.1.59-1.55,1.09-.44.48-.79,1.09-1.04,1.83-.24.73-.37,1.58-.37,2.54s.14,1.88.4,2.6c.28.73.63,1.32,1.06,1.77.45.48.97.83,1.57,1.06.6.22,1.24.34,1.91.34.92,0,1.78-.16,2.58-.47s1.55-.79,2.25-1.42h.13v2.24c-.35.15-.67.3-.96.43-.28.14-.66.28-1.12.42-.39.12-.82.22-1.28.31-.46.09-.96.13-1.51.13-1.04,0-1.99-.14-2.84-.43-.85-.3-1.59-.76-2.22-1.38-.62-.61-1.1-1.38-1.45-2.32-.35-.94-.52-2.04-.52-3.28,0-1.18.17-2.24.5-3.17.33-.93.82-1.72,1.45-2.36.61-.62,1.35-1.1,2.21-1.43.87-.33,1.83-.49,2.88-.49.77,0,1.54.09,2.3.28.77.19,1.62.51,2.56.98v2.26ZM884.75,123.13h-7.93c0,.66.1,1.24.3,1.73.2.49.47.89.82,1.2.33.31.73.54,1.18.69.46.15.97.23,1.52.23.73,0,1.47-.15,2.21-.43.74-.29,1.27-.58,1.59-.87h.1v1.97c-.61.26-1.23.47-1.87.65-.64.17-1.3.26-2,.26-1.79,0-3.18-.48-4.18-1.44-1-.97-1.5-2.34-1.5-4.12s.48-3.16,1.43-4.19c.96-1.03,2.23-1.55,3.79-1.55,1.45,0,2.57.42,3.35,1.27.79.85,1.18,2.05,1.18,3.61v.98ZM896.5,128.32h-1.81v-6.13c0-.49-.03-.96-.09-1.39-.06-.44-.16-.78-.32-1.02-.16-.27-.39-.47-.69-.6-.3-.13-.69-.2-1.18-.2s-1.01.12-1.55.37c-.54.24-1.06.56-1.55.93v8.03h-1.81v-10.76h1.81v1.2c.57-.47,1.15-.84,1.75-1.1.6-.26,1.22-.39,1.86-.39,1.16,0,2.05.35,2.66,1.05s.91,1.71.91,3.02v6.98ZM905.57,119.08h-3.74v4.9c0,.57.01,1.01.04,1.33.03.32.12.61.27.89.14.26.33.45.58.57.25.12.63.17,1.14.17.3,0,.6-.04.92-.12.32-.09.55-.16.69-.22h.1v1.63c-.34.09-.71.16-1.12.22-.4.06-.76.09-1.07.09-1.1,0-1.93-.29-2.5-.89-.57-.59-.86-1.54-.86-2.84v-5.72h-1.22v-1.52h1.22v-3.09h1.81v3.09h3.74v1.52ZM916.77,123.13h-7.93c0,.66.1,1.24.3,1.73.2.49.47.89.82,1.2.33.31.73.54,1.18.69.46.15.97.23,1.52.23.73,0,1.47-.15,2.21-.43.74-.29,1.28-.58,1.59-.87h.1v1.97c-.61.26-1.23.47-1.87.65-.64.17-1.3.26-2,.26-1.79,0-3.18-.48-4.18-1.44-1-.97-1.5-2.34-1.5-4.12s.48-3.16,1.44-4.19c.96-1.03,2.23-1.55,3.8-1.55,1.45,0,2.57.42,3.35,1.27.79.85,1.18,2.05,1.18,3.61v.98ZM926.23,119.53h-.1c-.27-.06-.53-.11-.79-.14-.25-.03-.55-.05-.9-.05-.56,0-1.1.12-1.62.38-.52.24-1.02.56-1.5.95v7.64h-1.81v-10.76h1.81v1.59c.72-.58,1.35-.99,1.9-1.22.55-.24,1.11-.37,1.69-.37.31,0,.54.01.68.03.14.01.35.04.64.09v1.86Z"/>
                        <path class="cls-2" d="M609.96,88.52c-.23-.3-.52-.51-.85-.64-.33-.12-.69-.19-1.07-.19s-.72.05-1.02.15c-.29.1-.58.31-.85.62-.24.29-.44.68-.58,1.18-.14.5-.21,1.13-.21,1.88,0,.68.06,1.26.19,1.76.12.49.31.89.55,1.19.23.29.51.5.84.63.33.13.71.2,1.12.2.36,0,.7-.06,1.02-.18.33-.12.61-.33.84-.62.26-.32.45-.69.57-1.13.13-.45.2-1.06.2-1.85,0-.73-.07-1.34-.2-1.83-.13-.49-.32-.88-.55-1.18Z"/>
                        <path class="cls-2" d="M607.71,116.47c-.57-.32-1.17-.54-1.8-.66-.63-.13-1.4-.19-2.28-.19h-1.79v11.07h1.79c.92,0,1.72-.07,2.4-.2.69-.13,1.32-.38,1.89-.75.71-.46,1.25-1.06,1.6-1.8.36-.75.54-1.68.54-2.79s-.2-2.07-.59-2.84c-.39-.77-.98-1.38-1.75-1.82Z"/>
                        <path class="cls-2" d="M847.76,116.47c-.57-.32-1.16-.54-1.8-.66-.64-.13-1.4-.19-2.28-.19h-1.79v11.07h1.79c.92,0,1.72-.07,2.4-.2.69-.13,1.32-.38,1.89-.75.71-.46,1.25-1.06,1.6-1.8.36-.75.54-1.68.54-2.79s-.2-2.07-.59-2.84c-.39-.77-.98-1.38-1.75-1.82Z"/>
                        <rect class="cls-1" x="630.93" y="80.55" width="3.96" height="17.13"/>
                        <path class="cls-1" d="M705,88.62c.26-.7.39-1.42.39-2.16,0-.95-.18-1.76-.53-2.43-.34-.68-.85-1.23-1.51-1.66-.55-.36-1.18-.63-1.9-.8-.71-.18-1.59-.28-2.63-.28h-6.96v16.39h4.23v-5.34h2.63c1.2,0,2.19-.17,2.99-.5.81-.33,1.54-.82,2.19-1.46.48-.48.84-1.06,1.1-1.76ZM700.83,87.76c-.12.32-.31.6-.58.84-.32.26-.71.44-1.18.53-.46.09-1.05.13-1.77.13h-1.21v-4.91h.73c.7,0,1.26.01,1.67.03.42.01.85.11,1.29.29.33.13.62.37.87.7.25.33.37.73.37,1.19s-.06.87-.19,1.2Z"/>
                        <path class="cls-1" d="M608.04,84.93c-2.13,0-3.79.58-4.99,1.75-1.19,1.17-1.78,2.77-1.78,4.82s.59,3.64,1.77,4.81c1.19,1.17,2.86,1.75,5,1.75s3.81-.58,4.99-1.75c1.19-1.17,1.78-2.78,1.78-4.81s-.59-3.64-1.77-4.81c-1.17-1.17-2.84-1.76-5-1.76ZM610.51,93.38c-.12.44-.32.82-.57,1.13-.23.29-.51.49-.84.62-.32.12-.66.18-1.02.18-.42,0-.79-.07-1.12-.2-.32-.13-.6-.34-.84-.63-.24-.3-.43-.7-.55-1.19-.12-.5-.19-1.09-.19-1.76,0-.76.07-1.38.21-1.88.15-.5.34-.89.58-1.18.27-.31.55-.51.85-.62.3-.1.64-.15,1.02-.15s.74.06,1.07.19c.33.12.61.34.85.64.23.29.42.69.55,1.18.13.49.2,1.1.2,1.83,0,.79-.07,1.4-.2,1.85Z"/>
                        <path class="cls-1" d="M714.04,84.93c-2.13,0-3.79.58-4.99,1.75-1.19,1.17-1.78,2.77-1.78,4.82s.59,3.64,1.77,4.81c1.19,1.17,2.86,1.75,5,1.75s3.8-.58,4.99-1.75c1.19-1.17,1.78-2.78,1.78-4.81s-.59-3.64-1.77-4.81c-1.17-1.17-2.84-1.76-5-1.76ZM716.5,93.38c-.12.44-.32.82-.57,1.13-.23.29-.51.49-.84.62-.32.12-.66.18-1.02.18-.42,0-.79-.07-1.12-.2-.32-.13-.6-.34-.84-.63-.24-.3-.43-.7-.55-1.19-.12-.5-.19-1.09-.19-1.76,0-.76.07-1.38.21-1.88.15-.5.34-.89.58-1.18.27-.31.55-.51.85-.62.3-.1.64-.15,1.02-.15s.74.06,1.07.19c.33.12.61.34.85.64.23.29.42.69.55,1.18.13.49.2,1.1.2,1.83,0,.79-.07,1.4-.2,1.85Z"/>
                        <polygon class="cls-1" points="583.94 97.68 588.36 81.29 584.05 81.29 581.41 92.57 578.54 81.29 574.32 81.29 571.31 92.57 568.78 81.29 564.37 81.29 568.78 97.68 573.46 97.68 576.33 87 579.27 97.68 583.94 97.68"/>
                        <path class="cls-1" d="M623.97,84.98c-.94,0-1.85.12-2.72.36-.87.24-1.64.62-2.31,1.14-.69.55-1.23,1.24-1.62,2.08-.38.84-.57,1.83-.57,2.98s.18,2.05.54,2.86c.36.81.87,1.49,1.52,2.03.66.54,1.43.93,2.32,1.19.9.26,1.88.39,2.96.39.82,0,1.57-.09,2.25-.26.68-.17,1.34-.4,1.96-.69v-3.38h-.56c-.16.15-.34.31-.53.47-.19.16-.41.32-.66.46-.26.15-.6.29-1,.41-.4.11-.84.17-1.34.17-1.07,0-1.9-.31-2.49-.92-.58-.62-.87-1.52-.87-2.71s.28-2.06.85-2.73c.57-.68,1.39-1.01,2.44-1.01.48,0,.9.06,1.26.17.36.1.69.23.99.4.32.17.58.34.79.52.22.18.41.33.56.46h.56v-3.38c-.62-.29-1.28-.53-1.99-.72-.71-.18-1.49-.28-2.33-.28Z"/>
                        <polygon class="cls-1" points="669.58 97.68 673.41 85.32 669.34 85.32 667.26 93.84 664.75 85.32 661.24 85.32 658.6 93.84 656.48 85.32 652.32 85.32 656.12 97.68 660.38 97.68 662.86 89.35 665.38 97.68 669.58 97.68"/>
                        <path class="cls-1" d="M599.93,85.32c-.13-.01-.29-.03-.46-.03-.18,0-.33-.01-.47-.01-.54,0-1.14.12-1.78.37-.65.24-1.41.74-2.28,1.49v-1.82h-3.96v12.36h3.96v-8.28c.5-.18.96-.3,1.4-.37.43-.07.93-.11,1.5-.11.25,0,.56.01.94.04.37.03.65.07.81.13h.35v-3.78Z"/>
                        <path class="cls-1" d="M648.54,86.01c-1-.7-2.62-1.05-4.88-1.05-.95,0-1.89.08-2.84.23-.94.15-1.62.28-2.04.39v2.98h.36c.32-.12.86-.3,1.6-.53.74-.23,1.44-.35,2.09-.35,1.09,0,1.91.13,2.47.4.56.26.84.73.84,1.41v.07c-1.17.07-2.29.17-3.38.31-1.09.14-2,.37-2.73.7-.74.33-1.31.78-1.72,1.35s-.6,1.31-.6,2.21c0,1.13.4,2.06,1.19,2.79.79.73,1.78,1.09,2.95,1.09.5,0,.96-.04,1.38-.13.42-.08.82-.21,1.21-.39.28-.13.58-.31.89-.54.32-.23.58-.42.79-.58v1.31h3.93v-8.41c0-1.48-.5-2.57-1.51-3.26ZM646.12,94.46c-.31.26-.67.48-1.08.64-.4.16-.8.24-1.2.24-.5,0-.87-.03-1.1-.1-.24-.07-.44-.18-.61-.33-.18-.15-.29-.3-.33-.46-.04-.16-.07-.37-.07-.63,0-.39.1-.7.31-.94.21-.24.52-.43.91-.55.32-.1.8-.19,1.42-.26.62-.08,1.2-.14,1.74-.19v2.58Z"/>
                        <polygon class="cls-1" points="680.71 93.36 676.46 93.36 674.3 101.76 676.75 101.76 680.71 93.36"/>
                        <rect class="cls-1" x="723.65" y="80.55" width="3.96" height="17.13"/>
                        <path class="cls-1" d="M754.57,84.98c-.79,0-1.52.15-2.17.44-.65.29-1.32.72-2.02,1.27v-1.37h-3.96v12.36h3.96v-8.76c.43-.26.83-.44,1.2-.56.37-.12.74-.18,1.1-.18.51,0,.9.06,1.18.19.29.12.5.32.65.59.12.23.21.6.26,1.1.05.49.08.99.08,1.49v6.13h3.99v-8.05c0-1.55-.38-2.71-1.13-3.49-.75-.78-1.79-1.17-3.13-1.17Z"/>
                        <path class="cls-1" d="M770.55,96.39v1.29h3.96v-17.13h-3.96v5.26c-.5-.24-.99-.44-1.46-.59-.47-.16-1.08-.24-1.82-.24s-1.42.15-2.14.46c-.71.3-1.32.73-1.82,1.28-.53.58-.95,1.28-1.26,2.09-.3.81-.45,1.74-.45,2.79,0,1.97.45,3.53,1.35,4.69.9,1.16,2.11,1.74,3.61,1.74.78,0,1.46-.13,2.06-.4.59-.26,1.23-.68,1.91-1.23ZM766.32,94.19c-.42-.55-.63-1.43-.63-2.64s.26-2.05.78-2.7c.52-.65,1.3-.98,2.34-.98.26,0,.54.03.85.08.31.05.6.14.88.25v6.07c-.31.22-.66.4-1.07.54-.4.13-.79.2-1.15.2-.92,0-1.6-.27-2.01-.81Z"/>
                        <path class="cls-1" d="M738.05,96.96c.32-.23.58-.42.79-.58v1.31h3.93v-8.41c0-1.48-.5-2.57-1.51-3.26-1-.7-2.62-1.05-4.88-1.05-.95,0-1.89.08-2.84.23-.94.15-1.62.28-2.04.39v2.98h.36c.32-.12.86-.3,1.6-.53.74-.23,1.44-.35,2.09-.35,1.09,0,1.91.13,2.47.4.56.26.84.73.84,1.41v.07c-1.17.07-2.29.17-3.38.31-1.09.14-2,.37-2.73.7-.74.33-1.31.78-1.72,1.35s-.61,1.31-.61,2.21c0,1.13.4,2.06,1.19,2.79.79.73,1.78,1.09,2.95,1.09.5,0,.96-.04,1.38-.13.42-.08.82-.21,1.21-.39.28-.13.58-.31.89-.54ZM735.46,95.24c-.23-.07-.44-.18-.61-.33-.18-.15-.29-.3-.33-.46-.04-.16-.07-.37-.07-.63,0-.39.1-.7.31-.94.21-.24.52-.43.91-.55.32-.1.8-.19,1.42-.26.62-.08,1.2-.14,1.74-.19v2.58c-.31.26-.67.48-1.08.64-.4.16-.8.24-1.2.24-.5,0-.87-.03-1.1-.1Z"/>
                        <rect class="cls-1" x="615" y="117.56" width="1.81" height="10.76"/>
                        <path class="cls-1" d="M868.33,113.71c-1.05,0-2.01.16-2.88.49-.86.33-1.6.8-2.21,1.43-.63.64-1.11,1.43-1.45,2.36-.33.93-.5,1.99-.5,3.17,0,1.25.17,2.34.52,3.28.35.94.83,1.71,1.45,2.32.63.62,1.37,1.08,2.22,1.38.85.29,1.8.43,2.84.43.55,0,1.06-.04,1.51-.13.46-.08.89-.19,1.28-.31.46-.15.84-.29,1.12-.42.29-.13.61-.28.96-.43v-2.24h-.13c-.7.63-1.45,1.1-2.25,1.42s-1.66.47-2.58.47c-.67,0-1.3-.11-1.91-.34-.6-.23-1.12-.58-1.57-1.06-.43-.46-.78-1.05-1.06-1.77-.27-.73-.4-1.59-.4-2.6s.12-1.81.37-2.54c.25-.74.6-1.35,1.04-1.83.46-.5.97-.86,1.55-1.09.58-.24,1.24-.36,1.96-.36.89,0,1.72.15,2.49.45.78.3,1.56.78,2.35,1.44h.14v-2.26c-.94-.47-1.79-.8-2.56-.98-.77-.19-1.53-.28-2.3-.28Z"/>
                        <polygon class="cls-1" points="730.89 119.6 723.73 119.6 723.73 113.97 721.82 113.97 721.82 128.32 723.73 128.32 723.73 121.3 730.89 121.3 730.89 128.32 732.79 128.32 732.79 113.97 730.89 113.97 730.89 119.6"/>
                        <path class="cls-1" d="M849,115.11c-.57-.35-1.27-.63-2.1-.83-.82-.21-1.93-.31-3.33-.31h-3.58v14.34h3.62c1.32,0,2.38-.09,3.18-.27.81-.18,1.54-.47,2.2-.88.94-.58,1.7-1.41,2.26-2.47.57-1.06.86-2.24.86-3.54,0-1.39-.27-2.6-.82-3.61-.55-1.02-1.31-1.83-2.28-2.44ZM849.56,123.93c-.35.74-.89,1.34-1.6,1.8-.57.37-1.2.62-1.89.75-.68.14-1.48.2-2.4.2h-1.79v-11.07h1.79c.89,0,1.65.06,2.28.19.64.12,1.24.34,1.8.66.78.44,1.36,1.05,1.75,1.82.39.77.59,1.72.59,2.84s-.18,2.05-.54,2.79Z"/>
                        <path class="cls-1" d="M835.88,122.57c.16-.77.24-1.46.24-2.08v-.92h-1.88v1.13c0,.44,0,.84-.01,1.2,0,.33-.03.65-.08.96-.04.31-.11.59-.2.85l-3.57-3.49c.6-.2,1.1-.45,1.47-.74.38-.29.67-.59.88-.9.19-.28.32-.6.39-.95.08-.36.12-.68.12-.96,0-.86-.34-1.57-1.03-2.13-.69-.57-1.59-.85-2.7-.85-.62,0-1.19.1-1.71.29-.51.19-.93.44-1.25.75-.34.32-.6.68-.77,1.07-.17.39-.25.79-.25,1.22,0,.71.15,1.3.46,1.77.32.47.83.93,1.53,1.4-.34.2-.68.43-1.01.7-.33.26-.61.55-.84.85-.22.32-.42.69-.59,1.12s-.25.94-.25,1.53c0,1.27.44,2.29,1.32,3.07.89.78,2,1.17,3.33,1.17.82,0,1.61-.18,2.38-.54.77-.37,1.52-1,2.26-1.92l2.21,2.16h2.37l-3.64-3.54c.39-.7.66-1.43.82-2.21ZM827.41,116.92c0-.57.19-1.05.56-1.45.37-.4.85-.6,1.44-.6s1.03.18,1.39.53c.37.35.55.83.55,1.44,0,.69-.16,1.26-.49,1.7-.32.43-.8.76-1.42.98-.84-.51-1.39-.95-1.65-1.32-.25-.37-.38-.8-.38-1.28ZM831.73,126.61c-.58.29-1.17.43-1.77.43-1.01,0-1.79-.29-2.34-.86-.55-.58-.82-1.34-.82-2.27,0-.44.06-.84.17-1.19.12-.35.26-.65.44-.91.2-.27.4-.48.6-.64.2-.16.4-.29.6-.39l4.6,4.49c-.4.59-.89,1.03-1.48,1.33Z"/>
                        <path class="cls-1" d="M632.54,114.47h-1.81v3.09h-1.22v1.52h1.22v5.72c0,1.3.29,2.25.86,2.84.57.59,1.41.89,2.51.89.31,0,.67-.03,1.07-.09.4-.06.78-.13,1.12-.22v-1.63h-.1c-.14.06-.37.13-.69.22-.32.08-.63.12-.92.12-.51,0-.89-.06-1.14-.17-.24-.12-.44-.31-.58-.57-.15-.28-.24-.57-.27-.89-.02-.32-.04-.76-.04-1.33v-4.9h3.74v-1.52h-3.74v-3.09Z"/>
                        <rect class="cls-1" x="614.89" y="113.88" width="2.04" height="1.88"/>
                        <path class="cls-1" d="M625.46,122.34c-.28-.06-.62-.14-1.04-.21-.41-.08-.78-.15-1.12-.23-.6-.14-1.04-.32-1.31-.55-.28-.22-.41-.56-.41-1,0-.5.23-.88.68-1.13.46-.26,1.01-.38,1.68-.38s1.28.12,1.95.36c.66.23,1.22.52,1.69.86h.1v-1.94c-.44-.22-.98-.41-1.65-.57-.65-.16-1.3-.24-1.95-.24-.69,0-1.31.09-1.87.27-.55.17-1.01.41-1.37.71-.37.31-.65.66-.84,1.05-.18.39-.27.81-.27,1.25,0,.71.2,1.3.59,1.79.4.48,1.07.85,2.01,1.1.34.09.72.17,1.13.25.42.08.75.14,1.01.2.69.15,1.16.34,1.41.56.24.22.37.54.37.96,0,.55-.23.96-.67,1.21-.45.26-1.07.39-1.87.39-.64,0-1.31-.12-2.01-.38-.7-.26-1.34-.6-1.91-1.03h-.1v2.03c.45.23,1,.43,1.67.63.67.19,1.4.28,2.2.28,1.41,0,2.51-.31,3.32-.94.82-.63,1.22-1.43,1.22-2.42,0-.78-.23-1.41-.68-1.89-.46-.47-1.1-.8-1.95-.99Z"/>
                        <path class="cls-1" d="M880.22,117.26c-1.57,0-2.83.52-3.79,1.55-.96,1.03-1.43,2.43-1.43,4.19s.5,3.15,1.5,4.12c1,.96,2.4,1.44,4.18,1.44.7,0,1.37-.09,2-.26.64-.17,1.26-.39,1.87-.65v-1.97h-.1c-.32.28-.84.57-1.59.87-.74.29-1.47.43-2.21.43-.55,0-1.06-.08-1.52-.23-.46-.15-.85-.39-1.18-.69-.35-.31-.62-.72-.82-1.2-.2-.49-.3-1.07-.3-1.73h7.93v-.98c0-1.56-.4-2.77-1.18-3.61-.78-.85-1.9-1.27-3.35-1.27ZM876.82,121.74c.08-.85.4-1.56.97-2.13.58-.57,1.35-.86,2.32-.86s1.68.26,2.15.78c.47.52.72,1.26.72,2.21h-6.16Z"/>
                        <polygon class="cls-1" points="566.06 128.32 575.51 128.32 575.51 126.62 567.97 126.62 567.97 121.3 575.51 121.3 575.51 119.6 567.97 119.6 567.97 115.67 575.51 115.67 575.51 113.97 566.06 113.97 566.06 128.32"/>
                        <path class="cls-1" d="M912.24,117.26c-1.57,0-2.83.52-3.8,1.55-.96,1.03-1.44,2.43-1.44,4.19s.5,3.15,1.5,4.12c1,.96,2.4,1.44,4.18,1.44.7,0,1.37-.09,2-.26.64-.17,1.26-.39,1.87-.65v-1.97h-.1c-.32.28-.85.57-1.59.87-.74.29-1.47.43-2.21.43-.55,0-1.06-.08-1.52-.23-.46-.15-.85-.39-1.18-.69-.35-.31-.62-.72-.82-1.2-.2-.49-.3-1.07-.3-1.73h7.93v-.98c0-1.56-.4-2.77-1.18-3.61-.78-.85-1.9-1.27-3.35-1.27ZM908.84,121.74c.08-.85.4-1.56.97-2.13.58-.57,1.35-.86,2.32-.86s1.68.26,2.15.78c.47.52.72,1.26.72,2.21h-6.17Z"/>
                        <path class="cls-1" d="M924.91,117.56c-.57,0-1.13.12-1.69.37-.55.24-1.18.65-1.9,1.22v-1.59h-1.81v10.76h1.81v-7.64c.48-.39.98-.71,1.5-.95.52-.25,1.06-.38,1.62-.38.35,0,.65.02.9.05.26.03.52.07.79.14h.1v-1.86c-.28-.05-.49-.07-.64-.09-.14-.02-.37-.03-.68-.03Z"/>
                        <path class="cls-1" d="M892.92,117.26c-.64,0-1.26.13-1.86.39-.6.26-1.19.63-1.75,1.1v-1.2h-1.81v10.76h1.81v-8.03c.49-.38,1.01-.69,1.55-.93.54-.24,1.06-.37,1.55-.37s.87.07,1.18.2c.3.13.53.33.69.6.15.24.26.58.32,1.02.06.43.09.89.09,1.39v6.13h1.81v-6.98c0-1.32-.3-2.32-.91-3.02s-1.5-1.05-2.66-1.05Z"/>
                        <path class="cls-1" d="M643.86,117.56c-.57,0-1.13.12-1.69.37-.55.24-1.18.65-1.9,1.22v-1.59h-1.81v10.76h1.81v-7.64c.48-.39.98-.71,1.5-.95.52-.25,1.06-.38,1.62-.38.35,0,.65.02.9.05.26.03.52.07.79.14h.1v-1.86c-.28-.05-.49-.07-.64-.09-.14-.02-.37-.03-.68-.03Z"/>
                        <path class="cls-1" d="M901.83,114.47h-1.81v3.09h-1.22v1.52h1.22v5.72c0,1.3.29,2.25.86,2.84.57.59,1.41.89,2.5.89.32,0,.67-.03,1.07-.09.4-.06.78-.13,1.12-.22v-1.63h-.1c-.14.06-.37.13-.69.22-.32.08-.63.12-.92.12-.51,0-.89-.06-1.14-.17-.24-.12-.44-.31-.58-.57-.15-.28-.24-.57-.27-.89-.03-.32-.04-.76-.04-1.33v-4.9h3.74v-1.52h-3.74v-3.09Z"/>
                        <path class="cls-1" d="M587.43,122.7c0,.7-.05,1.29-.16,1.76-.1.47-.28.89-.53,1.25-.29.42-.67.74-1.16.95-.48.21-1.07.31-1.75.31s-1.26-.11-1.75-.32c-.48-.21-.86-.53-1.15-.94-.25-.37-.43-.77-.54-1.22-.1-.45-.15-1.06-.15-1.84v-8.68h-1.91v8.58c0,1.09.11,2,.34,2.74.23.74.61,1.38,1.13,1.91.46.46,1.02.81,1.68,1.05.67.24,1.45.36,2.35.36s1.65-.11,2.31-.34c.66-.22,1.24-.58,1.73-1.07.52-.51.89-1.16,1.12-1.93.23-.78.35-1.69.35-2.73v-8.58h-1.91v8.73Z"/>
                        <path class="cls-1" d="M608.94,115.11c-.57-.35-1.27-.63-2.1-.83-.82-.21-1.93-.31-3.33-.31h-3.58v14.34h3.62c1.32,0,2.38-.09,3.18-.27.81-.18,1.54-.47,2.2-.88.94-.58,1.7-1.41,2.26-2.47.57-1.06.86-2.24.86-3.54,0-1.39-.27-2.6-.82-3.61-.55-1.02-1.31-1.83-2.28-2.44ZM609.51,123.93c-.35.74-.89,1.34-1.6,1.8-.57.37-1.2.62-1.89.75-.68.14-1.48.2-2.4.2h-1.79v-11.07h1.79c.89,0,1.65.06,2.28.19.64.12,1.24.34,1.8.66.78.44,1.36,1.05,1.75,1.82.39.77.59,1.72.59,2.84s-.18,2.05-.54,2.79Z"/>
                        <path class="cls-1" d="M678.93,114.47h-1.81v3.09h-1.22v1.52h1.22v5.72c0,1.3.28,2.25.86,2.84s1.41.89,2.51.89c.31,0,.67-.03,1.07-.09.4-.06.78-.13,1.12-.22v-1.63h-.1c-.14.06-.37.13-.69.22-.32.08-.63.12-.92.12-.51,0-.89-.06-1.14-.17-.24-.12-.44-.31-.58-.57-.15-.28-.24-.57-.27-.89-.03-.32-.04-.76-.04-1.33v-4.9h3.74v-1.52h-3.74v-3.09Z"/>
                        <rect class="cls-1" x="646.91" y="117.56" width="1.81" height="10.76"/>
                        <path class="cls-1" d="M694.48,117.26c-1.52,0-2.73.51-3.63,1.53-.89,1.01-1.34,2.4-1.34,4.15s.45,3.14,1.34,4.15c.9,1.02,2.11,1.52,3.63,1.52s2.71-.51,3.61-1.52c.9-1.01,1.35-2.4,1.35-4.15s-.45-3.14-1.35-4.15c-.9-1.02-2.1-1.53-3.61-1.53ZM696.75,126.03c-.54.69-1.3,1.03-2.26,1.03s-1.74-.35-2.28-1.04c-.55-.7-.82-1.72-.82-3.07s.27-2.43.81-3.1c.55-.68,1.31-1.02,2.29-1.02s1.73.34,2.27,1.02c.55.67.82,1.71.82,3.1s-.28,2.39-.83,3.08Z"/>
                        <rect class="cls-1" x="684.76" y="113.88" width="2.04" height="1.88"/>
                        <path class="cls-1" d="M707.68,117.26c-.64,0-1.26.13-1.86.39-.6.26-1.19.63-1.75,1.1v-1.2h-1.81v10.76h1.81v-8.03c.5-.38,1.01-.69,1.55-.93.54-.24,1.06-.37,1.55-.37s.87.07,1.17.2c.3.13.53.33.69.6.15.24.26.58.32,1.02.06.43.09.89.09,1.39v6.13h1.81v-6.98c0-1.32-.3-2.32-.92-3.02-.61-.7-1.5-1.05-2.66-1.05Z"/>
                        <path class="cls-1" d="M754.35,117.26c-.71,0-1.36.14-1.93.4-.57.26-1.11.6-1.62,1.02v-5.35h-1.81v14.99h1.7l.11-.5c.44.24.89.44,1.35.58.46.15.99.22,1.6.22.66,0,1.26-.12,1.8-.38.55-.26,1.05-.64,1.5-1.15.43-.49.77-1.09,1.02-1.81.26-.72.39-1.53.39-2.43,0-1.78-.37-3.16-1.11-4.13-.73-.98-1.73-1.46-3.01-1.46ZM755.74,126.01c-.57.66-1.35.98-2.35.98-.47,0-.89-.05-1.26-.14-.37-.09-.81-.25-1.32-.48v-6.17c.46-.36.96-.65,1.5-.88.54-.23,1.07-.35,1.6-.35.94,0,1.63.33,2.05,1,.42.66.64,1.63.64,2.92,0,1.41-.29,2.44-.86,3.1Z"/>
                        <path class="cls-1" d="M743.62,125.59c-.48.38-1,.69-1.56.93-.55.24-1.06.37-1.53.37-.53,0-.93-.07-1.2-.19s-.5-.33-.67-.62c-.17-.28-.28-.61-.33-.99-.05-.39-.08-.86-.08-1.41v-6.13h-1.81v6.98c0,1.34.32,2.35.94,3.04.63.69,1.51,1.03,2.64,1.03.67,0,1.29-.13,1.85-.39.56-.26,1.14-.63,1.75-1.11v1.19h1.81v-10.76h-1.81v8.03Z"/>
                        <rect class="cls-1" x="684.88" y="117.56" width="1.81" height="10.76"/>
                        <path class="cls-1" d="M671.7,125.59c-.48.38-1,.69-1.56.93-.55.24-1.06.37-1.53.37-.53,0-.93-.07-1.2-.19s-.5-.33-.67-.62c-.17-.28-.28-.61-.33-.99-.05-.39-.08-.86-.08-1.41v-6.13h-1.81v6.98c0,1.34.31,2.35.94,3.04.63.69,1.51,1.03,2.64,1.03.68,0,1.29-.13,1.85-.39.56-.26,1.14-.63,1.75-1.11v1.19h1.81v-10.76h-1.81v8.03Z"/>
                        <path class="cls-1" d="M799.47,117.99c-.48-.25-.94-.43-1.38-.55-.44-.12-.94-.18-1.5-.18-.62,0-1.23.13-1.81.39-.58.26-1.08.63-1.52,1.12-.44.5-.8,1.11-1.06,1.82-.26.71-.39,1.52-.39,2.44,0,1.75.38,3.12,1.13,4.11.76.99,1.78,1.48,3.06,1.48.66,0,1.27-.12,1.84-.38.57-.25,1.11-.6,1.63-1.05v1.13h1.81v-14.99h-1.81v4.66ZM799.47,125.67c-.46.36-.95.65-1.47.89-.53.22-1.05.34-1.56.34-.96,0-1.66-.33-2.1-.99-.44-.67-.65-1.64-.65-2.92s.28-2.3.85-3.01c.57-.71,1.36-1.06,2.37-1.06.46,0,.88.04,1.26.12.39.08.82.23,1.31.45v6.17Z"/>
                        <rect class="cls-1" x="646.79" y="113.88" width="2.04" height="1.88"/>
                        <path class="cls-1" d="M820.55,120.48c.52-.7.78-1.57.78-2.6,0-.76-.15-1.39-.44-1.89-.29-.5-.69-.91-1.21-1.24-.46-.29-.98-.49-1.56-.6-.58-.11-1.3-.17-2.17-.17h-4.02v14.34h1.91v-5.7h2.69l4.8,5.7h2.48l-5.39-6.27c.91-.35,1.63-.88,2.15-1.57ZM815.76,121.03h-1.93v-5.41h2.24c.51,0,.96.04,1.34.11.38.07.71.2.98.39.33.22.57.49.71.81.15.31.22.68.22,1.09,0,.54-.07.99-.21,1.34-.14.35-.35.66-.64.93-.32.29-.7.49-1.15.6-.45.1-.98.15-1.58.15Z"/>
                        <path class="cls-1" d="M775.34,118.13c-.41-.3-.9-.51-1.46-.64-.56-.13-1.22-.19-1.98-.19-.65,0-1.31.06-1.97.17-.67.11-1.18.22-1.53.32v1.84h.1c.62-.24,1.23-.42,1.81-.54.59-.13,1.11-.19,1.59-.19.39,0,.77.03,1.13.08.36.05.67.15.92.3.27.15.48.37.62.64.15.27.22.61.22,1.02v.28c-1.05.05-2.04.13-2.96.23-.92.1-1.71.3-2.36.59-.65.29-1.15.69-1.5,1.2-.35.5-.52,1.16-.52,1.97,0,1,.34,1.81,1.01,2.46.67.64,1.5.96,2.47.96.53,0,.98-.05,1.38-.15.39-.1.74-.22,1.04-.37.26-.12.52-.27.79-.46.28-.2.49-.35.65-.46v1.15h1.8v-7.3c0-.69-.11-1.27-.32-1.74-.21-.47-.52-.85-.92-1.15ZM774.78,125.67c-.45.35-.94.65-1.46.9-.53.24-1.11.37-1.74.37-.77,0-1.33-.15-1.71-.46-.37-.32-.56-.78-.56-1.4,0-.55.16-.97.48-1.28.32-.32.74-.55,1.26-.69.44-.12,1.03-.21,1.77-.28.75-.06,1.4-.11,1.96-.15v3Z"/>
                        <path class="cls-1" d="M657.66,117.26c-.71,0-1.36.14-1.93.4-.57.26-1.11.6-1.62,1.02v-5.35h-1.81v14.99h1.7l.11-.5c.44.24.89.44,1.35.58.46.15.99.22,1.6.22.66,0,1.26-.12,1.8-.38.55-.26,1.05-.64,1.5-1.15.43-.49.77-1.09,1.02-1.81.26-.72.39-1.53.39-2.43,0-1.78-.37-3.16-1.11-4.13-.73-.98-1.73-1.46-3.01-1.46ZM659.04,126.01c-.57.66-1.35.98-2.35.98-.47,0-.89-.05-1.26-.14-.37-.09-.81-.25-1.32-.48v-6.17c.46-.36.96-.65,1.5-.88.54-.23,1.07-.35,1.6-.35.94,0,1.63.33,2.05,1,.42.66.64,1.63.64,2.92,0,1.41-.29,2.44-.86,3.1Z"/>
                        <path class="cls-1" d="M785.5,117.26c-.64,0-1.25.13-1.86.39-.6.26-1.19.63-1.75,1.1v-1.2h-1.81v10.76h1.81v-8.03c.49-.38,1.01-.69,1.55-.93.54-.24,1.06-.37,1.55-.37s.87.07,1.17.2c.3.13.53.33.69.6.15.24.26.58.32,1.02.06.43.09.89.09,1.39v6.13h1.81v-6.98c0-1.32-.3-2.32-.92-3.02-.61-.7-1.5-1.05-2.66-1.05Z"/>
                      </g>
                    </g>
                    <g id="Layer_2">
                      <g>
                        <path class="cls-2" d="M1086.35,302.39c-.97,0-1.74.29-2.32.86-.57.57-.9,1.28-.97,2.13h6.16c0-.95-.24-1.69-.72-2.21-.47-.52-1.18-.78-2.15-.78Z"/>
                        <path class="cls-2" d="M1051.25,268.54c-.43-.21-.88-.36-1.33-.43-.45-.08-1.13-.12-2.04-.12h-1.07v10.26h1.07c1.01,0,1.75-.04,2.22-.13.46-.09.92-.26,1.37-.51.77-.44,1.34-1.03,1.7-1.76.36-.74.54-1.65.54-2.74s-.2-2-.6-2.76c-.39-.77-1.01-1.37-1.86-1.81Z"/>
                        <path class="cls-2" d="M1056.76,306.73c-.52.15-.94.38-1.26.69-.32.31-.48.74-.48,1.28,0,.62.18,1.08.55,1.4.38.31.95.46,1.71.46.64,0,1.22-.12,1.74-.37.53-.25,1.02-.55,1.47-.9v-3c-.55.03-1.21.08-1.96.15-.74.06-1.33.16-1.77.28Z"/>
                        <path class="cls-2" d="M1033.49,302.53c-1.05,0-1.85.36-2.39,1.07-.55.71-.82,1.68-.82,2.93s.22,2.23.65,2.91c.45.67,1.14,1.01,2.08,1.01.53,0,1.06-.11,1.58-.34.53-.23,1.02-.53,1.48-.89v-6.09c-.5-.23-.95-.38-1.33-.47-.39-.09-.8-.14-1.25-.14Z"/>
                        <path class="cls-2" d="M1005.22,271.68c-.39-.42-.99-.63-1.82-.63-.76,0-1.39.2-1.88.6-.49.4-.77,1.03-.83,1.9h5.14c-.02-.83-.23-1.45-.62-1.87Z"/>
                        <path class="cls-2" d="M1068.7,271.68c-.39-.42-.99-.63-1.82-.63-.76,0-1.39.2-1.88.6-.49.4-.77,1.03-.82,1.9h5.14c-.03-.83-.23-1.45-.62-1.87Z"/>
                        <path class="cls-2" d="M997.63,302.39c-.97,0-1.74.29-2.32.86-.57.57-.9,1.28-.97,2.13h6.16c0-.95-.25-1.69-.72-2.21-.47-.52-1.18-.78-2.15-.78Z"/>
                        <path class="cls-2" d="M1007.84,306.73c-.52.15-.94.38-1.26.69-.32.31-.48.74-.48,1.28,0,.62.19,1.08.56,1.4.37.31.94.46,1.71.46.64,0,1.22-.12,1.74-.37.53-.25,1.01-.55,1.46-.9v-3c-.55.03-1.2.08-1.96.15-.74.06-1.34.16-1.77.28Z"/>
                        <path class="cls-2" d="M1021.21,302.55c-1.02,0-1.8.35-2.37,1.06-.57.71-.85,1.71-.85,3.01s.22,2.25.66,2.92c.44.66,1.14.99,2.1.99.51,0,1.04-.11,1.56-.34.53-.23,1.02-.53,1.48-.89v-6.17c-.49-.22-.93-.37-1.31-.45-.39-.08-.81-.12-1.27-.12Z"/>
                        <path class="cls-2" d="M1197.18,239h-198.69c-27.63,0-50.02,22.4-50.02,50.02h0c0,27.63,22.4,50.03,50.02,50.03h198.69c27.63,0,50.02-22.4,50.02-50.02h0c0-27.63-22.4-50.03-50.02-50.03ZM1099.72,264.19h4.19v3.01h-4.19v-3.01ZM1103.8,268.96v12.36h-3.97v-12.36h3.97ZM1062.05,270.37c1.26-1.2,2.97-1.79,5.15-1.79,2.01,0,3.53.51,4.54,1.53,1.01,1.01,1.52,2.47,1.52,4.38v1.39h-9.07c.06.97.42,1.71,1.1,2.22.68.51,1.68.77,3,.77.84,0,1.65-.15,2.44-.45.78-.3,1.4-.62,1.86-.97h.44v3.18c-.9.36-1.74.62-2.54.78-.79.16-1.66.24-2.63.24-2.48,0-4.38-.56-5.7-1.67-1.32-1.12-1.98-2.71-1.98-4.77s.62-3.65,1.87-4.84ZM998.57,270.37c1.26-1.2,2.97-1.79,5.15-1.79,2.01,0,3.52.51,4.54,1.53,1.01,1.01,1.52,2.47,1.52,4.38v1.39h-9.07c.06.97.42,1.71,1.1,2.22.68.51,1.68.77,3.01.77.84,0,1.65-.15,2.43-.45.78-.3,1.41-.62,1.86-.97h.44v3.18c-.9.36-1.74.62-2.53.78-.79.16-1.67.24-2.63.24-2.48,0-4.38-.56-5.7-1.67-1.32-1.12-1.98-2.71-1.98-4.77s.62-3.65,1.87-4.84ZM989.54,311.96h-1.91v-7.02h-7.16v7.02h-1.91v-14.34h1.91v5.63h7.16v-5.63h1.91v14.34ZM982.61,270.07v11.25h-3.88v-16.39h5.05l5.98,9.39v-9.39h3.88v16.39h-4.07l-6.96-11.25ZM1002.27,306.76h-7.93c0,.66.1,1.24.3,1.73.2.49.47.89.82,1.2.33.31.73.54,1.19.69.46.15.97.23,1.52.23.73,0,1.47-.15,2.21-.43.74-.29,1.28-.58,1.59-.87h.1v1.97c-.61.26-1.23.47-1.87.65-.64.17-1.3.26-2,.26-1.78,0-3.18-.48-4.18-1.45-1-.97-1.5-2.34-1.5-4.12s.48-3.16,1.43-4.19c.96-1.03,2.23-1.55,3.79-1.55,1.45,0,2.57.42,3.35,1.27.79.85,1.18,2.05,1.18,3.61v.98ZM1013.37,311.96h-1.8v-1.15c-.16.11-.38.26-.66.46-.27.19-.53.35-.79.46-.3.15-.65.27-1.04.37-.39.1-.85.15-1.38.15-.97,0-1.79-.32-2.47-.96-.67-.64-1.01-1.46-1.01-2.46,0-.82.17-1.47.52-1.97.35-.51.85-.91,1.5-1.19.66-.29,1.44-.48,2.36-.59.92-.1,1.9-.18,2.96-.23v-.28c0-.41-.07-.75-.22-1.02-.14-.27-.35-.48-.62-.64-.26-.15-.57-.25-.92-.3-.36-.05-.73-.08-1.13-.08-.47,0-1.01.07-1.59.19-.59.12-1.19.3-1.81.54h-.1v-1.84c.35-.1.86-.2,1.53-.32.67-.12,1.33-.17,1.97-.17.76,0,1.42.06,1.97.19.57.12,1.05.33,1.47.64.4.29.71.68.92,1.15.21.47.32,1.05.32,1.74v7.3ZM1011.2,268.96h4.16l2.11,8.52,2.64-8.52h3.51l2.51,8.52,2.08-8.52h4.07l-3.83,12.36h-4.2l-2.52-8.33-2.48,8.33h-4.26l-3.8-12.36ZM1025.59,311.96h-1.81v-1.13c-.52.45-1.07.8-1.63,1.05-.57.25-1.18.38-1.84.38-1.28,0-2.31-.49-3.06-1.48-.75-.99-1.13-2.36-1.13-4.11,0-.91.13-1.72.39-2.44.26-.71.62-1.32,1.06-1.82.44-.49.94-.86,1.52-1.12.58-.26,1.19-.38,1.81-.38.56,0,1.06.06,1.5.18.44.11.9.3,1.38.55v-4.66h1.81v14.99ZM1037.88,315.92h-1.81v-5.18c-.56.48-1.12.84-1.67,1.08-.55.23-1.15.35-1.79.35-1.28,0-2.3-.49-3.06-1.47-.76-.99-1.14-2.35-1.14-4.08,0-.92.13-1.74.4-2.45.26-.71.62-1.31,1.05-1.79.43-.47.93-.83,1.5-1.09.57-.26,1.17-.38,1.81-.38.58,0,1.09.06,1.53.19.45.13.91.32,1.37.57l.11-.46h1.7v14.73ZM1050.36,311.96h-1.81v-1.19c-.61.48-1.19.85-1.75,1.11-.56.26-1.18.39-1.85.39-1.13,0-2.01-.34-2.64-1.03-.63-.69-.94-1.71-.94-3.04v-6.98h1.81v6.13c0,.55.02,1.02.07,1.41.06.39.17.72.33.99.18.28.4.49.68.62.27.13.67.19,1.2.19.47,0,.98-.12,1.53-.37.56-.24,1.08-.56,1.56-.93v-8.03h1.81v10.76ZM1048.37,281.32h-5.78v-16.39h5.94c1.34,0,2.49.11,3.46.34.97.22,1.78.53,2.44.95,1.13.69,2.02,1.62,2.67,2.8.65,1.17.98,2.54.98,4.13s-.35,2.89-1.05,4.11c-.7,1.2-1.58,2.13-2.64,2.78-.8.48-1.68.82-2.63,1.01-.96.19-2.09.29-3.39.29ZM1062.29,311.96h-1.8v-1.15c-.16.11-.38.26-.66.46-.27.19-.53.35-.79.46-.3.15-.65.27-1.04.37-.39.1-.85.15-1.38.15-.96,0-1.79-.32-2.46-.96-.68-.64-1.01-1.46-1.01-2.46,0-.82.17-1.47.52-1.97.35-.51.85-.91,1.5-1.19.66-.29,1.44-.48,2.36-.59.92-.1,1.9-.18,2.96-.23v-.28c0-.41-.08-.75-.22-1.02-.15-.27-.35-.48-.62-.64-.26-.15-.57-.25-.93-.3-.35-.05-.73-.08-1.12-.08-.48,0-1.01.07-1.59.19-.59.12-1.19.3-1.81.54h-.1v-1.84c.35-.1.86-.2,1.53-.32.67-.12,1.33-.17,1.98-.17.76,0,1.41.06,1.97.19.57.12,1.06.33,1.47.64.4.29.71.68.92,1.15.21.47.32,1.05.32,1.74v7.3ZM1072.49,303.17h-.1c-.27-.06-.53-.11-.79-.13-.25-.03-.55-.05-.89-.05-.56,0-1.1.12-1.62.38-.52.24-1.02.56-1.5.95v7.64h-1.81v-10.76h1.81v1.59c.72-.58,1.35-.99,1.89-1.22.56-.24,1.12-.37,1.69-.37.32,0,.54.01.68.03.15.01.36.04.64.09v1.86ZM1079.78,302.72h-3.74v4.9c0,.57.02,1.01.04,1.33.03.31.12.61.27.89.14.26.34.45.58.57.25.12.63.17,1.14.17.29,0,.6-.04.92-.12.32-.09.55-.16.7-.22h.09v1.63c-.34.09-.71.16-1.12.22-.39.06-.75.09-1.06.09-1.1,0-1.94-.29-2.51-.89s-.86-1.54-.86-2.84v-5.72h-1.22v-1.52h1.22v-3.09h1.81v3.09h3.74v1.52ZM1080.02,281.32h-3.97v-17.13h3.97v17.13ZM1090.99,306.76h-7.93c0,.66.1,1.24.3,1.73.2.49.47.89.81,1.2.34.31.73.54,1.19.69.46.15.97.23,1.52.23.73,0,1.47-.15,2.21-.43.74-.29,1.27-.58,1.59-.87h.09v1.97c-.61.26-1.23.47-1.87.65-.63.17-1.3.26-2,.26-1.78,0-3.18-.48-4.18-1.45-1-.97-1.5-2.34-1.5-4.12s.48-3.16,1.43-4.19c.97-1.03,2.23-1.55,3.8-1.55,1.45,0,2.57.42,3.35,1.27.79.85,1.19,2.05,1.19,3.61v.98ZM1092.12,273.7c-.05-.5-.14-.87-.27-1.1-.14-.27-.36-.47-.65-.6-.28-.12-.67-.19-1.18-.19-.35,0-.72.06-1.1.18-.36.12-.76.3-1.2.56v8.76h-3.96v-17.13h3.96v6.13c.71-.55,1.38-.97,2.03-1.27.65-.29,1.38-.44,2.17-.44,1.33,0,2.38.39,3.12,1.17.76.78,1.14,1.94,1.14,3.49v8.05h-3.99v-6.13c0-.5-.02-.99-.07-1.49ZM1100.44,303.17h-.09c-.27-.06-.53-.11-.79-.13-.25-.03-.55-.05-.9-.05-.56,0-1.1.12-1.62.38-.52.24-1.02.56-1.5.95v7.64h-1.81v-10.76h1.81v1.59c.72-.58,1.35-.99,1.9-1.22.55-.24,1.11-.37,1.69-.37.31,0,.54.01.68.03.14.01.35.04.63.09v1.86ZM1108.61,311.27c-.81.63-1.91.94-3.32.94-.8,0-1.53-.09-2.2-.28-.66-.19-1.21-.4-1.66-.63v-2.03h.09c.58.43,1.21.77,1.91,1.03.7.25,1.37.38,2.01.38.8,0,1.42-.13,1.87-.39.45-.26.68-.66.68-1.21,0-.42-.12-.74-.37-.96-.24-.22-.71-.4-1.41-.56-.25-.06-.59-.13-1.01-.2-.41-.08-.78-.16-1.12-.25-.95-.25-1.62-.62-2.02-1.1-.39-.49-.58-1.09-.58-1.79,0-.44.09-.86.27-1.25.18-.39.46-.74.83-1.05.36-.3.82-.54,1.37-.71.56-.18,1.18-.27,1.87-.27.64,0,1.29.08,1.95.24.66.15,1.21.34,1.64.57v1.94h-.09c-.47-.34-1.03-.63-1.69-.86-.66-.24-1.31-.36-1.94-.36-.67,0-1.23.13-1.68.39-.46.25-.68.63-.68,1.13,0,.44.13.78.41,1,.27.22.71.41,1.31.55.33.08.71.15,1.12.23.41.08.76.15,1.04.21.84.19,1.49.52,1.94.99.46.48.69,1.1.69,1.89,0,.98-.41,1.79-1.23,2.42ZM1108.51,285.39h-2.46l2.17-8.4h4.25l-3.96,8.4ZM1132.48,267.83h-2.69v10.58h2.69v2.91h-9.6v-2.91h2.68v-10.58h-2.68v-2.91h9.6v2.91ZM1148.12,281.32h-3.99v-6.13c0-.5-.02-.99-.07-1.49-.05-.5-.14-.87-.27-1.1-.14-.27-.36-.47-.65-.6-.28-.12-.67-.19-1.17-.19-.36,0-.73.06-1.11.18-.36.12-.76.3-1.2.56v8.76h-3.96v-12.36h3.96v1.36c.71-.55,1.38-.97,2.03-1.27.65-.29,1.38-.44,2.17-.44,1.33,0,2.38.39,3.13,1.17s1.13,1.94,1.13,3.49v8.05ZM1163.8,281.32h-3.97v-1.29c-.68.56-1.32.97-1.91,1.23-.6.26-1.28.4-2.06.4-1.51,0-2.71-.58-3.61-1.74-.91-1.16-1.36-2.72-1.36-4.69,0-1.05.15-1.98.45-2.79.31-.81.73-1.51,1.26-2.09.5-.55,1.1-.98,1.82-1.28.71-.31,1.42-.46,2.13-.46s1.35.08,1.82.24c.48.15.96.35,1.46.59v-5.26h3.97v17.13ZM1171.5,281.32h-3.96v-12.36h3.96v12.36ZM1171.61,267.2h-4.18v-3.01h4.18v3.01ZM1186.66,281.32h-3.93v-1.31c-.21.16-.48.36-.79.58-.32.23-.61.41-.89.54-.39.18-.8.3-1.21.39-.42.09-.88.13-1.38.13-1.17,0-2.16-.36-2.95-1.09-.79-.73-1.19-1.66-1.19-2.79,0-.9.2-1.64.61-2.21.4-.57.97-1.02,1.71-1.35.74-.33,1.65-.57,2.73-.71,1.09-.14,2.22-.24,3.38-.31v-.07c0-.68-.28-1.15-.83-1.41-.56-.26-1.38-.4-2.47-.4-.65,0-1.35.12-2.09.35-.74.23-1.27.4-1.6.53h-.36v-2.98c.42-.11,1.1-.24,2.04-.39.94-.15,1.89-.23,2.84-.23,2.25,0,3.88.35,4.87,1.05,1.01.69,1.51,1.78,1.51,3.26v8.41Z"/>
                        <path class="cls-2" d="M1158.1,271.51c-1.04,0-1.82.33-2.34.98-.52.65-.78,1.54-.78,2.7,0,1.21.21,2.09.63,2.64.41.54,1.09.81,2.01.81.36,0,.74-.07,1.15-.2.4-.14.75-.32,1.06-.54v-6.07c-.28-.12-.57-.2-.88-.25-.31-.05-.59-.08-.85-.08Z"/>
                        <path class="cls-2" d="M1179.57,275.97c-.39.12-.7.31-.91.55-.21.24-.31.55-.31.93,0,.26.02.47.07.63.04.16.15.32.33.46.17.15.37.26.6.33.24.07.6.1,1.1.1.4,0,.8-.08,1.2-.24.41-.16.77-.38,1.08-.64v-2.58c-.53.04-1.11.11-1.74.19-.62.07-1.1.16-1.42.26Z"/>
                        <path class="cls-1" d="M1159.83,269.45c-.5-.24-.98-.44-1.46-.59-.47-.16-1.08-.24-1.82-.24s-1.42.15-2.13.46c-.72.3-1.32.73-1.82,1.28-.53.58-.95,1.28-1.26,2.09-.3.81-.45,1.74-.45,2.79,0,1.97.45,3.53,1.36,4.69.9,1.16,2.1,1.74,3.61,1.74.78,0,1.46-.13,2.06-.4.59-.27,1.23-.68,1.91-1.23v1.29h3.97v-17.13h-3.97v5.26ZM1159.83,277.91c-.31.22-.66.4-1.06.54-.41.13-.79.2-1.15.2-.92,0-1.6-.27-2.01-.81-.42-.55-.63-1.43-.63-2.64s.26-2.05.78-2.7c.52-.65,1.3-.98,2.34-.98.26,0,.54.03.85.08.31.05.6.13.88.25v6.07Z"/>
                        <path class="cls-1" d="M998.68,279.98c1.32,1.11,3.22,1.67,5.7,1.67.96,0,1.84-.08,2.63-.24.79-.16,1.64-.42,2.53-.78v-3.18h-.44c-.46.35-1.08.67-1.86.97-.79.3-1.6.45-2.43.45-1.32,0-2.32-.26-3.01-.77-.68-.51-1.04-1.26-1.1-2.22h9.07v-1.39c0-1.91-.51-3.37-1.52-4.38-1.01-1.02-2.53-1.53-4.54-1.53-2.18,0-3.9.6-5.15,1.79-1.25,1.19-1.87,2.8-1.87,4.84s.66,3.65,1.98,4.77ZM1001.52,271.64c.49-.4,1.12-.6,1.88-.6.82,0,1.43.21,1.82.63.39.42.59,1.04.62,1.87h-5.14c.06-.87.33-1.51.83-1.9Z"/>
                        <path class="cls-1" d="M1057.03,277.25c.7-1.21,1.05-2.58,1.05-4.11s-.33-2.96-.98-4.13c-.65-1.17-1.54-2.11-2.67-2.8-.66-.41-1.47-.73-2.44-.95-.97-.23-2.12-.34-3.46-.34h-5.94v16.39h5.78c1.3,0,2.43-.1,3.39-.29.95-.19,1.83-.53,2.63-1.01,1.06-.65,1.94-1.57,2.64-2.78ZM1053.17,275.85c-.36.73-.93,1.32-1.7,1.76-.45.24-.91.41-1.37.51-.47.09-1.21.13-2.22.13h-1.07v-10.26h1.07c.91,0,1.59.04,2.04.12.45.07.9.22,1.33.43.85.43,1.47,1.04,1.86,1.81.4.76.6,1.68.6,2.76s-.18,2-.54,2.74Z"/>
                        <rect class="cls-1" x="1167.43" y="264.19" width="4.18" height="3.01"/>
                        <path class="cls-1" d="M1143.86,268.61c-.79,0-1.52.15-2.17.44-.65.29-1.32.72-2.03,1.27v-1.36h-3.96v12.36h3.96v-8.76c.44-.26.84-.44,1.2-.56.38-.12.75-.18,1.11-.18.5,0,.89.06,1.17.19.29.12.51.32.65.6.13.23.22.6.27,1.1.05.49.07.99.07,1.49v6.13h3.99v-8.05c0-1.55-.38-2.71-1.13-3.49s-1.8-1.17-3.13-1.17Z"/>
                        <rect class="cls-1" x="1167.54" y="268.96" width="3.96" height="12.36"/>
                        <polygon class="cls-1" points="1021.74 272.99 1024.26 281.32 1028.46 281.32 1032.29 268.96 1028.22 268.96 1026.14 277.48 1023.63 268.96 1020.12 268.96 1017.48 277.48 1015.36 268.96 1011.2 268.96 1015 281.32 1019.26 281.32 1021.74 272.99"/>
                        <polygon class="cls-1" points="993.64 264.93 989.77 264.93 989.77 274.32 983.79 264.93 978.74 264.93 978.74 281.32 982.61 281.32 982.61 270.07 989.57 281.32 993.64 281.32 993.64 264.93"/>
                        <rect class="cls-1" x="1099.83" y="268.96" width="3.97" height="12.36"/>
                        <path class="cls-1" d="M1096.18,281.32v-8.05c0-1.55-.38-2.71-1.14-3.49-.74-.78-1.79-1.17-3.12-1.17-.79,0-1.52.15-2.17.44-.65.29-1.32.72-2.03,1.27v-6.13h-3.96v17.13h3.96v-8.76c.44-.26.84-.44,1.2-.56.38-.12.75-.18,1.1-.18.51,0,.9.06,1.18.19.29.12.51.32.65.6.13.23.22.6.27,1.1.05.49.07.99.07,1.49v6.13h3.99Z"/>
                        <polygon class="cls-1" points="1106.05 285.39 1108.51 285.39 1112.47 276.99 1108.22 276.99 1106.05 285.39"/>
                        <rect class="cls-1" x="1099.72" y="264.19" width="4.19" height="3.01"/>
                        <polygon class="cls-1" points="1122.88 267.83 1125.56 267.83 1125.56 278.41 1122.88 278.41 1122.88 281.32 1132.48 281.32 1132.48 278.41 1129.79 278.41 1129.79 267.83 1132.48 267.83 1132.48 264.93 1122.88 264.93 1122.88 267.83"/>
                        <path class="cls-1" d="M1062.16,279.98c1.32,1.11,3.22,1.67,5.7,1.67.97,0,1.84-.08,2.63-.24.8-.16,1.64-.42,2.54-.78v-3.18h-.44c-.46.35-1.08.67-1.86.97-.79.3-1.6.45-2.44.45-1.32,0-2.32-.26-3-.77-.68-.51-1.04-1.26-1.1-2.22h9.07v-1.39c0-1.91-.51-3.37-1.52-4.38-1.01-1.02-2.53-1.53-4.54-1.53-2.18,0-3.89.6-5.15,1.79-1.25,1.19-1.87,2.8-1.87,4.84s.66,3.65,1.98,4.77ZM1065,271.64c.49-.4,1.12-.6,1.88-.6.83,0,1.43.21,1.82.63.39.42.59,1.04.62,1.87h-5.14c.05-.87.33-1.51.82-1.9Z"/>
                        <path class="cls-1" d="M1185.15,269.65c-.99-.7-2.62-1.05-4.87-1.05-.95,0-1.9.08-2.84.23-.94.15-1.62.28-2.04.39v2.98h.36c.33-.12.86-.3,1.6-.53.74-.23,1.44-.35,2.09-.35,1.09,0,1.91.13,2.47.4.55.26.83.73.83,1.41v.07c-1.16.07-2.29.17-3.38.31-1.08.14-1.99.38-2.73.71-.74.33-1.31.78-1.71,1.35-.41.57-.61,1.31-.61,2.21,0,1.13.4,2.06,1.19,2.79.79.73,1.78,1.09,2.95,1.09.5,0,.96-.04,1.38-.13.41-.08.82-.21,1.21-.39.28-.13.57-.31.89-.54.31-.23.58-.42.79-.58v1.31h3.93v-8.41c0-1.48-.5-2.57-1.51-3.26ZM1182.73,278.09c-.31.26-.67.48-1.08.64-.4.16-.8.24-1.2.24-.5,0-.86-.03-1.1-.1-.23-.07-.43-.18-.6-.33-.18-.15-.29-.3-.33-.46-.05-.16-.07-.37-.07-.63,0-.39.1-.7.31-.93.21-.24.52-.43.91-.55.32-.1.8-.19,1.42-.26.63-.08,1.21-.14,1.74-.19v2.58Z"/>
                        <rect class="cls-1" x="1076.05" y="264.19" width="3.97" height="17.13"/>
                        <polygon class="cls-1" points="987.63 303.24 980.48 303.24 980.48 297.61 978.57 297.61 978.57 311.96 980.48 311.96 980.48 304.93 987.63 304.93 987.63 311.96 989.54 311.96 989.54 297.61 987.63 297.61 987.63 303.24"/>
                        <path class="cls-1" d="M997.73,300.9c-1.57,0-2.83.52-3.79,1.55-.96,1.03-1.43,2.43-1.43,4.19s.5,3.15,1.5,4.12c1,.96,2.4,1.45,4.18,1.45.7,0,1.37-.09,2-.26.64-.17,1.26-.39,1.87-.65v-1.97h-.1c-.31.28-.84.57-1.59.87-.74.29-1.47.43-2.21.43-.55,0-1.06-.08-1.52-.23-.46-.15-.85-.39-1.19-.69-.35-.32-.62-.72-.82-1.2-.2-.49-.3-1.07-.3-1.73h7.93v-.98c0-1.56-.4-2.77-1.18-3.61-.78-.85-1.9-1.27-3.35-1.27ZM994.34,305.38c.08-.85.4-1.56.97-2.13.58-.57,1.35-.86,2.32-.86s1.68.26,2.15.78c.48.52.72,1.26.72,2.21h-6.16Z"/>
                        <path class="cls-1" d="M1061.05,301.77c-.41-.3-.9-.51-1.47-.64-.56-.13-1.21-.19-1.97-.19-.65,0-1.31.06-1.98.17-.67.11-1.18.22-1.53.32v1.84h.1c.62-.24,1.22-.42,1.81-.54.58-.13,1.11-.19,1.59-.19.39,0,.77.03,1.12.08.36.05.67.15.93.3.27.15.47.37.62.64.14.27.22.61.22,1.02v.28c-1.06.05-2.04.13-2.96.23-.92.1-1.7.3-2.36.59-.65.29-1.15.69-1.5,1.19-.35.5-.52,1.16-.52,1.97,0,1,.33,1.81,1.01,2.46.67.64,1.5.96,2.46.96.53,0,.99-.05,1.38-.15.39-.1.74-.22,1.04-.37.26-.12.52-.27.79-.46.28-.2.5-.35.66-.46v1.15h1.8v-7.3c0-.69-.11-1.27-.32-1.74-.21-.47-.52-.85-.92-1.15ZM1060.49,309.31c-.45.35-.94.65-1.47.9-.52.24-1.1.37-1.74.37-.76,0-1.33-.15-1.71-.46-.37-.32-.55-.78-.55-1.4,0-.55.16-.97.48-1.28.32-.31.74-.55,1.26-.69.44-.12,1.03-.22,1.77-.28.75-.06,1.41-.11,1.96-.15v3Z"/>
                        <path class="cls-1" d="M1086.45,300.9c-1.57,0-2.83.52-3.8,1.55-.95,1.03-1.43,2.43-1.43,4.19s.5,3.15,1.5,4.12c1,.96,2.4,1.45,4.18,1.45.7,0,1.37-.09,2-.26.64-.17,1.26-.39,1.87-.65v-1.97h-.09c-.32.28-.85.57-1.59.87-.74.29-1.48.43-2.21.43-.55,0-1.06-.08-1.52-.23-.46-.15-.85-.39-1.19-.69-.34-.32-.61-.72-.81-1.2-.2-.49-.3-1.07-.3-1.73h7.93v-.98c0-1.56-.4-2.77-1.19-3.61-.78-.85-1.9-1.27-3.35-1.27ZM1083.06,305.38c.07-.85.4-1.56.97-2.13.58-.57,1.35-.86,2.32-.86s1.68.26,2.15.78c.48.52.72,1.26.72,2.21h-6.16Z"/>
                        <path class="cls-1" d="M1076.04,298.1h-1.81v3.09h-1.22v1.52h1.22v5.72c0,1.3.29,2.25.86,2.84s1.41.89,2.51.89c.31,0,.67-.03,1.06-.09.41-.06.78-.13,1.12-.22v-1.63h-.09c-.15.06-.38.13-.7.22-.32.08-.63.12-.92.12-.51,0-.89-.06-1.14-.17-.24-.12-.44-.31-.58-.57-.15-.28-.24-.57-.27-.89-.02-.32-.04-.76-.04-1.33v-4.9h3.74v-1.52h-3.74v-3.09Z"/>
                        <path class="cls-1" d="M1099.13,301.2c-.58,0-1.14.12-1.69.37-.55.24-1.18.65-1.9,1.22v-1.59h-1.81v10.76h1.81v-7.64c.48-.39.98-.71,1.5-.95.52-.25,1.06-.38,1.62-.38.35,0,.65.02.9.05.26.03.52.07.79.13h.09v-1.86c-.28-.05-.49-.07-.63-.09-.14-.02-.37-.03-.68-.03Z"/>
                        <path class="cls-1" d="M1012.13,301.77c-.41-.3-.9-.51-1.47-.64-.56-.13-1.22-.19-1.97-.19-.65,0-1.31.06-1.97.17-.67.11-1.18.22-1.53.32v1.84h.1c.62-.24,1.23-.42,1.81-.54.58-.13,1.11-.19,1.59-.19.39,0,.77.03,1.13.08.36.05.67.15.92.3.27.15.48.37.62.64.15.27.22.61.22,1.02v.28c-1.05.05-2.04.13-2.96.23-.92.1-1.71.3-2.36.59-.65.29-1.15.69-1.5,1.19-.35.5-.52,1.16-.52,1.97,0,1,.34,1.81,1.01,2.46.67.64,1.5.96,2.47.96.53,0,.99-.05,1.38-.15.39-.1.74-.22,1.04-.37.26-.12.52-.27.79-.46.28-.2.49-.35.66-.46v1.15h1.8v-7.3c0-.69-.11-1.27-.32-1.74-.21-.47-.52-.85-.92-1.15ZM1011.57,309.31c-.45.35-.94.65-1.46.9-.53.24-1.11.37-1.74.37-.76,0-1.33-.15-1.71-.46-.37-.32-.56-.78-.56-1.4,0-.55.16-.97.48-1.28.32-.31.74-.55,1.26-.69.44-.12,1.03-.22,1.77-.28.75-.06,1.4-.11,1.96-.15v3Z"/>
                        <path class="cls-1" d="M1107.21,305.97c-.28-.06-.63-.14-1.04-.21-.41-.08-.79-.15-1.12-.23-.6-.14-1.04-.32-1.31-.55-.28-.23-.41-.56-.41-1,0-.5.22-.88.68-1.13.45-.26,1.01-.39,1.68-.39.63,0,1.28.12,1.94.36.66.23,1.22.52,1.69.86h.09v-1.94c-.43-.22-.98-.41-1.64-.57-.66-.16-1.31-.24-1.95-.24-.69,0-1.31.09-1.87.27-.55.17-1.01.41-1.37.71-.37.31-.65.66-.83,1.05-.18.39-.27.81-.27,1.25,0,.71.19,1.3.58,1.79.4.48,1.07.85,2.02,1.1.34.09.71.17,1.12.25.42.08.76.15,1.01.2.7.15,1.17.34,1.41.56.25.22.37.54.37.96,0,.55-.23.96-.68,1.21-.45.26-1.07.39-1.87.39-.64,0-1.31-.13-2.01-.38-.7-.26-1.33-.6-1.91-1.03h-.09v2.03c.45.23,1,.43,1.66.63.67.19,1.4.28,2.2.28,1.41,0,2.51-.31,3.32-.94.82-.63,1.23-1.43,1.23-2.42,0-.78-.23-1.41-.69-1.89-.45-.47-1.1-.8-1.94-.99Z"/>
                        <path class="cls-1" d="M1036.07,301.66c-.46-.25-.92-.44-1.37-.57-.44-.13-.95-.19-1.53-.19-.64,0-1.24.13-1.81.38-.57.26-1.07.62-1.5,1.09-.43.48-.79,1.08-1.05,1.79-.27.71-.4,1.52-.4,2.45,0,1.73.38,3.09,1.14,4.08.76.98,1.78,1.47,3.06,1.47.64,0,1.24-.11,1.79-.35.55-.24,1.11-.6,1.67-1.08v5.18h1.81v-14.73h-1.7l-.11.46ZM1036.07,309.22c-.46.36-.95.65-1.48.89-.52.22-1.05.34-1.58.34-.94,0-1.63-.34-2.08-1.01-.43-.68-.65-1.65-.65-2.91s.27-2.22.82-2.93c.54-.71,1.34-1.07,2.39-1.07.45,0,.86.04,1.25.14.38.09.83.25,1.33.47v6.09Z"/>
                        <path class="cls-1" d="M1023.78,301.63c-.48-.25-.94-.43-1.38-.55-.44-.12-.94-.18-1.5-.18-.62,0-1.23.13-1.81.38-.58.26-1.09.63-1.52,1.12-.44.5-.8,1.11-1.06,1.82-.26.71-.39,1.52-.39,2.44,0,1.75.38,3.12,1.13,4.11.76.99,1.78,1.48,3.06,1.48.66,0,1.27-.12,1.84-.38.56-.25,1.11-.6,1.63-1.05v1.13h1.81v-14.99h-1.81v4.66ZM1023.78,309.31c-.46.36-.95.65-1.48.89-.52.22-1.04.34-1.56.34-.96,0-1.66-.33-2.1-.99-.44-.67-.66-1.64-.66-2.92s.28-2.3.85-3.01c.57-.71,1.35-1.06,2.37-1.06.46,0,.88.04,1.27.12.38.08.82.23,1.31.45v6.17Z"/>
                        <path class="cls-1" d="M1071.17,301.2c-.57,0-1.13.12-1.69.37-.54.24-1.17.65-1.89,1.22v-1.59h-1.81v10.76h1.81v-7.64c.48-.39.98-.71,1.5-.95.52-.25,1.06-.38,1.62-.38.34,0,.64.02.89.05.26.03.52.07.79.13h.1v-1.86c-.28-.05-.49-.07-.64-.09-.14-.02-.36-.03-.68-.03Z"/>
                        <path class="cls-1" d="M1048.55,309.23c-.48.38-1,.69-1.56.93-.55.24-1.06.37-1.53.37-.53,0-.93-.07-1.2-.19-.28-.13-.5-.33-.68-.62-.16-.28-.27-.61-.33-.99-.05-.39-.07-.86-.07-1.41v-6.13h-1.81v6.98c0,1.34.31,2.35.94,3.04.63.69,1.51,1.03,2.64,1.03.67,0,1.29-.13,1.85-.39.56-.26,1.14-.63,1.75-1.11v1.19h1.81v-10.76h-1.81v8.03Z"/>
                      </g>
                    </g>
                  </svg>
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

<script>
    if ($("#faqAccordion").length) {
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
</script>