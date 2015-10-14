<?php
/**
 * Plugin Name: WordPress Actions Tester Changes
 * Plugin URI:
 * Description: Example plugin showing how to hook into actions in WordPress
 * Author: ericjuden
 * Author URI: http://ericjuden.com
 * Version: 1.0
 */

 class Actions_Tester_Changes {
 	function __construct(){
 		add_action('action_test_after_form_elements', array($this, 'add_my_custom_content'));
 		add_filter('action_test_dropdown_options', array($this, 'my_custom_dropdown_options'), 10, 1);
 	}

 	// Add our own custom controls below the others
 	function add_my_custom_content(){
 ?>
 		<h3><?php _e('New Section'); ?></h3>
 		<label for="test_textbox"><?php _e('Enter Your Value'); ?>
 		<input type="text" name="test_textbox" id="test_textbox" />
 <?php
 	}

 	// Edit list of dropdown options
 	function my_custom_dropdown_options($options){
 		$options[4] = 'Option 4';
 		$options[5] = 'Option 5';

 		unset($options[1]);

 		return $options;
 	}
 }

 $actions_tester_changes = new Actions_Tester_Changes();
 ?>
