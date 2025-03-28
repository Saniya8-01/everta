<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Everta
 */

get_header();
?>

<section class="resDetailBannerSec">
	<div class="secWrapper">
		<div class="backBtn">
			<a href="javascript:history.back()">
				<i class="icon-left-arrow backArrow"></i>Back 
			</a>
		</div>
		<div class="secHeading">
			<h1><?php the_title(); ?></h1>
			<div class="imgBox">
				<?php if (have_rows('banner_section')) : ?>
                	<?php while (have_rows('banner_section')) : the_row(); ?>
						<?php
							$desktop_image = get_sub_field('desktop_image');
							$mobile_image = get_sub_field('mobile_image');
						?>
						<?php if ( ! empty( $desktop_image ) ): ?>
							<img src="<?php echo esc_url( $desktop_image['url'] ); ?>" alt="<?php echo esc_attr( $desktop_image['alt'] ); ?>" class="desktop">
						<?php endif; ?>
						<?php if ( ! empty( $mobile_image ) ): ?>
							<img src="<?php echo esc_url( $mobile_image['url'] ); ?>" alt="<?php echo esc_attr( $mobile_image['alt'] ); ?>" class="mbl">
						<?php endif; ?>
                	<?php endwhile; ?>
                <?php endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="resDetailContentSec">
	<div class="secWrapper">
		<div class="contentBox hideTxt">
			<?php the_content(); ?>
		</div>
		<div class="readMoreBtnBox">
			<button class="ctaWhiteBlack" id="readMore">Read more</button>
		</div>
	</div>
</section>

<section class="relatedPostSec">
	<div class="secWrapper">
		<div class="secHeading">
			<h2><?php echo get_field('related_post_heading'); ?></h2>
		</div>
		<div class="cardContainer postCardSlider">

			<?php $related_post = get_field('related_posts'); if ($related_post) : ?>
				<?php foreach ($related_post as $post) : setup_postdata($post); ?>
					<div class="blogCard">
						<a href="<?php the_permalink(); ?>">
							<div class="imgBox">
								<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title_attribute(); ?>">
							</div>
							<div class="contentBox">
								<div class="content">
									<span>
									<?php
										$category_detail = get_the_category($post->ID); //$post->ID
										foreach ($category_detail as $cd) {
											$nm = $cd->cat_name;
											echo ' ';
										}
										echo $category_detail[0]->name;
									?>
									</span>
									<p><?php $title = get_the_title(); echo (strlen($title) > 50) ? substr($title, 0, 40) . '...' : $title; ?></p>
									<ul>
										<li><?php echo get_the_date('d M Y'); ?></li>
										<li><?php echo estimate_reading_time(get_the_ID()); ?> mins read</li>
									</ul>
								</div>
							</div>
							<div class="arrowBox"><i class="icon-right-arrow  rotateRightArrow"></i></div>
						</a>
					</div>
				<?php endforeach; ?>
            	<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<div class="backtopCl" id="backtop">
	<a href="#"><i class="icon-double-arrow fontellowdobuleUpIcon"></i></a>
</div>

<?php get_footer(); ?>