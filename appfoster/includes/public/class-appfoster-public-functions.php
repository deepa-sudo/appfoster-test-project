<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'APPFOSTER_Public_Functions' ) ) {

    class APPFOSTER_Public_Functions {

        public function appfoster_template( $template ) {
            if ( get_query_var( 'main_page' ) == 'appfoster' &&  get_query_var( 'page_test' ) == 'test' ) {
                return APPFOSTER_PLUGIN_FILE . 'templates/public/appfoster-template.php';
            }
            return $template;
        }

        public function appfoster_enqueue_scripts() {
            if ( get_query_var( 'main_page' ) == 'appfoster' &&  get_query_var( 'page_test' ) == 'test' ) {
                wp_enqueue_style( 'appfoster-front-css', APPFOSTER_PLUGIN_URL . '/assets/css/public.css', array( 'dashicons' ), APPFOSTER_SCRIPT_VERSION );
                wp_enqueue_script( 'appfoster-front-jss', APPFOSTER_PLUGIN_URL . '/assets/js/public.js', array(), APPFOSTER_SCRIPT_VERSION);
                wp_localize_script( 'appfoster-front-jss', 'appfoster_object', 
                    array( 
                        'name'    => esc_html__( 'Name', 'appfoster' ),
                        'species' => esc_html__( 'Species', 'appfoster' ),
                        'food'    => esc_html__( 'Foods', 'appfoster' ),
                        'like'    => esc_html__( 'Likes', 'appfoster' ),
                        'dislike' => esc_html__( 'Dislikes', 'appfoster' ),
                        'error'   => esc_html__( 'Something went Wrong!!!', 'appfoster' ),
                    )
                );
            }
        }

    }

}