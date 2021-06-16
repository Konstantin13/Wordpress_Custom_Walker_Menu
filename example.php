<?php

include "CustomWalkerMenu.php";
include "ExampleWalkerMenu.php";

//display the menu with the necessary classes

wp_nav_menu([
	"theme_location" => "example-menu",
	"container" => "",
  "menu_class" => "menu example-menu",
	"walker" => new ExampleWalkerMenu, //just use the new walker
]);

?>

<!-- Sample output: -->

<ul id="example-menu" class="menu example-menu">
  <li id="menu-item-1" class="home-link">
    <a href="http://example.loc/" aria-current="page" class="menu__link">Главная</a>
  </li>
  <li id="menu-item-2">
    <a href="http://example.loc/about-company/" class="menu__link">About company</a>
    <ul class="menu__sub-list">
      <li id="menu-item-3"><a href="http://example.loc/information/" class="menu__sub-link">Information</a></li>
      <li id="menu-item-4"><a href="http://example.loc/infrastructure/" class="menu__sub-link">Infrastructure</a></li>
    </ul>
  </li>
  <li id="menu-item-5">
    <a href="http://example.loc/services/" class="menu__link">Services</a>
  </li>
  <li id="menu-item-6">
    <a href="http://example.loc/contacts/" class="menu__link">Контакты</a>
  </li>
</ul>           
