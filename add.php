
<?php

  include "../connect.php";


      

  $data = file_get_contents('php://input');
  $js = explode("&",$data);


  $temp        =  substr($js[0],strpos($js[0],"=")+1);
  $gluc        =  substr($js[1],strpos($js[1],"=")+1);
  $bmp         =  substr($js[2],strpos($js[2],"=")+1);

  $id          =  substr($js[3],strpos($js[3],"=")+1);

   
    $stmt = $con->prepare("INSERT INTO `vs`
    (`temp`, `gluc`, `bmp`, `vsuser`) 
    VALUES ( ? , ? , ? , ?)
    ");

  
      $stmt->execute(array($temp , $gluc, $bmp  , $id));
  
      $count = $stmt->rowCount();
  
      if ($count > 0) {
          echo json_encode(array("status" => "success"));
      } else {
          echo json_encode(array("status" => "fail"));
      }
?>
  