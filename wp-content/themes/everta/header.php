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
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
						<img  src="<?php bloginfo('template_directory'); ?>/images/everta-logo.svg" />
					</a>
				</div>
				<div class="headerMenu">
					<div class="navMenu">
						<div class="navLinks">
							<div class="navLists">
								<ul class="mainNav">
									<li class="mainNavList dropdown">
										<a href="#!" class="mainManu">Company</a>
										<img src="<?php bloginfo('template_directory'); ?>/images/chevron-down.svg" alt="">
										<div class="accordian-icon-wrapper">
											<div class="accordion-icon"></div>
										</div>
										<div class="dropdownMenu">
											<ul>
												<li>
													<p>Company</p>
													<a href="">About us</a>
													<a href="">Careers</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="mainNavList dropdown">
										<a href="#!" class="mainManu">Solutions</a>
										<img src="<?php bloginfo('template_directory'); ?>/images/chevron-down.svg" alt="">
										<div class="accordian-icon-wrapper">
											<div class="accordion-icon"></div>
										</div>
										<div class="dropdownMenu">
											<ul>
												<li>
													<p>AC Charging</p>
													<a href="">Power tower</a>
													<a href="">Power Box</a>
												</li>
												<li>
													<p>DC Charging</p>
													<a href="">Power Battery</a>
												</li>
												<li>
													<p>Digital Solutions</p>
													<a href="">Dashboard</a>
													<a href="">App</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="mainNavList">
										<a href="" class="mainManu">Resources</a>
										<div class="accordian-icon-wrapper">
											<div class="accordion-icon"></div>
										</div>
									</li>
									<li class="mainNavList ctaContact">
										<a href="" class="mainManu">Contact us</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
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