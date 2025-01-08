<?php get_header(); ?>

<section class="resDetailBannerSec">
    <div class="secWrapper">
        <div class="backBtn">
            <a href="<?php echo esc_url(get_post_type_archive_link('news-post')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/left-arrow-gray.svg" alt="Back" />Back
            </a>
        </div>
        <div class="secHeading">
            <h1><?php the_title(); ?></h1>
            <?php if (have_rows('banner_section')) : ?>
            <?php while (have_rows('banner_section')) : the_row(); ?>
                <div class="imgBox">
                    <?php 
                    $desktop_image = get_sub_field('desktop_image');
                    $mobile_image = get_sub_field('mobile_image');
                    ?>
                    
                    <?php if ($desktop_image): ?>
                        <img src="<?php echo esc_url($desktop_image['url']); ?>" 
                             alt="<?php echo esc_attr($desktop_image['alt']); ?>" 
                             class="desktop">
                    <?php endif; ?>
        
                    <?php if ($mobile_image): ?>
                        <img src="<?php echo esc_url($mobile_image['url']); ?>" 
                             alt="<?php echo esc_attr($mobile_image['alt']); ?>" 
                             class="mbl">
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No banner images available.</p>
        <?php endif; ?>        
        </div>
    </div>
</section>

<section class="resDetailContentSec">
    <div class="secWrapper">
        <div class="contentBox hideTxt">
            <?php the_content(); ?>
        </div>
        <div class="readMoreBtnBox">
            <button class="ctaWhiteBlack" id="readMore">Read more</button>
        </div>
    </div>
</section>

<section class="relatedPostSec">
    <div class="secWrapper">
        <div class="secHeading">
            <h2><?php the_field('related_post_heading'); ?></h2>
        </div>
        <div class="cardContainer postCardSlider">
            <?php 
            $related_posts = get_field('related_posts'); 
            if ($related_posts): 
                foreach ($related_posts as $post): 
                    setup_postdata($post); 
            ?>
                <div class="blogCard">
                    <a href="<?php the_permalink(); ?>">
                        <div class="imgBox">
                            <?php if (has_post_thumbnail()): the_post_thumbnail('medium'); endif; ?>
                        </div>
                        <div class="contentBox">
                            <div class="content">
                                <span><?php echo esc_html(get_post_type()); ?></span>
                                <p><?php echo wp_trim_words(get_the_content(), 40, "..."); ?></p>
                                <ul>
                                    <li><?php echo get_the_date('d M Y'); ?></li>
                                    <li><?php echo estimate_reading_time(get_the_ID()); ?> mins read</li>
                                </ul>
                            </div>
                            <div class="arrowBox">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/black-cta-arrow.svg" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<div class="backtopCl" id="backtop">
    <a href="#">
        <img src="<?php echo get_template_directory_uri(); ?>/images/top-double-up-arrow.svg" alt="Back to top" class="desktop" />
    </a>
</div>

<?php get_footer(); ?>
