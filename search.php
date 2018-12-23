<?php

error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require_once 'function.php';
require_once 'queries.php';

$offer_end = time_to_off("tomorrow midnight");
$categories = getCategories();
$foundLotsOnPage = [];
$search = null;
$pages = null;
$cur_page = 1;
 if(isset($_GET['search']))
{
$search = trim($_GET['search']);
$search = sqlSequre($search);
$foundLots = getFoundLots($search);

$page_lots = 9;

$cur_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = max(($cur_page - 1),0) * $page_lots;
$pages = pagesCounter($foundLots, $page_lots);
$foundLotsOnPage = getFoundLotsOnPage($search, $page_lots, $offset);
}


$page_content = include_template( 'search.php',
    [
    'categories' => $categories,
    'foundLotsOnPage' => $foundLotsOnPage,
    'offer_end' => $offer_end,
    'search' => $search,
    'pages' => $pages,
    'cur_page' => $cur_page
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