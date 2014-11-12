<?php
/**
 * Custom Galeria Template settings
 */
 
/**
 * page alter
 */
function corporate_page_alter(&$vars) {
	// Add custom varibales for scss
	$theme = superhero_get_theme();
	$theme->custom['header_height'] = theme_get_setting('superhero_header_height');
	$theme->custom['header_fixed_height'] = theme_get_setting('superhero_header_fixed_height');
	// Remove content from front page
	if (drupal_is_front_page()) {
		unset($vars['data']['content']);
	}	
}

function corporate_preprocess_button(&$vars) {
  if (isset($vars['element']['#value'])) {
    $classes = array(
      //specifics
      t('Subscribe') => 'btn-primary',
    );
    foreach ($classes as $search => $class) {
      if (strpos($vars['element']['#value'], $search) !== FALSE) {
        $vars['element']['#attributes']['class'][] = $class;
        break;
      }
    }
  }
}