<?php
require_once dirname(__FILE__) . '/inc/theme-settings-header.inc';
function corporate_form_system_theme_settings_alter(&$form,&$form_state,$form_id = NULL) {
	print '<br/>'.theme_get_setting('superhero_presets','');
	corporate_theme_settings_header($form,$form_state);
}