<?php
/**
 * Class to include Header Media customize options.
 *
 * Class Spacious_Customize_Header_Media_Options
 *
 * @package    ThemeGrill
 * @subpackage Spacious
 * @since      Spacious 3.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to include Header Media customize options.
 *
 * Class Spacious_Customize_Header_Media_Options
 */
class Spacious_Customize_Header_Media_Options extends Spacious_Customize_Base_Option {

	/**
	 * Include customize options.
	 *
	 * @param array $options Customize options provided via the theme.
	 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @return mixed|void Customizer options for registering panels, sections as well as controls.
	 */
	public function register_options( $options, $wp_customize ) {

		$header_image_value = get_theme_mod( 'header_image' ) === 'remove-header' ? 'remove-header' : '';
		$header_video_value = get_theme_mod( 'header_video' ) === 0 ? 0 : '';

		$configs = array(

			array(
				'name'       => 'spacious[header_image_position_heading]',
				'type'       => 'control',
				'control'    => 'spacious-title',
				'label'      => esc_html__( 'Position', 'spacious' ),
				'section'    => 'header_image',
				'dependency' => array(
					'conditions' => array(
						array(
							'header_image',
							'!=',
							$header_image_value,
						),
						array(
							'header_video',
							'!=',
							$header_video_value,
						),
						array(
							'external_header_video',
							'!=',
							'',
						),
					),
					'operator'   => 'OR',
				),
				'priority'   => 10,
			),

			// Header image position option.
			array(
				'name'       => 'spacious[spacious_header_image_position]',
				'default'    => 'above',
				'type'       => 'control',
				'control'    => 'radio',
				'label'      => esc_html__( 'Header image display position', 'spacious' ),
				'section'    => 'header_image',
				'choices'    => array(
					'above' => esc_html__( 'Position Above (Default): Display the Header image just above the site title and main menu part.', 'spacious' ),
					'below' => esc_html__( 'Position Below: Display the Header image just below the site title and main menu part.', 'spacious' ),
				),
				'dependency' => array(
					'conditions' => array(
						array(
							'header_image',
							'!=',
							$header_image_value,
						),
						array(
							'header_video',
							'!=',
							$header_video_value,
						),
						array(
							'external_header_video',
							'!=',
							'',
						),
					),
					'operator'   => 'OR',
				),
				'priority'   => 10,
			),

			// Header image link to home page option.
			array(
				'name'       => 'spacious[spacious_header_image_link]',
				'default'    => 0,
				'type'       => 'control',
				'control'    => 'checkbox',
				'label'      => esc_html__( 'Check to make header image link back to home page', 'spacious' ),
				'section'    => 'header_image',
				'dependency' => array(
					'conditions' => array(
						array(
							'header_image',
							'!=',
							$header_image_value,
						),
						array(
							'header_video',
							'!=',
							$header_video_value,
						),
						array(
							'external_header_video',
							'!=',
							'',
						),
					),
					'operator'   => 'OR',
				),
				'priority'   => 15,
			),

			// Header image link to custom location option.
			array(
				'name'       => 'spacious[spacious_header_image_link_to_other_sites]',
				'default'    => '',
				'type'       => 'control',
				'control'    => 'url',
				'label'      => esc_html__( 'Custom link to header image ', 'spacious' ),
				'section'    => 'header_image',
				'dependency' => array(
					'conditions' => array(
						array(
							'header_image',
							'!=',
							$header_image_value,
						),
						array(
							'header_video',
							'!=',
							$header_video_value,
						),
						array(
							'external_header_video',
							'!=',
							'',
						),
					),
					'operator'   => 'OR',
				),
				'priority'   => 20,
			),

		);

		$options = array_merge( $options, $configs );

		return $options;
	}
}

return new Spacious_Customize_Header_Media_Options();
