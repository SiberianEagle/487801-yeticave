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
	
	function getItems()
	{
		$all_items = "SELECT lots.id AS id, lots.title, start_price, picture, final_price, categories.title AS ctitle FROM `lots` INNER JOIN `categories` ON lots.id_category = categories.id ";
		return db_query($all_items);
	}
    
    function getCategories()
    {
    	$categories = "SELECT * FROM categories";
    	return db_query($categories);
    }

    function getCurrentItem($id)
	{
		$current_item = "SELECT lots.title, discription, start_price, picture, final_price, bet_step, categories.title AS ctitle
            FROM `lots`
            INNER JOIN `categories` ON lots.id_category = categories.id 
            WHERE lots.id = $id";
		return db_query($current_item);
	}

?>