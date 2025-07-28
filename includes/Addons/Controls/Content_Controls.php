<?php
namespace PremiumProfileCard\Addons\Controls;
use Elementor\Controls_Manager;
use Elementor\Repeater;

trait Content_Controls {

    public function register_content_controls() {
        $this->start_controls_section(
            'section_profiles',
            [
                'label' => __( 'Profile Cards', 'premium-profile-card' ),
            ]
        );

        // Define the outer repeater for profiles
        $profile_repeater = new Repeater();

        $profile_repeater->add_control(
            'name',
            [
                'label' => __( 'Name', 'premium-profile-card' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Sarah Anderson', 'premium-profile-card' ),
            ]
        );

        $profile_repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'premium-profile-card' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Senior Product Designer', 'premium-profile-card' ),
            ]
        );

        $profile_repeater->add_control(
            'profile_media_type',
            [
                'label' => __( 'Profile Media Type', 'premium-profile-card' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'avatar',
                'options' => [
                    'image'  => __( 'Upload Image', 'premium-profile-card' ),
                    'avatar' => __( 'Avatar', 'premium-profile-card' ),
                ],
            ]
        );

        $profile_repeater->add_control(
            'profile_image',
            [
                'label' => __( 'Upload Profile Image', 'premium-profile-card' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'profile_media_type' => 'image',
                ],
            ]
        );

        $profile_repeater->add_control(
            'projects',
            [
                'label' => __( 'Projects', 'premium-profile-card' ),
                'type' => Controls_Manager::TEXT,
                'default' => '1.2k',
            ]
        );

        $profile_repeater->add_control(
            'followers',
            [
                'label' => __( 'Followers', 'premium-profile-card' ),
                'type' => Controls_Manager::TEXT,
                'default' => '8.5k',
            ]
        );

        $profile_repeater->add_control(
            'following',
            [
                'label' => __( 'Following', 'premium-profile-card' ),
                'type' => Controls_Manager::TEXT,
                'default' => '4.7k',
            ]
        );

        $profile_repeater->add_control(
            'bio',
            [
                'label' => __( 'Bio', 'premium-profile-card' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Creative designer with 5+ years...',
            ]
        );

        $profile_repeater->add_control(
            'skills_list',
            [
                'label' => __( 'Skills (Comma Separated)', 'premium-profile-card' ),
                'description' => __( 'Enter skills separated by commas', 'premium-profile-card' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'UI/UX,Branding,Motion',
            ]
        );

        $profile_repeater->add_control(
            'button_1_text',
            [
                'label' => __( 'Button 1 Text', 'premium-profile-card' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Follow',
            ]
        );

        $profile_repeater->add_control(
            'button_1_link',
            [
                'label' => __( 'Button 1 Link', 'premium-profile-card' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'premium-profile-card' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $profile_repeater->add_control(
            'button_2_text',
            [
                'label' => __( 'Button 2 Text', 'premium-profile-card' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Message',
            ]
        );

        $profile_repeater->add_control(
            'button_2_link',
            [
                'label' => __( 'Button 2 Link', 'premium-profile-card' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'premium-profile-card' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'profile_list',
            [
                'label' => __( 'Profile Cards', 'premium-profile-card' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $profile_repeater->get_controls(),
                'title_field' => '{{{ name }}}',
                'default' => [
                    [
                        'name'       => 'Sarah Anderson',
                        'title'      => 'Senior Product Designer',
                        'profile_media_type' => 'image',
                        'profile_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'projects'   => '1.2k',
                        'followers'  => '8.5k',
                        'following'  => '4.7k',
                        'bio'        => 'Creative designer with 5+ years of experience in digital product design and brand identity.',
                        'skills_list' => 'UI/UX, Branding, Motion',
                        'button_1_text' => 'Follow',
                        'button_1_link' => [
                            'url' => '#',
                        ],
                        'button_2_text' => 'Message',
                        'button_2_link' => [
                            'url' => '#',
                        ],
                    ],
                ],
            ]
        );

        $this->add_responsive_control(
            'profile_columns',
            [
                'label' => __( 'Columns', 'premium-profile-card' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 1,
                'selectors' => [
                    '{{WRAPPER}} .profile-card-area' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );
        $this->add_responsive_control(
            'profile_column_gap',
            [
                'label' => __( 'Column Gap', 'premium-profile-card' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .profile-card-area' => 'column-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'profile_row_gap',
            [
                'label' => __( 'Row Gap', 'premium-profile-card' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .profile-card-area' => 'row-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
}
?>