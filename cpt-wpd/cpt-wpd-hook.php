<?php

/**
* Plugin Name:cpt-wpd-hook
* Plugin URI: https://www.your-site.com/
* Description: Wp hook Product
* Version: 0.1
* Author: your-name
* Author URI: https://www.your-site.com/
**/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">Click to Read!</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

function show_last_ten() {

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
    );
    $loop = new WP_Query($args);
    while ( $loop->have_posts() ) {
        $loop->the_post();
        ?>
        <div class="entry-content">
            <?php the_title(); ?>
            <?php the_content(); ?>
        </div>
        <?php
    }


}













