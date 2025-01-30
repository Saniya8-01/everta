<?php get_header(); /*Template name: Faq*/ ?>

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
                           class="<?php echo ($count == 3) ? 'active' : ''; ?>">
                            <?php echo $tab_text; ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php 
                    $count++;
                    endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</Section>

<section class="faqSection resourcesfaqSection" id="faqAccordion">
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
            <button class="ctaWhiteBlack" id="toggleFaqButton" style="display: none;">Load More</button>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<?php get_footer(); ?>

