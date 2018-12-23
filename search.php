<?php

error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require_once 'function.php';
require_once 'queries.php';

$offer_end = time_to_off("tomorrow midnight");
$categories = getCategories();
$foundLots = [];

$search = trim($_GET['search']);
$search = sqlSequre($search);
$foundLots = getFoundLots($search);

$page_content = include_template( 'search.php',
    [
    'categories' => $categories,
    'foundLots' => $foundLots,
    'offer_end' => $offer_end,
    'search' => $search
    ]);

$layout_content = include_template('layout.php', 
    [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Поиск лота',
    'search' => $search
    ]);

print($layout_content);

?>