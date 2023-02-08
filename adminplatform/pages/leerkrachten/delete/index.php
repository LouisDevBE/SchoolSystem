<?php   
 include '../../../utils/config.php';  
 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `leerkracht` WHERE id = '$id'";  
      $run = mysqli_query($con,$query);  
      if ($run) {  
           header('location:../view/');  
      }else{  
           echo "Error: ".mysqli_error($con);  
      }  
 }  
 ?>