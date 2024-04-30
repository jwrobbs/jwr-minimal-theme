<?php
/**
 * Theme functions file - Block of content
 *
 * @package JWR_Minimal
 *
 * @since 2024-04-30
 */

namespace JWR_Minimal\functions;

defined( 'ABSPATH' ) || exit;

/**
 * Class Content_Blocks
 */
class Content_Blocks {
	/**
	 * Get linked category list.
	 *
	 * @param int|false $post_id The post ID.
	 *
	 * @return string
	 */
	public static function get_linked_category_list( $post_id = false ) {
		$post_id         = $post_id ? $post_id : get_the_ID();
		$post_categories = get_the_category( get_the_ID() );

		$categories_array = array();
		foreach ( $post_categories as $category ) {
			$category->name     = \str_replace( ' ', '&nbsp;', $category->name );
			$categories_array[] = array( $category->name, get_category_link( $category->term_id ) );
		}

		$count = 0;
		$html  = '';

		foreach ( $categories_array as $category ) {

			if ( 0 !== $count ) {
				$html .= ', ';
			}
			$html .= "<a href='$category[1]'>$category[0]</a>";

			++$count;
		}

		return $html;
	}
}
