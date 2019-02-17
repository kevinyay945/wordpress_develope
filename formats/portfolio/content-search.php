<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2019/2/5
 * Time: 上午 12:42
 */?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row');?>>

	<?php if(has_post_thumbnail()): ?>
		<div class="pull-left"><?php the_post_thumbnail('thumbnail'); ?></div>
	<?php endif; ?>
	<h1><?php the_title(sprintf('<a href="%s"> ',esc_url( get_permalink() ) ),'</a>' ); ?></h1>
	<br>
	<small><?php echo first_get_terms($post->ID,'field');	?> || <?php  echo first_get_terms($post->ID,'software');?>  <?php if(current_user_can('manage_options')){echo '||';} edit_post_link(); ?></small>
	<?php the_excerpt(); ?>
	<hr>
</article>
