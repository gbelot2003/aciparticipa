<?php

/**
 * Definition of Tab Shortcodes
 */

/**
 * Implements hook_shortcode_info
 */
global $superhero_shortcode_gallery;
global $superhero_shortcode_galleries_categories;
$superhero_shortcode_galleries_categories = array();
function _gallery_shortcode_info(&$shortcodes) {
	$shortcodes['gallery'] = array(
		'title' => t('Gallery'),
		'description' => t('Create Isotope gallery'),
		'process callback' => 'superhero_shortcode_gallery',
		'cache' => TRUE,
	);
	
	$shortcodes['gallery_item'] = array(
		'title' => t('Gallery Item'),
		'process callback' => 'superhero_shortcode_gallery_item',
		'cache' => TRUE,
	);
	
	return $shortcodes;
}


/**
 * Isotope Gallery Container
 */
function superhero_shortcode_gallery($attrs, $text) {
	global $superhero_shortcode_gallery;
	if(empty($superhero_shortcode_gallery)){
		$superhero_shortcode_gallery = 1;
	}
	global $superhero_shortcode_galleries_categories;
	$attrs = shortcode_attrs(array(
			'cols' => '4',
			'filter' => 'no'
		),
		$attrs
	);
	$colsize = 12/$attrs['cols'];
	$text = str_replace('@colsize',$colsize,$text);
	$gallery = "<div class='portfolio-filters'>";
	$gallery .= "<ul id='filters' class='filter-source option-set clearfix'>";
	$gallery .= "<li><a href='#' class='active' data-filter='*'>". t('Show all')."</a></li>";
	foreach($superhero_shortcode_galleries_categories as $categoty){
		$gallery .= "<li><a href='#' data-filter=\".{$categoty}\">{$categoty}</a></li>";
	}
	$gallery .= "</ul>";
	$gallery .= "</div>";
	$gallery .= '<div class="supperhero-gallery row isotope">'.$text.'</div>';
	
	$gallery .= '<script type="text/javascript">';
	$gallery .= 'jQuery(document).ready(function($){';
	$gallery .= '	$(".filter-source a").click(function(){';
	$gallery .= '	$(this).parents(\'.filter-source\').find(\'a\').removeClass(\'active\');';
	$gallery .= '	$(this).addClass(\'active\');';
	$gallery .= '	var selector = $(this).attr(\'data-filter\');';
	$gallery .= '	$(\'.isotope\').isotope({ filter: selector });';
	$gallery .= '	return false;';
	$gallery .= '	});';
	$gallery .= '})';
	$gallery .= '</script>';
	
	return $gallery;
}

/**
 * Gallery Item
 */
function superhero_shortcode_gallery_item($attrs, $text) {		
	global $superhero_shortcode_galleries_categories;
	$attrs = shortcode_attrs(array(
			'tag' => '',
			'image' => '',
		),
		$attrs
	);
	$superhero_shortcode_galleries_categories[$attrs['tag']] = $attrs['tag'];
	return theme('superhero_shortcode_gallery_item',array(
		'tag' => $attrs['tag'],
		'image' => $attrs['image'],
		'content' => $text,
	));
	//return '<li class="'.$attrs['tag'].' col-md-4"><img alt=" " src="'.$attrs['image'].'" /></li>';
}

/**
 * Icon theme
 */
function _gallery_item_theme(&$themes) {
	$path = drupal_get_path('module','superhero_shortcode');
	$themes['superhero_shortcode_gallery_item'] = array(
		'template' => 'galleryitem',
		'path' => $path . '/theme',
		'variables' => array(
			'tag' => '',
			'image' => '',
			'content' => '',
			//'class' => 'col'
		)
	);
	
	return $themes;
}