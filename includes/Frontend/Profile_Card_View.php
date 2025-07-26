<?php
namespace PremiumProfileCard\Frontend;

use PremiumProfileCard\Addons\Premium_Profile_Card;
use Elementor\Widget_Base;
if ( ! class_exists( 'Profile_Card_View' ) ) {
    class Profile_Card_View {
        public static function render($settings = []) {
            ?>
            <div class="premium-profile-card">
                <h2 class="premium-profile-card-title"><?php echo esc_html($settings['title']); ?></h2>
                <p class="premium-profile-card-description"><?php echo esc_html($settings['description']); ?></p>
            </div>
            <?php
        }
    }
}
?>