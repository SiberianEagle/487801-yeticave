<?php
require_once 'bootLoader.php';

if(!isset($_SESSION['id']))
{
http_response_code(403);
exit();
}
$id_user = intValid($_SESSION['id']);

$title = "мои ставки";
$categories = getCategories();

$bets = getMyBets($id_user);
$betsNumber = count($bets);

$page_content = include_template( 'myBets.php',
    [
    'bets' => $bets,
    'betsNumber' => $betsNumber
    ]);

$layout_content = include_template('layout.php', 
    [
    'content' => $page_content,
    'categories' => $categories,
    'title' => $title
    ]);

print($layout_content);
?>