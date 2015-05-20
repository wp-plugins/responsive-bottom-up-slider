<?php
/*
Plugin Name: Responsive Bottom-Up Slider
Plugin URI: http://www.wordpress.org/plugins/responsive-bottom-up-slider/
Description: A simple, configurable slider that comes up from the bottom of the page after a certain amount of time. Perfect for newsletter signup prompts. Easily closed by the user. Javascript-based cookie handling is compatible with Wordpress front-end caching strategies.
Author: Robert Peake
Version: 1.0
Author URI: http://www.robertpeake.com/
Text Domain: responsive_slider
Domain Path: /languages/
*/
if ( !function_exists( 'add_action' ) ) {
    die();
}
require_once 'classes/ResponsiveSlider.php';
ResponsiveSlider::init();
