<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all google fonts
 */
 class Google_Font_Dropdown_Custom_Control {
   

    /**
     * Get the google fonts from the API or in the cache
     */
    public function get_fonts( $amount = 500 ) {
        
        $selectDirectory = get_template_directory(). '/inc/customizer/';
        $selectDirectoryInc = get_template_directory(). '/inc/customizer/';

        $finalselectDirectory = '';

        if ( is_dir( $selectDirectory ) ) {
            $finalselectDirectory = $selectDirectory;
        }

        if ( is_dir( $selectDirectoryInc ) ) {
            $finalselectDirectory = $selectDirectoryInc;
        }

        $fontFile = $finalselectDirectory . '/json/google-web-fonts.json';

        if ( file_exists( $fontFile ) ) {
            global $wp_filesystem;
            if ( empty( $wp_filesystem ) ) {
                tokopress_include_file( ABSPATH . '/wp-admin/includes/file.php' );
                WP_Filesystem();
            }
            $content = json_decode( $wp_filesystem->get_contents( $fontFile ) );
        }

        if( $amount == 'all' ) {
            return $content->items;
        } else {
            return array_slice( $content->items, 0, $amount );
        }
    }
 }