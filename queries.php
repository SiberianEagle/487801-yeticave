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

    function getCategories()
    {
    	$categories = "SELECT * FROM categories";
    	return db_query($categories);
    }

	function getItems()
	{
		$all_items = "SELECT lots.id AS id, lots.title, start_price, picture, final_price, categories.title AS ctitle FROM `lots` INNER JOIN `categories` ON lots.id_category = categories.id ";
		return db_query($all_items);
	}
    
    function getCurrentItem($id)
	{
		$current_item = "SELECT lots.title, discription, start_price, picture, final_price, bet_step, categories.title AS ctitle
            FROM `lots`
            INNER JOIN `categories` ON lots.id_category = categories.id 
            WHERE lots.id = $id";
		return db_query($current_item);
	}

	function insertItem($id_category, $title, $discription, $picture, $start_price, $bet_step, $finish_date)
	{
		$insert_item = "INSERT INTO `lots`
       (id_user,id_category,title,discription,picture,start_price,bet_step,finish_date,final_price)
        VALUES (
        '12',
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
  
 ?>