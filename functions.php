<?php
/**
 * Theme functions file
 *
 * @package JWR_Minimal
 * @since 2024-01-28
 * @version 1.0
 */

namespace JWR_Minimal;

use JWR_Minimal\functions\Theme_Setup;

defined( 'ABSPATH' ) || exit;

require_once 'autoloader.php';

new Theme_Setup();
