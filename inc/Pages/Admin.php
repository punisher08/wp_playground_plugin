<?php
/**
 * @package playground
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
public $settings;
public $pages = array();
   public function __construct(){
        parent::__construct();
        $this->settings = new SettingsApi(); 
        $this->pages =[
                [
                'page_title' => 'Playground Plugin',
                'menu_title' => 'Playground',
                'capability' => 'manage_options',
                'menu_slug' =>'playground_plugin',
                'callback' => function(){ echo '<h1>Playground plugin</h1>';},
                'icon_url' =>'dashicons-buddicons-replies',
                'position' => 110
                ],
                [
                'page_title' => 'test Plugin',
                'menu_title' => 'test',
                'capability' => 'manage_options',
                'menu_slug' =>'test_plugin',
                'callback' => function(){ echo '<h1>test plugin</h1>';},
                'icon_url' =>'dashicons-buddicons-replies',
                'position' => 111
                ]
                  ];
          
    }

    public  function register(){
        // $Admin = new Admin();
        // add_action('admin_menu',array($this,'add_admin_pages'));
       
        $this->settings->addPages($this->pages)->register();
    }

    //  function add_admin_pages(){

        // add_menu_page('Playground Plugin','Playground','manage_options','playground_plugin',
        // array($this,'admin_index'),'dashicons-buddicons-replies',110);

    // }
    // function admin_index(){
    //     require_once $this->plugin_path .'templates/admin.php';
    // }
}
