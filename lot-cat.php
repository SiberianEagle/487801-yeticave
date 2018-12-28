<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require_once 'function.php';
require_once 'queries.php';

$offer_end = time_to_off("tomorrow midnight");
$categories = getCategories();

if (isset($_GET['id']))
{
    $id = intval($_GET['id']);
    $category_name = getCurrentCategory($id);
    $all_items = getItemsOfCategory($id);

    $page_lots = 9;
    $cur_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = max(($cur_page - 1),0) * $page_lots;
    $pages = pagesCounter($all_items, $page_lots);
    $items = getItemsOfCategoryOnPage($id, $page_lots, $offset);
    
$page_content = include_template( 'lot-cat.php',
    [
    'categories' => $categories,
    'items' => $items,
    'offer_end' => $offer_end,
    'category_name' => $category_name[0]['title'],
    'pages' => $pages,
    'cur_page' => $cur_page
    ]);

$layout_content = include_template('layout.php', 
    [
	'content' => $page_content,
	'categories' => $categories,
	'title' => 'Лоты категории'
    ]);
	


print($layout_content);

} else 
{
  http_response_code(404);
}

?>