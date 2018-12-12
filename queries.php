<?php

$itemsRes = mysqli_query($link, 
("SELECT lots.title, start_price, picture, final_price, categories.title AS ctitle
FROM `lots`
INNER JOIN `categories` ON lots.id_category = categories.id ")
);
$items = mysqli_fetch_all($itemsRes , MYSQLI_ASSOC);

$catRes = mysqli_query($link, 
("SELECT * FROM categories")
);
$categories = mysqli_fetch_all($catRes , MYSQLI_ASSOC);

?>