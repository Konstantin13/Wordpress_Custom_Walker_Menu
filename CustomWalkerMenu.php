<?php

class CustomWalkerMenu extends Walker_Nav_Menu {
		
		/*
			New attribute ($args) - clean_classes => ["ul","li","a"] || true (only for overridden functions in this class)
		*/
		
    /*
      You can set the default values (only for overridden functions in this class)
    */
		function get_default_args_for_walker(){
				return [];
		}
		
    /*
      
    */
		function add_ul_classes($depth, $args){
				return [];
		}
		
		function add_li_classes($item, $depth, $args, $system_li_classes){
				return [];
		}
		
		function add_a_classes($item, $depth, $args, $system_li_classes){
				return [];
		}
		
		function add_a_before($item, $depth, $args, $system_li_classes){
				return '';
		}
		
		function add_a_after($item, $depth, $args, $system_li_classes){
				return '';
		}
		
		/*
      Helper function for defining default values
    */
		function set_new_args($args){
				
				if(!is_null($args)){
						
						foreach($this->get_default_args_for_walker() as $name=>$val){
							if(!property_exists($args,$name)){
								$args->$name = $val;
							}
						}
						
				}else{
					$args = (object) $this->get_default_args_for_walker();
				}
				
				return $args;
				
		}
		
		// add classes to ul sub-menus
		public function start_lvl( &$output, $depth = 0, $args = null ) {
				
				$args = $this->set_new_args($args);
				
				if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
					$t = '';$n = '';
				} else {
					$t = "\t";$n = "\n";
				}
				$indent = str_repeat( $t, $depth );

				// Default class.
				$classes = array( 'sub-menu' );
				
				//custom classess
				if(isset($args->clean_classes) and ($args->clean_classes==true or in_array("ul",$args->clean_classes))){
					$classes = $this->add_ul_classes($depth, $args);
				}else{
					$classes = array_merge($classes,$this->add_ul_classes($depth, $args));
				}
				
				$class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

				$output .= "{$n}{$indent}<ul$class_names>{$n}";
		}
		
		// add main/sub classes to li's and links
	 public function start_el( &$output, $item, $depth, $args ) {
		 
			$args = $this->set_new_args($args);
		  			
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';$n = '';
			} else {
				$t = "\t";$n = "\n";
			}
			$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

			$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$system_li_classes = $classes;

			$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
			
			
			//custom classess
			if(isset($args->clean_classes) and ($args->clean_classes==true or in_array("li",$args->clean_classes))){
				$classes = $this->add_li_classes($item, $depth, $args, $system_li_classes);
			}else{
				$classes = array_merge($classes,$this->add_li_classes($item, $depth, $args, $system_li_classes));
			}
			
			$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			
			//Output <li>
			$output .= $indent . '<li' . $id . $class_names . '>';

			$atts           = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';
			if ( '_blank' === $item->target && empty( $item->xfn ) ) {
				$atts['rel'] = 'noopener';
			} else {
				$atts['rel'] = $item->xfn;
			}
			$atts['href']         = ! empty( $item->url ) ? $item->url : '';
			$atts['aria-current'] = $item->current ? 'page' : '';

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
			
									
			//custom classess
			if(isset($args->clean_classes) and ($args->clean_classes==true or in_array("a",$args->clean_classes))){
				$atts["class"] = implode(" ",$this->add_a_classes($item, $depth, $args, $system_li_classes));
			}else{
				$atts["class"] .= " " . implode(" ",$this->add_a_classes($item, $depth, $args, $system_li_classes));
			}
			
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
			
			//OutPut <a>
			$item_output  = $args->before . $this->add_a_before($item, $depth, $args, $system_li_classes);
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after . $this->add_a_after($item, $depth, $args, $system_li_classes);

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				
	}
	
		
}

?>
