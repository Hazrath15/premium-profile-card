<?php
namespace PremiumProfileCard\Addons\Controls;

trait Style_Controls {

    public function register_style_controls() {
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Style', 'premium-profile-card' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'premium-profile-card' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .premium-profile-card-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
}
?>