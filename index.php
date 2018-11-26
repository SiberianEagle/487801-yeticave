<?php
require_once 'function.php';
require_once 'price_function.php';
require_once 'arrays.php';

$is_auth = rand(0, 1);
$user_name = 'Сергей Орлов';
$user_avatar = 'img/user.jpg';

$page_content = include_template('index.php', ['categories' => $categories, 'items' => $items]);

$layout_content = include_template('layout.php', ['content' => $page_content, 'categories' => $categories, 'title' => 'Главная страница', 'is_auth' => $is_auth]);

print($layout_content);

?>