<?php
namespace PremiumProfileCard\Addons\Controls;

trait Content_Controls {

    public function register_content_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'premium-profile-card' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'premium-profile-card' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'John Doe', 'premium-profile-card' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'premium-profile-card' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Web Developer', 'premium-profile-card' ),
            ]
        );

        $this->end_controls_section();
    }
}
?>