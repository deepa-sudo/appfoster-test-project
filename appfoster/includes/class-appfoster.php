<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Appfoster' ) ) {

    final class Appfoster {

        
        /**
         * Variable Stores Plugin Version.
         *
         * @var string
         */
        public $version = '1.0.0';

         /**
         * The single instance of the class.
         *
         * @var Appfoster
         * @since 1.0.0
         */
        protected static $_instance = null;

        public function __construct() {
            $this->define_constant();
            $this->intailize_hooks();
            $this->include_files();
        }

        /**
         * This function will Define Constant Variable
         */
        public function define_constant() {
            defined( 'APPFOSTER_PLUGIN_FILE' ) || define( 'APPFOSTER_PLUGIN_FILE', plugin_dir_path( APPFOSTER_FILE ) );
            defined( 'APPFOSTER_PLUGIN_URL' ) || define( 'APPFOSTER_PLUGIN_URL', plugin_dir_url( APPFOSTER_FILE ) );
            defined( 'APPFOSTER_SCRIPT_VERSION' ) || define( 'APPFOSTER_SCRIPT_VERSION', '1.1.0' );
            defined( 'APPFOSTER_PLUGIN_BASENAME' ) || define( 'APPFOSTER_PLUGIN_BASENAME', plugin_basename( APPFOSTER_FILE ) );
        }

        public function intailize_hooks() {
            add_action( 'plugins_loaded', [$this, 'load_textdomain' ] );
            register_activation_hook( APPFOSTER_FILE, [ $this, 'install' ] );
            add_filter( 'query_vars', [ $this, 'insertcustom_vars' ] );
            add_filter( 'rewrite_rules_array', [ $this, 'insertcustom_rules'] );
        }

        public function load_textdomain() {
            // Load Text domain
            load_plugin_textdomain( 'wk-multi-share-cart', false, basename( dirname( APPFOSTER_FILE ) ) . '/languages' );
        }

        /**
         * Main Appfoster Instance.
         *
         * Ensures only one instance of Appfoster is loaded or can be loaded.
         *
         * @return Appfoster - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function include_files() {
            if ( ! is_admin() ) {
                include_once APPFOSTER_PLUGIN_FILE . 'includes/public/class-appfoster-public-hooks.php';
            }
        }

        public function install() {
            flush_rewrite_rules();
        }

        public function insertcustom_vars( $vars ) {
            $vars[] = 'page_test';
            $vars[] = 'main_page';
            return $vars;
        }

        public function insertcustom_rules( $old_rules ) {

            $page_name = 'appfoster';
            $newrules = [
                $page_name . '/test/?' => 'index.php?main_page=' . $page_name . '&page_test=test',
            ];

            return $newrules + $old_rules;
        }

    }

}
