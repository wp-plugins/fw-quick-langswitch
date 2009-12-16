<?php
/*
Plugin Name: fw-quick-langswitch
Plugin URI: http://wwww.fairweb.fr/plugins-wordpress/fw-quick-langswitch/
Description: Display flags to switch languages. This plugin only uses the locale files from wordress or buddypress and eventually your theme for user to have the interface in his language. It does not provide content localization features.
Author: Myriam Faulkner
Version: 1.0
Author URI: http://www.fairweb.fr/
*/
/*  Copyright 2009  Fairweb - Myriam Faulkner  (email : web@fairweb.fr)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 */
define ("FWQLS_DIR", WP_PLUGIN_DIR . '/fw-quick-langswitch');
define ("FWQLS_URL", WP_PLUGIN_URL . '/fw-quick-langswitch');


// if the fwqls-flags directory exists in wp-content, use the flags it contains
// flags images should be named after the .mo files they refer to (for example : fr_FR.jpg).
// flags files can have any image extension (jpg, gif of png)

if(@file_exists(WP_CONTENT_DIR.'/fwqls-flags')) {
    define ("FWQLS_FLAGSDIR", WP_CONTENT_DIR . '/fwqls-flags');
    define ("FWQLS_FLAGSURL", WP_CONTENT_URL. '/fwqls-flags');
} else {
    define ("FWQLS_FLAGSDIR", FWQLS_DIR . '/fwqls-flags');
    define ("FWQLS_FLAGSURL", FWQLS_URL. '/fwqls-flags');
}

// use this function in your theme to display your flags for user to click on it
function fwqls_display_flags() {
    global $locale;
    $flags = fwqls_get_flags();
    if ($flags) {
    foreach ($flags as $flag) {
        $flag_url = FWQLS_FLAGSURL.'/'.$flag;
        list($flag_locale, $flag_ext) = explode ('.',$flag);
        ?><a class="fwqls_flag" id="fwqls-<?php echo $flag_locale;?>" href="<?php echo $_SERVER["REQUEST_URI"];?>"><img src="<?php echo $flag_url;?>" alt="<?php echo $flag_locale;?>" /></a>

 <?php
    }
    } else {
    echo "no flags available";

    }

}



function fwqls_setup_pref_lang($locale) {
    if (isset($_COOKIE['fwqls'])) {
        return $_COOKIE['fwqls'];
    }
 return $locale;
}

function fwqls_get_flags() {
$Directory = FWQLS_FLAGSDIR;
  $MyDirectory = opendir($Directory) or die('The flags directory does not exist');
  $flags = array();
	while($Entry = @readdir($MyDirectory)) {
		if(!is_dir($Directory.'/'.$Entry)&& $Entry != '.' && $Entry != '..') {
                 $flags[] = $Entry;
                }
	}
  closedir($MyDirectory);
  return ($flags);
}


function fwqls_init() {
    wp_enqueue_script('fwqls_js', FWQLS_URL.'/fw-quick-langswitch.js', array('jquery'));
}




add_action('init', 'fwqls_init');
add_filter( 'locale', 'fwqls_setup_pref_lang' );

?>