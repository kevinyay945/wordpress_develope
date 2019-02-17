<?php 
/*
	Template Name:first Template
 */
get_header( ) ?>

<?php if(have_posts()):?>
	<?php while( have_posts() ): the_post(); ?>
		
		<small>Post on : <?php the_time('F j, Y');; ?></small>
		<p><?php the_content( ); ?></p>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer( ) ?>