<?php
session_start();

include("../../utils/config.php");
include("../../utils/functions.php");

$user_data = check_login($con);

$klas = $user_data['klas'];
// 4D is van de persoon

$query = "SELECT * FROM `taak` WHERE `klas` = '$klas' ";
$run = mysqli_query($con, $query);


?>

<!DOCTYPE html>
<html>

<head>
    <title>My website</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style type="text/css">
        #viewport {
            padding-left: 250px;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        body {
            overflow-x: hidden;
            color: black;
            background-color: #F3F3F3;
        }

        .header {
            text-align: center;
            color: #ffffff;
            font-family: tahoma;
        }


        .img {
            text-align: center;

        }

        .accordion-item {
            max-width: 750px;
            text-align: center;

            margin-left: auto;
            margin-right: auto;
        }


        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 10px;
            color: #ffffff;
            width: 500;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 2px 16px;
            color: #ffffff width=500;
        }

        a {
            text-decoration: none;
        }


        .box .text {

            margin: auto;
            width: 50%;
            padding: 10px;

        }

        
    </style>
</head>

<body>

    <!-- nav begin -->

    <nav class="navbar navbar-dark fixed-top" style="background-color: #39BBB0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Leerlingen platform</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg" style="background-color: #39BBB0;" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Leerlingen platform</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../leekrachten/">leerkrachten</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../taken/">taken</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">kalender</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">punten</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">raporten</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="background-color: #39BBB0;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu" style="background-color: #39BBB0;">
                                <li><a class="dropdown-item" href="../../login system/loguit/">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



    <!--#louis# begin body #-->
    <div class="body" style="margin-top: 80px; text-align: center; color: white;">
        <h1 style="margin-bottom: 40px; color: #474747;">Dashboard</h1>
        <!--#louis# begin php selectie #-->

        <?php
        $i = 1;
        if ($num = mysqli_num_rows($run) > 0) {
            while ($result = mysqli_fetch_assoc($run)) {
                if ($result['date'] > date("Y-m-d")) {


                    echo "
                    <div class='accordion accordion-flush' id='accordionFlushExample".$result['vak']."'>
                    <div class='accordion-item'>
                      <h2 class='accordion-header' id='flush-headingOne'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapseOne' aria-expanded='false' aria-controls='flush-collapseOne'>
                        " . $result["vak"] .  " | " . $result['typetask'] . " |  " . $result["naam"] . "
                        </button>
                      </h2>
                      <div id='flush-collapseOne' class='accordion-collapse collapse' aria-labelledby='flush-headingOne' data-bs-parent='#accordionFlushExample".$result['vak']."'>
                        <div class='accordion-body'>  " . $result['extra'] . " </div>
                        <div class='accordion-footer' style='margin-bottom: 10px;'> tegen " . $result['date'] . " </div>
                      </div>
                    </div>
                  </div>
                  <br>
                    ";


                    //     echo "
                    //     <div class='taken'>
                    //     <div class='card' style='max-width: 80%px; margin: 20px;'>
                    //         <p style='text-align:center;'></p>
                    //         <div class='container'>
                    //             <p class='header' style='color: #474747;'>".$result["vak"]."</p>
                    //             <p class='header' style='color: #474747;'>" . $result['typetask'] . "</p>
                    //             <p class='header' style='color: #474747;'>" . $result['C'] . "</p>
                    //             <p class='header' style='color: #474747;'>" . $result['extra'] . "</p>
                    //             <p class='header' style='color: #474747;'>tegen " . $result['date'] . "</p>
                    //             <p>&nbsp;</p>
                    //         </div>
                    //     </div>
                    // </div> ";
                }
            }
        }
        ?>





        <!-- <div class="taken">
            <div class="card" style="max-width: 80%px; margin: 20px;">
                <p style="text-align:center;"></p>
                <div class="container">
                    <h2 class="header" style="color: #474747;">Wiskunde</h2>
                    <p class="header" style="color: #474747;">taak</p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div> -->


    </div>



</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</html>