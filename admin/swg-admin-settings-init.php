<?php

/**
 * The SWG Toolkit Admin Settings
 *
 * @link       https://www.southernweb.com/
 * @since      1.0.2
 *
 * @package    SWG_Toolkit
 * @subpackage SWG_Toolkit/admin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define global constants.
 *
 * @since 1.0.2
 */
// Plugin version.
if ( ! defined( 'SWG_TOOLKIT_ADMIN_VERSION' ) ) {
	define( 'SWG_TOOLKIT_ADMIN_VERSION', '1.0.0' );
}

if ( ! defined( 'SWG_TOOLKIT_ADMIN_NAME' ) ) {
	define( 'SWG_TOOLKIT_ADMIN_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'SWG_TOOLKIT_ADMIN_DIR' ) ) {
	define( 'SWG_TOOLKIT_ADMIN_DIR', WP_PLUGIN_DIR . '/' . SWG_TOOLKIT_ADMIN_NAME );
}

if ( ! defined( 'SWG_TOOLKIT_ADMIN_URL' ) ) {
	define( 'SWG_TOOLKIT_ADMIN_URL', WP_PLUGIN_URL . '/' . SWG_TOOLKIT_ADMIN_NAME );
}

/**
 * WP-OOP-Settings-API Initializer
 *
 * Initializes the WP-OOP-Settings-API.
 *
 * @since   1.0.2
 */

/**
 * Actions/Filters
 *
 * Related to all settings API.
 *
 * @since  1.0.2
 */
if ( class_exists( 'SWG_Toolkit_Settings' ) ) {
	/**
	 * Object Instantiation.
	 *
	 * Object for the class `SWG_Toolkit_Settings`.
	 */
	$swg_toolkit_obj = new SWG_Toolkit_Settings();

	// Section: Basic Settings.
	$swg_toolkit_obj->add_section(
		array(
			'id'    => 'swg_toolkit_basic',
			'title' => __( 'Basic Settings', 'swg-toolkit' ),
		)
	);

	// Section: Other Settings.
	$swg_toolkit_obj->add_section(
		array(
			'id'    => 'swg_toolkit_other',
			'title' => __( 'Other Settings', 'swg-toolkit' ),
		)
	);

	// Field: Text.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'      => 'text',
			'type'    => 'text',
			'name'    => __( 'Text Input', 'swg-toolkit' ),
			'desc'    => __( 'Text input description', 'swg-toolkit' ),
			'default' => 'Default Text',
		)
	);

	// Field: Number.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'                => 'text_no',
			'type'              => 'number',
			'name'              => __( 'Number Input', 'swg-toolkit' ),
			'desc'              => __( 'Number field with validation callback `intval`', 'swg-toolkit' ),
			'default'           => 1,
			'sanitize_callback' => 'intval',
		)
	);

	// Field: Password.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'   => 'password',
			'type' => 'password',
			'name' => __( 'Password Input', 'swg-toolkit' ),
			'desc' => __( 'Password field description', 'swg-toolkit' ),
		)
	);

	// Field: Textarea.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'   => 'textarea',
			'type' => 'textarea',
			'name' => __( 'Textarea Input', 'swg-toolkit' ),
			'desc' => __( 'Textarea description', 'swg-toolkit' ),
		)
	);

	// Field: Separator.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'   => 'separator',
			'type' => 'separator',
		)
	);

	// Field: Title.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'   => 'title',
			'type' => 'title',
			'name' => '<h1>Title</h1>',
		)
	);

	// Field: Checkbox.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'   => 'checkbox',
			'type' => 'checkbox',
			'name' => __( 'Checkbox', 'swg-toolkit' ),
			'desc' => __( 'Checkbox Label', 'swg-toolkit' ),
		)
	);

	// Field: Radio.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'      => 'radio',
			'type'    => 'radio',
			'name'    => __( 'Radio', 'swg-toolkit' ),
			'desc'    => __( 'Radio Button', 'swg-toolkit' ),
			'options' => array(
				'yes' => 'Yes',
				'no'  => 'No',
			),
		)
	);

	// Field: Multicheck.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'      => 'multicheck',
			'type'    => 'multicheck',
			'name'    => __( 'Multile checkbox', 'swg-toolkit' ),
			'desc'    => __( 'Multile checkbox description', 'swg-toolkit' ),
			'options' => array(
				'yes' => 'Yes',
				'no'  => 'No',
			),
		)
	);

	// Field: Select.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_basic',
		array(
			'id'      => 'select',
			'type'    => 'select',
			'name'    => __( 'A Dropdown', 'swg-toolkit' ),
			'desc'    => __( 'A Dropdown description', 'swg-toolkit' ),
			'options' => array(
				'yes' => 'Yes',
				'no'  => 'No',
			),
		)
	);

	// Field: Image.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_other',
		array(
			'id'      => 'image',
			'type'    => 'image',
			'name'    => __( 'Image', 'swg-toolkit' ),
			'desc'    => __( 'Image description', 'swg-toolkit' ),
			'options' => array(
				'button_label' => 'Choose Image',
			),
		)
	);

	// Field: File.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_other',
		array(
			'id'      => 'file',
			'type'    => 'file',
			'name'    => __( 'File', 'swg-toolkit' ),
			'desc'    => __( 'File description', 'swg-toolkit' ),
			'options' => array(
				'button_label' => 'Choose file',
			),
		)
	);

	// Field: Color.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_other',
		array(
			'id'          => 'color',
			'type'        => 'color',
			'name'        => __( 'Color', 'swg-toolkit' ),
			'desc'        => __( 'Color description', 'swg-toolkit' ),
			'placeholder' => __( '#5F4B8B', 'swg-toolkit' ),
		)
	);

	// Field: WYSIWYG.
	$swg_toolkit_obj->add_field(
		'swg_toolkit_other',
		array(
			'id'   => 'wysiwyg',
			'type' => 'wysiwyg',
			'name' => __( 'WP_Editor', 'swg-toolkit' ),
			'desc' => __( 'WP_Editor description', 'swg-toolkit' ),
		)
	);
}
