<?php
/*
Plugin Name: Premium Profile Card
Description: Display customizable premium profile cards on your WordPress site. Requires Elementor plugin.
Version: 1.0.0
Author: Hazrath Ali
Author URI: https://github.com/Hazrath15
License: GPLv2 or later
Text Domain: premium-profile-card
Requires Plugins: elementor
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 7.2
*/
namespace PremiumProfileCard;
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

new PRPC_Addons_Loader();
// Activation and deactivation hooks
register_activation_hook( __FILE__, ['PremiumProfileCard\PRPC_Activator', 'activate'] );
register_deactivation_hook( __FILE__, ['PremiumProfileCard\PRPC_Deactivator', 'deactivate'] );
?>