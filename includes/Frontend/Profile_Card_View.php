<?php
namespace PremiumProfileCard\Frontend;

use PremiumProfileCard\Addons\Premium_Profile_Card;
use Elementor\Widget_Base;

if ( ! class_exists( 'Profile_Card_View' ) ) {
    class Profile_Card_View {
        public static function render($settings = []) {
            ?>
            <section class="profile-card-area-wrapper">
                <div class="container">
                    <!-- Premium Profile Card -->
                    <div class="profile-card-area">
                    <?php
                    if ( ! empty( $settings['profile_list'] ) ) {
                        foreach ( $settings['profile_list'] as $profile ) {
                            $skills_list = [];
                            if ( isset( $profile['skills_list'] ) && is_string( $profile['skills_list'] ) ) {
                                $skills_list = array_map( 'trim', explode( ',', $profile['skills_list'] ) );
                            }
                    ?>
                        <div class="profile-card">
                            <div class="card-content">
                                <!-- Avatar Circle -->
                                <div class="avatar-wrapper">
                                    <?php if ( $profile['profile_media_type'] === 'image' && ! empty( $profile['profile_image']['url'] ) ) : ?>
                                        <img src="<?php echo esc_url( $profile['profile_image']['url'] ); ?>" alt="<?php echo esc_attr( $profile['name'] ); ?>">
                                    <?php else : ?>
                                        <div class="avatar">
                                            <div class="avatar-inner"></div>
                                            <div class="avatar-glow"></div>
                                            <div class="avatar-border"></div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Profile Info -->
                                <div class="profile-info">
                                    <h2 class="<?php echo $settings['name_color_type'] =='gradient' ? 'name gradient' : 'name'; ?>"><?php echo esc_html( $profile['name'] ); ?></h2>
                                    <p class="title"><?php echo esc_html( $profile['title'] ); ?></p>
                                    
                                    <div class="stats">
                                        <div class="stat">
                                            <span class="<?php echo $settings['stat_color_type'] =='gradient' ? 'stat-value gradient' : 'stat-value'; ?>"><?php echo esc_html( $profile['projects'] ); ?></span>
                                            <span class="stat-label">Projects</span>
                                        </div>
                                        <div class="stat">
                                            <span class="<?php echo $settings['stat_color_type'] =='gradient' ? 'stat-value gradient' : 'stat-value'; ?>"><?php echo esc_html( $profile['followers'] ); ?></span>
                                            <span class="stat-label">Followers</span>
                                        </div>
                                        <div class="stat">
                                            <span class="<?php echo $settings['stat_color_type'] =='gradient' ? 'stat-value gradient' : 'stat-value'; ?>"><?php echo esc_html( $profile['following'] ); ?></span>
                                            <span class="stat-label">Following</span>
                                        </div>
                                    </div>

                                    <div class="bio">
                                        <p><?php echo esc_html( $profile['bio'] ); ?></p>
                                    </div>

                                    <div class="skills">
                                        <?php
                                        if ( ! empty( $skills_list) ) {
                                            foreach ( $skills_list as $skill ) {
                                                echo '<span class="skill">' . esc_html( trim( $skill ) ) . '</span>';
                                            }
                                        }
                                        ?>
                                    </div>

                                    <div class="actions">
                                        <?php if ( ! empty( $profile['button_1_text'] ) ) : ?>
                                            <a href="<?php echo esc_url( $profile['button_1_link']['url'] ?? '#' ); ?>" 
                                            class="action-btn primary" 
                                            <?php echo $profile['button_1_link']['is_external'] ? 'target="_blank"' : ''; ?> 
                                            <?php echo $profile['button_1_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                <span><?php echo esc_html( $profile['button_1_text'] ); ?></span>
                                                <div class="btn-effect"></div>
                                            </a>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $profile['button_2_text'] ) ) : ?>
                                            <a href="<?php echo esc_url( $profile['button_2_link']['url'] ?? '#' ); ?>" 
                                            class="action-btn secondary" 
                                            <?php echo $profile['button_2_link']['is_external'] ? 'target="_blank"' : ''; ?> 
                                            <?php echo $profile['button_2_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                <span><?php echo esc_html( $profile['button_2_text'] ); ?></span>
                                                <div class="btn-effect"></div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Effects -->
                            <div class="card-shine"></div>
                            <?php if ( isset($settings['profile_border_type']) && 'gradient' === $settings['profile_border_type'] ) : ?>
                                <div class="card-border"></div>
                            <?php endif; ?>
                            <div class="card-glow"></div>
                        </div>
                    <?php
                        } 
                    }
                    ?>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}
?>