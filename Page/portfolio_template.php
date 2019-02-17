<?php 
/*
	Template Name:portfolio template
 */
get_header( ) ?>
<?php
    $args = array(
        'post_type' => 'portfolio',
        'post_per_pages' => 3,
    );
    $loop = new WP_Query($args);
?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
				<?php if($loop->have_posts()):?>
					<?php the_archive_title('<h1>','</h1>'); ?>
					<?php the_archive_description(); ?>
					<?php while( $loop->have_posts() ): $loop->the_post();?>
						<?php get_template_part( 'formats/portfolio/content','search'); ?>
					<?php endwhile; ?>
                    <div class="col-xs-12 text-center">
						<?php the_posts_navigation(); ?>
                    </div>
				<?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-4">
				<?php get_sidebar( ); ?>
				<?php
				$lastPost = new WP_Query();
				?>
            </div>
        </div>
    </div>

<?php get_footer( ) ?>