<?php
/**
 * @package playground
 */
namespace Inc\Base;

class BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin_link;

    public function __construct(){
        $this->plugin_path = plugin_dir_path(realpath(__DIR__ . '/..'));
        $this->plugin_url = plugin_dir_url(realpath(__DIR__ . '/..'));
        $this->plugin_link = plugin_basename(realpath(__DIR__ . '/../..')).'/playground.php';


    }
}
