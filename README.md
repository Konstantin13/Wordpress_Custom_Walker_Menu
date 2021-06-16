# Wordpress_Custom_Walker_Menu
This class extends Walker_Nav_Menu (version 3.0.0).

This class overrides some of the Walker_Nav_Menu functions. And there is the possibility of using new features that allow you to:

- add your own classes for li, a, ul (sub menu)
- clear WordPress system classes

Usage Example:

1. Create your own Walker Menu (see <a href="https://github.com/Konstantin13/Wordpress_Custom_Walker_Menu/blob/main/ExampleWorkerMenu.php">ExampleWorkerMenu.php</a>)
2. Connect <a href="https://github.com/Konstantin13/Wordpress_Custom_Walker_Menu/blob/main/CustomWalkerMenu.php">CustomWalkerMenu.php</a> and your Walker Menu
3. Display your menu by specifying your walker (<a href="https://github.com/Konstantin13/Wordpress_Custom_Walker_Menu/blob/main/example.php">example.php</a>)
