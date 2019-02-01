<?php
	function  get_connection()
	{
		$link = mysqli_connect('localhost', 'root', 'root', 'yeticave');
		if(!$link)
		{
			echo "Проблемы с Mysql Соединением";
    		die();
    	}
    	return $link;
	}

	
	function db_query($sql) 
	{   
		$link = get_connection();
		$sql_res = mysqli_query($link, $sql);
		$arr = mysqli_fetch_all($sql_res, MYSQLI_ASSOC);
		return $arr;
	}
	
	function db_insert($sql)
	{
        $link = get_connection();
		$sql_res = mysqli_query($link, $sql);
		return $sql_res;
	}

	function db_update($sql)
	{
        $link = get_connection();
		$sql_res = mysqli_query($link, $sql);
		return $sql_res;
	}

    function getCategories()
    {
    	$categories = "SELECT * FROM categories";
    	return db_query($categories);
    }

    function getCurrentCategory($id)
    {
    	$categories = "SELECT `title` FROM categories WHERE id = $id";
    	return db_query($categories);
    }

	function getItems()
	{
		$all_items = "SELECT lots.id AS id, lots.title, start_price, picture, final_price, categories.title AS ctitle FROM `lots` INNER JOIN `categories` ON lots.id_category = categories.id ";
		return db_query($all_items);
	}

	function getItemsOfCategory($id)
	{
		$cat_items = "SELECT lots.id AS id, lots.title, start_price, picture, final_price, categories.title AS ctitle FROM `lots` INNER JOIN `categories` ON lots.id_category = categories.id 
		    WHERE categories.id = $id
		    ORDER BY lots.id DESC";
		return db_query($cat_items);
	}

	function getItemsOfCategoryOnPage($id, $limit, $offset)
	{
		$cat_items = "SELECT lots.id AS id, lots.title, start_price, picture, final_price, categories.title AS ctitle FROM `lots` INNER JOIN `categories` ON lots.id_category = categories.id 
		    WHERE categories.id = $id
		    ORDER BY lots.id DESC
		    LIMIT $limit OFFSET $offset";
		return db_query($cat_items);
	}
    
    function getCurrentItem($id)
	{
		$current_item = "SELECT lots.title, id_user, discription, start_price, picture, final_price, finish_date, bet_step, categories.title AS ctitle
            FROM `lots`
            INNER JOIN `categories` ON lots.id_category = categories.id 
            WHERE lots.id = $id";
		return db_query($current_item);
	}

	function getClosedItems()
	{   
		$time = time();
		$closed_items = "SELECT id FROM `lots`
		    WHERE UNIX_TIMESTAMP(finish_date) <= $time";
       return db_query($closed_items);
	}

    function setItemWinner($id_lot, $id_user)
    {
        $updateWinner = "UPDATE `lots` SET `id_winner` = '$id_user' WHERE `lots`.`id` = $id_lot";
        return db_update($updateWinner);
    } 
	
	function insertItem($id_user, $id_category, $title, $discription, $picture, $start_price, $bet_step, $finish_date)
	{
		$insert_item = "INSERT INTO `lots`
       (id_user,id_category,title,discription,picture,start_price,bet_step,finish_date,final_price)
        VALUES (
        '$id_user',
        '$id_category',
        '$title',
        '$discription',
        '$picture',
        '$start_price',
        '$bet_step',
        '$finish_date',
        '$start_price'
        )";
		return db_insert($insert_item);
	}

	function getlLastItem()
	{
        $last_item = "SELECT id FROM lots ORDER BY id DESC LIMIT 1";
        return db_query($last_item);
	}

    function emailCheckGetUser($email) 
	{
	    $currentEmail = "SELECT * FROM users WHERE email = '$email'";
        $link = get_connection();
		$sql_res = mysqli_query($link, $currentEmail);
        return mysqli_num_rows($sql_res) > 0 ? mysqli_fetch_all($sql_res, MYSQLI_ASSOC) : false;
    }

    function insertUser($email, $name, $password, $avatar, $contact_info)
	{
		$insert_item = "INSERT INTO `users`
       (email,name,password,avatar,contact_info)
        VALUES (
        '$email',
        '$name',
        '$password',
        '$avatar',
        '$contact_info'
        )";
		return db_insert($insert_item);
	}

	function insertBet($id_user, $id_lot, $sum)
	{
		$insert_bet = "INSERT INTO `bets`
       (id_user,id_lot,sum)
        VALUES (
        '$id_user',
        '$id_lot',
        '$sum'
        )";
		return db_insert($insert_bet);
	}

	function updatePrice($id_lot, $sum)
	{
		$update_price = "UPDATE `lots` SET final_price = $sum WHERE id = $id_lot";
		return db_insert($update_price);
	}

    
	function getBets($id_lot)
	{
       $bets = "SELECT users.name AS name, bets.id_user AS bid, date, sum FROM `bets` 
       INNER JOIN `users` ON bets.id_user = users.id WHERE bets.id_lot = $id_lot ORDER BY bets.id DESC LIMIT 10";
        return db_query($bets);
	}

	function getClosedItemBet($id_lot)
    {
    	$lastBet = "SELECT users.name AS name, users.email AS email,  bets.id_user AS bid, sum FROM `bets` 
       INNER JOIN `users` ON bets.id_user = users.id WHERE bets.id_lot = $id_lot ORDER BY bets.id DESC LIMIT 1";
       return db_query($lastBet);
    }

	function sqlSequre($value) 
	{
		$link = get_connection();
		$result = mysqli_real_escape_string($link, $value);
		return $result;
	}

	function getFoundLots($string)
	{
		$foundLots = "SELECT lots.id AS id, lots.title, start_price, picture, final_price, categories.title AS ctitle FROM `lots` 
		     INNER JOIN `categories` ON lots.id_category = categories.id
		     WHERE MATCH(lots.title, lots.discription) AGAINST ('$string')";
		return db_query($foundLots);
	}

	function getFoundLotsOnPage($string, $limit, $offset)
	{
		$foundLots = "SELECT lots.id AS id, lots.title, start_price, picture, final_price, categories.title AS ctitle FROM `lots` 
		     INNER JOIN `categories` ON lots.id_category = categories.id
		     WHERE MATCH(lots.title, lots.discription) AGAINST ('$string')
		     LIMIT $limit OFFSET $offset";
		return db_query($foundLots);
	}

	function strValid($string) 
    {   
         $link = get_connection();
         $string = mysqli_real_escape_string($link, $string);
         $string = strip_tags($string);
         return $string;
    }

    function intValid($string) 
    {   
         $string = str_replace(' ', '', $string);
         $int = intval($string);
         return $int;
    }

 ?>