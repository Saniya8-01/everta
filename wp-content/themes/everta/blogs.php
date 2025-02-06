<?php get_header(); /*Template name: Blogs*/ ?>

<Section class="resourcesBanner">
    <?php if (have_rows('resources_banner')) : ?>
        <?php while (have_rows('resources_banner')) : the_row(); ?>
            <div class="resorucesBannerWrapper">
                <h1><?php echo get_sub_field('banner_heading'); ?></h1>
                <p><?php echo get_sub_field('banner_subheading'); ?></p>
                <div class="resourcesTabs">
                    <div class="resourcesTabWrapper">
                        <?php if (have_rows('resources_tabs')) : ?>
                            <?php $count = 0; while (have_rows('resources_tabs')) : the_row(); ?>
                                <?php 
                                    $tab_link = get_sub_field('tab_link');
                                    $tab_text = get_sub_field('tab_text');
                                if ($tab_link && $tab_text) : ?>
                                    <a href="<?php echo $tab_link; ?>" class="<?php echo ($count == 2) ? 'active' : ''; ?>">
                                        <?php echo $tab_text; ?>
                                    </a>
                                <?php endif; ?>                    
                            <?php $count++; endwhile; ?>
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

<section class="cardSection blogsCards">
    <div class="cardSectionWrapper">
        <div class="heading">
            <h2>Blogs</h2>
        </div>
        <div class="blogsTabs">
            <div class="blogsTabWrapper">
                <a href="#" class="active" data-filter="all">All</a>
                <!-- Gitsy -->
                <?php
                    $terms = get_categories("categories");
                    foreach ( $terms as $term ) {
                        $termname[] = $term->name;
                    }
                    $termnameunique = array_values(array_unique($termname));
                    for($i=0;$i<count($termnameunique);$i++){
                ?>
                    <a href="#" data-filter="<?php echo strtolower($termnameunique[$i]); ?>"><?php echo strtolower($termnameunique[$i]); ?></a>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="cardGrid" id="cardGrid">
            <?php $args = array('post_type' => 'post', 'posts_per_page' => -1, 'order' => 'DESC');
                $the_query = new WP_Query($args);
                while ($the_query->have_posts()) : $the_query->the_post();
                $terms = get_the_terms($post->ID, 'category');
                if ($terms && ! is_wp_error($terms)) :
                    $links = array();
                    foreach ($terms as $term) {
                        $links[] = $term->name;
                    }
                    $tax_links = join(",", array_map('strtolower', $links)); // Changed from space to comma
                    $tax = strtolower($tax_links);
                else :
                    $tax = '';
                endif;
            ?>
            <a href="<?php the_permalink(); ?>" class="cards" data-category="<?php echo $tax; ?>">
                <div class="cardImg">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="" title="" />
                </div>
                <div class="cardContent">
                    <span class="tag">
                        <?php
                            $category_detail = get_the_category($post->ID); //$post->ID
                            foreach ($category_detail as $cd) {
                                $nm = $cd->cat_name;
                                echo ' ';
                            }
                            echo $category_detail[0]->name;
                        ?>
                    </span>
                    <div class="cardInfo">
                        <div class="cardTypo">
                            <h3><?php $title = get_the_title(); echo (strlen($title) > 50) ? substr($title, 0, 40) . '...' : $title; ?></h3>
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

