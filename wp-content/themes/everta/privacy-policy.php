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

<div class="backtopCl" id="backtop">
	<a href="#"><i class="icon-double-arrow fontellowdobuleUpIcon"></i></a>
</div>

<?php get_footer(); ?>