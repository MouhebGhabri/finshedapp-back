<?php 
 
  include "../connect.php" ; 
 
  $vs_id = htmlspecialchars(strip_tags($_GET['vs_id']));



  $stmt = $con->prepare("DELETE  FROM vs WHERE `vs_id` = ?"); 

  $stmt->execute(array(  $vs_id )) ;

  $data = $stmt->fetch(PDO::FETCH_ASSOC) ; 

  $count = $stmt->rowCount() ; 

  if ($count > 0) {

    echo json_encode(array("status" => "success" , "data" => $data)) ; 

  }else {

    echo json_encode(array("status" => "fail")) ; 

  }
