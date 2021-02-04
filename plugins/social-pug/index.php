<?php
/**
 * Plugin Name: Grow Social by Mediavine
 * Plugin URI: https://marketplace.mediavine.com/grow-social-pro/
 * Description: Add beautiful social sharing buttons to your posts, pages and custom post types.
 * Version: 1.18.2
 * Author: Mediavine
 * Text Domain: social-pug
 * Author URI: https://marketplace.mediavine.com/
 * License: GPL2
 *
 * == Copyright ==
 * Copyright 2016 Mediavine (www.mediavine.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

// Maintain PHP 5.2 compatibility in THIS FILE ONLY for upgrade safety.

/**
 * Checks for a minimum version
 *
 * @param int|string $minimum Minimum version to check
 * @param int|string $compare 'php' to check against PHP, 'wp' to check against WP, or a specific
 *                            value to check against
 * @return boolean True if the version is compatible
 */
function mv_grow_is_compatible_check( $minimum, $compare = 0 ) {
	if ( 'php' === $compare ) {
		$compare = PHP_VERSION;
	}
	if ( 'wp' === $compare ) {
		global $wp_version;
		$compare = $wp_version;
	}

	if ( version_compare( $compare, $minimum, '<' ) ) {
		return false;
	}

	return true;
}

/**
 * Checks if Grow is compatible
 *
 * @param boolean $return_errors Should the errors found be returned instead of false
 * @return boolean|array True if compatible. False or array of errors if not compatible
 */
function mv_grow_is_compatible( $return_errors = false ) {
	$minimum_wp      = '4.7';
	$deprecated_wp   = '5.2';
	$minimum_php     = '5.6.40';
	$deprecated_php  = '7.1'; // WP requires 5.6.20, but that's not the last version of EOL PHP 5.6
	$recommended_php = '7.4';
	$errors          = array();

	if ( ! mv_grow_is_compatible_check( $minimum_php, 'php' ) ) {
		$errors['php']             = $minimum_php;
		$errors['recommended_php'] = $recommended_php;
	}

	if ( ! mv_grow_is_compatible_check( $minimum_wp, 'wp' ) ) {
		$errors['wp'] = $minimum_wp;
	}

	if ( $return_errors ) {
		if ( ! mv_grow_is_compatible_check( $deprecated_php, 'php' ) ) {
			$errors['deprecated_php']  = $deprecated_php;
			$errors['recommended_php'] = $recommended_php;
		}

		if ( ! mv_grow_is_compatible_check( $deprecated_wp, 'wp' ) ) {
			$errors['deprecated_wp'] = $deprecated_wp;
		}
	}

	if ( ! empty( $errors ) ) {
		if ( $return_errors ) {
			return $errors;
		}
		return false;
	}

	return true;
}

/**
 * Displays a WordPress admin error notice
 *
 * @param string $message Message to display in notice
 * @return void
 */
function mv_grow_admin_error_notice( $message ) {
	printf(
		'<div class="notice notice-error"><p>%1$s</p></div>',
		wp_kses(
			$message,
			array(
				'strong' => array(),
				'code'   => array(),
				'br'     => array(),
				'a'      => array(
					'href'   => true,
					'target' => true,
				),
			)
		)
	);
}

/**
 * Adds incompatibility notices to admin if WP or PHP needs to be updated
 *
 * @return void
 */
