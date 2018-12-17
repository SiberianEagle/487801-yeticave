<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once 'config/db_connect.php';
require_once 'function.php';
require_once 'queries.php';
require_once 'constants.php';

$is_auth = rand(0, 1);
$user_avatar = 'img/user.jpg';
$offer_end = time_to_off("tomorrow midnight");
$categories = db_query($cat, $link);

$errors = [];
$invalid = '';
if (isset($_POST)){
    foreach ($_POST as $key => $value) {
        ${$key} = $value ?? '';
        if (empty(${$key})){
            $errors[$key] = "Поле не заполнено";
        } else{
            $errors[$key] = '';
        }
    }
    if (count($errors)){
        $invalid = "form--invalid";
    }
}

var_dump($errors);
$page_content = include_template('add-lot.php',
    [
    'categories' => $categories,
    'lot_name' => $lot_name,
    'message' => $message,
    'lot_rate' => $lot_rate,
    'lot_step' => $lot_step,
    'lot_date' => $lot_date,
    'errors' => $errors
    ]);

$layout_content = include_template('layout.php', 
    [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Добавление лота',
    'is_auth' => $is_auth
    ]);

print($layout_content);

?>