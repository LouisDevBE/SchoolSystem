<?php
//index.php  
session_start();
require '../../../utils/config.php';
include("../../../utils/functions.php");

$user_data = check_login($con);

$query1 = "select * from klas";
$run1 = mysqli_query($con, $query1);


if (isset($_POST['submit'])) {
    $vnaam = $_POST['vnaam'];
    $anaam = $_POST['anaam'];
    $vanaam = $_POST['vanaam'];
    $monaam = $_POST['monaam'];
    $contact = $_POST['contact'];
    $adres = $_POST['adres'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $extra = $_POST['extra'];
    $klas = $_POST['klas'];

    $username = $_POST['username'];
    $password = $_POST['password'];
    $webid = $_POST['webid'];


    $query = "INSERT INTO `leerlingen`(`id`, `voornaam`, `naam`, `vadersnaam`, `moedersnaam`, `contact`, `adres`, `tel`, `mail`, `extra`, `klas`, `password`, `user_name`, `user_id`, `aanwezig`) VALUES ('','$vnaam','$anaam','$vanaam','$monaam','$contact','$adres','$tel','$mail','$extra','$klas','$password','$username','$webid','nee')";
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

        select {
            width: 100%;
            padding: 15px 10px;
            outline: none;
            margin: 10px 0;
        }

        .option {
            width: 100%;
            padding: 15px 10px;
            outline: none;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>opgeven</h1>
        <form class="" action="" method="post" autocomplete="off">
            <label for="">voor naam</label>
            <input type="text" name="vnaam" required value="">

            <label for="">achternaam</label>
            <input type="text" name="anaam" required value="">

            <label for="">vaders naam</label>
            <input type="text" name="vanaam" required value="">

            <label for="">moeders naam</label>
            <input type="text" name="monaam" required value="">

            <label for="">contact</label>
            <input type="text" name="contact" required value="">

            <label for="">adres</label>
            <input type="text" name="adres" required value="">

            <label for="">telefoon</label>
            <input type="text" name="tel" required value="">

            <label for="">mail</label>
            <input type="text" name="mail" required value="">

            <label for="">extra</label>
            <input type="text" name="extra" required value="">

            <label for="">username</label>
            <input type="text" name="username" required value="">

            <label for="">password</label>
            <input type="text" name="password" required value="">

            <label for="">webid</label>
            <input type="text" name="webid" required value="">

            <label for="">klas</label>

            <select class="" name="klas" required>
                <option value="" selected hidden>geef een klas mee</option>


                <?php
                $i = 1;
                if ($num = mysqli_num_rows($run1) > 0) {
                    while ($result = mysqli_fetch_assoc($run1)) {
                        echo "<option class='option' value=" . $result['klas'] . ">" . $result['klas'] . "</option>";
                    }
                }

                ?>
            </select>



            <br>
            <br>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
    </div>
</body>

</html>