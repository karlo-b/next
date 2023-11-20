<?php

/**
 * Load Blocks
 */
function load_blocks() {
	$theme  = wp_get_theme();
	$blocks = get_blocks();
	foreach( $blocks as $block ) {
		if ( file_exists( get_template_directory() . '/blocks/' . $block . '/block.json' ) ) {
			register_block_type( get_template_directory() . '/blocks/' . $block . '/block.json' );
			
			wp_register_style( 'block-' . $block, get_template_directory_uri() . '/blocks/' . $block . '/style.css', null, $theme->get( 'Version' ) );

			if ( file_exists( get_template_directory() . '/blocks/' . $block . '/init.php' ) ) {
				include_once get_template_directory() . '/blocks/' . $block . '/init.php';
			}
		}
	}
}
add_action( 'init', 'load_blocks', 5 );

/**
 * Load ACF field groups for blocks
 */
function load_acf_field_group( $paths ) {
	$blocks = get_blocks();
	foreach( $blocks as $block ) {
		$paths[] = get_template_directory() . '/blocks/' . $block;
	}
	return $paths;
}
add_filter( 'acf/settings/load_json', 'load_acf_field_group' );

/**
 * Get Blocks
 */
function get_blocks() {
	$theme   = wp_get_theme();
	$blocks  = get_option( 'gavdi_next_blocks' );
	$version = get_option( 'gavdi_next_blocks_version' );
	if ( empty( $blocks ) || version_compare( $theme->get( 'Version' ), $version ) || ( function_exists( 'wp_get_environment_type' ) && 'production' !== wp_get_environment_type() ) ) {
		$blocks = scandir( get_template_directory() . '/blocks/' );
		$blocks = array_values( array_diff( $blocks, array( '..', '.', '.DS_Store', '_base-block' ) ) );

		update_option( 'gavdi_next_blocks', $blocks );
		update_option( 'gavdi_next_blocks_version', $theme->get( 'Version' ) );
	}
	return $blocks;
}

/**
 * Block categories
 *
 * @since 1.0.0
 */
function block_categories( $categories ) {

	// Check to see if we already have a gavdi-next category
	$include = true;
	foreach( $categories as $category ) {
		if( 'gavdi-next' === $category['slug'] ) {
			$include = false;
		}
	}

	if( $include ) {
		$categories = array_merge(
			$categories,
			[
				[
					'slug'  => 'gavdi-next',
					'title' => __( 'gavdi-next', 'gavdi-next_textdomain' ),
				]
			]
		);
	}

	return $categories;
}
add_filter( 'block_categories_all', 'block_categories' );


/**
 * Register block script
 */
function gavdi_next_register_block_script() {
	wp_register_script( 'sliding-cards-script', get_template_directory_uri() . '/blocks/sliding-cards/script.js', [ 'slick-slider', 'acf' ] );
	wp_register_script( 'slider-gallery-script', get_template_directory_uri() . '/blocks/slider-gallery/script.js', [ 'slick-slider', 'acf' ] );
}
add_action( 'init', 'gavdi_next_register_block_script' );

