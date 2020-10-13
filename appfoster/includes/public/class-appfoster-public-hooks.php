<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'APPFOSTER_Public_Hooks' ) ) {
    
    include_once APPFOSTER_PLUGIN_FILE . 'includes/public/class-appfoster-public-functions.php';

    class APPFOSTER_Public_Hooks {

        public function __construct() {
            $public_function_instance = new APPFOSTER_Public_Functions();
            add_action( 'template_include', [ $public_function_instance, 'appfoster_template' ] );
            add_action( 'wp_enqueue_scripts', [ $public_function_instance, 'appfoster_enqueue_scripts' ] );
        }

    }

}

new APPFOSTER_Public_Hooks();