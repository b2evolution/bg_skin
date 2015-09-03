<?php
/**
 * This file implements a class derived of the generic Skin class in order to provide custom code for
 * the skin in this folder.
 *
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

/**
 * Specific code for this skin.
 *
 * ATTENTION: if you make a new skin you have to change the class name below accordingly
 */
class bg_Skin extends Skin
{
	var $version = '2.1';

    /**
	 * Get default name for the skin.
	 * Note: the admin can customize it.
	 */
	function get_default_name()
	{
		return 'BG';
	}


  /**
	 * Get default type for the skin.
	 */
	function get_default_type()
	{
		return 'normal';
	}


	/**
	 * Get definitions for editable params
	 *
	 * @see Plugin::GetDefaultSettings()
	 * @param local params like 'for_editing' => true
	 */
	function get_param_definitions( $params )
	{
		$r = array_merge( array(
				'section_layout_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Blog introduction settings')
				),
				'main_content_headline' => array(
					'label' => T_('Introduction headline'),
					'defaultvalue' => 'About this blog',
					'type' => 'text',
					'size' => '100%',
				),
				'main_content' => array(
					'label' => T_('Introduce your blog'),
					'defaultvalue' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin placerat malesuada est. Aenean hendrerit lectus eget ante. Etiam gravida felis. Vivamus viverra, mi sit amet gravida placerat, tortor arcu porta ligula, in accumsan sem ante non turpis. Morbi nec enim id augue blandit tempor. Praesent imperdiet facilisis mi. Sed aliquam, magna vel consequat hendrerit, nisl nulla elementum sem, vitae porttitor massa eros ut orci. In vehicula. Aliquam condimentum convallis nisl. Ut id lorem. Etiam quis enim. Nam sagittis metus tincidunt ligula. Mauris blandit adipiscing lectus. Aenean malesuada. Etiam blandit ornare dolor.',
					'type' => 'textarea',
					'size' => '100%',
				),
				
				'section_layout_end' => array(
					'layout' => 'end_fieldset',
				),
				
				'3_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Other skin settings')
				),
					'colorbox' => array(
						'label' => T_('Colorbox Image Zoom'),
						'note' => T_('Check to enable javascript zooming on images (using the colorbox script)'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'gender_colored' => array(
						'label' => T_('Display gender'),
						'note' => T_('Use colored usernames to differentiate men & women.'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),
					'bubbletip' => array(
						'label' => T_('Username bubble tips'),
						'note' => T_('Check to enable bubble tips on usernames'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),
				'3_end' => array(
					'layout' => 'end_fieldset',
				),
			), parent::get_param_definitions( $params )	);

		return $r;
	}


	/**
	 * Get ready for displaying the skin.
	 *
	 * This may register some CSS or JS...
	 */
	function display_init()
	{
		
		global $disp;
		
		// call parent:
		parent::display_init();

		// Add CSS:
		require_css( 'basic_styles.css', 'blog' ); // the REAL basic styles
		require_css( 'basic.css', 'blog' ); // Basic styles
		require_css( 'blog_base.css', 'blog' ); // Default styles for the blog navigation
		require_css( 'item_base.css', 'blog' ); // Default styles for the post CONTENT
		require_css( 'style.css', 'relative' );

		// Add custom CSS:
		$custom_css = '';

		// Colorbox (a lightweight Lightbox alternative) allows to zoom on images and do slideshows with groups of images:
		if( $this->get_setting("colorbox") )
		{
			require_js_helper( 'colorbox', 'blog' );
		}
		
		if( $main_content_headline = $this->get_setting( 'main_content_headline' ) )
		{ // Custom introduction title:
			$custom_css .= 'div#main h1:before { content: "'.$main_content_headline.'" }';
		}	
		if( $main_content = $this->get_setting( 'main_content' ) )
		{ // Custom inroduction text:
			$custom_css .= 'div#main p:before { content: "'.$main_content.'" }';
		}
			
			if( ! empty( $custom_css ) )
			{
				if( $disp == 'front' )
				{ // Use standard bootstrap style on width <= 640px only for disp=front
					$custom_css = '@media only screen and (min-width: 641px)
						{
							'.$custom_css.'
						}';
				}
				$custom_css = '<style type="text/css">
	<!--
		'.$custom_css.'
	-->
	</style>';
				add_headline( $custom_css );
			}
	}

}

?>