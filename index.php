<?php
require_once 'bootLoader.php';


$offer_end = time_to_off("tomorrow midnight");
$categories = getCategories();
$items = getItems();


$page_content = include_template( 'index.php',
   ['categories' => $categories,
    'items' => $items,
    'offer_end' => $offer_end
   ]);

$layout_content = include_template('layout.php', 
	[
	'content' => $page_content,
	'categories' => $categories,
	'title' => 'Главная страница'
  ]);

print($layout_content);

?>