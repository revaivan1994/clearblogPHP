<?php
/**
 * @var $pdo
 */
$error = '';
 if(count($_POST) > 0) {
     $email = $_POST['email'] ?? null;
     $password = $_POST['password'] ?? null;

     $stmt = $pdo->prepare("SELECT * from user WHERE email =  ? ");
     $stmt->execute([$email]);
     $user = $stmt->fetch();

     if($user && password_verify($password, $user["password"])) {
         $_SESSION["userId"] = $user["id"];
         if($user['isAdmin']) {
             redirect('/admin');
         } else {
             redirect('/?act=articles');
         }

     }else{
        $error = 'user is not found';
     }
 }


 require_once 'templates/login.php';