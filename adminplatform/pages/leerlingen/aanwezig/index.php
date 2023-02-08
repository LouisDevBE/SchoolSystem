<?php
include '../../../utils/config.php';
if (isset($_GET['id'])) {

    $id = $_GET['id'];


    $query = "SELECT * FROM `leerlingen` WHERE `id` = $id";
    $run = mysqli_query($con, $query);

    $i = 1;
    if ($num = mysqli_num_rows($run) > 0) {
        while ($result = mysqli_fetch_assoc($run)) {
            if($result['aanwezig'] == "aanwezig") {
                $query1 = "UPDATE `leerlingen` SET `aanwezig`='afwezig' WHERE `id` = $id";
            } else {
                $query1 = "UPDATE `leerlingen` SET `aanwezig`='aanwezig' WHERE `id` = $id";
            }

        }
    }

   
    $run1 = mysqli_query($con, $query1);

    if ($run1) {
        header('location:../view/');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>