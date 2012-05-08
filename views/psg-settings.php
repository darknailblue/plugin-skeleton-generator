<div class="wrap">
	<div id="icon-skeleton" class="icon32"></div><h2>P.S.G. - Global Settings</h2>

	<?php if (isset($_GET['settings-updated'])) : ?>
		<?php if ($_GET['settings-update']==true) : ?>
			<div id="setting-error-settings_updated" class="updated settings-error"> 
				<p><strong>Settings saved.</strong></p>
			</div>
		<?php endif ?>
	<?php endif ?>

	<p>Thank you for downloading this awesome plugin.&nbsp; You are now on your way to creating your very own plugin.</p>
	<form method="post" action="options.php" class="metabox-holder">
		<?php
		settings_fields( 'nlws_psg_settings' );
		$options = get_option( 'nlws_psg_settings' );
		?>
		<div class="postbox">
		<h3>Global Settings</h3>
		<div class="inside">
		<table class="form-table">
			<tr valign="top"><th scope="row"><label for="nlws_psg_settings[default_version]"><?php _e( 'Default Version Number' ); ?></label></th>
				<td>
					<input id="nlws_psg_settings[default_version]" class="small-text required" type="text" name="nlws_psg_settings[default_version]" value="<?php esc_attr_e( $options['default_version'] ); ?>" />
				</td>
			</tr>

			<tr valign="top"><th scope="row"><label for="nlws_psg_settings[default_author_name]"><?php _e( 'Default Author Name' ); ?></label></th>
				<td>
					<input id="nlws_psg_settings[default_author_name]" class="regular-text required" type="text" name="nlws_psg_settings[default_author_name]" value="<?php esc_attr_e( $options['default_author_name'] ); ?>" />
				</td>
			</tr>

			<tr valign="top"><th scope="row"><label for="nlws_psg_settings[default_author_uri]"><?php _e( 'Default Author URI' ); ?></label></th>
				<td>
					<input id="nlws_psg_settings[default_author_uri]" class="regular-text required" type="text" name="nlws_psg_settings[default_author_uri]" value="<?php esc_attr_e( $options['default_author_uri'] ); ?>" />
				</td>
			</tr>
			
			<tr valign="top"><th scope="row"><label for="nlws_psg_settings[default_author_email]"><?php _e( 'Default Author Email' ); ?></label></th>
				<td>
					<input id="nlws_psg_settings[default_author_email]" class="regular-text required" type="text" name="nlws_psg_settings[default_author_email]" value="<?php esc_attr_e( $options['default_author_email'] ); ?>" />
				</td>
			</tr>
			
			<tr valign="top"><th scope="row"><label for="nlws_psg_settings[default_author_wordpress]"><?php _e( 'Default Wordpress.org Username' ); ?></label></th>
				<td>
					<input id="nlws_psg_settings[default_author_wordpress]" class="regular-text required" type="text" name="nlws_psg_settings[default_author_wordpress]" value="<?php esc_attr_e( $options['default_author_wordpress'] ); ?>" />
				</td>
			</tr>
			
		</table>
		</div>
		</div>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>