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
            <a href="#evertaTeam" class="ctaYellow">
                <?php echo get_sub_field('cta_text'); ?>
            </a>
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
        <div class="secHeading">
            <h2>Join the Everta Team</h2>
            <p>Explore Our Open Positions</p>
        </div>
        <div class="careerFilterSection">
            <div class="selFilter">
                <div class="customSelect">
                    <div class="selectBtn">
                        <span class="sBtntext">Location</span>
                        <img src="<?php bloginfo('template_directory'); ?>/images/dropdown-icon.svg" alt="everta">
                    </div>
                    <ul class="options">
                        <li class="option">New Delhi, India</li>
                        <li class="option">India</li>
                        <li class="option">UAE</li>
                    </ul>
                </div>
                <div class="customSelect">
                    <div class="selectBtn">
                        <span class="sBtntext">Department</span>
                        <img src="<?php bloginfo('template_directory'); ?>/images/dropdown-icon.svg" alt="everta">
                    </div>
                    <ul class="options">
                        <li class="option">Data Analyst</li>
                        <li class="option">Design & Tech</li>
                        <li class="option">Sales Manager</li>
                    </ul>
                </div>
                <div class="customSelect">
                    <div class="selectBtn">
                        <span class="sBtntext">Contract type</span>
                        <img src="<?php bloginfo('template_directory'); ?>/images/dropdown-icon.svg" alt="everta">
                    </div>
                    <ul class="options">
                        <li class="option">Remote</li>
                        <li class="option">In office</li>
                        <li class="option">Full Time</li>
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
        <div class="careerPositionBox" id="careerPositionBox">
            <div class="subBoxContent">
                <h3>Sales Manager</h3>
                <div class="posSubContent">
                    <div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/map-logo.svg" alt="everta">
                        <h4>New Delhi, India</h4>
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/briefcase-logo.svg" alt="everta">
                        <h4>Full Time</h4>
                    </div>
                </div>
            </div>
            <div class="subBoxImg">
                <img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.svg" alt="everta">
            </div>
        </div>
        <div class="careerPositionBox" id="careerPositionBox2">
            <div class="subBoxContent">
                <h3>Sr. Customer Success Manager</h3>
                <div class="posSubContent">
                    <div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/map-logo.svg" alt="everta">
                        <h4>UAE</h4>
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/briefcase-logo.svg" alt="everta">
                        <h4>In office</h4>
                    </div>
                </div>
            </div>
            <div class="subBoxImg">
                <img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.svg" alt="everta">
            </div>
        </div>
        <div class="careerPositionBox" id="careerPositionBox">
            <div class="subBoxContent">
                <h3>Data Analyst</h3>
                <div class="posSubContent">
                    <div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/map-logo.svg" alt="everta">
                        <h4>New Delhi, India</h4>
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/briefcase-logo.svg" alt="everta">
                        <h4>Full Time</h4>
                    </div>
                </div>
            </div>
            <div class="subBoxImg">
                <img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.svg" alt="everta">
            </div>
        </div>
        <div class="careerPositionBox" id="careerPositionBox">
            <div class="subBoxContent">
                <h3>Sr. Customer Success Manager</h3>
                <div class="posSubContent">
                    <div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/map-logo.svg" alt="everta">
                        <h4>New Delhi, India</h4>
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/briefcase-logo.svg" alt="everta">
                        <h4>Full Time</h4>
                    </div>
                </div>
            </div>
            <div class="subBoxImg">
                <img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.svg" alt="everta">
            </div>
        </div>
    </div>
    <div class="dnfContainer">
        <p>No job listings available at the moment. Stay tuned for future openings.</p>
    </div>

</section>

