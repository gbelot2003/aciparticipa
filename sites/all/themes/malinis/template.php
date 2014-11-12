<?php

/**
 * @file
 * Process theme data.
 *
 * Use this file to run your theme specific implimentations of theme functions,
 * such preprocess, process, alters, and theme function overrides.
 *
 * Preprocess and process functions are used to modify or create variables for
 * templates and theme functions. They are a common theming tool in Drupal, often
 * used as an alternative to directly editing or adding code to templates. Its
 * worth spending some time to learn more about these functions - they are a
 * powerful way to easily modify the output of any template variable.
 *
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "CustomWork" to match
 *    your subtheme's name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "CustomWork". If you install this subtheme via Drush, this is automated.
 * 2. Uncomment the required function to use.
 */


function malinis_preprocess_search_block_form(&$variables) {
  $variables['search_form'] = str_replace('value="search"', 'value="&#xe049;"', $variables['search_form']);
}

function malinis_form_alter(&$form, &$form_state, $form_id){
	//$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Buscar';}";
	if ($form_id == 'search_block_form') 
	{
		$form['search_block_form']['#attributes']['placeholder'] = t('Buscar...');
		$form['search_block_form']['#attributes']['title'] = t('Ingresa el texto que deseas buscar');
		$form['search_block_form']['#attributes']['size'] = 45;
		$form['actions']['#attributes']['class'][] = 'element-invisible';
		//$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search.png');
	}
}

function malinis_preprocess_page(&$variables) {
	$variables['theme_attribution'] = '

	<div id="theme-attribution-wrapper"	class="wrapper">
		<div id="theme-attribution">
			<div class="vcard">
				<div id="copyright">
				<p class="adr">Colonia Miraflores Sur, 2da Avenida, 19 Calle, Bloque 42, casa 4009. <span class="tel">Teléfono +504 2228-1451</span>, Correo Electronico: <span class=email">info@aci-participa.org</span></p>
	 		</div>
	 			<p id="developer">' . t('Diseño diseñado por') . '
	 				<a target="_blank" href="http://webmasterhn.com">Webmasterhn de Sistemas Especializados para ACI-Participa</a>, con el apoyo financiero de <strong><a href="http://www.danchurchaid.org/" target="_black">Dan Church Aid</a></strong>
	 			</p>
	 		</div>
	 	</div>
	 </div>';
}