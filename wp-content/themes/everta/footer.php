<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Everta
 */

?>

<footer>
    <div class="footerContainer">
        <div class="footerLeft">
            <?php if (have_rows('logo_section', 'option')) : ?>
            <?php while (have_rows('logo_section', 'option')) : the_row(); ?>
            <div class="footerLogo">
                <a href="<?php echo get_site_url(); ?>">
                    <?php $footerImage = get_sub_field('logo_image', 'option');
                    if (!empty($footerImage)) : ?>
                    <img src="<?php echo esc_url($footerImage['url']); ?>" loading="lazy"
                        alt="<?php echo esc_attr($footerImage['alt']); ?>" />
                    <?php endif; ?>
                </a>
            </div>
            <div class="footerSocialmedia">
                <?php if (have_rows('social_icons', 'option')) : ?>
                    <?php while (have_rows('social_icons', 'option')) : the_row(); ?>
                        <?php 
                        $icon_url = get_sub_field('icon_link', 'option'); // Get the URL field
                        $icon_svg = get_sub_field('icon_svg', 'option'); // Get the SVG field
                        ?>
                        <a href="<?php echo esc_url($icon_url); ?>" class="socialmediaIcons" target="_blank" rel="noopener noreferrer">
                            <i class="socialIcons <?php echo $icon_svg;?>"></i> 
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="footerRight">
            <div class="footerRightContainer">
                <div class="footerMenus">
                    <?php if (have_rows('footer_menu', 'option')) : ?>
                    <?php while (have_rows('footer_menu', 'option')) : the_row(); ?>
                    <div class="footerMenuWrapper">
                        <p><?php echo get_sub_field('company', 'option'); ?></p>
                        <?php
                            wp_nav_menu([
                                'menu'            => 'Company',
                                'theme_location'  => 'Company',

                            ]);
                         ?>
                    </div>
                    <?php /* ?>
                    <div class="footerMenuWrapper">
                        <p><?php echo get_sub_field('ac_charging', 'option'); ?></p>
                        <?php
                           wp_nav_menu([
                                'menu'            => 'AC Charging',
                                'theme_location'  => 'AC Charging',

                            ]);
                            
                        ?>
                    </div>
                    <?php */ ?>
                    <div class="footerMenuWrapper">
                        <p><?php echo get_sub_field('dc_charging', 'option'); ?></p>
                        <?php
                            wp_nav_menu([
                                'menu'            => 'DC Charging',
                                'theme_location'  => 'DC Charging',

                            ]);
                            
                        ?>
                    </div>
                  <?php /* ?>  <div class="footerMenuWrapper">
                        <p><?php echo get_sub_field('digital_products', 'option'); ?></p>
                        <?php
                           wp_nav_menu([
                                'menu'            => 'Digital Products',
                                'theme_location'  => 'Digital Products',

                            ]);
                        
                        ?>
                    </div>
					    <?php */ ?>
                    <div class="footerMenuWrapper">
                        <p><?php echo get_sub_field('resources', 'option'); ?></p>
                        <?php
                           wp_nav_menu([
                                'menu'            => 'Resources',
                                'theme_location'  => 'Resources',

                            ]);
                        
                        ?>
                    </div>
                
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if (have_rows('address_contact_menu', 'option')) : ?>
                    <?php while (have_rows('address_contact_menu', 'option')) : the_row(); ?>
                    <div class="footerMenuWrapper" id="footerAddress">
                        <p><?php echo get_sub_field('address_title', 'option'); ?></p>
                        <ul>
                            <li><a href="javascript:void(0);"><?php echo get_sub_field('address', 'option'); ?></a></li>
                        </ul>
                    </div>
                    <div class="footerMenuWrapper">
                        <p><?php echo get_sub_field('contact_title', 'option'); ?></p>
                        <ul>
                            <li><a href="tel:<?php echo get_sub_field('tel_number', 'option'); ?>" class="underline"><?php echo get_sub_field('tel_number', 'option'); ?></a></li>
                            <li><a href="mailto:<?php echo get_sub_field('email_address', 'option'); ?>" class="underline"><?php echo get_sub_field('email_address', 'option'); ?></a></li>
                        </ul>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="footerRights">
                    <?php if (have_rows('footer_bottom', 'option')) : ?>
                    <?php while (have_rows('footer_bottom', 'option')) : the_row(); ?>
                    <p><?php echo get_sub_field('copy_right_text', 'option'); ?></p>
                    <div class="footerBottomLinks">
                        <?php if (have_rows('bottom_pages', 'option')) : ?>
                        <?php while (have_rows('bottom_pages', 'option')) : the_row(); ?>
                        <a href="<?php echo get_sub_field('pages_link', 'option'); ?>"><?php echo get_sub_field('pages_name', 'option'); ?></a>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<?php wp_footer(); ?>
<script>
   document.addEventListener('DOMContentLoaded', function () {
    const radios = document.querySelectorAll('input[name="chargers-needed"]');
    const hiddenField = document.querySelector('input[name="chargers-needed-hidden"]');

    radios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (hiddenField) {
                hiddenField.value = this.value; // Assign selected value to hidden field
            }
        });
    });
});

</script>
</body>

</html>