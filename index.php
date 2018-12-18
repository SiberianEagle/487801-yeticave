<?php

error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require_once 'function.php';
require_once 'queries.php';
require_once 'constants.php';

$is_auth = rand(0, 1);
$user_avatar = 'img/user.jpg';
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
	'title' => 'Главная страница',
	'is_auth' => $is_auth
]);

print($layout_content);

?>