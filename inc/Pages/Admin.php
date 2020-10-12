<?php
/**
 * @package playground
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
public $callbacks;
public $settings;
public $pages = array();
public $subpages = array();


   

    public  function register(){

        $this->settings = new SettingsApi(); 

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();
      
        // AdminCallbacks::playgroundTextExample();
        // // var_dump();
        // echo"<pre>";print_r();echo"</pre>";
       

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages( $this->subpages)->register();
        
    }
    public function setPages(){

        $this->pages =array(
            array(
                'page_title' => 'Playground Plugin',
                'menu_title' => 'Playground',
                'capability' => 'manage_options',
                'menu_slug' =>'playground_plugin',
                'callback' =>  array($this->callbacks,'AdminDashboard'),
                'icon_url' =>'dashicons-buddicons-replies',
                'position' => 110
            )
            );
            
    }
    public function setSubPages(){
        $this->subpages = array(
            array(
           'parent_slug' => 'playground_plugin',
           'page_title' => 'Custom Post Type' ,
           'menu_title' => 'CPT',
           'capability' => 'manage_options',
           'menu_slug' =>'playground_cpt',
           'callback' =>  array($this->callbacks,'CustomPt')
                ),
           array(
           'parent_slug' => 'playground_plugin',
           'page_title' => 'Custom Widgets' ,
           'menu_title' => 'Widgets',
           'capability' => 'manage_options',
           'menu_slug' =>'playground_widget',
           'callback' =>array($this->callbacks,'Widgets')
                ),
           array(
           'parent_slug' => 'playground_plugin',
           'page_title' => 'Custom  Taxonomies' ,
           'menu_title' => 'Taxonomies',
           'capability' => 'manage_options',
           'menu_slug' =>'playground_taxonomies',
           'callback' => array($this->callbacks,'Taxonomies')
                ),
           );
       

    }
    public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'playground_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->callbacks, 'playgroundOptionsGroup' )
			),
			array(
				'option_group' => 'playground_options_group',
				'option_name' => 'first_name'
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'playground_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callbacks, 'playgroundAdminSection' ),
				'page' => 'playground_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array( $this->callbacks, 'playgroundTextExample' ),
				'page' => 'playground_plugin',
				'section' => 'playground_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callbacks, 'playgroundFirstName' ),
				'page' => 'playground_plugin',
				'section' => 'playground_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields( $args );
	}
    // public function setSettings()
	// {
	// 	$args = array(
	// 		array(
	// 			'option_group' => 'playground_options_group',
	// 			'option_name' => 'text_example',
	// 			'callback' => array( $this->callbacks, 'playgroundOptionsGroup' )
	// 		),
	// 	);

	// 	$this->settings->setSettings( $args );
	// }

	// public function setSections()
	// {
	// 	$args = array(
	// 		array(
	// 			'id' => 'playground_admin_index',
	// 			'title' => 'Settings',
	// 			'callback' => array( $this->callbacks, 'playgroundAdminSection' ),
	// 			'page' => 'playground_plugin'
	// 		)
	// 	);

	// 	$this->settings->setSections( $args );
	// }

	// public function setFields()
	// {
    //     $args = array(
    //         array(
    //             'id' => 'text_example',
	// 			'title' => 'Text Example',
	// 			'callback' => array( $this->callbacks, 'playgroundAdminField' ),
	// 			'page' => 'playground_plugin',
	// 			'section' => 'playground_admin_index',
	// 			'args' => array(
	// 				'label_for' => 'text_example',
	// 				'class' => 'example-class'
	// 			    )
    //               )
    //             );
	// }
}

