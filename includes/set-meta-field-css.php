<?php
/**
 * 
 * The function `cpfn_apply_custom_css` adds custom CSS to the head section of a WordPress website
 * based on certain conditions.
 * 
 */
function cpfn_apply_custom_css() {

    $cpfn_post_id = get_the_ID();
     
    // Add css to single page of 'cpfn_content' custom post 
    if( is_singular( 'cpfn_content' ) ) {

        // Get custom css
        $cpfn_custom_css = get_post_meta(  $cpfn_post_id, 'cpfn_textarea_saved_css', true);

        if( ! empty( $cpfn_custom_css ) ) {

            echo '<style id="cpfn-css">' . wp_strip_all_tags( $cpfn_custom_css ) . '</style>';

        }
    }
    // If it is other than this 'cpfn_content' custom post, then add custom css to the single page
    if( ! is_singular( 'cpfn_content' ) ) {
        
        // Get custom css
        $cpfn_post_content_id = get_post_meta( $cpfn_post_id, 'cpfn_content_post_id', true);

         // Get custom css
        $cpfn_custom_css = get_post_meta( $cpfn_post_content_id, 'cpfn_textarea_saved_css', true);

        // Get select post id
        $cpfn_selected_post_id = get_post_meta( $cpfn_post_content_id, 'cpfn_selected_post_id', true);


        // If the content is added to the other post add css to that post
        if( ! empty( $cpfn_custom_css ) && ! empty( $cpfn_selected_post_id ) ) {

            echo '<style id="cpfn-css">' . wp_strip_all_tags( $cpfn_custom_css ) . '</style>';

        }
    }
}
// Add CSS within the Head tag of single post
add_action( 'wp_head', 'cpfn_apply_custom_css' );

