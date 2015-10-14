<?php
/**
 * Plugin Name: WordPress Actions Tester
 * Plugin URI:
 * Description: Example plugin showing how to create actions in WordPress
 * Author: ericjuden
 * Author URI: http://ericjuden.com
 * Version: 1.0
 */

class Actions_Tester {
	function __construct(){
		add_action('admin_menu', array($this, 'admin_menu'));

	}

	function admin_menu(){
		add_management_page(__('Actions Tester'), __('Actions Tester'), 'manage_options', 'actions-tester', array($this, 'tester_page'));
	}

	function tester_page(){
		// Security check
		if(!current_user_can('manage_options')){
			wp_die(__('You do not have permission to view this page.'));
		}

?>
		<div class="wrap">
			<?php screen_icon('tools'); ?>
			<h2><?php _e('Actions Tester') ?></h2>

			<select name="test_dropdown" id="test_dropdown">
			<?php foreach($this->get_dropdown_options() as $value=>$label){ ?>
				<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
			<?php } ?>
			</select>

			<?php do_action('action_test_after_form_elements'); ?>
		</div>

<?php
	}

	// Create default dropdown options
	function get_dropdown_options(){
		$options = array(
			1 => 'Option 1',
			2 => 'Option 2',
			3 => 'Option 3'
		);

		return apply_filters('action_test_dropdown_options', $options);
	}
}
$actions_tester = new Actions_Tester();
?>
