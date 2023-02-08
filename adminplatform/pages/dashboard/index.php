<?php
session_start();
include("../../utils/config.php");
include("../../utils/functions.php");
$user_data = check_login($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        if ($user_data['Rol'] == "admin") {
            echo "admin panel";
        } else if ($user_data['Rol'] == "leerkracht") {
            echo "teacher panel";
        } else {
            echo "School System";
        }
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style type="text/css">
        body {
            background-color: #383838;
        }
        .cards {
            display: flex;
            justify-content: center;
        }
        .cards2 {
            display: flex;
            justify-content: center;
        }
        a {
            text-decoration: none;
        }
        .box {
            margin: 0 auto;
            background-color: #474747;
            width: 350px;
            height: 150px;
            display: flex;
            justify-content: center;
            border-radius: 15px;
        }
        .box .text {

            margin: auto;
            width: 50%;
            padding: 10px;

        }
        .stats {
            margin: 20px;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php
                if ($user_data['Rol'] == "admin") {
                    echo "<h3>admin panel</h3>";
                } else if ($user_data['Rol'] == "leerkracht") {
                    echo "<h3>teacher panel</h3>";
                } else {
                    echo "<h3>School System</h3>";
                
                }
                ?>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <?php
                    if ($user_data['Rol'] == "admin") {
                        echo "<h5 class='offcanvas-title' id='offcanvasDarkNavbarLabel'>admin panel</h5>";
                    } else if ($user_data['Rol'] == "leerkracht") {
                        echo "<h5 class='offcanvas-title' id='offcanvasDarkNavbarLabel'>teacher panel</h5>";
                    } else {
                        echo "<h5 class='offcanvas-title' id='offcanvasDarkNavbarLabel'>School System</h5>";
                    }
                    ?>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../leerlingen/view/">leerlingen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../lokalen/view/">lokalen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../users/view/">users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vervanging/view/">vervanging</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../taken/view/">taken</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../leerkrachten/view/">leerkrachten</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../klassen/view/">klassen</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <?php echo " <li><a class='dropdown-item' href='../../login system/edit.php?id=".$user_data["id"]."'>Settings</a></li>" ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../../login system/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="body" style="margin-top: 80px; text-align: center; color: white;">
        <h1 style="margin-bottom: 40px;">Dashboard</h1>
       
        <?php
        $query = "SELECT id FROM leerlingen ORDER BY id";
        $query_run = mysqli_query($con, $query);
        $row = mysqli_num_rows($query_run);

        $query1 = "SELECT id FROM users ORDER BY id";
        $query_run1 = mysqli_query($con, $query1);
        $row1 = mysqli_num_rows($query_run1);

        $query11 = "SELECT id FROM klassen ORDER BY id";
        $query_run11 = mysqli_query($con, $query11);
        $row11 = mysqli_num_rows($query_run11);

        $query111 = "SELECT id FROM vervanging ORDER BY id";
        $query_run111 = mysqli_query($con, $query111);
        $row111 = mysqli_num_rows($query_run111);

        $query1111 = "SELECT id FROM taak ORDER BY id";
        $query_run1111 = mysqli_query($con, $query1111);
        $row1111 = mysqli_num_rows($query_run1111);

        $query11110 = "SELECT id FROM leerkracht ORDER BY id";
        $query_run11110 = mysqli_query($con, $query11110);
        $row11110 = mysqli_num_rows($query_run11110);
        ?>
        
        <div class="cards">
            <a href="../leerlingen/view/">
                <div class="card text-bg-danger mb-3" style="min-width: 14rem;">
                    <div class="card-body">
                        <h5 class="card-title">Leerlingen</h5>
                        <p class="card-text"><?php echo '<h1>' . $row . '</h1>'; ?></p>
                    </div>
                </div>
            </a>

            <a href="../users/view/">
                <div class="card text-bg-success mb-3" style="min-width: 14rem; margin-left: 15px">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text"><?php echo '<h1>' . $row1 . '</h1>'; ?></p>
                    </div>
                </div>
            </a>

            <a href="../lokalen/view/">
                <div class="card text-bg-warning mb-3" style="min-width: 14rem; margin-left: 15px">
                    <div class="card-body">
                        <h5 class="card-title">Lokalen</h5>
                        <p class="card-text"><?php echo '<h1>' . $row11 . '</h1>'; ?></p>
                    </div>
                </div>
            </a>

        </div>
        <div class="cards2">
            <a href="../vervanging/view/">
                <div class="card text-bg-info mb-3" style="min-width: 14rem;">
                    <div class="card-body">
                        <h5 class="card-title">vervangingen</h5>
                        <p class="card-text"><?php echo '<h1>' . $row111 . '</h1>'; ?></p>
                    </div>
                </div>
            </a>
            <a href="../taken/view/">
                <div class="card text-bg-danger mb-3" style="min-width: 14rem; margin-left: 15px;">
                    <div class="card-body">
                        <h5 class="card-title">taken</h5>
                        <p class="card-text"><?php echo '<h1>' . $row1111 . '</h1>'; ?></p>
                    </div>
                </div>
            </a>
            <a href="../leerkrachten/view/">
                <div class="card text-bg-info mb-3" style="min-width: 14rem; margin-left: 15px;">
                    <div class="card-body">
                        <h5 class="card-title">leerkrachten</h5>
                        <p class="card-text"><?php echo '<h1>' . $row11110 . '</h1>'; ?></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
</html>