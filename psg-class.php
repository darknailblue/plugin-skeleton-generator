<?php
/**
 * Plugin Skeleton Generator Class
 * 
 * Main class that generates the necessary code for a NLWS Wordpress plugin.
 * This is extremelly raw right now and will evolve into a great framework
 * eventually.
 * 
 * @version 0.1
 * @author Chris Carvache 
 * @license GPL2
 */
class nlwsPluginSkeletonGenerator {
	/**
	 * Declare Globals
	 */
	var $plugin_version;
	var $plugin_url;
	var $plugin_dir;
	var $plugin_prefix;
	
	var $new_plugin_settings = array();
	
	
	/**
	 * Setup the class
	 *
	 * @since 0.1
	 */
	function __construct() {
		/**
		 * Setup all globals
		 */
		$this->plugin_version = 0.1;
		$this->plugin_url = rtrim( plugin_dir_url(__FILE__) );
		$this->plugin_dir = rtrim( plugin_dir_path(__FILE__) );
		$this->plugin_prefix = 'psg';
		
		$this->new_plugin_settings = array(
			'menus_to_add' => array(
			
			),
			'settings_to_register' => array(
			
			),
			'shortcodes_to_add' => array(
			
			),
			'plugin_directories' => array(
				'images',
				'css',
				'js',
				'ajax',
				'views'
			),
			'plugin_files' => array(
				array (
					'name' => 'readme',
					'file' => 'readme.txt'
				),
				array (
					'name' => 'init',
					'file' => 'init.php'
				),
				array (
					'name' => 'class',
					'file' => 'class.php'
				)
			)
		);
		
		
		/**
		 * Load Backend stuff
		 */
		if ( is_admin() ) {
			add_action( 'admin_init', array($this, 'initPlugin') );
			add_action( 'admin_menu', array($this, 'createMenu') );
		}
	}
	
	
	/**
	 * Decides what content to put into each individual file
	 *
	 * @since 0.1
	 */
	function processFileContents( $type ) {
		/**
		 * Establish Working Variables
		 */
		include ( 'includes/working-post-variables.php' );
		
		switch ( $type ) {
			case 'readme' :
				/**
				 * Build the first section
				 */
				$contents = '=== ' . $pluginName . ' ===' . "\n";
				$contents.= 'Contributors: ' . $pluginAuthorWordpress . "\n";
				$contents.= 'Donate link:' . $pluginDonateLink . "\n";
				$contents.= 'Tags: ' . $pluginTags . "\n";
				$contents.= 'Requires at least: ' . $pluginRequiresAtLeast . "\n";
				$contents.= 'Tested up to: ' . $pluginTestedUpTo . "\n";
				$contents.= 'Stable tag: ' . $pluginVersion . "\n";
				$contents.= "\n";
				
				
				/**
				 * Build the Description section
				 */
				$contents.= '== Description ==' . "\n";
				$contents.= "\n";
				$contents.= 'This is the long description.  No limit, and you can use Markdown (as well as in the following sections).' . "\n";
				$contents.= "\n";
				
				
				/**
				 * Build the Installation section
				 */
				$contents.= '== Installation ==' . "\n";
				$contents.= "\n";
				$contents.= 'This section describes how to install the plugin and get it working.' . "\n";
				$contents.= "\n";
				$contents.= 'e.g.' . "\n";
				$contents.= "\n";
				$contents.= '1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory' . "\n";
				$contents.= "1. Activate the plugin through the 'Plugins' menu in WordPress" . "\n";
				$contents.= "1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates" . "\n";
				$contents.= "\n";
				$contents.= '***INSERT MORE DESCRIPTION HERE***' . "\n";
				$contents.= "\n";
				
				
				/**
				 * Build the FAQ section
				 */
				$contents.= '== Frequently Asked Questions ==' . "\n";
				$contents.= "\n";
				$contents.= '= A question that someone might have =' . "\n";
				$contents.= "\n";
				$contents.= 'An answer to that question.' . "\n";
				$contents.= "\n";
				$contents.= '= What about foo bar? =' . "\n";
				$contents.= "\n";
				$contents.= 'Answer to foo bar dilemma.' . "\n";
				$contents.= "\n";
				$contents.= '***INSERT MORE FAQ HERE***' . "\n";
				$contents.= "\n";
				
				
				/**
				 * Build the Screenshots section
				 */
				$contents.= '== Screenshots ==' . "\n";
				$contents.= "\n";
				$contents.= '1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from' . "\n";
				$contents.= 'the directory of the stable readme.txt, so in this case, `/tags/4.3/screenshot-1.png` (or jpg, jpeg, gif)' . "\n";
				$contents.= '2. This is the second screen shot' . "\n";
				$contents.= "\n";
				$contents.= '***INSERT MORE SCREENSHOTS HERE***' . "\n";
				$contents.= "\n";
				
				
				/**
				 * Build the Changelog section
				 */
				$contents.= '== Changelog ==' . "\n";
				$contents.= '***INSERT MORE CHANGELOGS HERE***' . "\n";
				$contents.= "\n";
				$contents.= "= " . $pluginVersion . " =" . "\n";
				$contents.= "* Initial Release" . "\n";
				break;


			case 'init' :
				$contents = '<?php' . "\n";
				$contents.= '/*' . "\n";
				$contents.= 'Plugin Name: ' . $pluginName . "\n";
				$contents.= 'Plugin URI: ' . $pluginURI . "\n";
				$contents.= 'Description: ' . $pluginDescription . "\n";
				$contents.= 'Version: ' . $pluginVersion . "\n";
				$contents.= 'Author: ' . $pluginAuthor . "\n";
				$contents.= 'Author URI: ' . $pluginAuthorURI . "\n";
				$contents.= "\n";
				$contents.= 'Copyright ' . date('Y') . ' ' . $pluginAuthor .' (email : ' . $pluginAuthorEmail . ')' . "\n";
				$contents.= "\n";
				$contents.= 'This program is free software; you can redistribute it and/or modify' . "\n";
				$contents.= 'it under the terms of the GNU General Public License, version 2, as ' . "\n";
				$contents.= 'published by the Free Software Foundation.' . "\n";
				$contents.= "\n";
				$contents.= 'This program is distributed in the hope that it will be useful,' . "\n";
				$contents.= 'but WITHOUT ANY WARRANTY; without even the implied warranty of' . "\n";
				$contents.= 'MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the' . "\n";
				$contents.= 'GNU General Public License for more details.' . "\n";
				$contents.= "\n";
				$contents.= 'You should have received a copy of the GNU General Public License' . "\n";
				$contents.= 'along with this program; if not, write to the Free Software' . "\n";
				$contents.= 'Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA' . "\n";
				$contents.= '*/' . "\n";
				$contents.= "\n";
				$contents.= "require_once ('" . $pluginPrefix . "-class.php');" . "\n";
				$contents.= $objectVarName . ' = new ' . $className . ';' . "\n";
				$contents.= "\n";
				$contents.= "register_activation_hook( __FILE__, array( &" . $objectVarName . ", 'installPlugin' ) );" . "\n";
				$contents.= "register_activation_hook( __FILE__, array( &" . $objectVarName . ", 'uninstallPlugin' ) );" . "\n";
				break;


			case 'class' :
				/**
				 * Beginning
				 */
				$contents = '<?php' . "\n";
				$contents.= 'class ' . $className .' {' . "\n";
				

				/**
				 * Declare Global Variables
				 */
				$contents.= $this->newClassCode( 'classVariables' ); 
				
				
				/**
				 * Construct function
				 */
				$contents.= $this->newClassCode( 'classConstruct' );  
				
				
				/**
				 * Admin Init
				 */
				$contents.= $this->newClassCode( 'classAdminInit' );
				
				
				/**
				 * Admin Menu
				 */
				$contents.= $this->newClassCode( 'classAdminMenu' );
				
				
				/**
				 * Add Views
				 */
				$contents.= $this->newClassCode( 'classAddViews' );
				
				/**
				 * Plugin Basic Structure
				 */
				$contents.= $this->newClassCode( 'classAddBasicStructure' );
				
				
				/**
				 * Ending
				 */
				$contents.= '}';
				break;
		}
		
		return $contents;
	}
	
	
	/**
	 * Adds the code needed for the construct of the class to be built
	 *
	 * @since 0.1
	 * @return string that will be in the class we are creating
	 */
	function newClassCode( $type ) {
		/**
		 * Establish working variables
		 */
		include ('includes/working-post-variables.php');
		
		switch ( $type ) {
			case 'classVariables' :
				$x = '';
				$x.= "\t" . '/**' . "\n";
				$x.= "\t" . ' * Declare class variables' . "\n";
				$x.= "\t" . ' */' . "\n";
				$x.= "\t" . 'var $plugin_version;' . "\n";
				$x.= "\t" . 'var $plugin_url;' . "\n";
				$x.= "\t" . 'var $plugin_dir;' . "\n";
				$x.= "\t" . 'var $plugin_prefix;' . "\n";
				$x.= "\n\n";
				
				return $x;
				break;


			case 'classConstruct' :
				$x = '';
				$x.= "\t" . '/**' . "\n";
				$x.= "\t" . ' * Initialize the class' . "\n";
				$x.= "\t" . ' *' . "\n";
				$x.= "\t" . ' * @since ' . $pluginVersion . "\n";
				$x.= "\t" . ' */' . "\n";
				$x.= "\t" . 'function __construct() {' . "\n";
				$x.= "\t\t" . '$this->plugin_version = ' . $pluginVersion . ";\n";
				$x.= "\t\t" . '$this->plugin_url = rtrim( plugin_dir_url(__FILE__) )' . ";\n";
				$x.= "\t\t" . '$this->plugin_dir = rtrim( plugin_dir_path(__FILE__) )' . ";\n";
				$x.= "\t\t" . '$this->plugin_prefix = "' . $pluginPrefix . '";' . "\n";
				$x.= "\n\n";
				$x.= "\t\t" . '/**' . "\n";
				$x.= "\t\t" . ' * Admin Actions' . "\n";
				$x.= "\t\t" . ' */' . "\n";
				$x.= "\t\t" . 'if ( is_admin() ) {' . "\n";
				$x.= "\t\t\t" . 'add_action( \'admin_init\', array($this, \'adminInitPlugin\') );' . "\n";
				
				if ( $this->new_plugin_settings['menus_to_add'] )
					$x.= "\t\t\t" . 'add_action( \'admin_menu\', array($this, \'adminCreateMenu\') );' . "\n";
				
				$x.= "\t\t" . '}' . "\n";
				$x.= "\t" . '}' . "\n";
				$x.= "\n\n";
				
				return $x;
				break;


			case 'classAdminInit' :
				$x = '';
				$x.= "\t" . '/**' . "\n";
				$x.= "\t" . ' * Initializes the plugin' . "\n";
				$x.= "\t" . ' *' . "\n";
				$x.= "\t" . ' * @since ' . $pluginVersion . "\n";
				$x.= "\t" . ' */' . "\n";
				$x.= "\t" . 'function adminInitPlugin() {' . "\n";
				$x.= "\t\t" . 'register_setting( ' . $pluginSettingsVar . ', ' . $pluginSettingsVar . ' );' . "\n";
				$x.= "\t" . '}' . "\n";	
				$x.= "\n\n";
				
				return $x;
				break;


			case 'classAdminMenu' :
				if ( $this->new_plugin_settings['menus_to_add'] ) {
					$x = '';
					$x.= "\t" . '/**' . "\n";
					$x.= "\t" . ' * Adds all menus' . "\n";
					$x.= "\t" . ' *' . "\n";
					$x.= "\t" . ' * @since ' . $pluginVersion . "\n";
					$x.= "\t" . ' */' . "\n";
					$x.= "\t" . 'function adminCreateMenu() {' . "\n";

					foreach ( $this->new_plugin_settings['menus_to_add'] as $menu ) {

						$pagefunction = $menu['type'] . 'Page' . 'View' . ucfirst($menu['slug']);
						$pageHeadFunction = $menu['type'] . 'Page' . 'View' . 'Head' . ucfirst($menu['slug']);
						$objectvar = '$' . $menu['type'] . 'Page' . ucfirst( $menu['slug'] );
						$slugOutput = ' $this->plugin_prefix . ' . '\'-page-' . $menu['slug'] . '\'';
						$parentSlugOutput = ' $this->plugin_prefix . ' . '\'-page-' . $menu['parent'] . '\'';

						switch ($menu['type']) {
							case 'object' :
								$x.= "\t\t" . $objectvar . " = add_object_page( '" . $menu['title'] . "', '" . $menu['label'] . "', 5, " . $slugOutput . ", array(" . '$this' . ", '" . $pagefunction . "'));" . "\n";
								$x.= "\t\t" . 'add_action ( \'admin_head-\' . ' . $objectvar . ', array($this, \'' . $pageHeadFunction . '\') );' . "\n";
								$x.= "\n";
								break;

							case 'option' :
								$x.= "\t\t" . $objectvar . " = add_options_page( '" . $menu['title'] . "', '" . $menu['label'] . "', 'manage_options', " . $slugOutput . ", array(" . '$this' . ", '" . $pagefunction . "'));" . "\n";
								$x.= "\t\t" . 'add_action ( \'admin_head-\' . ' . $objectvar . ', array($this, \'' . $pageHeadFunction . '\') );' . "\n";
								$x.= "\n";
								break;

							case 'sub' :
								$x.= "\t\t" . $objectvar . ' = add_submenu_page(' . $parentSlugOutput . ', \'' . $menu['title'] . "', '" . $menu['label'] . "', 5, " . $slugOutput . ", array(" . '$this' . ", '" . $pagefunction . "'));" . "\n";
								$x.= "\t\t" . 'add_action ( \'admin_head-\' . ' . $objectvar . ', array($this, \'' . $pageHeadFunction . '\') );' . "\n";
								$x.= "\n";
						}
							
					}

					$x.= "\t" . '}' . "\n";
					$x.= "\n\n";
					
					return $x;
				}
				break;


			case 'classAddViews' :
				if ( $this->new_plugin_settings['menus_to_add'] ) {
					
					$x = '';
					foreach ( $this->new_plugin_settings['menus_to_add'] as $menu ) {
						
						$pagefunction = $menu['type'] . 'Page' . 'View' . 'Head' . ucfirst($menu['slug']);
						$cssfile = '\' . $this->plugin_url . ' . '\'css/\' . $this->plugin_prefix . \'-' . $menu['slug'] . ".css";;
						$jsfile = '\' . $this->plugin_url . ' . '\'js/\' . $this->plugin_prefix . \'-' . $menu['slug'] . ".js";;
						
						$x.= "\t" . '/**' . "\n";
						$x.= "\t" . ' * ' . $pagefunction . ' - ' . $menu['title'] . " Head\n";
						$x.= "\t" . ' *' . "\n";
						$x.= "\t" . ' * @since ' . $pluginVersion . "\n";
						$x.= "\t" . ' */' . "\n";
						$x.= "\t" . 'function ' . $pagefunction . '() {' . "\n";
						$x.= "\t\t" . 'echo \'<link href="' . $cssfile . '" rel="stylesheet" type="text/css" />\';' . "\n";
						$x.= "\t\t" . 'echo \'<script src="' . $jsfile . '" type="text/javascript" /></script>\';' . "\n";
						$x.= "\t\t" . "// Include whatever code that will be in the <head> tag of this page.\n";
						$x.= "\t" . '}' . "\n";
						$x.= "\n\n";
						
						$pagefunction = $menu['type'] . 'Page' . 'View' . ucfirst($menu['slug']);
						$filename = '\' . $this->plugin_prefix . ' . "'-" . $menu['slug'] . ".php";
						
						$x.= "\t" . '/**' . "\n";
						$x.= "\t" . ' * ' . $pagefunction . ' - ' . $menu['title'] . "\n";
						$x.= "\t" . ' *' . "\n";
						$x.= "\t" . ' * @since ' . $pluginVersion . "\n";
						$x.= "\t" . ' */' . "\n";
						$x.= "\t" . 'function ' . $pagefunction . '() {' . "\n";
						$x.= "\t\t" . '//Process view logic then load up the view' . "\n";
						$x.= "\t\t" . "include('views/" . $filename . "');" . "\n";
						$x.= "\t" . '}' . "\n";
						$x.= "\n\n";
					}
					
					return $x;
				}
				break;


			case 'classAddBasicStructure' :
				$x = '';
				$x.= "\t" . '/**' . "\n";
				$x.= "\t" . ' * Install the Plugin' . "\n";
				$x.= "\t" . ' *' . "\n";
				$x.= "\t" . ' * Handles version number, tables, and inital settings' . "\n";
				$x.= "\t" . ' *' . "\n";
				$x.= "\t" . ' * @since ' . $pluginVersion . "\n";
				$x.= "\t" . ' */' . "\n";
				$x.= "\t" . 'function installPlugin() {' . "\n";
				$x.= "\t\t" . '$isinstalled = get_option(' . $pluginVersionVar . ');' . "\n";
				$x.= "\n";
				$x.= "\t\t" . '// Install code will go here' . "\n";
				$x.= "\t\t" . 'if (!$isinstalled) {' . "\n";
				$x.= "\n";
				$x.= "\t\t" . '}' . "\n";
				$x.= "\n";
				$x.= "\t\t" . '// Update version' . "\n";
				$x.= "\t\t" . 'update_option( ' . $pluginSettingsVar . ', $this->plugin_version );' . "\n";
				$x.= "\n";
				$x.= "\t\t" . '// Check to see if there are any default settings' . "\n";
				$x.= "\t\t" . '$hasglobaloptions = get_option(' . $pluginSettingsVar . ');' . "\n";
				$x.= "\n";
				$x.= "\t\t" . 'if (!$hasglobaloptions) {' . "\n";
				$x.= "\t\t\t" . '$defaultoptions = array();' . "\n";
				$x.= "\n";
				$x.= "\t\t\t" . 'update_option( ' . $pluginSettingsVar . ', $defaultoptions );' . "\n";
				$x.= "\t\t" . '}' . "\n";
				$x.= "\t" . '}' . "\n";
				$x.= "\n\n";
				
				$x.= "\t" . '/**' . "\n";
				$x.= "\t" . ' * Uninstall the Plugin' . "\n";
				$x.= "\t" . ' *' . "\n";
				$x.= "\t" . ' * Removes all plugin data' . "\n";
				$x.= "\t" . ' *' . "\n";
				$x.= "\t" . ' * @since ' . $pluginVersion . "\n";
				$x.= "\t" . ' */' . "\n";
				$x.= "\t" . 'function uninstallPlugin() {' . "\n";
				$x.= "\t\t" . '// Lets be gracious and clean up what we\'ve created' . "\n";
				$x.= "\t\t" . 'delete_option ( ' . $pluginVersionVar . ' );' . "\n";
				$x.= "\t\t" . 'delete_option ( ' . $pluginSettingsVar . ' );' . "\n";
				$x.= "\t" . '}';
				
				return $x;
				break;
		}
		
	}
	
	
	/**
	 * Initializes the plugin
	 *
	 * @since 0.1
	 */
	function initPlugin() {
		register_setting( 'nlws_psg_settings', 'nlws_psg_settings' );
	}
	
	
	/**
	 * Adds all menus
	 *
	 * @since 0.1
	 */
	function createMenu() {
		$objectPage = add_object_page( 'Plugin Skeleton Generator', 'P.S.G.', 'install_plugins', $this->plugin_prefix . 'managementpage', array($this, 'settingsPage'), $this->plugin_url . '/images/skeleton16.png');
		$settingsPage = add_submenu_page( $this->plugin_prefix . 'managementpage', 'Global Settings', 'Global Settings', 'install_plugins', $this->plugin_prefix . 'managementpage', array($this, 'settingsPage') ); 
		$addNewPage = add_submenu_page( $this->plugin_prefix . 'managementpage', 'Create New Plugin', 'Create New Plugin', 'install_plugins', $this->plugin_prefix . 'createnewplugin', array($this, 'createNewPlugin') );
		$helpPage = add_submenu_page( $this->plugin_prefix . 'managementpage', 'Help', 'Help', 'install_plugins', $this->plugin_prefix . 'help', array($this, 'helpPage') );
		
		add_action ( 'admin_head-' . $settingsPage, array($this, 'settingsPageHead') );
		add_action ( 'admin_head-' . $addNewPage, array($this, 'createNewPluginHead') );
		add_action ( 'admin_head-' . $helpPage, array($this, 'helpPageHead') );
	}
	
	
	/**
	 * Processes the settings page
	 *
	 * @since 0.1
	 */
	function settingsPage() {
		/**
		 * Load the view
		 */
		include ( 'views/psg-settings.php' );
	}
	
	
	/**
	 * Processes the create new plugin page
	 *
	 * @since 0.1
	 */
	function createNewPlugin() {
		/**
		 * Load the view
		 */
		if ( isset($_POST['hid-formsubmit']) ) {
			/**
			 * Establish all working variables
			 */
			$pluginDirectory = $_POST['plugin_directory'];
			$pluginPrefix = $_POST['plugin_prefix'];
			$pluginDirectory = WP_PLUGIN_DIR . '/' . $pluginDirectory;
			
			$successMessage = array();
			$errorMessage = array();
			
			
			/**
			 * Setup the menus array
			 *
			 * I feel like there is a better way to do this
			 * more than likely using regex but I have no
			 * clue how to write regex, let alone custom
			 * regex so I'm not going to bother :)
			 */
			for ( $x = 0; $x <= 100; $x++ ) {
				// Base all this on the menu type being set
				if ( isset($_POST[ 'menu-type-' . $x]) ) {
					$type = $_POST[ 'menu-type-' . $x];
					$slug = $_POST[ 'menu-slug-' . $x];
					$parent = $_POST[ 'menu-parent-' . $x];
					$title = $_POST[ 'menu-title-' . $x];
					$label = $_POST[ 'menu-label-' . $x];
					
					$newMenuItem = array(
						'type' => $type,
						'slug' => $slug,
						'parent' => $parent,
						'title' => $title,
						'label' => $label,
					);
					
					// Push it into the array
					$this->new_plugin_settings['menus_to_add'][] = $newMenuItem;
				}
			}


			/**
			 * Make the directories
			 */
			if ( !is_dir($pluginDirectory) ) {
				if ( mkdir($pluginDirectory, 0755) ) {
					$successMessage[] = 'New plugin directory created!';
					
					foreach ( $this->new_plugin_settings['plugin_directories'] as $directory ) {
						$newDirectory = $pluginDirectory . '/' . $directory;
						
						if ( mkdir($newDirectory, 0755) )
							$successMessage[] = $newDirectory . ' directory successfully created!';
						else
							$errorMessage[] = $newDirectory . ' directory could not be created!';
					}
					
					
					/**
					 * Make the files
					 */
					foreach ( $this->new_plugin_settings['plugin_files'] as $file ) {
						
						if ($file['name'] == 'readme')
							$fileLoc = $pluginDirectory . '/' . $file['file'];
						else
							$fileLoc = $pluginDirectory . '/' . $pluginPrefix . '-' . $file['file'];
						
						
						$fh = fopen($fileLoc, 'w') or die("can't open file");
						
						if ( fwrite($fh, $this->processFileContents($file['name'])) )
							$successMessage[] = $fileLoc . ' file successfully created!';
						else
							$errorMessage[] = $fileLoc . ' file could not be created!';
						
						fclose($fh);
					}
					
					
					/**
					 * Make any views
					 */
					foreach ( $this->new_plugin_settings['menus_to_add'] as $file ) {
						
						if ( $this->canMakeFile( $file ) ) {
							$fileLoc = $pluginDirectory . '/views/' . $pluginPrefix . '-' . $file['slug'] . '.php';

							$fh = fopen($fileLoc, 'w') or die("can't open file");

							if ( fwrite($fh, $this->generateViewCode($file)) ) {
								$successMessage[] = $fileLoc . ' file successfully created!';
							}
							else
								$errorMessage[] = $fileLoc . ' file could not be created!';

							fclose($fh);
						}
					}


					/**
					 * Make any CSS
					 */
					foreach ( $this->new_plugin_settings['menus_to_add'] as $file ) {
						
						if ( $this->canMakeFile( $file ) ) {
							$fileLoc = $pluginDirectory . '/css/' . $pluginPrefix . '-' . $file['slug'] . '.css';

							$fh = fopen($fileLoc, 'w') or die("can't open file");

							if ( fwrite($fh, $this->generateCSSCode($file)) )
								$successMessage[] = $fileLoc . ' file successfully created!';
							else
								$errorMessage[] = $fileLoc . ' file could not be created!';

							fclose($fh);
						}
					}
					
					
					/**
					 * Make any JS
					 */
					foreach ( $this->new_plugin_settings['menus_to_add'] as $file ) {
						
						if ( $this->canMakeFile( $file ) ) {
							$fileLoc = $pluginDirectory . '/js/' . $pluginPrefix . '-' . $file['slug'] . '.js';

							$fh = fopen($fileLoc, 'w') or die("can't open file");

							if ( fwrite($fh, $this->generateJSCode($file)) )
								$successMessage[] = $fileLoc . ' file successfully created!';
							else
								$errorMessage[] = $fileLoc . ' file could not be created!';

							fclose($fh);
						}
					}
				}
				else
					$errorMessage[] = "Could not create the directory!  Check to see if your permissions in the wp-content directory are correct.";
			}
			else {
				$errorMessage[] = "The directory already exists!  Please choose a directory name that is not in use.";
			}
		}
		
		include ( 'views/psg-newplugin.php' );
	}
	
	
	/**
	 * Help Page
	 *
	 * @since 0.1
	 */
	function helpPage() {
		/**
		 * Load the view
		 */
		include ( 'views/psg-help.php' );
	}
	
	
	/**
	 * Settings page's header injections
	 *
	 * @since 0.1
	 */
	function settingsPageHead() {
		echo '<link href="' . $this->plugin_url  . 'css/psg-default.css" rel="stylesheet" />';
	}
	
	
	/**
	 * New Plugin page's header injections
	 *
	 * @since 0.1
	 */
	function createNewPluginHead() {
		// jQuery
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-droppable' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		
		echo '<link href="' . $this->plugin_url  . 'css/psg-default.css" rel="stylesheet" />';
		echo '<link href="' . $this->plugin_url  . 'css/psg-createnewplugin.css" rel="stylesheet" />';
		echo '<script src="' . $this->plugin_url  . 'scripts/psg-createnewplugin.js" type="text/javascript"></script>';
	}
	
	
	/**
	 * Help Page header injections
	 *
	 * @since 0.1
	 */
	function helpPageHead() {
		echo '<link href="' . $this->plugin_url  . 'css/psg-default.css" rel="stylesheet" />';
		echo '<link href="' . $this->plugin_url  . 'css/psg-help.css" rel="stylesheet" />';
	}
	
	
	/**
	 * Install the plugin
	 *
	 * @since 0.1
	 */
	function installPlugin() {
		// Only send if the plugin hasn't been activated before
		$isinstalled = get_option('nlws_' . $this->plugin_prefix . '_version');
		
		if (!$isinstalled) {
			
		}
		
		// Update version
		update_option( 'nlws_' . $this->plugin_prefix . '_version', $this->plugin_version );
		
		// Check to see if there are any default settings
		$hasglobaloptions = get_option('nlws_' . $this->plugin_prefix . '_settings');
		
		if (!$hasglobaloptions) {
			$defaultoptions = array(
				array( 'default_version' => '0.1' ),
				array( 'default_author_name' => 'data' ),
				array( 'default_author_uri' => 'data' ),
				array( 'default_author_email' => 'data' ),
				array( 'default_author_wordpress' => 'data' )
			);
			
			update_option( 'nlws_' . $this->plugin_prefix . '_settings', $defaultoptions );
		}
	}
	
	
	/**
	 * Uninstall the plugin
	 *
	 * @since 0.1
	 */
	function uninstallPlugin() {
		delete_option ( 'nlws_' . $this->plugin_prefix . '_version' );
		delete_option ( 'nlws_' . $this->plugin_prefix . '_settings' );
	}


