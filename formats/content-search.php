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
	<small><?php the_category(" "); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>
	<?php the_excerpt(); ?>
	<hr>
</article>
