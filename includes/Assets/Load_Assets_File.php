<?php

namespace PremiumProfileCard\Assets;

class Load_Assets_File {
    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'prpc_enqueue_scripts' ] );
    }

    public function prpc_enqueue_scripts() {
        wp_enqueue_style( 'premium-profile-card-style', plugins_url( '../../assets/css/main.css', __FILE__ ), [], '1.0.0' );
        wp_enqueue_script( 'premium-profile-card-script', plugins_url( '../../assets/js/main.js', __FILE__ ), [ 'jquery' ], '1.0.0', true );
    }
}
?>