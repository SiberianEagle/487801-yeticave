<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require_once 'function.php';
require_once 'queries.php';

if(!isset($_SESSION['name']))
{
http_response_code(403);
exit();
}

$is_auth = rand(0, 1);
$user_avatar = 'img/user.jpg';
$offer_end = time_to_off("tomorrow midnight");
$categories = getCategories();
$formValues = [];
$errors = [];
if ($_SERVER['REQUEST_METHOD']=='POST'){
    foreach ($_POST as $key => $value) {
        $formValues[$key] = $value;
        if (empty($formValues[$key])){
            $errors[$key]=1;
        }  
    }
    if (!ctype_digit($formValues['lot_rate'])){
            $errors['lot_rate']=1;
        }
    if (!ctype_digit($formValues['lot_step'])){
            $errors['lot_step']=1;
        }
    if (strtotime($_POST['lot_date'])<time()||strtotime($_POST['lot_date'])>2114380800){
            $errors['lot_date']=1;
    }
    if (!($_FILES['userfile']['error'])){
        $file_name = $_FILES['userfile']['name'];
        $file_name = uniqid().'.png';
        $file_path = __DIR__ . '/img/';
        $file_url = 'img/' . $file_name;
        move_uploaded_file($_FILES['userfile']['tmp_name'], $file_path . $file_name);
    }else{
        $errors['file']=1;
    }
    if(!count($errors)){
        insertItem(
             $_POST['category'][0],
             $_POST['lot_name'],
             $_POST['message'],
             $file_url,
             $_POST['lot_rate'],
             $_POST['lot_step'],
             $_POST['lot_date']
         );
        $lot_id = getlLastItem();
        header('Location:lot.php?id='.$lot_id[0]['id']);
    }
}
$page_content = include_template('add-lot.php',
    [
    'categories' => $categories,
    'formValues' => $formValues,
    'errors' => $errors
    ]);

$layout_content = include_template('layout.php', 
    [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Добавление лота'
    ]);

print($layout_content);

?>