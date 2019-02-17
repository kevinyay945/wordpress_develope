<?php
	function themename_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() . 'asset/img/default-image.jpg',
        'default-text-color' => '000',
        'width'              => 1920,
        'height'             => 480,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );


add_theme_support( 'post-thumbnails');

add_theme_support( 'post-formats' , array('aside','gallery','link' ,'image','video','quote','status','audio','chat' ));