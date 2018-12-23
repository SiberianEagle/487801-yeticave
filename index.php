<?php

error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require_once 'function.php';
require_once 'queries.php';

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