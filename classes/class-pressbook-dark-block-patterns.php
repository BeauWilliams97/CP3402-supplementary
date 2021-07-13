<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Block patterns service.
 *
 * @package PressBook_Dark
 */

/**
 * Register block patterns.
 */
class PressBook_Dark_Block_Patterns implements PressBook\Serviceable {
	/**
	 * Register service features.
	 */
	public function register() {
		/**
		 * Register block pattern category.
		 */
		if ( function_exists( 'register_block_pattern_category' ) ) {
			register_block_pattern_category(
				'pressbook-dark',
				array( 'label' => esc_html__( 'PressBook Dark', 'pressbook-dark' ) )
			);
		}

		/**
		 * Register block patterns.
		 */
		if ( function_exists( 'register_block_pattern' ) ) {
			$this->block_pattern_hero_bg_image_center();
			$this->block_pattern_three_column_content_buttons();
			$this->block_pattern_two_column_media_text_button_bg_dark();
			$this->block_pattern_two_column_media_text_button_center();
		}
	}

	/**
	 * Block pattern: Hero Section (Background Image) - Center.
	 */
	public function block_pattern_hero_bg_image_center() {
		register_block_pattern(
			'pressbook/hero-bg-image-center',
			array(
				'title'         => esc_html__( 'Hero Section (Background Image) - Center', 'pressbook-dark' ),
				'categories'    => array( 'pressbook-dark' ),
				'viewportWidth' => 1440,
				'content'       => ( '<!-- wp:cover {"url":"' . esc_url( get_stylesheet_directory_uri() ) . '/inc/images/mountain-sky.jpg","hasParallax":true,"dimRatio":60,"overlayColor":"black","minHeight":400,"contentPosition":"center center","align":"full","className":"pressbook-hero-section pressbook-hero-bg-image"} --><div class="wp-block-cover alignfull has-background-dim-60 has-black-background-color has-background-dim has-parallax pressbook-hero-section pressbook-hero-bg-image" style="background-image:url(' . esc_url( get_stylesheet_directory_uri() ) . '/inc/images/mountain-sky.jpg);min-height:400px"><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"u-wrapper"} --><div class="wp-block-group u-wrapper"><div class="wp-block-group__inner-container"><!-- wp:heading {"textAlign":"center","textColor":"white","className":"pressbook-hero-section__title"} --><h2 class="has-text-align-center pressbook-hero-section__title has-white-color has-text-color">' . esc_html__( 'Unlock Your Creativity', 'pressbook-dark' ) . '</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center","className":"pressbook-hero-section__desc"} --><p class="has-text-align-center pressbook-hero-section__desc">' . esc_html__( 'Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.', 'pressbook-dark' ) . '</p><!-- /wp:paragraph --><!-- wp:buttons {"align":"center"} --><div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":50,"backgroundColor":"vivid-red","textColor":"white","className":"pressbook-hero-section__button is-style-fill"} --><div class="wp-block-button pressbook-hero-section__button is-style-fill"><a class="wp-block-button__link has-white-color has-vivid-red-background-color has-text-color has-background" href="#" style="border-radius:50px">' . esc_html__( 'Read More', 'pressbook-dark' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div></div><!-- /wp:group --></div></div><!-- /wp:cover -->' ),
			)
		);
	}

	/**
	 * Block pattern: 3-Column Content with Buttons.
	 */
	public function block_pattern_three_column_content_buttons() {
		register_block_pattern(
			'pressbook/three-column-content-buttons',
			array(
				'title'         => esc_html__( '3-Column Content with Buttons', 'pressbook-dark' ),
				'categories'    => array( 'pressbook-dark' ),
				'viewportWidth' => 1440,
				'content'       => '<!-- wp:cover {"url":"' . esc_url( get_stylesheet_directory_uri() ) . '/inc/images/mountain-sky.jpg","hasParallax":true,"dimRatio":80,"overlayColor":"black","align":"full","className":"pressbook-column-content"} --> <div class="wp-block-cover alignfull has-background-dim-80 has-black-background-color has-background-dim has-parallax pressbook-column-content" style="background-image:url(' . esc_url( get_stylesheet_directory_uri() ) . '/inc/images/mountain-sky.jpg)"><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"u-wrapper"} --> <div class="wp-block-group u-wrapper"><div class="wp-block-group__inner-container"><!-- wp:columns --> <div class="wp-block-columns"><!-- wp:column --> <div class="wp-block-column"><!-- wp:heading {"level":3,"textColor":"white"} --> <h3 class="has-white-color has-text-color">' . esc_html__( 'Lorem Ipsum', 'pressbook-dark' ) . '</h3> <!-- /wp:heading --> <!-- wp:paragraph --> <p>' . esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.', 'pressbook-dark' ) . '</p> <!-- /wp:paragraph --><!-- wp:buttons --> <div class="wp-block-buttons"><!-- wp:button {"borderRadius":0,"backgroundColor":"vivid-red","textColor":"white","className":"pressbook-column-content-button is-style-fill"} --> <div class="wp-block-button pressbook-column-content-button is-style-fill"><a class="wp-block-button__link has-white-color has-vivid-red-background-color has-text-color has-background no-border-radius" href="#">' . esc_html__( 'Read More', 'pressbook-dark' ) . '</a></div> <!-- /wp:button --></div> <!-- /wp:buttons --></div> <!-- /wp:column --> <!-- wp:column --> <div class="wp-block-column"><!-- wp:heading {"level":3,"textColor":"white"} --> <h3 class="has-white-color has-text-color">' . esc_html__( 'Vestibulum auctor', 'pressbook-dark' ) . '</h3> <!-- /wp:heading --> <!-- wp:paragraph --> <p>' . esc_html__( 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'pressbook-dark' ) . '</p> <!-- /wp:paragraph --><!-- wp:buttons --> <div class="wp-block-buttons"><!-- wp:button {"borderRadius":0,"backgroundColor":"vivid-red","textColor":"white","className":"pressbook-column-content-button is-style-fill"} --> <div class="wp-block-button pressbook-column-content-button is-style-fill"><a class="wp-block-button__link has-white-color has-vivid-red-background-color has-text-color has-background no-border-radius" href="#">' . esc_html__( 'Read More', 'pressbook-dark' ) . '</a></div> <!-- /wp:button --></div> <!-- /wp:buttons --></div> <!-- /wp:column --> <!-- wp:column --> <div class="wp-block-column"><!-- wp:heading {"level":3,"textColor":"white"} --> <h3 class="has-white-color has-text-color">' . esc_html__( 'Aliquam tincidunt', 'pressbook-dark' ) . '</h3> <!-- /wp:heading --> <!-- wp:paragraph --> <p>' . esc_html__( 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 'pressbook-dark' ) . '</p> <!-- /wp:paragraph --><!-- wp:buttons --> <div class="wp-block-buttons"><!-- wp:button {"borderRadius":0,"backgroundColor":"vivid-red","textColor":"white","className":"pressbook-column-content-button is-style-fill"} --> <div class="wp-block-button pressbook-column-content-button is-style-fill"><a class="wp-block-button__link has-white-color has-vivid-red-background-color has-text-color has-background no-border-radius" href="#">' . esc_html__( 'Read More', 'pressbook-dark' ) . '</a></div> <!-- /wp:button --></div> <!-- /wp:buttons --></div> <!-- /wp:column --></div> <!-- /wp:columns --></div></div> <!-- /wp:group --></div></div> <!-- /wp:cover -->',
			)
		);
	}

	/**
	 * Block pattern: 2-Column Media with Text and Button (Black).
	 */
	public function block_pattern_two_column_media_text_button_bg_dark() {
		register_block_pattern(
			'pressbook/two-column-media-text-button-bg-dark',
			array(
				'title'         => esc_html__( '2-Column Media with Text and Button (Black)', 'pressbook-dark' ),
				'categories'    => array( 'pressbook-dark' ),
				'viewportWidth' => 1440,
				'content'       => '<!-- wp:cover {"overlayColor":"black","minHeight":450,"minHeightUnit":"px","align":"wide","className":"pressbook-media-text-button pressbook-column-content"} --> <div class="wp-block-cover alignwide has-black-background-color has-background-dim pressbook-media-text-button pressbook-column-content" style="min-height:450px"><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":null} --> <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"40%"} --> <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} --> <figure class="wp-block-image size-large is-style-rounded"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/inc/images/office-desk.jpg" alt="' . esc_attr__( 'Office Desk', 'pressbook-dark' ) . '"/><figcaption><span style="color:#979797" class="has-inline-color">' . esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'pressbook-dark' ) . '</span></figcaption></figure> <!-- /wp:image --></div> <!-- /wp:column --> <!-- wp:column {"width":"60%"} --> <div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":3,"textColor":"white"} --> <h3 class="has-white-color has-text-color">' . esc_html__( 'Lorem ipsum dolor sit amet', 'pressbook-dark' ) . '</h3> <!-- /wp:heading --> <!-- wp:paragraph {"textColor":"white"} --> <p class="has-white-color has-text-color">' . esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'pressbook-dark' ) . '</p> <!-- /wp:paragraph --> <!-- wp:buttons --> <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"vivid-red","textColor":"white","className":"pressbook-column-content-button is-style-fill"} --> <div class="wp-block-button pressbook-column-content-button is-style-fill"><a class="wp-block-button__link has-white-color has-vivid-red-background-color has-text-color has-background" href="#">' . esc_html__( 'Read More', 'pressbook-dark' ) . '</a></div> <!-- /wp:button --></div> <!-- /wp:buttons --></div> <!-- /wp:column --></div> <!-- /wp:columns --></div></div> <!-- /wp:cover -->',
			)
		);
	}

