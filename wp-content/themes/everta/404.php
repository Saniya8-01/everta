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

<main id="primary" class="site-main">
	<?php /* 
<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'everta' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'everta' ); ?></p>

			<?php
			get_search_form();

			the_widget( 'WP_Widget_Recent_Posts' );
			?>

			<div class="widget widget_categories">
				<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'everta' ); ?></h2>
				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						)
					);
					?>
				</ul>
			</div><!-- .widget -->

			<?php
			/* translators: %1$s: smiley */
	// $everta_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'everta' ), convert_smilies( ':)' ) ) . '</p>';
	// the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$everta_archive_content" );
	
	// the_widget( 'WP_Widget_Tag_Cloud' );
	// ?>

	</div><!-- .page-content -->
	</section><!-- .error-404 -->
	*/ ?>

	<!-- custom 404 -->
	<section class="page-404">
		<div class="image-container">
			<img class="background-image" src="<?php echo get_template_directory_uri(); ?>/images/404.webp" alt="404 Error">
			<div class="content">
				<div class="message">
					Just like a car without a plug, this page didn’t connect to the right place.
				</div>
				<div class="button-container">
					<div class="back-to-home">
						<button>Back to home</button>
						<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.svg" alt="arrow-right">
					</div>
				</div>
			</div>
		</div>
	</section>



</main><!-- #main -->

<?php
get_footer();
