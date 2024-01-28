<?php
/**
 * Category line
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

$post_categories = get_the_category_list( ', ' );
$post_categories = "<span class='post-categories'>$post_categories</span>";

echo wp_kses_post( $post_categories );