	/**
	 * Block pattern: 2-Column Media with Text and Button (Center).
	 */
	public function block_pattern_two_column_media_text_button_center() {
		register_block_pattern(
			'pressbook/two-column-media-text-button-center',
			array(
				'title'         => esc_html__( '2-Column Media with Text and Button (Center)', 'pressbook-dark' ),
				'categories'    => array( 'pressbook-dark' ),
				'viewportWidth' => 1440,
				'content'       => '<!-- wp:cover {"url":"' . esc_url( get_stylesheet_directory_uri() ) . '/inc/images/mountain-sky.jpg","hasParallax":true,"dimRatio":80,"overlayColor":"black","contentPosition":"center center","align":"full","className":"pressbook-column-content"} --> <div class="wp-block-cover alignfull has-background-dim-80 has-black-background-color has-background-dim has-parallax pressbook-column-content" style="background-image:url(' . esc_url( get_stylesheet_directory_uri() ) . '/inc/images/mountain-sky.jpg)"><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"u-wrapper"} --> <div class="wp-block-group u-wrapper"><div class="wp-block-group__inner-container"><!-- wp:columns --> <div class="wp-block-columns"><!-- wp:column --> <div class="wp-block-column"><!-- wp:image {"align":"center","sizeSlug":"full","linkDestination":"none"} --> <div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/inc/images/office-desk.jpg" alt="' . esc_attr__( 'Office Desk', 'pressbook-dark' ) . '"/></figure></div> <!-- /wp:image --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">' . esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi.', 'pressbook-dark' ) . '</p> <!-- /wp:paragraph --> <!-- wp:buttons {"align":"center"} --> <div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":0,"backgroundColor":"vivid-red","textColor":"white","className":"pressbook-column-content-button is-style-fill"} --> <div class="wp-block-button pressbook-column-content-button is-style-fill"><a class="wp-block-button__link has-white-color has-vivid-red-background-color has-text-color has-background no-border-radius" href="#">' . esc_html__( 'Read More', 'pressbook-dark' ) . '</a></div> <!-- /wp:button --></div> <!-- /wp:buttons --></div> <!-- /wp:column --> <!-- wp:column --> <div class="wp-block-column"><!-- wp:image {"align":"center","sizeSlug":"full","linkDestination":"none"} --> <div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/inc/images/office-desk.jpg" alt="' . esc_attr__( 'Office Desk', 'pressbook-dark' ) . '"/></figure></div> <!-- /wp:image --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">' . esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi.', 'pressbook-dark' ) . '</p> <!-- /wp:paragraph --> <!-- wp:buttons {"align":"center"} --> <div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":0,"backgroundColor":"vivid-red","textColor":"white","className":"pressbook-column-content-button is-style-fill"} --> <div class="wp-block-button pressbook-column-content-button is-style-fill"><a class="wp-block-button__link has-white-color has-vivid-red-background-color has-text-color has-background no-border-radius" href="#">' . esc_html__( 'Read More', 'pressbook-dark' ) . '</a></div> <!-- /wp:button --></div> <!-- /wp:buttons --></div> <!-- /wp:column --></div> <!-- /wp:columns --></div></div> <!-- /wp:group --></div></div> <!-- /wp:cover -->',
			)
		);
	}
}