function mv_grow_incompatible_notice() {
	$compatible_errors = mv_grow_is_compatible( true );
	$deactivate_plugin = false;
	if ( is_array( $compatible_errors ) ) {
		if ( isset( $compatible_errors['php'] ) ) {
			$notice = sprintf(
				// translators: Required PHP version number; Recommended PHP version number; Current PHP version number; Link to learn about updating PHP
				__( '<strong>Grow Social by Mediavine</strong> requires PHP version %1$s or higher, but recommends %2$s or higher. This site is running PHP version %3$s. %4$s.', 'mediavine' ),
				$compatible_errors['php'],
				$compatible_errors['recommended_php'],
				PHP_VERSION,
				'<a href="https://wordpress.org/support/update-php/" target="_blank">' . __( 'Learn about updating PHP', 'mediavine' ) . '</a>'
			);
			mv_grow_admin_error_notice( $notice );
			$deactivate_plugin = true;
		}
		if ( isset( $compatible_errors['wp'] ) ) {
			global $wp_version;
			$notice = sprintf(
				// translators: Required WP version number; Current WP version number
				__( '<strong>Grow Social by Mediavine</strong> requires WordPress %1$s or higher. This site is running WordPress %2$s. Please update WordPress to activate <strong>Grow Social by Mediavine</strong>.', 'mediavine' ),
				$compatible_errors['wp'],
				$wp_version
			);
			mv_grow_admin_error_notice( $notice );
			$deactivate_plugin = true;
		}
		if ( isset( $compatible_errors['deprecated_php'] ) ) {
			$notice = sprintf(
				// translators: Required PHP version number; Recommended PHP version number; Current PHP version number; Link to learn about updating PHP
				__( 'A future version of <strong>Grow Social by Mediavine</strong> will require PHP version %1$s, but recommends %2$s or higher. This site is running PHP version %3$s. To maintain compatibility with <strong>Grow Social by Mediavine</strong>, please upgrade your PHP version. %4$s.', 'mediavine' ),
				$compatible_errors['deprecated_php'],
				$compatible_errors['recommended_php'],
				PHP_VERSION,
				'<a href="https://wordpress.org/support/update-php/" target="_blank">' . __( 'Learn about updating PHP', 'mediavine' ) . '</a>'
			);
			mv_grow_admin_error_notice( $notice );
		}

		// Deprecated WP warning
		if ( isset( $compatible_errors['deprecated_wp'] ) ) {
			global $wp_version;
			$notice  = '<div style="border-bottom: solid 3px #5ca2a8; font-size: 1.25em; padding-bottom: 1em; margin-bottom: 1em;">';
			$notice .= sprintf(
				// translators: Date within styled tag; Required WP version number
				__( 'Starting %1$s, WordPress %2$s will be required for all functionality, however keeping WordPress up-to-date at the latest version is still recommended. To maintain future compatibility with <strong>Grow Social by Mediavine</strong>, please update WordPress.', 'mediavine' ),
				'<strong style="font-size: 1.2em;">' . __( 'January 2021', 'mediavine' ) . '</strong>',
				$compatible_errors['deprecated_wp']
			);
			$notice .= '<br><br><a href="https://wordpress.org/support/article/updating-wordpress/" target="_blank">' . __( 'Learn about updating WordPress', 'mediavine' ) . '</a>';
			mv_grow_admin_error_notice( $notice );
		}

		// Should we deactivate the plugin?
		if ( $deactivate_plugin ) {
			mv_grow_admin_error_notice( __( '<strong>Grow Social by Mediavine</strong> has been deactivated.', 'mediavine' ) );
			deactivate_plugins( plugin_basename( __FILE__ ) );
			return;
		}
	}
}

function mv_grow_throw_warnings() {
	$compatible    = true;
	$missing_items = array();
	if ( ! extension_loaded( 'mbstring' ) ) {
		$missing_items[] = 'php-mbstring';
		$compatible      = false;
	}
	if ( ! extension_loaded( 'xml' ) ) {
		$missing_items[] = 'php-xml';
		$compatible      = false;
	}
	if ( $compatible || empty( $missing_items ) ) {
		return;
	}

	$message = trim( implode( ', ', $missing_items ), ', ' );

	$notice = sprintf(
		// translators: a list of disabled PHP extensions
		__( '<strong>Grow Social by Mediavine</strong> requires the following disabled PHP extensions in order to function properly: <code>%1$s</code>.<br/><br/>Your hosting environment does not currently have these enabled.<br/><br/>Please contact your hosting provider and ask them to ensure these extensions are enabled.', 'mediavine' ),
		$message
	);

	mv_grow_admin_error_notice( $notice );
	return;
}

add_action( 'admin_notices', 'mv_grow_incompatible_notice' );
add_action( 'admin_head', 'mv_grow_throw_warnings' );

// Fire up the plugin if system is compatible & Composer is available.
if ( mv_grow_is_compatible() && file_exists( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' ) ) {
	define( 'MV_GROW_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
	require_once __DIR__ . '/mediavine-grow.php';
}


/**
 * Returns plugin activation path
 *
 * @return string
 */
function mv_grow_get_activation_path() {
	return __FILE__;
}
