# Wordpress_Custom_Walker_Menu
This class extends Walker_Nav_Menu (version 3.0.0).

This class overrides some of the Walker_Nav_Menu functions. And there is the possibility of using new features that allow you to:

- add your own classes for li, a, ul (sub menu)
- clear WordPress system classes

Usage Example:

1. Create your own Walker Menu (see ExampleWorkerMenu.php)
2. Connect CustomWalkerMenu.php and your Walker Menu
3. Display your menu by specifying your walker

wp_nav_menu([
	"theme_location" => "example-menu",
	"container" => "",
  "menu_class" => "menu example-menu",
	"walker" => new ExampleWalkerMenu, //just use the new walker
]);
