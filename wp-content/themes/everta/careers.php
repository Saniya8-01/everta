<?php get_header(); /*Template name: Careers*/ ?>


<section class="careerBannerSection">
    <?php if (have_rows('banner_section')) : ?>
    <?php while (have_rows('banner_section')) : the_row(); ?>
    <div class="careerSectionWrapper">
        <div class="secHeading">
            <h1>
                <?php echo get_sub_field('heading'); ?>
            </h1>
            <p>
                <?php echo get_sub_field('subheading'); ?>
            </p>
            <?php 
            $cta_text = get_sub_field('cta_text');
            
            if ($cta_text) : ?>
                <a href="#evertaTeam" class="ctaYellow">
                    <?php echo esc_html($cta_text); ?>
                </a>
            <?php endif; ?>
            
        </div>
        <div class="careerBannerImg">
            <?php
            $desktopImage = get_sub_field('desktop_image');
            $mobileImage = get_sub_field('mobile_image');
        ?>
            <?php if ( !empty( $desktopImage ) ): ?>
            <img src="<?php echo esc_url( $desktopImage['url'] ); ?>"
                alt="<?php echo esc_attr( $desktopImage['alt'] ); ?>" class="desktopBanner">
            <?php endif; ?>

            <?php if ( !empty( $mobileImage ) ): ?>

            <img src="<?php echo esc_url( $mobileImage['url'] ); ?>"
                alt="<?php echo esc_attr( $mobileImage['alt'] ); ?>" class="mblBanner">
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section id="evertaTeam" class="careerTeamSection">
    <div class="careerSectionWrapper">
        <?php if (have_rows('careerteam_section')) : ?>
        <?php while (have_rows('careerteam_section')) : the_row(); ?>
        <div class="secHeading">
            <h2><?php echo get_sub_field('heading'); ?></h2>
            <p><?php echo get_sub_field('subheading'); ?></p>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <div class="careerFilterSection">
            <div class="selFilter">
                <div class="customSelect">
                    <div class="selectBtn">
                        <span class="sBtntext">Location</span>
                        <i class="icon-down-arrow fontellowDownArrow"></i>
                    </div>
                    <ul class="options">
                        <?php
                        $locations = get_posts(array(
                            'post_type' => 'career',
                            'posts_per_page' => -1,
                            'fields' => 'ids'
                        ));
                        $unique_locations = array_unique(array_map(function($id) {
                            return get_field('job_location', $id);
                        }, $locations));
                        foreach ($unique_locations as $location) {
                            if ($location) {
                                echo '<li class="option">' . esc_html($location) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="customSelect">
                    <div class="selectBtn">
                        <span class="sBtntext">Department</span>
                        <i class="icon-down-arrow fontellowDownArrow"></i>
                    </div>
                    <ul class="options">
                        <?php
                        $departments = get_posts(array(
                            'post_type' => 'career',
                            'posts_per_page' => -1,
                            'fields' => 'ids'
                        ));
                        $unique_departments = array_unique(array_map(function($id) {
                            return get_field('job_department', $id);
                        }, $departments));
                        foreach ($unique_departments as $department) {
                            if ($department) {
                                echo '<li class="option">' . esc_html($department) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="customSelect">
                    <div class="selectBtn">
                        <span class="sBtntext">Contract Type</span>
                        <i class="icon-down-arrow fontellowDownArrow"></i>
                    </div>
                    <ul class="options">
                        <?php
                                        $contract_types = get_posts(array(
                                            'post_type' => 'career',
                                            'posts_per_page' => -1,
                                            'fields' => 'ids'
                                        ));
                                        $unique_contracts = array_unique(array_map(function($id) {
                                            return get_field('job_type', $id);
                                        }, $contract_types));
                                        foreach ($unique_contracts as $contract) {
                                            if ($contract) {
                                                echo '<li class="option">' . esc_html($contract) . '</li>';
                                            }
                                        }
                                        ?>
                    </ul>
                </div>
            </div>
            <div class="filterBtnContainer">
                <button id="applyFilter" class="ctaApplyFilter">Apply filters</button>
                <button id="clearFilter" class="ctaClearFilter">Clear filters</button>
            </div>
        </div>
    </div>
    <div class="careerSectionWrapperTwo">
        <?php
$args = array('post_type' => 'career', 'posts_per_page' => -1, 'order' => 'DESC');
$the_query = new WP_Query($args);
$counter = 1;

while ($the_query->have_posts()):
    $the_query->the_post();
    
    $terms = get_the_terms($post->ID, 'career_categories');
    if ($terms && !is_wp_error($terms)):
        $links = array();
        foreach ($terms as $term) {
            $links[] = $term->slug;
        }
        $tax_links = join(" ", str_replace(' ', '-', $links));
        $tax = strtolower($tax_links);
    else:
        $tax = '';
    endif;
    
    global $post;
    $post_slug = $post->post_name;
?>
<div class="careerPositionBox" id="careerPositionBox<?php echo $counter; ?>" 
     data-job-department="<?php echo esc_attr(get_field('job_department')); ?>">
    <div class="subBoxContent">
        <h3><?php the_title(); ?></h3>
        <div class="posSubContent">
            <div>
                <img src="<?php bloginfo('template_directory'); ?>/images/map-logo.svg" alt="everta">
                <h4><?php echo get_field('job_location'); ?></h4>
            </div>
            <div>
                <img src="<?php bloginfo('template_directory'); ?>/images/briefcase-logo.svg" alt="everta">
                <h4><?php echo get_field('job_type'); ?></h4>
            </div>
        </div>
    </div>
    <div class="subBoxImg">
        <i class="icon-right-arrow rotateRightArrow"></i>
    </div>
</div>
<?php $counter++;
endwhile;
wp_reset_postdata(); ?>

    </div>
    <div class="dnfContainer">
        <p>No job listings available at the moment. Stay tuned for future openings.</p>
    </div>
</section>

<?php if (have_rows('cv_section')) : ?>
    <?php while (have_rows('cv_section')) : the_row(); ?>
        <?php $cvheading = get_sub_field( "heading" ); if ( $cvheading ) {?>
            <section class="careerCVSection">
                <div class="careerSectionWrapper">
                    <h2><?php echo get_sub_field('heading'); ?></h2>
                    <p><?php echo get_sub_field('subheading'); ?></p>
                    <?php $cta_text = get_sub_field('cta_text'); if ($cta_text) : ?>
                        <a href="mailto:<?php echo get_sub_field('cta_link'); ?>" class="ctaBlack">
                            <?php echo esc_html($cta_text); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </section>
        <?php } ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php if (have_rows('hiring_section')) : ?>
    <?php while (have_rows('hiring_section')) : the_row(); ?>
        <?php $hiringsec = get_sub_field( "heading" ); if ( $hiringsec ) {?>
            <section class="careerHiringSection">
                <div class="careerSectionWrapper">
                    <div class="secHeading">
                        <h2><?php echo get_sub_field('heading'); ?></h2>
                        <p><?php echo get_sub_field('subheading'); ?></p>
                    </div>
                    <div class="hiringProcessContainer">
                        <?php if (have_rows('hiring_steps')) : ?>
                            <?php $counter = 1; while (have_rows('hiring_steps')) : the_row(); ?>
                                <div class="hiringProcessBox">
                                    <div class="logoBox">
                                        <?php $iconImage = get_sub_field('icon_image'); if (!empty($iconImage)) : ?>
                                            <img src="<?php echo esc_url($iconImage['url']); ?>" alt="<?php echo esc_attr($iconImage['alt']); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="contentBox">
                                        <div class="boxNumber">
                                            <?php echo $counter; // Output the dynamic counter ?>
                                        </div>
                                        <div class="subHeadings">
                                            <h3><?php echo get_sub_field('title'); ?></h3>
                                            <h6><?php echo get_sub_field('description'); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            <?php $counter++; endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php if (have_rows('careerwall_section')) : ?>
    <?php while (have_rows('careerwall_section')) : the_row(); ?>
        <?php $careerwall = get_sub_field( "heading" ); if ( $careerwall ) {?>
            <section class="careerWallSection">
                <div class="careerSectionWrapper">
                    <div class="secHeading">
                        <h2><?php echo get_sub_field('heading'); ?></h2>
                    </div>
                    <div class="evertaWallContainer">
                        <?php $container_index = 0; if (have_rows('box_container')) : 
                            while (have_rows('box_container')) : the_row(); 
                            $container_index++;
                        ?>
                            <div class="wallImgBoxContainer">
                                <?php if (have_rows('wall_img_box')) : ?>
                                    <?php while (have_rows('wall_img_box')) : the_row();
                                        $image = get_sub_field('image');
                                        $mobile_image = get_sub_field('mobile_image'); 
                                    ?>
                                        <div class="wallImgBox">
                                            <?php if (!empty($image)) : ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="desktopWall">
                                            <?php endif; ?>
                                            <?php if (!empty($mobile_image)) : ?>
                                                <img src="<?php echo esc_url($mobile_image['url']); ?>" alt="<?php echo esc_attr($mobile_image['alt']); ?>" class="mblWall">
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <!-- Show wallTapeBox only for the second wallImgBoxContainer -->
                                <?php if ($container_index == 2) : ?>
                                    <div class="wallTapeBox">
                                        <?php $tape_image = get_sub_field('tape_image'); if (!empty($tape_image)) : ?>
                                            <img src="<?php echo esc_url($tape_image['url']); ?>" alt="<?php echo esc_attr($tape_image['alt']); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
            $args = array('post_type' => 'career', 'posts_per_page' => -1, 'order' => 'DESC');
            $the_query = new WP_Query($args);
            $counter = 1;
            while ($the_query->have_posts()):
                $the_query->the_post();
            ?>
<?php
                $terms = get_the_terms($post->ID, 'career_categories');
                if ($terms && !is_wp_error($terms)):
                    $links = array();
                    foreach ($terms as $term) {
                        $links[] = $term->slug;
                    }
                    $tax_links = join(" ", str_replace(' ', '-', $links));
                    $tax = strtolower($tax_links);
                else:
                    $tax = '';
                endif;
                ?>
<?php
                global $post;
                $post_slug = $post->post_name;
                ?>
<div class="careerOpeningModal" id="careerOpeningModal<?php echo $counter; ?>">
    <div class="modalContent">
        <div class="jobHeadingDesc">
            <div class="closeBtn">
                <img src="<?php bloginfo('template_directory'); ?>/images/close-icon.svg" alt="everta">
            </div>
            <div class="jobHeadingDescSub">
                <div class="headingDescContent">
                    <span>
                        <?php echo get_field('job_department'); ?>
                    </span>
                    <div class="subBoxContent">
                        <h3>
                            <?php the_title(); ?>
                        </h3>
                        <div class="posSubContent">
                            <div>
                                <i class="icon-locat fontellolocateIcon" ></i>
                                <h4>
                                    <?php echo get_field('job_location'); ?>
                                </h4>
                            </div>
                            <div>
                                <i class="icon-briefcase fontelloBrifIcon" ></i>
                                <h4>
                                    <?php echo get_field('job_type'); ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                $cta_url = get_field('cta_url');
                $cta_text = get_field('cta_text');
                
                if ($cta_url && $cta_text) : ?>
                <a href="mailto:<?php echo antispambot($cta_url); ?>" class="ctaBlack">
                    <?php echo esc_html($cta_text); ?>
                </a>
                <?php endif; ?>
                
            </div>
        </div>
        <div class="jobDescription">
            <div class="detailWrapper">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php $counter = $counter + 1;
endwhile;
wp_reset_postdata(); ?>

<?php get_footer(); ?>