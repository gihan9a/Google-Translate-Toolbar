<?php
/*
Plugin Name: Google Translate Toolbar
Plugin URI: https://github.com/gihanshp/Google-Translate-Toolbar
Description: Adds Google translate toolbar to your wordpress blog/site. This plugin supports more than 40 languages translation
Author: Gihan Subhashana
Version: 1.0
Author URI: http://github.com/gihanshp
*/

// include files
require_once 'google_translate_toolbar.php';

/**
 * register widget 
 */
function gtt_load_widgets(){
    register_widget('GoogleTranslateToolbar');
}

// hook to the widgets init action
add_action('widgets_init', 'gtt_load_widgets');
?>