<?php
/**
 * @package playground
 */
namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{

    public function AdminDashboard(){
        
        return require_once("$this->plugin_path/templates/admin.php");
    }
    public function Widgets(){
        
        return require_once("$this->plugin_path/templates/widget.php");
    }
    public function Taxonomies(){
        
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }
    public function CustomPt(){
        
        return require_once("$this->plugin_path/templates/cpt.php");
    }
    public function playgroundOptionsGroup( $input ){
        
        return $input;

    }
    public function playgroundAdminSection( $input ){
        
        echo 'Check this out';
   
    }
    public function playgroundTextExample()
	{
        $value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
    }
    public function playgroundFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
}