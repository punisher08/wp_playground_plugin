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


defined ('ABSPATH') or die('The file you are trying to access is forbidden');

if(file_exists( dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}
use Inc\Base\Activate;
use Inc\Base\Deactivate;

function activate_playground_plugin(){
    Activate::activate();
}
register_activation_hook(__FILE__,'activate_playground_plugin');

function deactivate_playground_plugin(){
    Deactivate::deactivate();
}
register_deactivation_hook(__FILE__,'deactivate_playground_plugin');

if( class_exists('Inc\\Init') ){
    Inc\Init::register_services();
}
