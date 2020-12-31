<?php
/**
 * Class to include upsell button on customize section.
 *
 * Class Spacious_Customizer_Upsell_Button
 *
 * @package    ThemeGrill
 * @subpackage Spacious
 * @since      Spacious 2.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to include upsell button on customize section
 *
 * Class Spacious_Customizer_Upsell_Button
 */
class Spacious_Customizer_Upsell_Button extends Spacious_Customize_Base_Option {

	/**
	 * Include customize options.
	 *
	 * @param array                 $options      Customize options provided via the theme.
	 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @return mixed|void Customizer options for registering panels, sections as well as controls.
	 */
	public function register_options( $options, $wp_customize ) {

		$configs = array(

			// View Pro Version section.
			array(
				'name'             => 'spacious_customize_upsell_section',
				'type'             => 'section',
				'title'            => esc_html__( 'View Pro Version', 'spacious' ),
				'url'              => 'https://themegrill.com/spacious-pricing/?utm_source=spacious-customizer&utm_medium=view-pro-link&utm_campaign=spacious-pricing',
				'priority'         => 1,
				'section_callback' => 'Spacious_Upsell_Section',
			),

		);

		$options = array_merge( $options, $configs );

		return $options;

	}

}

return new Spacious_Customizer_Upsell_Button();
