<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once 'function.php';
require_once 'queries.php';

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
    if (!filter_var($formValues['email'], FILTER_VALIDATE_EMAIL)
        || mysqli_num_rows(emailCheck($formValues['email']))>0)
        {
            $errors['email']=1;
        }
    if (!($_FILES['userfile']['error'])
        && mime_content_type($_FILES['userfile']['tmp_name'])=='image/jpeg'){
        $file_name = $_FILES['userfile']['name'];
        $file_name = uniqid().'.png';
        $file_path = __DIR__ . '/img/';
        $file_url = 'img/' . $file_name;
        move_uploaded_file($_FILES['userfile']['tmp_name'], $file_path . $file_name);
    }else{
        $errors['file']=1;
    }

    if(!count($errors)){
        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        insertUser(
             $_POST['email'],
             $_POST['name'],
             $passwordHash,
             $file_url,
             $_POST['contact_info']
         );
        header('Location:login.php');
    }
}
$page_content = include_template('sign-up.php',
    [
    'categories' => $categories,
    'formValues' => $formValues,
    'errors' => $errors
    ]);

$layout_content = include_template('layout.php', 
    [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Регистрация',
    'is_auth' => $is_auth
    ]);

print($layout_content);

?>