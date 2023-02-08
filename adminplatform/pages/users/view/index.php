<?php
session_start();

include("../../../utils/config.php");
include("../../../utils/functions.php");
include("./ip.php");

$query = "select * from users";
$run = mysqli_query($con, $query);

$user_data = check_login($con);

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

        header a {
            text-align: center;
            font-size: 22px;
            color: white;
            text-decoration: none;
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
    <header>Users <br> <a href="../../dashboard/">terug</a><br>

        <?php
        if ($user_data['Rol'] == "admin") {
            echo  "<a href='../nieuw/'>nieuw</a>";
        }
        ?>
    </header>


    <table border="1" cellspacing="0" cellpadding="0">
        <tr class="heading">
            <th>ID</th>
            <th>naam</th>
            <th>rol</th>
            <th>ip</th>
            <?php

            if ($user_data['Rol'] == "admin") {
                echo "<th>actie</th>  ";
            }
            ?>


        </tr>
        <?php

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $i = 1;
        if ($num = mysqli_num_rows($run) > 0) {
            while ($result = mysqli_fetch_assoc($run)) {
                echo "  
                          <tr class='data'>  
                          
                               <td>" . $result['id'] . "</td> 
                               <td>" . $result['user_name'] . "</td>  
                               <td>" . $result['Rol'] . "</td>  ";
                echo "<td>" . $ip . "</td>";

                if ($user_data['Rol'] == "admin") {
                    echo "<td><a href='../delete/?id=" . $result['id'] . "' id='btn'>Delete</a></td> ";
                }

                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>