<?php

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

// Register the Metabox
function tokopress_metabox_pasar_header_add() {
	add_meta_box( 'tokopress-meta-box-event', __( 'Header Settings', 'tokopress' ), 'tokopress_metabox_pasar_header_output', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'tokopress_metabox_pasar_header_add' );

// Output the Metabox
function tokopress_metabox_pasar_header_output( $post ) {
	// create a nonce field
	wp_nonce_field( 'tokopress_meta_box_header_custom_nonce', 'tokopress_meta_box_nonce' ); 

	$header_custom = get_post_meta( $post->ID, '_tokopress_header_custom', true );
	?>
	
	<table class="form-table">
		<tr>
			<th>
				<label for="tokopress_header_custom"><?php _e( 'Additional Custom Header', 'tokopress' ); ?>:</label>
			</th>
			<td>
				<textarea class="large-text" name="tokopress_header_custom" id="tokopress_header_custom" cols="60" rows="5"><?php echo esc_textarea( $header_custom ); ?></textarea>
				<br>
				<span class="description"><?php _e( 'This additional header will be loaded below header logo.', 'tokopress' ); ?></span>
			</td>
	    </tr>
    </table>
    
	<?php
}

// Save the Metabox values
function tokopress_metabox_pasar_header_save( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['tokopress_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['tokopress_meta_box_nonce'], 'tokopress_meta_box_header_custom_nonce' ) ) return;

	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;

	if( isset( $_POST['tokopress_header_custom'] ) )
		update_post_meta( $post_id, '_tokopress_header_custom', wp_kses_post( $_POST['tokopress_header_custom'] ) );
}
add_action( 'save_post', 'tokopress_metabox_pasar_header_save' );
