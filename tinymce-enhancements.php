<?php
/**
* Plugin Name: TinyMCE Enhancements
* Plugin URI: http://itconnect.uw.edu
* Author: Nick Rohde
* Version: 1.0.0
* License GPLv2
* Description: Enhances the TinyMCE editor to allow use of IT Connect custom styles.
*/


// Callback function to filter the MCE settings
function tinymce_enhancements_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(
			'title' => 'IT Connect Elements',
			'items' => array(
				array(
					'title' => 'Action Block',
					'block' => 'div',
					'classes' => 'fbox injected',
					'wrapper' => true,
				),
				array(
					'title' => 'Simplified Block Quote',
					'block' => 'blockquote',
					'classes' => 'simple injected',
					'wrapper' => true,
				),
				array(
					'title' => 'Callout Box',
					'block' => 'div',
					'classes' => 'emphasize',
					'attributes' => array(
						'aria-label' => 'emphasized'
					),
					'wrapper' => false,
				),
				array(
					'title' => 'Important Information',
					'block' => 'div',
					'classes' => 'important-box',
					'attributes' => array(
						'aria-label' => 'mportant'
					),
					'wrapper' => false,
				),
				array(
					'title' => 'UW Buttons',
					'items' => array(
						array(
							'title' => 'Normal',
							'inline' => 'a',
							'classes' => 'uw-btn',
							'attributes' => array(
								'href' => '#'
							),
							'wrapper' => false,
						),
						array(
							'title' => 'Smaller',
							'inline' => 'a',
							'classes' => 'uw-btn-sm',
							'attributes' => array(
								'href' => '#'
							),
							'wrapper' => false,
						),
						array(
							'title' => 'Larger',
							'inline' => 'a',
							'classes' => 'uw-btn-lg',
							'attributes' => array(
								'href' => '#'
							),
							'wrapper' => false,
						),
					)
				),
				array(
					'title' => 'Procedure',
					'selector' => 'ol',
					'classes' => 'procedure injected',
					'attributes' => array(
						'aria-label' => 'Steps and actions procedures'
					),
					'wrapper' => false,
				),
				array(
					'title' => 'Page subtitle',
					'block' => 'div',
					'classes' => 'subtitle injected',
					'wrapper' => false,
				),
				array(
					'title' => 'Table of contents',
					'selector' => 'ul',
					'classes' => 'ptoc injected',
					'attributes' => array(
						'aria-label' => 'Table of contents'
					),
					'wrapper' => false,
				)
			)
		),
	);  

	// Append to existing styles
	$init_array['style_formats_merge'] = true;

	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  

	return $init_array;  
  
} 

// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'tinymce_enhancements_before_init_insert_formats' );
