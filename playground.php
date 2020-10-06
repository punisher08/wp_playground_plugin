<?php
/**
 * @package playground
 */
/*
Plugin Name: playground
Plugin URI: https://playground.com/
Description: A custom plugin. make out of this world functions
Version: 1.0.0
Author: Automattic
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: playground
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

Copyright 2020
*/
//public or default function can be access anywhere
//protected can be access only to its class and to the class that extends it
//private only on its class

// if( ! defined('ABSPATH' )){
//     die('you can\t access this file' );
// }
// if(! function_exists('add_action')){
//     echo 'You cant access this file';
//     exit;
// 
defined ('ABSPATH') or die('The file you are trying to access is forbidden');


if(file_exists( dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}
define('PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define('PLUGIN_URL', plugin_dir_url( __FILE__ ) );
if( class_exists('Inc\\Init') ){

    Inc\Init::register_services();

}
