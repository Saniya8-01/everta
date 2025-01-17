<?php get_header(); /* Template name: Privacy policy */ ?>

<section class="privacyPolicySec">
    <div class="backBtn">
        <a href="javascript:history.back()">
            <i class="icon-left-arrow backArrow"></i>Back 
        </a>
    </div>
    <div class="privacyContent">
        <div class="HeadingBox">
            <h1 class="secHeading"><?php the_title(); ?></h1>
        </div>
        <div class="ContentBox">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>