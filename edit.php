<?php 
 
 include "../connect.php" ; 
 $vs_id    = htmlspecialchars(strip_tags($_GET['vs_id']));
 $temp = htmlspecialchars(strip_tags($_GET['temp']));
 $gluc  = htmlspecialchars(strip_tags($_GET['gluc']));
 $bmp = htmlspecialchars(strip_tags($_GET['bmp']));

  $stmt = $con->prepare("UPDATE `vs` 
  SET 
  `temp`=$temp,`gluc`=$gluc,`bmp`=$bmp
  WHERE `vs_id` =$vs_id
                        ") ; 

  $stmt->execute() ;

  $count = $stmt->rowCount() ; 

  if ($count > 0) {
    echo json_encode(array("status" => "success")) ; 
  }else {
    echo json_encode(array("status" => "fail")) ; 
  }

  ?>
