<?php
/*
Plugin Name: LineHeight
Plugin URI: https://github.com/leijiongbin/wp-lineheight
Description: add "line-height: 200%" support to editor.
Version: 1.0.0
Author: Ryan
Author URI: https://github.com/leijiongbin
License: GPL2+
*/

/*
    Copyright Automattic and many other contributors.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if (is_admin()){

    function lh_add_mce_button() {
        if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
            return;
        }
        if ( 'true' == get_user_option( 'rich_editing' ) ) {
            add_filter( 'mce_external_plugins', 'lh_add_tinymce_plugin' );
            add_filter( 'mce_buttons', 'lh_register_mce_button' );
        }
    }
    add_action('admin_head', 'lh_add_mce_button');
    
    function lh_add_tinymce_plugin( $plugin_array ) {
        $plugin_array['lineheightselect'] = plugins_url( 'js/line-height-select.js', __FILE__ );
        return $plugin_array;
    }
    
    function lh_register_mce_button( $buttons ) {
        array_push( $buttons, 'lineheightselect' );
        return $buttons;
    }
}