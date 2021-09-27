<?php 

class Featured_listing_locatepress_meta {



	public function featured_listing_for_locatepress_init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'featured_listing_for_locatepress_addmeta' )         );
		add_action( 'save_post',             array( $this, 'featured_listing_for_locatepress_save_metabox' ), 10, 2 );

	}

	public function featured_listing_for_locatepress_addmeta() {

		add_meta_box(
			'featured-listing',
			__( 'Featured Listing', 'locatepress' ),
			array( $this, 'featured_listing_for_locatepress_meta' ),
			'map_listing',
			'side',
			'high'
		);

	}

	public function featured_listing_for_locatepress_meta( $post ) {

		wp_nonce_field( 'nonce_action', 'nonce' );
		
		$lp_featured_listing = get_post_meta( $post->ID, 'featured-listing-checkbox', true );
		
		echo '<table class="form-table">';
		echo '	<tr>';
		echo '		<td>';
		?>
        <label for="featured-checkbox">
            <input type="checkbox" name="featured-listing-checkbox" id="featured-listing-checkbox" value="1" <?php if ( isset ( $lp_featured_listing ) ) checked( $lp_featured_listing, '1' ); ?> /><?php _e('Make This Listing Featured','locate-press') ?></label>

  		<?php
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function featured_listing_for_locatepress_save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['nonce'] ) ? $_POST['nonce'] : '';
		$nonce_action = 'nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Check if the user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		

		

		if( isset( $_POST[ 'featured-listing-checkbox' ] ) ) {
		    update_post_meta( $post_id, 'featured-listing-checkbox', '1' );
		} else {
		    update_post_meta( $post_id, 'featured-listing-checkbox', '0' );
		}

		}

}
