<?php
/*
 *      index.php
 *      
 *      Copyright 2011 Gihan Subhashana <gihanshp@gmail.com>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 */

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
