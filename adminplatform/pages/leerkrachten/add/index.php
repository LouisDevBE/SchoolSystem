<?php
//index.php  
session_start();
require '../../../utils/config.php';
include("../../../utils/functions.php");

$user_data = check_login($con);

$query1 = "select * from klas";
$run1 = mysqli_query($con, $query1);


if (isset($_POST['submit'])) {
    $vnaam = $_POST['user_name'];
    $klas = $_POST['klass'];
    $vak = $_POST['vak'];


    $query = "INSERT INTO leerkracht VALUES('', '$vnaam', '$klas', '$vak')";
    mysqli_query($con, $query);



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



            <label for="">klas</label>
            <br>
            <select class="" name="klass" required>
                <option value="" selected hidden>geef een klas mee</option>


                <?php
                $i = 1;
                if ($num = mysqli_num_rows($run1) > 0) {
                    while ($result = mysqli_fetch_assoc($run1)) {
                        echo "<option value=" . $result['klas'] . ">" . $result['klas'] . "</option>";
                    }
                }

                ?>
            </select>

            <label for="">Vak</label><br>
            <input type="text" name="vak" value="">

            <br>
            <br>
            <button type="submit" name="submit" class="btn">Submit</button>







        </form>
    </div>
</body>

</html>