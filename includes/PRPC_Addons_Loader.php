<?php
namespace PremiumProfileCard;

use PremiumProfileCard\Addons\Premium_Profile_Card;

if ( ! class_exists('PRPC_Addons_Loader') ) {
    class PRPC_Addons_Loader {
        public function __construct() {
            add_action( 'elementor/widgets/register', [$this, 'register_new_widgets'] );
        }

        public function register_new_widgets( $widgets_manager ) {
            $widgets_manager->register( new Premium_Profile_Card() );
        }
    }
}
?>