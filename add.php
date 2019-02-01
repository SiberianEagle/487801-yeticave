<?php
require_once 'bootLoader.php';

if(!isset($_SESSION['name']))
{
http_response_code(403);
exit();
}

$offer_end = time_to_off("tomorrow midnight");
$categories = getCategories();
$formValues = [];
$errors = [];
if ($_SERVER['REQUEST_METHOD']=='POST'){
    
    $category_id = intValid($_POST['category']);
    $lot_name = strValid($_POST['lot_name']);
    $message = strValid($_POST['message']);
    $lot_rate = intValid($_POST['lot_rate']);
    $lot_step = intValid($_POST['lot_step']);
    $lot_date = strValid($_POST['lot_date']);

    foreach ($_POST as $key => $value) {
        $formValues[$key] = $value;
        if (empty($formValues[$key])){
            $errors[$key]=1;
        }  
    }
    if (!$lot_rate){
            $errors['lot_rate']=1;
        }
    if (!$lot_step){
            $errors['lot_step']=1;
        }
    if ($lot_date < time() || $lot_date  > 2114380800){
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
             $_SESSION['id'],
             $category_id,
             $lot_name,
             $message,
             $file_url,
             $lot_rate,
             $lot_step,
             $lot_date
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