<?php
require_once 'bootLoader.php';

$offer_end = time_to_off("tomorrow midnight");
$categories = getCategories();
$formValues = [];
$errors = [];
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = strValid($_POST['email']);
    foreach ($_POST as $key => $value) {
        $formValues[$key] = $value;
        if (empty($formValues[$key])){
            $errors[$key]=1;
        }  
    }
    $user = emailCheckGetUser($email)[0];
    if (!count($errors) && $user)
        {
         if (password_verify($_POST['password'], $user['password']))
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
    'title' => 'Регистрация'
    ]);

print($layout_content);

?>