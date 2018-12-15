<?php
require_once 'config/db_connect.php';
$all_items = "SELECT lots.id AS id, lots.title, start_price, picture, final_price, categories.title AS ctitle
FROM `lots`
INNER JOIN `categories` ON lots.id_category = categories.id ";

$cat = "SELECT * FROM categories";

function db_query($sql, &$link) 
{   
	$sql_res = mysqli_query($link, $sql);
	$arr = mysqli_fetch_all($sql_res, MYSQLI_ASSOC);
	return $arr;
}

//var_dump(db_query($all_items, $link));
?>