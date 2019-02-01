<?php
require_once 'bootLoader.php';

$offer_end = time_to_off("tomorrow midnight");
$categories = getCategories();
$formValues = [];
$errors = [];
if ($_SERVER['REQUEST_METHOD']=='POST'){

    $email = strValid($_POST['email']);
    $name = strValid($_POST['name']);
    $contact_info = strValid($_POST['message']);

    foreach ($_POST as $key => $value) {
        $formValues[$key] = $value;
        if (empty($formValues[$key])){
            $errors[$key]=1;
        }  
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)
        || emailCheckGetUser($email))
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
             $email,
             $name,
             $passwordHash,
             $file_url,
             $contact_info
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
    'title' => 'Регистрация'
    ]);

print($layout_content);

?>