<?php
require_once 'bootLoader.php';

$categories = getCategories();
$usersWithBet = [];

$id_lot = isset($_GET['id']) ? intval($_GET['id']) : 0;
$item = getCurrentItem($id_lot);

if (!$id_lot || !$item)
{
  http_response_code(404);
  exit();
}

$offer_end = time_to_off($item[0]['finish_date']);
$errors = [];
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (!isset($_POST['cost']))
    {
       $errors['cost'] = 1;
    } else 
    {
       $cost = intValid($_POST['cost']);
       $sum = intval($item[0]['bet_step']) + intval($item[0]['final_price']);
       if ($cost && $cost >= $sum)
       {
        insertBet($_SESSION['id'], $id_lot, $cost);
        updatePrice($id_lot, $cost);
       } else
       {
        $errors['cost'] = 1;
       }
    }
}
$bets = getBets($id_lot);
$usersWithBet = array_map(function($c){return intval($c['bid']);}, $bets);
$betsNumber = count($bets);

$page_content = include_template( 'lot.php',
    [
    'categories' => $categories,
    'item' => $item,
    'offer_end' => $offer_end,
    'errors' => $errors,
    'id' => $id_lot,
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


?>