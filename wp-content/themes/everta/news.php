<?php get_header(); /*Template name: News*/ ?>

<Section class="resourcesBanner">
    <?php if (have_rows('resources_banner')) : ?>
    <?php while (have_rows('resources_banner')) : the_row(); ?>
    <div class="resorucesBannerWrapper">
        <h1><?php echo get_sub_field('banner_heading'); ?></h1>
        <p><?php echo get_sub_field('banner_subheading'); ?></p>
        <div class="resourcesTabs">
            <div class="resourcesTabWrapper">
                <?php if (have_rows('resources_tabs')) : ?>
                    <?php 
                    $count = 0;
                    while (have_rows('resources_tabs')) : the_row(); 
                    ?>
                    <?php 
                    $tab_link = get_sub_field('tab_link');
                    $tab_text = get_sub_field('tab_text');
                    
                    if ($tab_link && $tab_text) : ?>
                        <a href="<?php echo $tab_link; ?>" 
                           class="<?php echo ($count == 0) ? 'active' : ''; ?>">
                            <?php echo $tab_text; ?>
                        </a>
                    <?php endif; ?>                    
                    <?php 
                    $count++;
                    endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="searchWrapper">
            <img src="<?php bloginfo('template_directory'); ?>/images/search-icon.svg" alt="">
            <input type="text" placeholder="Search here">
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</Section>

<section class="cardSection newsCards">
    <div class="cardSectionWrapper">
        <div class="heading">
            <h2>News</h2>
        </div>
        <!-- Custom Select Dropdown -->
        <div class="customSelect" id="customSelect">
            <div class="selectBtn" id="selectBtn">
                <span class="sBtntext">Latest first</span>
                <img src="<?php bloginfo('template_directory'); ?>/images/dropdown-icon.svg" alt="Dropdown Icon">
            </div>
            <ul class="options" id="options">
                <li class="option" data-sort="latest">Latest first</li>
                <li class="option" data-sort="oldest">Oldest first</li>
                <li class="option" data-sort="az">A-Z</li>
                <li class="option" data-sort="za">Z-A</li>
            </ul>
        </div>
        <div class="cardGrid" id="cardGrid">
            <?php
            $args = array('post_type' => 'news-post', 'posts_per_page' => -1, 'order' => 'DESC');
            $the_query = new WP_Query($args);
            while ($the_query->have_posts()) : $the_query->the_post();
                $terms = get_the_terms($post->ID, 'news_categories');
                $tax = ($terms && !is_wp_error($terms)) ? strtolower(join(", ", wp_list_pluck($terms, 'name'))) : '';
            ?>
                <a href="<?php the_permalink(); ?>" class="cards" data-date="<?php echo get_the_date('Y-m-d'); ?>" data-title="<?php echo esc_attr(get_the_title()); ?>">
                    <div class="cardImg">
                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                    <div class="cardContent">
                        <span class="tag"><?php echo esc_html($tax); ?></span>
                        <div class="cardInfo">
                            <div class="cardTypo">
                                <h3><?php 
                                    $title = get_the_title(); 
                                    echo (strlen($title) > 50) ? substr($title, 0, 40) . '...' : $title; 
                                ?></h3>
                                <p><?php echo get_the_date('d M Y'); ?> • <?php echo estimate_reading_time(get_the_ID()); ?> mins read</p>
                            </div>
                        </div>
                    </div>
                    <div class="redirectArrow">
                        <i class="icon-right-arrow  rotateRightArrow"></i>
                    </div>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div id="pagination" class="pagination"></div>
    </div>
</section>

<?php get_footer(); ?>


