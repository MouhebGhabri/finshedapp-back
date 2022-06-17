<?php 
 
 include "../connect.php" ; 
 $email    = htmlspecialchars(strip_tags($_POST['email']));
 //$username = htmlspecialchars(strip_tags($_POST['username']));
 $password = htmlspecialchars(strip_tags($_POST['password']));
 $firstname = htmlspecialchars(strip_tags($_POST['FN']));
 $lastname = htmlspecialchars(strip_tags($_POST['LN']));


  $stmt = $con->prepare("INSERT INTO `users`( `email`, `password`,`FN`,`LN`) 
                         VALUES (?  , ? , ?,?)
                        ") ; //`username`,

  $stmt->execute(array( $email  , $password,$firstname,$lastname)) ;//,$username

  $count = $stmt->rowCount() ; 

  if ($count > 0) {
    echo json_encode(array("status" => "success")) ; 
  }else {
    echo json_encode(array("status" => "fail")) ; 
  }
