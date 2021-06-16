<?php

class ExampleWalkerMenu extends CustomWalkerMenu{
		
		//system classes will be hidden in the menu by default
		function get_default_args_for_walker(){ 
				return [
					"clean_classes" => true,
				];
		}
  
		//each nested ul will have a "menu__sub-list" class
		function add_ul_classes($depth, $args){ 
				$classes = ['menu__sub-list'];				
				return $classes;
		}
		
    //each nested ul will have a "menu__sub-list" class
		function add_li_classes($item, $depth, $args, $system_li_classes){
				
				$classes = [];
				
				if(in_array("menu-item-home",$system_li_classes))
					$classes[] = 'home-link';
				
				return $classes;
				
		}
		
    //the li element of the home page will be with the "home-link" class
		function add_a_classes($item, $depth, $args, $system_li_classes){
				$classes = [];
				
				if($depth == 0)
					$classes[] = 'menu__link';
				else
					$classes[] = 'menu__sub-link';
				
				
				return $classes;
				
		}
		
		function add_a_before($item, $depth, $args, $system_li_classes){
				
				return '';
				
		}
		
    //after the a tag, if the li element has child elements, an svg icon will be inserted
		function add_a_after($item, $depth, $args, $system_li_classes){
				
				if(in_array("menu-item-has-children",$system_li_classes))
					return '
						<span class="menu__arrow">
						<svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.0607 13.0607C13.6464 12.4749 13.6464 11.5251 13.0607 10.9393L3.51472 1.3934C2.92893 0.807612 1.97918 0.807612 1.3934 1.3934C0.807611 1.97919 0.807611 2.92893 1.3934 3.51472L9.87868 12L1.3934 20.4853C0.807612 21.0711 0.807612 22.0208 1.3934 22.6066C1.97919 23.1924 2.92893 23.1924 3.51472 22.6066L13.0607 13.0607ZM11 13.5L12 13.5L12 10.5L11 10.5L11 13.5Z" fill="#03919B" fill-opacity="0.3"/>
							</svg>
					</span>
					';
				
				
				return '';
				
		}
		
}

?>
