<?php
/**
 * Theme functions file - TEST
 *
 * @package JWR_Minimal
 *
 * @since 2024-04-30
 */

namespace JWR_Minimal\functions;

defined( 'ABSPATH' ) || exit;

/**
 * Class Test
 */
class JWR_Test {
	/**
	 * Setup the class
	 *
	 * @param string $name The name of the class.
	 * @return void
	 */
	public function __construct(
		private string $name,
	) {
		$this->name = $name;
	}
}
