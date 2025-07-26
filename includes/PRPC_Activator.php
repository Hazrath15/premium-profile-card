<?php
namespace PremiumProfileCard;

if( !class_exists('PRPC_Activator') ){
    class PRPC_Activator {
        public static function activate() {
            
            flush_rewrite_rules();
        }
    }
}

?>