<?php


/**
* Plugin Name:lr-meta-box-seo
* Plugin URI: https://www.lucarulvoni.it/plugins/
* Description: add a seo custom meta box for your page
* Version: 0.1
* Author: Luca Rulvoni
* Author URI: https://www.lucarulvoni.it/
**/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'admin_menu', 'misha_add_metabox' );
// or add_action( 'add_meta_boxes', 'misha_add_metabox' );
// or add_action( 'add_meta_boxes_{post_type}', 'misha_add_metabox' );

function misha_add_metabox() {

	add_meta_box(
		'misha_metabox', // metabox ID
		'Meta Box', // title
		'misha_metabox_callback', // callback function
		'page', // add meta box to custom post type (or post types in array)
		'normal', // position (normal, side, advanced)
		'default' // priority (default, low, high, core)
	);

}

// it is a callback function which actually displays the content of the meta box
function misha_metabox_callback( $post ) {

	echo 'hey';
	
}

function misha_metabox_callback( $post ) {

	$seo_title = get_post_meta( $post->ID, 'seo_title', true );
	$seo_robots = get_post_meta( $post->ID, 'seo_robots', true );

	// nonce, actually I think it is not necessary here
	wp_nonce_field( 'somerandomstr', '_mishanonce' );

	echo '<table class="form-table">
		<tbody>
			<tr>
				<th><label for="seo_title">SEO title</label></th>
				<td><input type="text" id="seo_title" name="seo_title" value="' . esc_attr( $seo_title ) . '" class="regular-text"></td>
			</tr>
			<tr>
				<th><label for="seo_tobots">SEO robots</label></th>
				<td>
					<select id="seo_robots" name="seo_robots">
						<option value="">Select...</option>
						<option value="index,follow"' . selected( 'index,follow', $seo_robots, false ) . '>Show for search engines</option>
						<option value="noindex,nofollow"' . selected( 'noindex,nofollow', $seo_robots, false ) . '>Hide for search engines</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>';

}