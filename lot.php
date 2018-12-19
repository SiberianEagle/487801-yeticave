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

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$item = getCurrentItem($id);
if (isset($_GET['id']) && $item)
{
$errors = [];
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (!isset($_POST['cost']))
    {
       $errors['cost'] = 1;
    } else 
    {
       $cost = str_replace(' ', '', $_POST['cost']);
       if (ctype_digit($cost) && intval($cost) >= intval($item[0]['bet_step'])+intval($item[0]['start_price']))
       {
        insertBet($_SESSION['id'], $_GET['id'], $_POST['cost']);
       } else
       {
        $errors['cost'] = 1;
       }
    }
}
$bets = getBets($id);
$betsNumber = count($bets);
$page_content = include_template( 'lot.php',
    [
    'categories' => $categories,
    'item' => $item,
    'offer_end' => $offer_end,
    'errors' => $errors,
    'id' => $id,
    'bets' => $bets,
    'betsNumber' => $betsNumber
    ]);

$layout_content = include_template('layout.php', 
    [
    'content' => $page_content,
    'categories' => $categories,
    'title' => $item[0]['title'],
    'is_auth' => $is_auth
    ]);

print($layout_content);

} else
{

http_response_code(404);

}



?>