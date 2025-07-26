<?php
namespace PremiumProfileCard\Addons;

use PremiumProfileCard\Frontend;
use PremiumProfileCard\Addons\Controls\Content_Controls;
use PremiumProfileCard\Addons\Controls\Style_Controls;

class Premium_Profile_Card extends \Elementor\Widget_Base {
	use Content_Controls;
    use Style_Controls;
	
    public function get_name() {
		return 'premium-profile-card';
	}

	public function get_title() {
		return esc_html__( 'Premium Profile Card', 'premium-profile-card' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'general' ];
	}

    protected function register_controls() {

		$this->register_content_controls();
        $this->register_style_controls();
	}

    public function render() {
        Frontend\Profile_Card_View::render( $this->get_settings_for_display() );
    }
}

?>