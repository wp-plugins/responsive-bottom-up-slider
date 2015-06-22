<?php
class ResponsiveSlider {

    public static function init() {
        add_action('wp_enqueue_scripts', array('ResponsiveSlider','load_scripts'));
        add_action( 'plugins_loaded', array('ResponsiveSlider', 'load_textdomain' ));
        add_action( 'admin_menu', array('ResponsiveSlider', 'register_menu_page' ));
        add_action( 'admin_init', array('ResponsiveSlider', 'register_settings' ));
    }

    public static function load_scripts() {
        wp_enqueue_script('rs_js_cookie', plugins_url( '/js/js.cookie.js', dirname( __FILE__ )));
        wp_register_script('rs_main', plugins_url( '/js/main.js', dirname( __FILE__ )), array(), false, true);
        wp_localize_script('rs_main', 'rs' , array('enabled' => get_option('rs_enabled'), 'content' => get_option('rs_content'), 'display_secs' => get_option('rs_display_secs'), 'hide_days' => get_option('rs_hide_days') ) );
        wp_enqueue_script('rs_main');
    }

    public static function load_textdomain() {
        load_plugin_textdomain( 'responsive_slider', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    public static function register_menu_page(){
        add_options_page( __('Responsive Bottom-Up Slider Options','responsive_slider'), __('Responsive Bottom-Up Slider','responsive_slider'), 'manage_options', str_replace('classes/','', plugin_dir_path(  __FILE__ )).'admin.php');
    }

    public static function register_settings() {
        global $wpdb;

        /* user-configurable values */
        add_option('rs_enabled', '0');
        register_setting('responsive_slider', 'rs_enabled', array('ResponsiveSlider', 'checkbox_filter' ));
        add_option('rs_content', '');
        register_setting( 'responsive_slider', 'rs_content', array('ResponsiveSlider', 'string_filter' ) );
        add_option('rs_display_secs', '30');
        register_setting( 'responsive_slider', 'rs_display_secs', array('ResponsiveSlider', 'integer_filter' ) );
        add_option('rs_hide_days', '365');
        register_setting( 'responsive_slider', 'rs_hide_days', array('ResponsiveSlider', 'integer_filter' ) );
        
    }
    
    public static function checkbox_filter($check) {
        if ($check != "1") {
            return "0";
        } else {
            return $check;
        }
    }
    
    public static function string_filter($str) {
        return filter_var($str, FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW & FILTER_FLAG_STRIP_HIGH);
    }
    
    public static function integer_filter( $int ) {
        return filter_var($int, FILTER_SANITIZE_NUMBER_INT);
    }
}
