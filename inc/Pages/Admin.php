<?php
/**
 * @package playground
 */
namespace Inc\Pages;

class Admin{
    function __construct(){

    }

    public  function register(){
        // $Admin = new Admin();
        add_action('admin_menu',array($this,'add_admin_pages'));
    }

     function add_admin_pages(){

        add_menu_page('Playground Plugin','Playground','manage_options','playground_plugin',
        array($this,'admin_index'),'dashicons-buddicons-replies',110);

    }
    function admin_index(){
        
        require_once PLUGIN_PATH.'templates/admin.php';
        
    }
}
