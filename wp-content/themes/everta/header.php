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
						<img src="<?php bloginfo('template_directory'); ?>/images/everta-logo.svg" alt=""/>
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
                                echo '<a href="' . esc_url($sub_item->url) . '">' . esc_html($sub_item->title) . '</a>';
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
								<div class="customSelect" id="popupSelect">
									<div class="selectBtn">
										<span class="sBtntext">Select Country</span>
										<img src="<?php bloginfo('template_directory'); ?>/images/dropdown-icon.svg"
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
								<div class="customSelect" id="popupSelect">
									<div class="selectBtn">
										<span class="sBtntext">Select Country</span>
										<img src="<?php bloginfo('template_directory'); ?>/images/dropdown-icon.svg"
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
								<label for="" class="lowercase">How many chargers do you need?*</label>
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
					<div class="submitDiv">
						<input type="submit" value="Send Contact Request">
					</div>
				</div>
			</div>
		</div>