	/**
	 * Generates the necessary code
	 * for the view file
	 *
	 * @since 0.1
	 * @return string
	 */
	function generateViewCode( $view ) {
		$thecode = '';
		
		switch ( $view['type'] ) {
			case 'object' :
				$thecode = '<div class="wrap">' . "\n";
				$thecode.= "\t" . '<div id="icon-options-general" class="icon32"></div><h2>' . $view['label'] . '</h2>' . "\n";
				$thecode.= "\t" . '<p>Put your code here!</p>' . "\n";
				$thecode.= '</div>';
				break;

			case 'option' :
				$thecode = '<div class="wrap">' . "\n";
				$thecode.= "\t" . '<div id="icon-options-general" class="icon32"></div><h2>' . $view['label'] . '</h2>' . "\n";
				$thecode.= "\t" . '<p>Put your code here!</p>' . "\n";
				$thecode.= '</div>';
				break;

			case 'sub' :
				$thecode = '<div class="wrap">' . "\n";
				$thecode.= "\t" . '<div id="icon-options-general" class="icon32"></div><h2>' . $view['label'] . '</h2>' . "\n";
				$thecode.= "\t" . '<p>Put your code here!</p>' . "\n";
				$thecode.= '</div>';
				break;
		}
		
		return $thecode;
	}
	
	
	/**
	 * Generates the necessary code
	 * for the CSS file
	 *
	 * @since 0.1
	 * @return string
	 */
	function generateCSSCode( $view ) {
		$thecode = '';
		
		switch ( $view['type'] ) {
			case 'object' :
				$thecode = '/* CSS File */';
				break;

			case 'option' :
				$thecode = '/* CSS File */';
				break;

			case 'sub' :
				$thecode = '/* CSS File */';
				break;
		}
		
		return $thecode;
	}
	
	
	/**
	 * Generates the necessary code
	 * for the JavaScript file
	 *
	 * @since 0.1
	 * @return string
	 */
	function generateJSCode( $view ) {
		$thecode = '';
		
		switch ( $view['type'] ) {
			case 'object' :
				break;

			case 'option' :
				break;

			case 'sub' :
				break;
		}
		
		$thecode = '/* ' . $view['label'] . ' JS File */' . "\n";
		$thecode.= 'jQuery(document).ready(function($){'  . "\n";
		$thecode.= "\n";
		$thecode.= '});';
		
		return $thecode;
	}
	
	
	/**
	 * Determines if the passed file can be created.  This
	 * is MAINLY for object and sub object pages.  Many plugins
	 * have object pages that have different labels, ie object
	 * pages thatdefault to a settings page, or some sort of view.
	 * This is only possible by creating a sub page for said
	 * object page and making both pages load the same view.
	 * 
	 * @since 0.1
	 * @return bool 
	 */
	function canMakeFile ( $file ) {
		if ( $file )
			return true;
	}
}