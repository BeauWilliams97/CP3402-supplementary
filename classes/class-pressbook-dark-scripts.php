<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Scripts service.
 *
 * @package PressBook_Dark
 */

/**
 * Enqueue theme styles and scripts.
 */
class PressBook_Dark_Scripts extends PressBook\Scripts {
	/**
	 * Register service features.
	 */
	public function register() {
		parent::register();

		// Remove parent theme inline stlyes.
		add_action( 'wp_print_styles', array( $this, 'print_styles' ) );

		// Set inline style handle id to be used for the customize preview.
		add_filter( 'pressbook_inline_style_handle_id', array( $this, 'inline_style_handle_id' ) );
	}

	/**
	 * Enqueue styles and scripts.
	 */
	public function enqueue_scripts() {
		// Enqueue child theme fonts.
		wp_enqueue_style( 'pressbook-dark-fonts', static::fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion

		// Enqueue parent theme styles and scripts.
		parent::enqueue_scripts();

		// Dequeue parent theme fonts.
		wp_dequeue_style( 'pressbook-fonts' );

		// Enqueue child theme stylesheet.
		wp_enqueue_style( 'pressbook-dark-style', get_stylesheet_directory_uri() . '/style.min.css', array(), PRESSBOOK_DARK_VERSION );
		wp_style_add_data( 'pressbook-dark-style', 'rtl', 'replace' );

		// Add output of customizer settings as inline style.
		wp_add_inline_style( 'pressbook-dark-style', PressBook\CSSRules::output() );
	}

	/**
	 * Add preconnect for Google fonts.
	 *
	 * @param array  $urls           URLs to print for resource hints.
	 * @param string $relation_type  The relation type the URLs are printed.
	 * @return array $urls           URLs to print for resource hints.
	 */
	public function resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'pressbook-dark-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

	/**
	 * Get fonts URL.
	 */
	public static function fonts_url() {
		$fonts_url = '';

		$font_families = array();

		$query_params = array();

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		$open_sans = _x( 'on', 'Open Sans font: on or off', 'pressbook-dark' );
		if ( 'off' !== $open_sans ) {
			array_push( $font_families, 'Open+Sans:ital,wght@0,400;0,600;1,400;1,600' );
		}

		/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
		$playfair_display = _x( 'on', 'Playfair Display font: on or off', 'pressbook-dark' );
		if ( 'off' !== $playfair_display ) {
			array_push( $font_families, 'Playfair+Display:ital,wght@0,400;0,600;1,400;1,600' );
		}

		if ( count( $font_families ) > 0 ) {
			foreach ( $font_families as $font_family ) {
				array_push( $query_params, ( 'family=' . $font_family ) );
			}

			array_push( $query_params, 'display=swap' );

			$fonts_url = ( 'https://fonts.googleapis.com/css2?' . implode( '&#038;', $query_params ) );
		}

		$fonts_url = apply_filters( 'pressbook_dark_fonts_url', $fonts_url );

		return esc_url_raw( $fonts_url );
	}

	/**
	 * Remove parent theme inline style.
	 */
	public function print_styles() {
		if ( wp_style_is( 'pressbook-style', 'enqueued' ) ) {
			wp_style_add_data( 'pressbook-style', 'after', '' );
		}
	}

	/**
	 * Set inline style handle id.
	 *
	 * @param  string $handle_id Handle ID.
	 * @return string
	 */
	public function inline_style_handle_id( $handle_id ) {
		return 'pressbook-dark-style-inline-css';
	}
}
