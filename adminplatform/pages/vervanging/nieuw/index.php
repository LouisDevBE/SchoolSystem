<?php
session_start();
require '../../../utils/config.php';
include("../../../utils/functions.php");

$user_data = check_login($con);

$query1 = "select * from klas";
$run1 = mysqli_query($con, $query1);

if (isset($_POST["submit"])) {
  $name = $_POST["klas"];
  $extra = $_POST["lesuur"];
  $age = $_POST["leerkracht"];
  $date = $_POST["date"];


  $query = "INSERT INTO `vervanging` VALUES('', '$name', '$extra', '$date', '$age')";
  mysqli_query($con, $query);

  header("Location: ../view/");

  echo
  "
  <script> alert('Data Inserted Successfully'); </script>
  ";
}
?>
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Data</title>
  </head>
  <style media="screen">
    label{
      display: block;
    }
  </style>
  <body>
    <form class="" action="" method="post" autocomplete="off">
      <label for="">Naam</label>
      <input type="text" name="naam" required value=""> -->

<!-- <label for="">beschrijving</label>
      <input type="text" name="extra" required value="">

      <label for="">Klas</label>
      <input type="number" name="klas" required value="">

      <label for="">tegen</label>
      <input type="date" name="date" required value="">

      <label for="">type</label>
      <select class="" name="typetask" required>
        <option value="" selected hidden>geef een type</option>
        <option value="medendeling">Medendeling</option>
        <option value="taak">taak</option>
        <option value="herkansing">herkansing</option>
       <option value="toets">toets</option>
       <option value="examen">examen</option>
      </select>
      <br>
      <button type="submit" name="submit">Submit</button>
    </form>
  </body>
</html> -->

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
  </style>
</head>

<body>
  <div class="container">
    <h1>opgeven</h1>
    <form class="" action="" method="post" autocomplete="off">
      <label for="">klas</label>

      <select class="" name="klas" required>
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

      <label for="">Lesuur</label>
      <input type="text" name="lesuur" required value="">

      <label for="">Leerkracht</label>
      <input type="text" name="leerkracht" required value="">

      <label for="">Datum</label>
      <input type="date" name="date" required value="">

      <br>
      <br>
      <button type="submit" name="submit" class="btn">Submit</button>
    </form>
  </div>
</body>

</html>