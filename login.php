<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
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
    $user = emailCheck($formValues['email']) ? mysqli_fetch_array(emailCheck($formValues['email'])) : null;
    if (!count($errors) && $user)
        {
         if (password_verify($formValues['password'], $user['password']))
         {
          $_SESSION['name'] = $user['name'];
          $_SESSION['avatar'] = $user['avatar'];
          $_SESSION['id'] = $user['id'];
          header('Location:index.php');
         } else
         {
           $errors['password']=1; 
         }

        }else 
        {
           $errors['email']=1;
        }
}
$page_content = include_template('login.php',
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