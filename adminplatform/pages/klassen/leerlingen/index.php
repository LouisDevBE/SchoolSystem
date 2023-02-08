<?php
include '../../../utils/config.php';
if (isset($_GET['klas'])) {
    $id = $_GET['klas'];
    $query = "select * from leerlingen WHERE klas = '$id'";
    $run = mysqli_query($con, $query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            font-family: 'Poppins', sans-serif;
        }

        header {
            width: 100%;
            height: 80px;
            background-color: #2c3e50;
            text-align: center;
            font-size: 32px;
            padding-top: 25px;
            color: white;
            height: 170px;
        }

        header a {
            text-align: center;
            font-size: 22px;
            color: white;
            text-decoration: none;
        }

        table {
            margin-top: 150px;
            width: 95%;
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

        .new {
            text-decoration: none;
            text-align: center;
            color: red;
            border: 2px solid red;
            padding: 7px;
        }

        .new:hover {
            color: white;
            background-color: red;
            transition: 0.5s;
        }

        .button {
            background: #428bca;
            padding: 1em 2em;
            color: #fff;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background: #3876ac;
        }
    </style>
</head>

<body>

    <header>leerlingen <?php echo "$id"?><br> <a href="../view/">terug</a></header>

    <table border="1" cellspacing="0" cellpadding="0">
        <tr class="heading">
            <th>ID</th>
            <th>naam</th>
            <th>achternaam</th>
            <th>contact</th>
        </tr>
        <?php
        $i = 1;
        if ($num = mysqli_num_rows($run) > 0) {
            while ($result = mysqli_fetch_assoc($run)) {


                echo "  
                          <tr class='data'>  
                          
                               <td>" . $result['id'] . "</td> 
                               <td>" . $result['voornaam'] . "</td>
                               <td>" . $result['naam'] . "</td>
                               <td>" . $result['contact'] . "</td>  
                          </tr>  
                     ";
            }
        }
        ?>

        
    </table>
</body>

</html>