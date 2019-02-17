<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2019/2/5
 * Time: 上午 12:35
 */?>

<?php get_header( ) ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<?php if(have_posts()):?>
				<?php while( have_posts() ): the_post();?>
					<?php get_template_part( 'formats/content','search'); ?>
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
