<?php 
 
  include "../connect.php" ; 
 
  $id = htmlspecialchars(strip_tags($_GET['id']));

  $stmt = $con->prepare("SELECT * FROM vs WHERE `vsuser` = ? ORDER BY `vs_id`DESC"); 

  $stmt->execute(array(  $id )) ;

  $data = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 

  $count = $stmt->rowCount() ; 

  if ($count > 0) {

    echo json_encode(array("status" => "success" , "data" => $data)) ; 

  }else {

    echo json_encode(array("status" => "fail")) ; 

  }
