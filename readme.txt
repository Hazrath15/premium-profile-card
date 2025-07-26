=== Premium Profile Card ===
Contributors: hazrathali
Tags: profile, user, card, member, display
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 7.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display beautiful and customizable premium profile cards for your users using a simple shortcode.

== Description ==

Premium Profile Card is a lightweight and flexible plugin that allows you to display user profile information in a stylish card format anywhere on your WordPress site using a shortcode.

Features include:

* Easy-to-use shortcode `[profile_card]`
* Autoloaded helper functions and organized code using Composer
* Responsive design with customizable layout
* Clean and extendable codebase following PSR-4 autoloading standard
* Developer-friendly structure for building on top

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/premium-profile-card` directory, or install the plugin through the WordPress plugins screen directly.
2. Run `composer install` inside the plugin folder (for autoloading support).
3. Activate the plugin through the 'Plugins' screen in WordPress.
4. Use the shortcode `[profile_card]` anywhere you want to display the logged-in user's profile card.

== Frequently Asked Questions ==

= Can I show another user's profile card? =
Not yet — the shortcode currently shows only the logged-in user. Future updates will include a `user_id` attribute.

= Is this plugin customizable? =
Yes! The code is fully open and written using modern PHP and WordPress standards. Developers can override templates or extend functionality.

== Screenshots ==

1. Default profile card style (screenshot coming soon)

== Changelog ==

= 1.0.0 =
* Initial release
* Shortcode support
* Composer autoloading enabled

== Upgrade Notice ==

= 1.0.0 =
Initial version

== License ==

This plugin is licensed under the GPLv2 or later. See https://www.gnu.org/licenses/gpl-2.0.html for details.
