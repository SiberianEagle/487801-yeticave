<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require_once 'function.php';
require_once 'queries.php';

$offer_end = time_to_off("tomorrow midnight");
$categories = getCategories();
$usersWithBet = [];

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
        updatePrice($_GET['id'], $_POST['cost']);
       } else
       {
        $errors['cost'] = 1;
       }
    }
}
$bets = getBets($id);
foreach ($bets as $key) 
{
  array_push($usersWithBet, intval($key['bid']));
}
$betsNumber = count($bets);
$page_content = include_template( 'lot.php',
    [
    'categories' => $categories,
    'item' => $item,
    'offer_end' => $offer_end,
    'errors' => $errors,
    'id' => $id,
    'bets' => $bets,
    'betsNumber' => $betsNumber,
    'usersWithBet' => $usersWithBet
    ]);

$layout_content = include_template('layout.php', 
    [
    'content' => $page_content,
    'categories' => $categories,
    'title' => $item[0]['title']
    ]);

print($layout_content);

} else
{

http_response_code(404);

}



?>