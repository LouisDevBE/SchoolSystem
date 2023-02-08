<?php 
session_start();

	include("../../utils/config.php");
	include("../../utils/functions.php");

    $user_data = check_login($con);	
    $klas = $user_data['klas']; 
    // 4D is van de persoon

	$query = "SELECT * FROM `vervanging` WHERE `klas` = '$klas' ";  
	$run = mysqli_query($con,$query); 

		

?>

<!DOCTYPE html>
<html>

<head>
    <title>My website</title>
    <style type="text/css">
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        width: 100%;
        height: 100vh;
        background-color: #34495e;
        position: relative;
        font-family: 'verdana', sans-serif;
    }

    header {
        width: 100%;
        height: 80px;
        background-color: #2c3e50;
        text-align: center;
        font-size: 32px;
        padding-top: 25px;
        color: white;
        height: 150px;
    }

    header a {
        text-align: center;
        font-size: 22px;
        color: white;
        text-decoration: none;
    }

    table {
        width: 75%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .heading {
        background-color: #FFFF;
    }

    .heading th {
        padding: 10px 0;
    }

    .data {
        text-align: center;
        color: #FFFF;
    }

    .data td {
        padding: 15px 0;
    }

    #btn {
        text-decoration: none;
        color: #FFF;
        background-color: #e74c3c;
        padding: 5px 20px;
        border-radius: 3px;
    }

    #btn:hover {
        background-color: #c0392b;
    }
    </style>
</head>

<body>
    <header>vervanging<br> <a href="../dashboard/">terug</a><br></header>
    <table border="1" cellspacing="0" cellpadding="0">
        <tr class="heading">
            
            <th>naam</th>
            <th>lesuur</th>
            <th>datum</th>
            
            
        </tr>
        <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data'>  
                          
                          
                          <td>".$result['user_name']."</td>
                          <td>".$result['lesuur']."</td>  
                          <td>".$result['datum']."</td>  
							  
                          </tr>  
                     ";  
                }  
           }  
      ?>
    </table>
</body>

</html>