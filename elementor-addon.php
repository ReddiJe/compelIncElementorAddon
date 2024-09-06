<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 */

function register_hello_world_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/switchSideImage.php' );
	require_once( __DIR__ . '/widgets/productSlider.php' );
	require_once( __DIR__ . '/widgets/nonStandartImages.php' );
	require_once( __DIR__ . '/widgets/ourBenefits.php' );
	require_once( __DIR__ . '/widgets/review.php' );
	require_once( __DIR__ . '/widgets/richText.php' );
	require_once( __DIR__ . '/widgets/imageMainPage.php' );
	require_once( __DIR__ . '/widgets/brandsCollection.php' );
	require_once( __DIR__ . '/widgets/bannerImg.php' );
	require_once( __DIR__ . '/widgets/productBlocks.php' );
	require_once( __DIR__ . '/widgets/blocksWithIcons.php' );
	require_once( __DIR__ . '/widgets/textTemplate.php' );
	require_once( __DIR__ . '/widgets/image.php' );
	require_once( __DIR__ . '/widgets/projects.php' );
	require_once( __DIR__ . '/widgets/animation.php' );
	


	$widgets_manager->register( new \Elementor_switchSideImage() );
	$widgets_manager->register( new \Elementor_productSlider() );
	$widgets_manager->register( new \Elementor_nonStandartImages() );
	$widgets_manager->register( new \Elementor_ourBenefits() );
	$widgets_manager->register( new \Elementor_review() );
	$widgets_manager->register( new \Elementor_richText() );
	$widgets_manager->register( new \Elementor_imageMainPage() );
	$widgets_manager->register( new \Elementor_brandsCollection() );
	$widgets_manager->register( new \Elementor_bannerImg() );
	$widgets_manager->register( new \Elementor_productBlocks() );
	$widgets_manager->register( new \Elementor_blocksWithIcons() );
	$widgets_manager->register( new \Elementor_textTemplate() );
	$widgets_manager->register( new \Elementor_image() );
	$widgets_manager->register( new \Elementor_projects() );
	$widgets_manager->register( new \Elementor_animation() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );