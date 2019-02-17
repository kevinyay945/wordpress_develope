<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<title><?php bloginfo('name'); ?><?php wp_title(' '); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
	<?php wp_head(); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet"></head>
<?php 
	if(is_front_page()):
		$myBodyClass = array('inFront_page');
	else:
		$myBodyClass = array('notInFront_page');
	endif;
?>
<body <?php body_class( $myBodyClass ); ?> >



<div class="menu_nav">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri('/') ); ?>/asset/img/logo.png" alt="kevin Bootstrap Template"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<?php wp_nav_menu( array(
				'theme_location'  => 'header',
				'menu'            => '',
				'container'       => false,
				'container_class' => 'menu-{menu-slug}-container',
				'container_id'    => '',
				'menu_class'      => 'menu navbar-nav mr-auto',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => new Walker_Nav_Primary(),
			) ); ?>
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/wp-admin' ) ); ?>" target="_blank">o</a>

        </div>
    </nav>
    <div class="search-form">
		<?php get_search_form(); ?>
    </div>
</div>




	
<div class="container-fuild smart-slide-scoll">
	<?php
	if(is_front_page()||is_home()){
		echo do_shortcode('[smartslider3 slider=1]');
	}else{
		// do nothing
	}

	?>
</div>

	
