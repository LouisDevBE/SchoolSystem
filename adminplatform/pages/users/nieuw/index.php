<?php   
 //index.php  
    session_start();
    require '../../../utils/config.php';
	include("../../../utils/functions.php");

	$user_data = check_login($con);		

 
 if (isset($_POST['submit'])) {  
      $vnaam=$_POST['user_name'];  
      $anaam=$_POST['Rol'];  
      $vanaam=$_POST['pass'];  
      $idweb=$_POST['id'];
      

      $query = "INSERT INTO users VALUES('', '$vnaam','$anaam','$vanaam', '$idweb')";
      mysqli_query($con,$query);

    
      header("Location: ../view/");

      echo
      "
      <script> alert('Data Inserted Successfully'); </script>
      ";
    
 }  
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>opgeven</title>
    <style type="text/css">
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background: #5d6d7d;
        width: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 500px;
        background: #fff;
    }

    .container form {
        width: 100%;
        padding: 30px;
    }

    .container form input {
        width: 100%;
        padding: 15px 10px;
        outline: none;
        margin: 10px 0;
    }
    select {
        width: 100%;
        padding: 15px 10px;
        outline: none;
        margin: 10px 0;
    }

    .btn {
        cursor: pointer;
        background: red;
        border: none;
        padding: 10px 30px;
        color: #fff;
    }

    h1 {
        display: block;
        text-align: center;
        padding-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>opgeven</h1>
        <form class="" action="" method="post" autocomplete="off">
            <label for="">username</label>
            <input type="text" name="user_name" required value="">

            <label for="">password</label>
            <input type="text" name="pass" required value="">

            <label for="">web id</label>
            <input type="text" name="id" required value="">

            <label for="">Rol</label> <br>
            <select class="" name="Rol" required>
                <option value="" selected hidden>geef optie mee</option>
                <option value="admin">admin</option>
                <option value="leerkracht">leerkracht</option>
                <option value="andere">andere</option>
            </select> <br>


            <br>
            <br>
            <button type="submit" name="submit" class="btn">Submit</button>

            

        



        </form>
    </div>
</body>

</html>