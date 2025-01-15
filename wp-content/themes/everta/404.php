<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Everta
 */

get_header();
?>

<!-- custom 404 -->
<section class="page-404">
	<div class="image-container">
		<img class="desktopimg" src="<?php echo get_template_directory_uri(); ?>/images/404.webp" alt="404 Error">
		<img class="mobimg" src="<?php echo get_template_directory_uri(); ?>/images/404-mob.webp" alt="404 Error">
		<div class="content404">
			<p>Just like a car without a plug, this page didn't connect to the right place.</p>
			<a href="<?php echo get_site_url(); ?>" class="ctaYellowBlack">Back to home</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
