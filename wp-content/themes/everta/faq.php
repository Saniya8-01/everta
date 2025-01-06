<?php get_header(); /*Template name: Faq*/ ?>

<Section class="resourcesBanner">
    <?php if (have_rows('resources_banner')) : ?>
    <?php while (have_rows('resources_banner')) : the_row(); ?>
    <div class="resorucesBannerWrapper">
        <h1><?php echo get_sub_field('banner_heading'); ?></h1>
        <p><?php echo get_sub_field('banner_subheading'); ?></p>
        <div class="resourcesTabs">
            <div class="resourcesTabWrapper">
                <a href="">News</a>
                <a href="">Manuals & Brochure</a>
                <a href="">Blogs</a>
                <a href="" class="active">FAQs</a>
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
            <button class="ctaWhiteBlack" id="toggleFaqButton" style="display: none;">Show More</button>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<?php get_footer(); ?>

<script>
    if ($(".resourcesfaqSection").length) {
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

if ($(".resourcesfaqSection").length) {
    document.addEventListener("DOMContentLoaded", function () {
        const accordionWrapper = document.querySelector(".accordions-wrapper");
        const faqItems = accordionWrapper.querySelectorAll(".accordion");
        const toggleButton = document.getElementById("toggleFaqButton");

        const increment = 6; // Number of items to show at a time
        let currentlyVisible = increment;

        // Hide all FAQ items initially except the first set
        if (faqItems.length > increment) {
            toggleButton.style.display = "block"; // Show the button
            faqItems.forEach((item, index) => {
                if (index >= increment) {
                    item.style.display = "none"; // Hide extra items
                }
            });
        } else {
            toggleButton.style.display = "none"; // Hide the button if items are less than or equal to increment
        }

        // Handle button click
        toggleButton.addEventListener("click", function () {
            const isExpanded = toggleButton.getAttribute("data-expanded") === "true";

            if (isExpanded) {
                // Show less: Reset to initial state showing only the first set
                currentlyVisible = increment;
                faqItems.forEach((item, index) => {
                    item.style.display = index < increment ? "block" : "none";
                });
                toggleButton.textContent = "Show More";
                toggleButton.setAttribute("data-expanded", "false");
            } else {
                // Show more: Reveal the next set of items
                const nextVisible = currentlyVisible + increment;
                faqItems.forEach((item, index) => {
                    if (index < nextVisible) {
                        item.style.display = "block";
                    }
                });

                // Update the currently visible count
                currentlyVisible = nextVisible;

                // Check if all items are now visible
                if (currentlyVisible >= faqItems.length) {
                    toggleButton.textContent = "Show Less";
                    toggleButton.setAttribute("data-expanded", "true");
                }
            }
        });
    });
}
</script>
