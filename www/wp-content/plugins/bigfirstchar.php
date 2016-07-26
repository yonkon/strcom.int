<?php
/*
Plugin Name: BigFirstChar
Version: 0.1
Plugin URI: http://www.printfhelloworld.com
Description: Automatically creates drop caps for all posts.  If you use this on your web site, please do link to my site -- a blog entry mentioning this plugin will do fine.
Author: printfhelloworld
Author URI: http://www.printfhelloworld.com

If you use this on your web site, please do link to my site -- a blog entry mentioning this plugin will do fine.
*/

function BigFirstChar ($content = '') {
     $out = str_replace('<p>', '<p class="BigFirst">', $content);
     return $out;
}

add_filter('the_content', 'BigFirstChar', 10);
