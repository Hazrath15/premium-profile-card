<?php
namespace PremiumProfileCard;

if( !class_exists('PRPC_Deactivator') ) {
    class PRPC_Deactivator {
        public static function deactivate() {
            
            flush_rewrite_rules();
        }
    }
}

?>