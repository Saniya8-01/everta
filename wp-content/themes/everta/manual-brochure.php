<?php get_header(); /*Template name: Manual Brochure*/ ?>

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
                           class="<?php echo ($count == 1) ? 'active' : ''; ?>">
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

<section class="faqSection manualBrochureSection" id="faqAccordion">
    <?php if (have_rows('document_section')) : ?>
    <?php while (have_rows('document_section')) : the_row(); ?>
    <div class="faq-heading">
        <h2>
            <?php echo get_sub_field('section_heading'); ?></h2>
    </div>
    <div class="container">
        <div class="accordions-wrapper">
            <?php if (have_rows('document_accordion')) : ?>
            <?php while (have_rows('document_accordion')) : the_row(); ?>
            <div class="accordion">
                <div class="accordion-header">
                    <h4><?php echo get_sub_field('accordion_title'); ?></h4>
                    <div class="accordian-icon-wrapper">
                        <div class="accordion-icon"></div>
                    </div>
                </div>
                <div class="accordion-body">
                    <div class="brochureDiv">
                        <?php if (have_rows('document_files')) : ?>
                        <?php while (have_rows('document_files')) : the_row(); ?>
                        <div class="brochureElement">
                            <p class="fileType"><?php echo get_sub_field('document_heading'); ?></p>
                            <?php if (have_rows('document')) : ?>
                            <?php while (have_rows('document')) : the_row(); ?>
                            <a href="<?php echo get_sub_field('document_link'); ?>" class="pdfWrapper" download>
                                <?php $fileImage = get_sub_field('document_logo');
                                if (!empty($fileImage)) : ?>
                                <img src="<?php echo esc_url($fileImage['url']); ?>" loading="lazy"
                                    alt="<?php echo esc_attr($fileImage['alt']); ?>" />
                                <?php endif; ?>
                                <p class="pdfName"><?php echo get_sub_field('document_name'); ?></p>
                                <img src="<?php bloginfo('template_directory'); ?>/images/download-logo.svg"
                                    class="downloadLogo" alt="">
                            </a>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
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