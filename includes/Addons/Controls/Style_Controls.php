<?php
namespace PremiumProfileCard\Addons\Controls;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

trait Style_Controls {

    public function register_style_controls() {
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Card Layout', 'premium-profile-card' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Background Color
        $this->add_control(
            'profile_card_background',
            [
                'label' => __( 'Background Color', 'premium-profile-card' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .profile-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'profile_card_padding',
            [
                'label' => __( 'Padding', 'premium-profile-card' ),
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .profile-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'profile_border_type',
            [
                'label' => __( 'Border Type', 'premium-profile-card' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => [
                    'normal'   => __( 'Normal Border', 'premium-profile-card' ),
                    'gradient' => __( 'Gradient Border', 'premium-profile-card' ),
                ],
            ]
        );
        $this->start_controls_tabs( 'tabs_border_style' );

        // Normal
        $this->start_controls_tab(
            'tab_border_normal',
            [
                'label' => __( 'Normal', 'premium-profile-card' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'normal_border',
                'label'    => __( 'Border', 'premium-profile-card' ),
                'selector' => '{{WRAPPER}} .profile-card',
                'condition' => [
                    'profile_border_type' => 'normal',
                ],
            ]
        );

        $this->add_control(
            'gradient_border_notice1',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw'  => '<strong>' . __( 'Gradient border style is predefined in CSS. It will apply automatically on hover.', 'premium-profile-card' ) . '</strong>',
                'content_classes' => 'elementor-control-field-description',
                'condition' => [
                    'profile_border_type' => 'gradient',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover
        $this->start_controls_tab(
            'tab_border_hover',
            [
                'label' => __( 'Hover', 'premium-profile-card' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'hover_border',
                'label'    => __( 'Hover Border', 'premium-profile-card' ),
                'selector' => '{{WRAPPER}} .profile-card:hover',
                'condition' => [
                    'profile_border_type' => 'normal',
                ],
            ]
        );
        $this->add_control(
            'gradient_border_notice',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw'  => '<strong>' . __( 'Gradient border style is predefined in CSS. It will apply automatically on hover.', 'premium-profile-card' ) . '</strong>',
                'content_classes' => 'elementor-control-field-description',
                'condition' => [
                    'profile_border_type' => 'gradient',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        // Border Radius
        $this->add_responsive_control(
            'profile_card_border_radius',
            [
                'label' => __( 'Border Radius', 'premium-profile-card' ),
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .profile-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_image_style',
            [
                'label' => __( 'Image Style', 'premium-profile-card' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Image width
        $this->add_responsive_control(
            'image_width',
            [
                'label' => __( 'Width', 'premium-profile-card' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [ 'min' => 0, 'max' => 500 ],
                    '%' => [ 'min' => 0, 'max' => 100 ],
                    'em' => [ 'min' => 0, 'max' => 50 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .profile-card avatar-wrapper' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Image height (optional - usually auto)
        $this->add_responsive_control(
            'image_height',
            [
                'label' => __( 'Height', 'premium-profile-card' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],
                'range' => [
                    'px' => [ 'min' => 0, 'max' => 500 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .profile-card img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => __( 'Border Radius', 'premium-profile-card' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'default' => [
                    'top' => '50%',
                    'right' => '50%',  
                    'bottom' => '50%',
                    'left' => '50%',
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .profile-card img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        // Margin
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => __( 'Margin', 'premium-profile-card' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .profile-card img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'avatar_style_section',
            [
                'label' => __( 'Avatar', 'premium-profile-card' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'avatar_inner_bg',
                'label'    => __( 'Avatar Inner Background', 'premium-profile-card' ),
                'types'    => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .avatar-inner',
            ]
        );
        $this->add_control(
            'avatar_info_note',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw'  => __( '<strong>Note:</strong> Avatar Below style applies to the circle border behind the avatar. Use gradient colors to create vibrant effects.', 'premium-profile-card' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'avatar_border_bg',
                'label'    => __( 'Avatar Border Gradient', 'premium-profile-card' ),
                'types'    => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .avatar-border',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stat_style',
            [
                'label' => __( 'Name', 'premium-profile-card' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Select option: Gradient or Normal
        $this->add_control(
            'name_color_type',
            [
                'label' => __( 'Name Text Color Type', 'premium-profile-card' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'normal'   => __( 'Normal Color', 'premium-profile-card' ),
                    'gradient' => __( 'Gradient Color', 'premium-profile-card' ),
                ],
                'default' => 'gradient',
            ]
        );

        $this->add_control(
            'name_value_text_color',
            [
                'label' => __( 'Color', 'premium-profile-card' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'name_color_type' => 'normal',
                ],
                'selectors' => [
                    '{{WRAPPER}} .name' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'name_gradient_color',
                'label' => __( 'Name Gradient', 'premium-profile-card' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .name',
                'condition' => [
                    'name_color_type' => 'gradient',
                ],
            ]
        );

        // Typography Controls
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => __( 'Typography', 'premium-profile-card' ),
                'selector' => '{{WRAPPER}} .name',
            ]
        );

        $this->add_responsive_control(
            'name_alignment',
            [
                'label' => __( 'Alignment', 'premium-profile-card' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __( 'Left', 'premium-profile-card' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'premium-profile-card' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => __( 'Right', 'premium-profile-card' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .name' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
            ]
        );
        $this->add_responsive_control(
            'name_margin',
            [
                'label'      => __( 'Margin', 'premium-profile-card' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_padding',
            [
                'label'      => __( 'Padding', 'premium-profile-card' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Designation', 'premium-profile-card' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Typography Control
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'Typography', 'premium-profile-card' ),
                'selector' => '{{WRAPPER}} .profile-card .title',
            ]
        );

        // Text Color
        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Text Color', 'premium-profile-card' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .profile-card .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Text Alignment
        $this->add_responsive_control(
            'title_align',
            [
                'label'   => __( 'Text Alignment', 'premium-profile-card' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left'   => [
                        'title' => __( 'Left', 'premium-profile-card' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'premium-profile-card' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'premium-profile-card' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .profile-card .title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Margin
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => __( 'Margin', 'premium-profile-card' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .profile-card .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => __( 'Padding', 'premium-profile-card' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .profile-card .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stat_style',
            [
                'label' => __( 'Stats', 'premium-profile-card' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Select option: Gradient or Normal
        $this->add_control(
            'stat_color_type',
            [
                'label' => __( 'Value Text Color Type', 'premium-profile-card' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'normal'   => __( 'Normal Color', 'premium-profile-card' ),
                    'gradient' => __( 'Gradient Color', 'premium-profile-card' ),
                ],
                'default' => 'gradient',
            ]
        );

        $this->add_control(
            'stat_value_text_color',
            [
                'label' => __( 'Value Text Color', 'premium-profile-card' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'stat_color_type' => 'normal',
                ],
                'selectors' => [
                    '{{WRAPPER}} .stat-value' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'stat_value_gradient_color',
                'label' => __( 'Value Gradient', 'premium-profile-card' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .stat-value',
                'condition' => [
                    'stat_color_type' => 'gradient',
                ],
            ]
        );

        // Label Text Color
        $this->add_control(
            'stat_label_color',
            [
                'label' => __( 'Label Text Color', 'premium-profile-card' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stat-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Typography Controls
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stat_value_typography',
                'label' => __( 'Value Typography', 'premium-profile-card' ),
                'selector' => '{{WRAPPER}} .stat-value',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stat_label_typography',
                'label' => __( 'Label Typography', 'premium-profile-card' ),
                'selector' => '{{WRAPPER}} .stat-label',
            ]
        );
        $this->add_responsive_control(
            'stat_gap',
            [
                'label' => __( 'Gap Between Items', 'premium-profile-card' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .stat' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'stat_alignment',
            [
                'label' => __( 'Alignment', 'premium-profile-card' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __( 'Left', 'premium-profile-card' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'premium-profile-card' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => __( 'Right', 'premium-profile-card' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .stat' => 'align-items: {{VALUE}};',
                ],
                'default' => 'center',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_bio_style',
            [
                'label' => __( 'Bio Text', 'premium-profile-card' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'bio_typography',
                'label'    => __( 'Typography', 'premium-profile-card' ),
                'selector' => '{{WRAPPER}} .profile-card .bio',
            ]
        );

        // Text Color
        $this->add_control(
            'bio_color',
            [
                'label'     => __( 'Text Color', 'premium-profile-card' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .profile-card .bio' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Text Alignment
        $this->add_responsive_control(
            'bio_text_align',
            [
                'label'   => __( 'Text Alignment', 'premium-profile-card' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left'   => [
                        'title' => __( 'Left', 'premium-profile-card' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'premium-profile-card' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'premium-profile-card' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .profile-card .bio' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Margin
        $this->add_responsive_control(
            'bio_margin',
            [
                'label'      => __( 'Margin', 'premium-profile-card' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .profile-card .bio' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'bio_padding',
            [
                'label'      => __( 'Padding', 'premium-profile-card' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .profile-card .bio' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_skills_style',
            [
                'label' => __( 'Skills', 'premium-profile-card' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Typography for skill text
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'skills_typography',
                'label'    => __( 'Typography', 'premium-profile-card' ),
                'selector' => '{{WRAPPER}} .profile-card .skills .skill',
            ]
        );

        // Text Color
        $this->add_control(
            'skills_text_color',
            [
                'label'     => __( 'Text Color', 'premium-profile-card' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .profile-card .skills .skill' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background Color
        $this->add_control(
            'skills_bg_color',
            [
                'label'     => __( 'Background Color', 'premium-profile-card' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .profile-card .skills .skill' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'skills_border',
                'label'    => __( 'Border', 'premium-profile-card' ),
                'selector' => '{{WRAPPER}} .profile-card .skills .skill',
            ]
        );
        // Border Radius
        $this->add_control(
            'skills_border_radius',
            [
                'label'      => __( 'Border Radius', 'premium-profile-card' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .profile-card .skills .skill' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'skills_padding',
            [
                'label'      => __( 'Padding', 'premium-profile-card' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .profile-card .skills .skill' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Spacing between skill items
        $this->add_responsive_control(
            'skills_spacing',
            [
                'label'      => __( 'Spacing Between Skills', 'premium-profile-card' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [
                    'px' => [ 'min' => 0, 'max' => 100 ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .profile-card .skills .skill' => 'margin-right: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_button1_style',
            [
                'label' => __( 'Button 1', 'premium-profile-card' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tabs_button1_style' );

        // Normal
        $this->start_controls_tab(
            'tab_button1_normal',
            [ 'label' => __( 'Normal', 'premium-profile-card' ) ]
        );

        // Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button1_typography',
                'selector' => '{{WRAPPER}} .action-btn.primary',
            ]
        );

        // Text Color
        $this->add_control(
            'button1_text_color',
            [
                'label' => __( 'Text Color', 'premium-profile-card' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .action-btn.primary' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button1_background',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .action-btn.primary',
            ]
        );

        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button1_border',
                'selector' => '{{WRAPPER}} .action-btn.primary',
            ]
        );

        // Border Radius
        $this->add_control(
            'button1_border_radius',
            [
                'label' => __( 'Border Radius', 'premium-profile-card' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .action-btn.primary' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'button1_padding',
            [
                'label' => __( 'Padding', 'premium-profile-card' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .action-btn.primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover
        $this->start_controls_tab(
            'tab_button1_hover',
            [ 'label' => __( 'Hover', 'premium-profile-card' ) ]
        );

        $this->add_control(
            'button1_text_color_hover',
            [
                'label' => __( 'Text Color', 'premium-profile-card' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .action-btn.primary:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button1_background_hover',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .action-btn.primary:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button1_border_hover',
                'selector' => '{{WRAPPER}} .action-btn.primary:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'section_button2_style',
            [
                'label' => __( 'Button 2', 'premium-profile-card' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tabs_button2_style' );

        $this->start_controls_tab(
            'tab_button2_normal',
            [
                'label' => __( 'Normal', 'premium-profile-card' ),
            ]
        );

        // Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button2_typography',
                'selector' => '{{WRAPPER}} .action-btn.secondary',
            ]
        );

        // Text Color
        $this->add_control(
            'button2_text_color',
            [
                'label' => __( 'Text Color', 'premium-profile-card' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .action-btn.secondary' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button2_background',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .action-btn.secondary',
            ]
        );

        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button2_border',
                'selector' => '{{WRAPPER}} .action-btn.secondary',
            ]
        );

        // Border Radius
        $this->add_control(
            'button2_border_radius',
            [
                'label' => __( 'Border Radius', 'premium-profile-card' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .action-btn.secondary' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'button2_padding',
            [
                'label' => __( 'Padding', 'premium-profile-card' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .action-btn.secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button2_hover',
            [
                'label' => __( 'Hover', 'premium-profile-card' ),
            ]
        );

        // Hover Text Color
        $this->add_control(
            'button2_text_color_hover',
            [
                'label' => __( 'Text Color', 'premium-profile-card' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .action-btn.secondary:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Hover Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button2_background_hover',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .action-btn.secondary:hover',
            ]
        );

        // Hover Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button2_border_hover',
                'selector' => '{{WRAPPER}} .action-btn.secondary:hover',
            ]
        );

        $this->end_controls_tab(); // End Hover Tab

        $this->end_controls_tabs(); // End Tabs
        $this->end_controls_section(); // End Section

    }
}
?>