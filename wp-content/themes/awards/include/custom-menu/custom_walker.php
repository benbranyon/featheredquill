<?php

/* Custom Walker */

class awards_scm_walker extends Walker_Nav_Menu  {

	private $awardsCurItem;	

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$megamenu_styles = "";

		if($depth == 0 && in_array( "menu-item-has-children", $this->awardsCurItem->classes )) {

			if( $this->awardsCurItem->submenu_type == "megamenu" ) {

				if($this->awardsCurItem->style != "") {

					$megamenu_styles = 'style="' . $this->awardsCurItem->style . '"';

				}

			}

		}

        $output .= '<ul class="dropdown-menu" ' . $megamenu_styles . '>';

    }
	

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$this->awardsCurItem = $item;

		//extract($args);

		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';		

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;		

		$megamenu_styles = "";

		if($depth == 0 && in_array( "menu-item-has-children", $item->classes )) {

			if( $item->submenu_type == "megamenu" ) {

				switch($item->columns) {

					case "2": array_push($classes, "dropdown", "mega-menu-item", "yamm-fw", "column-2"); break;

					case "3": array_push($classes, "dropdown", "mega-menu-item", "yamm-fw", "column-3"); break;

					case "4": array_push($classes, "dropdown", "mega-menu-item", "yamm-fw", "column-4"); break;
					
					case "5": array_push($classes, "dropdown", "mega-menu-item", "yamm-fw", "column-5"); break;

					default: array_push($classes, "dropdown", "mega-menu-item", "yamm-fw");

				}				

				if($item->style != "") {

					$megamenu_styles = 'style="' . $item->style . '"';

				}

			} else {

				array_push($classes, "dropdown normal-menu has-submenu");

			}

		}
	

		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

		$class_names = ' class="' . esc_attr( $class_names ) . '"';		

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';

		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';		

		$item_output = $args->before;

		$item_output .= '<a'. $attributes .'>';

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		
		if($depth == 0 && in_array( "menu-item-has-children", $item->classes )) {
			$item_output .= ' <b class="fa fa-angle-down"></b>';
		}
		
		if($depth >= 1 && in_array( "menu-item-has-children", $item->classes )) {		
			$item_output .= ' <b class="fa fa-angle-right"></b>';
		}

		$item_output .= '</a>';		

		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

}