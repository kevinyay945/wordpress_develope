
<?php
/*Collection of walker classes */
/*
	wp_nav_menu()
	<div class="menu-container">
		<ul> //start_lvl
			<li><a href=""><span> //start_el
				<ul>
					<li>
					</li>
				</ul>
			</span></a></li> //end_el
			<li>
				<a href=""></a>
			</li>
			<li>
				<a href=""></a>
			</li>
		</ul> // end_lvl
	</div>

			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  	Dropdown
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  		<a class="dropdown-item" href="#">Action</a>
			  		<a class="dropdown-item" href="#">Another action</a>
			  		<div class="dropdown-divider"></div>
			  		<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			</li>

 */
class Walker_Nav_Primary extends Walker_Nav_Menu{
	function start_lvl( &$output, $depth = 0, $args = array() ){
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth > 0) ?'sub-menu' : '';
		$output .= "\n$indent <ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id=0 ){
		$indent = ($depth) ? str_repeat("\t", $depth): '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty($item->classes) ? array() : (array)$item->classes;

		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current ||$item->current_anchestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if( $depth && $args->walker->has_children ){
			$classes[] = 'dropdown-submenu';
		}

		$class_names = join( ' ' , apply_filters( 'nav_menu_css_class', array_filter($classes),$item, $args ));
		$class_names = 'class = "'. esc_attr( $class_names ) .'"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id = "'. esc_attr( $id ) .'"' : '';

		$output .= $indent.'<li'. $id . $value . $class_names . $li_attributes .'>';

		$attributes = !empty( $item->attr_title) ? ' title="'. esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= !empty( $item->target) ? ' target="'. esc_attr( $item->target ) .'"' : '';
		$attributes .= !empty( $item->xfn) ? ' rel="'. esc_attr( $item->xfn ) .'"' : '';
		$attributes .= !empty( $item->url) ? ' href="'. esc_attr( $item->url ) .'"' : '';

		$attributes .= ($args->walker->has_children) ? 'class="dropdown-toggle" data-toggle="dropdown"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($depth == 0 && $args->walker->has_children) ? '<b class="caret"></b></a>' : '</a>';
		$item_output .= $args->link_after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item,$depth,$args );


	}


/*	function end_el(){

	}

	function end_lvl(){

	}
*/
}