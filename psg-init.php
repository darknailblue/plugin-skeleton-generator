<?php
/*
Plugin Name: Plugin Skeleton Generator
Plugin URI: http://pluginskeletongenerator.com
Description: Use this plugin to generate the necessary files, directory structure and code needed to give you a head-start when writing your own Wordpress Plugins.  Developers of all skill levels can find the code generator useful whether or not it is to learn how to create plugins or to save some time when starting a new project.
Version: 0.1
Author: Chris Carvache
Author URI: http://chriscarvache.com

Copyright 2012 Chris Carvache  (email : chriscarvache@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once ('psg-class.php');

$nlwsPSG = new nlwsPluginSkeletonGenerator;

register_activation_hook( __FILE__, array( &$nlwsPSG, 'installPlugin' ) );
register_activation_hook( __FILE__, array( &$nlwsPSG, 'uninstallPlugin' ) );