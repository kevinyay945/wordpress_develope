<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2019/2/3
 * Time: 上午 01:04
 */?>
<?php get_header( ) ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<?php if(have_posts()):?>
				<?php while( have_posts() ): the_post();?>
					<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
						<?php the_title('<h1 class="entry-title">','</h1>');?>
						<?php if(has_post_thumbnail()): ?>
							<div class="pull-right"><?php the_post_thumbnail('thumbnail'); ?></div>
						<?php endif; ?>
						<small><?php the_category(" "); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>
						<?php the_content(); ?>
						<hr>
						<?php if( comments_open() ): ?>
						<?php comment_form(); ?>
						<?php endif;?>
					</article>
				<?php endwhile; ?>
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


<?php get_footer( ); ?>
