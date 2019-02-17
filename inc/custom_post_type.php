<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2019/2/11
 * Time: 下午 10:21
 */
function first_custome_post_type(){
	$labels = array(
		'name' => 'Portfolio_label_name',
		'singular_name' => 'Portfolio_singular_name',
		'add_new' => 'Add Item_add_new',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item_add_new_item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		//'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('portfolio',$args);
}
add_action('init','first_custome_post_type');

function first_custom_taxonomies(){
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'name_Fields',
		'singular_name' => 'singular_name_Field',
		'search_items' => 'search_items_Search Fields',
		'all_items' => 'all_items_All Fields',
		'parent_item' => 'parent_item_Parent Field',
		'parent_item_colon' => 'parent_item_colon_Parent Field:',
		'edit_item' => 'edit_item_Edit Field',
		'update_item' => 'update_item_Update Field',
		'add_new_item' => 'add_new_item_Add New Work Field',
		'new_item_name' => 'new_item_name_New Field Name',
		'menu_name' => 'menu_name_Fields',
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'field' )
	);

	register_taxonomy('field', array('portfolio'), $args);
	//no hierarchical
	register_taxonomy('software',array('portfolio'),array(
		'label' => 'software',
		'hierarchical' => false,
		'rewrite' => array('slug'=>'software'),
		'show_admin_column' => true,
	));
}
add_action('init','first_custom_taxonomies');
/*
	==================================
	Include custom get term
	==================================
 */
function first_get_terms($postID,$term){
	$term_list = wp_get_post_terms($postID,$term);
	$i = 0;
	$output = "";
	foreach ( $term_list as $term){$i++;
		if($i>1){
			$output.= " ,";
		}
		$output.= '<a href="'.get_term_link($term).' "> '.$term->name.'</a>';
	}
	return $output;
}
