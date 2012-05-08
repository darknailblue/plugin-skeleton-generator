<?php
/**
 * INCLUDES/WORKING-POST-VARIABLES.PHP
 *
 * @since 0.1
 */
$pluginName = $_POST['plugin_name'];
$pluginDescription = $_POST['plugin_description'];
$pluginURI = $_POST['plugin_uri'];
$pluginVersion = $_POST['version_number'];
$pluginAuthor = $_POST['author_name'];
$pluginAuthorURI = $_POST['author_uri'];
$pluginAuthorEmail = $_POST['author_email'];
$pluginPrefix = $_POST['plugin_prefix'];

$pluginAuthorWordpress = $_POST['wordpress_username'];
$pluginDonateLink = $_POST['donate_link'];
$pluginTags = $_POST['tags'];
$pluginRequiresAtLeast = $_POST['requires_at_least'];
$pluginTestedUpTo = $_POST['tested_up_to'];

$contents;
$className = $pluginPrefix . preg_replace("/[^a-zA-Z]/", "", $pluginName);
$objectVarName = '$' . $pluginPrefix . 'Object';

$pluginVersionVar = ' $this->plugin_prefix . \'_version\'';
$pluginSettingsVar = ' $this->plugin_prefix . \'_settings\'';;