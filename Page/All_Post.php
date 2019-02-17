<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2019/2/5
 * Time: 下午 11:22
 */
/*
	Template Name:All Post
 */
get_header( ) ?>
<div class="container">
    <div class="row">

	    <?php
	    // set the "paged" parameter (use 'page' if the query is on a static front page)
	    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	    $args = array(
		    'type' => 'post',
		    //'posts_per_page' => -1,//要輸出幾個 -1為無限
	    );
	    $lastBlog = new WP_Query( 'paged=' . $paged );
	    ?>

        <div class="col-xs-12 col-sm-8">
			<?php if($lastBlog->have_posts()):?>
				<?php while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
					<?php get_template_part( 'formats/content','search'); ?>
				<?php endwhile; ?>

        </div>

        <div class="col-xs-12 col-sm-4">
			<?php get_sidebar( ); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?php next_posts_link('<< Older Posts',$lastBlog->max_num_pages); ?>
        </div>
        <div class="col-6">
            <?php previous_posts_link('Newer Posts >>'); ?>
        </div>
    </div>
    <?php wp_reset_postdata();?>
    <?php endif; ?>
</div>


<?php get_footer( ) ?>
