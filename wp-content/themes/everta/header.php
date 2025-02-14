<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Everta
 */
$current_url = home_url(add_query_arg([], $wp->request));
if (isset($_REQUEST['youremail']) && !empty($_REQUEST['youremail'])) {
	// Set the session variable for email
	$youremaill = $_REQUEST['youremail'];
	unset($_REQUEST['youremail']);
	$_SESSION['user_email'] = sanitize_email($youremaill);
	?>
  <script>
 document.addEventListener("DOMContentLoaded", function() {
			 emailField.value = "<?php echo isset($_SESSION['user_email']) ? esc_js($_SESSION['user_email']) : ''; ?>";
   });
</script>
	<?php
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.typekit.net/akf4uqs.css">
	<link href="<?php bloginfo('template_directory'); ?>/css/slick-theme.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/css/slick.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/css/main.css" rel="stylesheet">
	<script type="text/javascript">
		var site_url = "<?php echo get_site_url(); ?>";
	</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header class="nav-down">
			<nav class="headerWrapper">
				<div class="headerLogo">
					<a href="<?php echo get_site_url(); ?>">
						<?php the_custom_logo();?>
					</a>
				</div>
				<div class="headerMenu">
					<div class="navMenu">
						<div class="navLinks">
							<div class="navLists">
								<?php
								// Define the menu location.
								$menu_name = 'primary-menu'; // Update with your correct menu location.
								// Get the menu locations.
								$locations = get_nav_menu_locations();
								if (isset($locations[$menu_name])) {
									$menu_id = $locations[$menu_name];
									$menu_items = wp_get_nav_menu_items($menu_id);
									if (!empty($menu_items)) {
										// Group menu items by parent ID for easier processing.
										$menu_tree = [];
										foreach ($menu_items as $menu_item) {
											$menu_tree[$menu_item->menu_item_parent][] = $menu_item;
										}
										// Function to render the menu recursively (supports 3 levels).
										function render_menu_items($items, $menu_tree) {
											echo '<ul class="mainNav">';
											foreach ($items as $item) {
												$has_children = isset($menu_tree[$item->ID]);
												// Start the menu item
												echo '<li class="mainNavList' . ($has_children ? ' dropdown' : '') . '">';
												echo '<a href="' . esc_url($item->url) . '" class="mainManu">' . esc_html($item->title) . '</a>';
												// Check if this item has children (submenus)
												if ($has_children) {
													echo '<img src="' . get_template_directory_uri() . '/images/chevron-down.svg" alt="" class="arrowImage">';
													echo '<div class="accordian-icon-wrapper"><div class="accordion-icon"></div></div>';
													echo '<div class="dropdownMenu">';
													// Render child menu items as "Title" for the submenu
													echo '<ul>';
													foreach ($menu_tree[$item->ID] as $child_item) {
														echo '<li class="submenu-title">';
														echo '<p>' . esc_html($child_item->title) . '</p>';
														// Render the submenus (if any)
														if (isset($menu_tree[$child_item->ID])) {
															foreach ($menu_tree[$child_item->ID] as $sub_item) {
																$serverurl = @basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
																$suburl = !empty($sub_item->url) ? @basename(parse_url($sub_item->url, PHP_URL_PATH)) : '';
															if($serverurl == $suburl){ $activee = 'active';}else { $activee = '';}
																echo '<a href="' . esc_url($sub_item->url) . '" class="'.$activee.'">' . esc_html($sub_item->title) . '</a>';
															}
														}
														echo '</li>';
													}
													echo '</ul>';
													echo '</div>';
												}
												echo '</li>';
											} ?>
								<li class="mainNavList dropdown languageTranslator">
									<img src="<?php bloginfo('template_directory'); ?>/images/language-svg.svg" alt="">
									<img src="<?php bloginfo('template_directory'); ?>/images/chevron-down.svg" alt=""
										class="arrowImage">
									<div class="dropdownMenu languageMenu">
										<ul>
											<li>
												<a href="">EN</a>
											</li>
											<li>
												<a href="">PL</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="mainNavList ctaContact">
									<a href="javascript:void(0);" class="mainManu" onClick="openForm()">Contact us</a>
								</li>
								<?php
											echo '</ul>';
										}
										// Render the top-level menu.
										render_menu_items($menu_tree[0], $menu_tree); // Start rendering from the top level.
									} else {
										echo '<p>No menu items found.</p>';
									}
								} else {
									echo '<p>No menu assigned to this location.</p>';
								}
								?>
							</div>
						</div>
					</div>
					<li class="languageTranslatorMbl">
						<i class="icon-globe fonelloGlobeIconMbl"></i>
						<div class="languageMenuMbl">
							<ul>
								<li>
									<a href="">EN</a>
								</li>
								<li>
									<a href="">PL</a>
								</li>
							</ul>
						</div>
					</li>
					<div class="hamburger-menu">
						<div class="button_toggle" id="toggle">
							<span class="spanParent">
								<span class="top"></span>
								<span class="middle"></span>
								<span class="bottom"></span>
							</span>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<div class="contactFormContainer <?php if (isset($youremaill) && !empty($youremaill)) { echo 'open'; unset($youremaill);$youremaill=''; }?>" id="contactFormContainer">
			<div class="contactForm" id="contactForm">
				<div class="contactFormWrapper" id="contactFormWrapper">
					<div class="contactHeading">
						<h2>Contact us</h2>
						<div class="closeBtn" id="closeBtn" onclick="closeForm();">
							<img src="<?php bloginfo('template_directory'); ?>/images/close-svg.svg" alt="">
						</div>
					</div>
					<?php
				  $shortcode = get_field('contact_us_popup', 'option');
				  if ($shortcode) {
					echo do_shortcode($shortcode);
				  }
				  ?>
				</div>
				<div class="thankyouPopup" id="thankyouPopup" style="display: none;">
					<div class="closeBtn" id="closeBtn" onclick="closeForm();">
						<img src="<?php bloginfo('template_directory'); ?>/images/close-svg.svg" alt="">
					</div>
					<div class="thankyouContent">
						<div class="icon">
							<img src="<?php bloginfo('template_directory'); ?>/images/thankyou-svg.svg" alt="">
						</div>
						<h2>Request received!</h2>
						<p>Thank you for taking the first step in being a part of E-movement. Our team with follow up with
							you soon!</p>
					</div>
				</div>
			</div>
		</div>
		<script>   
			// Show Thank You popup after form submission
			document.addEventListener('wpcf7mailsent', function () {
				document.getElementById('thankyouPopup').style.display = 'block';
				document.getElementById('contactFormWrapper').style.display = 'none';
			}, false);

			// Close button to hide the form and popup
			document.getElementById('closeBtn').addEventListener('click', function () {
				document.getElementById('thankyouPopup').style.display = 'none';
				document.getElementById('contactFormWrapper').style.display = 'block';
			});
		</script>