<section class="careerCVSection">
    <?php if (have_rows('cv_section')) : ?>
    <?php while (have_rows('cv_section')) : the_row(); ?>
    <div class="careerSectionWrapper">
        <h2>
            <?php echo get_sub_field('heading'); ?>
        </h2>
        <p>
            <?php echo get_sub_field('subheading'); ?>
        </p>
        <a href="javascript:void(0);" class="ctaBlack">
            <?php echo get_sub_field('cta_text'); ?>
        </a>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="careerHiringSection">
    <?php if (have_rows('hiring_section')) : ?>
    <?php while (have_rows('hiring_section')) : the_row(); ?>
    <div class="careerSectionWrapper">
        <div class="secHeading">
            <h2>
                <?php echo get_sub_field('heading'); ?>
            </h2>
            <p>
                <?php echo get_sub_field('subheading'); ?>
            </p>
        </div>
        <div class="hiringProcessContainer">
            <?php if (have_rows('hiring_steps')) : ?>
            <?php while (have_rows('hiring_steps')) : the_row(); ?>
            <div class="hiringProcessBox">
                <div class="logoBox">
                    <?php 
                    $iconImage = get_sub_field('icon_image');
                    if (!empty($iconImage)) : ?>
                    <img src="<?php echo esc_url($iconImage['url']); ?>"
                        alt="<?php echo esc_attr($iconImage['alt']); ?>">
                    <?php endif; ?>
                </div>
                <div class="contentBox">
                    <div class="boxNumber">
                        <?php echo get_sub_field('step_number'); ?>
                    </div>
                    <div class="subHeadings">
                        <h3>
                            <?php echo get_sub_field('title'); ?>
                        </h3>
                        <h6>
                            <?php echo get_sub_field('description'); ?>
                        </h6>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section class="careerWallSection">
    <?php if (have_rows('careerwall_section')) : ?>
    <?php while (have_rows('careerwall_section')) : the_row(); ?>
    <div class="careerSectionWrapper">
        <div class="secHeading">
            <h2>
                <?php echo get_sub_field('heading'); ?>
            </h2>
        </div>

        <div class="evertaWallContainer">
            <?php 
                    $container_index = 0;
                    if (have_rows('box_container')) : 
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
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                        class="desktopWall">
                    <?php endif; ?>

                    <?php if (!empty($mobile_image)) : ?>
                    <img src="<?php echo esc_url($mobile_image['url']); ?>"
                        alt="<?php echo esc_attr($mobile_image['alt']); ?>" class="mblWall">
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>

                <!-- Show wallTapeBox only for the second wallImgBoxContainer -->
                <?php if ($container_index == 2) : ?>
                <div class="wallTapeBox">
                    <?php 
                                    $tape_image = get_sub_field('tape_image');
                                    if (!empty($tape_image)) : ?>
                    <img src="<?php echo esc_url($tape_image['url']); ?>"
                        alt="<?php echo esc_attr($tape_image['alt']); ?>">
                    <?php endif; ?>
                </div>
                <?php endif; ?>

            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<div class="careerOpeningModal" id="careerOpeningModal2">
    <div class="modalContent">
        <div class="jobHeadingDesc">
            <div class="closeBtn">
                <img src="<?php bloginfo('template_directory'); ?>/images/close-icon.svg" alt="everta">
            </div>
            <div class="jobHeadingDescSub">
                <div class="headingDescContent">
                    <span>Finance</span>
                    <div class="subBoxContent">
                        <h3>Sales Manager</h3>
                        <div class="posSubContent">
                            <div>
                                <img src="<?php bloginfo('template_directory'); ?>/images/map-logo.svg" alt="everta">
                                <h4>New Delhi, India</h4>
                            </div>
                            <div>
                                <img src="<?php bloginfo('template_directory'); ?>/images/briefcase-logo.svg"
                                    alt="everta">
                                <h4>Full Time</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" class="ctaBlack">Apply now</a>
            </div>
        </div>
        <div class="jobDescription">
            <div class="detailWrapper">
                <div class="jobDetail">
                    <p>The Sales Manager will be responsible for leading and managing the sales team to achieve sales
                        targets and drive revenue growth. This role involves developing strategic sales plans, building
                        and maintaining customer relationships, and ensuring the sales team operates efficiently and
                        effectively.</p>
                </div>
                <div class="jobRole">
                    <h4>Your Role</h4>
                    <p>Quality is more than a goal—it’s the foundation of everything we do. We go beyond expectations in
                        every detail and process, ensuring that our products and services consistently reflect our
                        commitment to excellence. At Everta, quality isn’t just a standard—it’s who we are.</p>
                </div>
                <div class="jobResponsiblity">
                    <h4>Responsibilities</h4>
                    <p>Quality is more than a goal—it’s the foundation of everything we do. We go beyond expectations in
                        every detail and process.</p>
                    <ul>
                        <li>Quality is more than a goal—it’s the foundation of everything we do. We go beyond
                            expectations in every detail and process.</li>
                        <li>Quality is more than a goal—it’s the foundation of everything we do. We go beyond
                            expectations in every detail and process.</li>
                        <li>Quality is more than a goal—it’s the foundation of everything we do. We go beyond
                            expectations in every detail and process.</li>
                        <li>Quality is more than a goal—it’s the foundation of everything we do. We go beyond
                            expectations in every detail and process.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>