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
						<img src="<?php bloginfo('template_directory'); ?>/images/everta-logo.svg" />
					</a>
				</div>
				<div class="headerMenu">
					<div class="navMenu">
						<div class="navLinks">
							<div class="navLists">
								<ul class="mainNav">
									<li class="mainNavList dropdown">
										<a href="#!" class="mainManu">Company</a>
										<img src="<?php bloginfo('template_directory'); ?>/images/chevron-down.svg"
											alt="" class="arrowImage">
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
										<img src="<?php bloginfo('template_directory'); ?>/images/chevron-down.svg"
											alt="" class="arrowImage">
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
									</li>
									<li class="mainNavList dropdown languageTranslator">
										<img src="<?php bloginfo('template_directory'); ?>/images/language-svg.svg"
											alt="">
										<img src="<?php bloginfo('template_directory'); ?>/images/chevron-down.svg"
											alt="" class="arrowImage">
										<div class="dropdownMenu languageMenu">
											<ul>
												<li>
													<p>EN</p>
												</li>
												<li>
													<p>PL</p>
												</li>
											</ul>
										</div>
									</li>
									<li class="mainNavList ctaContact">
										<a href="javascript:void(0);" class="mainManu" onClick="openForm()">Contact us</a>
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

		<div class="contactForm" id="contactForm">
			<div class="contactFormWrapper">
				<div class="contactHeading">
					<h2>Contact us</h2>
					<div class="closeBtn" onClick="closeForm()">
						<img src="<?php bloginfo('template_directory'); ?>/images/close-svg.svg" alt="">
					</div>
				</div>
				<div class="contactTop">
					<div class="formFields">
						<label for="">First Name*</label>
						<input type="text" placeholder="First name">
					</div>
					<div class="formFields">
						<label for="">Your Email*</label>
						<input type="email" placeholder="Your Email">
					</div>
					<div class="formFields">
						<label for="">Mobile Number*</label>
						<input type="text" placeholder="9987563984">
					</div>
				</div>
				<div class="contactBottom">
					<h3>I am looking to</h3>
					<div class="contactTab">
						<button class="contact-tab-btn" data-tab="contact-tab-partner">Partner with Everta</button>
						<button class="contact-tab-btn" data-tab="contact-tab-charger">Buy Everta Charger</button>
					</div>
					<!-- Tab Content -->
					<div id="contact-tab-partner" class="contact-tab-content active">
						<div class="contact-tab-wrapper">
							<div class="formFields">
								<label for="">Company Name*</label>
								<input type="text" placeholder="company name">
							</div>
							<div class="formFields">
								<label for="">Your Target Market</label>
								<div class="customSelect active">
									<div class="selectBtn">
										<span class="sBtntext">Select Country</span>
										<img src="http://localhost/everta/wp-content/themes/everta/images/dropdown-icon.svg"
											alt="everta">
									</div>
									<ul class="options">
										<li class="option">India</li>
										<li class="option">USA</li>
										<li class="option">UK</li>
									</ul>
								</div>
							</div>
							<div class="formFields">
								<label for="">Write a Message</label>
								<textarea name="" id="" placeholder="Write your message here..."></textarea>
							</div>
						</div>
					</div>
					<div id="contact-tab-charger" class="contact-tab-content">
						<div class="contact-tab-wrapper">
							<div class="formFields">
								<label for="">Location</label>
								<div class="customSelect active">
									<div class="selectBtn">
										<span class="sBtntext">Select Country</span>
										<img src="http://localhost/everta/wp-content/themes/everta/images/dropdown-icon.svg"
											alt="everta">
									</div>
									<ul class="options">
										<li class="option">India</li>
										<li class="option">USA</li>
										<li class="option">UK</li>
									</ul>
								</div>
							</div>
							<div class="formFields">
								<label for="">How many chargers do you need?*</label>
								<div class="charges">
									<span class="chargesCount">
										<label>
											<input type="radio" name="radio">
											<span>1-4</span>
										</label>
									</span>
									<span class="chargesCount">
										<label>
											<input type="radio" name="radio">
											<span>5-9</span>
										</label>
									</span>
									<span class="chargesCount">
										<label>
											<input type="radio" name="radio">
											<span>10-24</span>
										</label>
									</span>
									<span class="chargesCount">
										<label>
											<input type="radio" name="radio">
											<span>24-49</span>
										</label>
									</span>
									<span class="chargesCount">
										<label>
											<input type="radio" name="radio">
											<span>50+</span>
										</label>
									</span>
								</div>
							</div>
							<div class="formFields">
								<label for="">Write a Message</label>
								<textarea name="" id="" placeholder="Write your message here..."></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>