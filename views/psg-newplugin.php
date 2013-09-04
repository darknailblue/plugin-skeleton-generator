<div class="wrap">
	<div id="icon-skeleton" class="icon32"></div><h2>P.S.G. - Create New Plugin</h2>
	<?php global $errorMessage, $successMessage; ?>	
	<?php if ($errorMessage || $successMessage) : ?>

		<div id="setting-error-settings_updated" class="updated settings-error"> 
			<?php foreach ( $errorMessage as $message ) : ?>
				<p><?php echo $message ?></p>
			<?php endforeach ?>
			<?php foreach ( $successMessage as $message ) : ?>
				<p><?php echo $message ?></p>
			<?php endforeach ?>
		</div>
	<?php endif ?>
	
	<p><?php _e('Fill out the forms below to create your new plugin skeleton.') ?></p>
	<form method="post" class="metabox-holder">
		<?php $options = get_option( 'nlws_psg_settings' );	?>
		<div id="psg_view_general" class="psgsection postbox">
		<h3><?php _e('General Settings') ?></h3>
		<div class="inside">
		<table class="form-table">
			<tr valign="top"><th scope="row"><label for="plugin_name"><?php _e( 'Plugin Name' ); ?></label></th>
				<td>
					<input id="plugin_name" class="regular-text required" type="text" name="plugin_name" value="" />
					<br /><span class="description"><?php _e( "The descriptive name of the new plugin.  This value will be present in the both the comment section that declares the plugin and in the readme.txt files." ); ?></span>
				</td>
			</tr>
			
			<tr valign="top"><th scope="row"><label for="plugin_description"><?php _e( 'Plugin Description' ); ?></label></th>
				<td>
					<textarea id="plugin_description" class="regular-text required" name="plugin_description"></textarea>
					<br /><span class="description"><?php _e( "The new plugin's description. This value will also be present in the both the comment section that declares the plugin and in the readme.txt files." ); ?></span>
				</td>
			</tr>
			
			<tr valign="top"><th scope="row"><label for="plugin_uri"><?php _e( 'Plugin URI' ); ?></label></th>
				<td>
					<input id="plugin_uri" class="regular-text required" type="text" name="plugin_uri" value="" />
					<br /><span class="description"><?php _e( "The URI for the new plugin.  Again present in the *-init.php and readme.txt files." ); ?></span>
				</td>
			</tr>
				
			<tr valign="top"><th scope="row"><label for="version_number"><?php _e( 'Version Number' ); ?></label></th>
				<td>
					<input id="version_number" class="small-text required" type="text" name="version_number" value="<?php esc_attr_e( $options['default_version'] ); ?>" />
					<br /><span class="description"><?php _e( "The new plugin's version number.  Value is present in the *-init.php and readme.txt files." ); ?></span>
				</td>
			</tr>

			<tr valign="top"><th scope="row"><label for="author_name"><?php _e( 'Author Name' ); ?></label></th>
				<td>
					<input id="author_name" class="regular-text required" type="text" name="author_name" value="<?php esc_attr_e( $options['default_author_name'] ); ?>" />
					<br /><span class="description"><?php _e( "Who or what company wrote this plugin.  Value is present in the *-init.php and readme.txt files." ); ?></span>
				</td>
			</tr>

			<tr valign="top"><th scope="row"><label for="author_uri"><?php _e( 'Author URI' ); ?></label></th>
				<td>
					<input id="author_uri" class="regular-text required" type="text" name="author_uri" value="<?php esc_attr_e( $options['default_author_uri'] ); ?>" />
					<br /><span class="description"><?php _e( "The new plugin author's URI.  Value is present in the *-init.php and readme.txt files." ); ?></span>
				</td>
			</tr>
			
			<tr valign="top"><th scope="row"><label for="author_email"><?php _e( 'Author Email' ); ?></label></th>
				<td>
					<input id="author_email" class="regular-text required" type="text" name="author_email" value="<?php esc_attr_e( $options['default_author_email'] ); ?>" />
					<br /><span class="description"><?php _e( "The new plugin author's email.  Value is present in the *-init.php file." ); ?></span>
				</td>
			</tr>
			
		</table>
		</div>
		</div>
		<div id="psg_view_readme" class="psgsection postbox hidden">
		<h3><?php _e('Readme.txt Settings') ?></h3>
		<div class="inside">
		<p><?php _e('The following settings control how the readme.txt file is generated') ?></p>
		<table class="form-table">
			<tr valign="top"><th scope="row"><label for="wordpress_username"><?php _e( 'Contributors List' ); ?></label></th>
				<td>
					<input id="wordpress_username" class="regular-text required" type="text" name="wordpress_username" value="<?php esc_attr_e( $options['default_author_wordpress'] ); ?>" />
				</td>
			</tr>
			<tr valign="top"><th scope="row"><label for="donate_link"><?php _e( 'Donate Link' ); ?></label></th>
				<td>
					<input id="donate_link" class="regular-text required" type="text" name="donate_link" value="" />
				</td>
			</tr>
			<tr valign="top"><th scope="row"><label for="tags"><?php _e( 'Tags' ); ?></label></th>
				<td>
					<input id="tags" class="regular-text required" type="text" name="tags" value="" />
				</td>
			</tr>
			<tr valign="top"><th scope="row"><label for="requires_at_least"><?php _e( 'Requires at Least' ); ?></label></th>
				<td>
					<input id="requires_at_least" class="small-text required" type="text" name="requires_at_least" value="" />
				</td>
			</tr>
			<tr valign="top"><th scope="row"><label for="tested_up_to"><?php _e( 'Tested Up To' ); ?></label></th>
				<td>
					<input id="tested_up_to" class="small-text required" type="text" name="tested_up_to" value="" />
				</td>
			</tr>
		</table>
		</div>
		</div>
		<div id="psg_view_tech" class="psgsection postbox hidden">
		<h3><?php _e('Tech Settings') ?></h3>
		<div class="inside">
		<table class="form-table">
			
			<tr valign="top"><th scope="row"><label for="plugin_prefix"><?php _e( 'Plugin Prefix' ); ?></label></th>
				<td>
					<input id="plugin_prefix" class="small-text required" type="text" name="plugin_prefix" value="" />
					<br /><span class="description"><?php _e( "This value is used to create a prefix for all class, function and slug name values so that the plugin won't conflict with other plugins in the global namespace." ); ?></span>
				</td>
			</tr>
			
			<tr valign="top"><th scope="row"><label for="plugin_directory"><?php _e( 'Plugin Directory' ); ?></label></th>
				<td>
					<input id="plugin_directory" class="regular-text required" type="text" name="plugin_directory" value="" />
					<br /><span class="description"><?php _e( "The directory name of the plugin.  This will reside in the wp-content/plugins/ directory." ); ?></span>
				</td>
			</tr>
		</table>
		</div>
		</div>
		<div id="psg_view_menus" class="psgsection postbox hidden">
		<h3><?php _e('Menu Options') ?></h3>
		<div class="inside">
			<p><?php _e( "Use this section to add administrative menus to the Wordpress section.&nbsp; If you do not wish to add any menus, simply continue."); ?></p>
			
			<div id="psg_menu_container" class="nav-menus-php">
				<ul class="menu ui-sortable" id="menu-to-edit">
					<!-- AJAX STUFF -->
				</ul>
			</div>
			<button class="button-secondary psg-addnewmenu"><img src="<?php echo $this->plugin_url ?>images/add.png" /> Add New Menu</button>
		</div>	
		</div>
		<input type="hidden" name="hid-formsubmit" value="1" />
		<div class="appnavigation">
			<div class="alignleft">
				<p class="submit">
					<button class="button-secondary previous hidden">&laquo; <?php _e('Previous') ?></button>
				</p>
			</div>
			<div class="alignright">
				<p class="submit">
					<button class="button-secondary next"><?php _e('Next') ?> &raquo;</button>
					<input type="submit" class="button-primary hidden" value="<?php _e('Create New Plugin') ?>" />
				</p>
			</div>
			<div style="clear: both;"></div>
		</div>
	</form>
</div>