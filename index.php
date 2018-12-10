<?php
require_once 'function.php';
require_once 'arrays.php';
require_once 'timer_function.php';
require_once 'constants.php';
$is_auth = rand(0, 1);
$user_avatar = 'img/user.jpg';
$offer_end = time_to_off("tomorrow midnight");

$page_content = include_template( 'index.php', ['categories' => $categories, 'items' => $items , 'offer_end' => $offer_end] );

$page_content = include_template('index.php', 
	[
	 'categories' => $categories,
	 'items' => $items
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