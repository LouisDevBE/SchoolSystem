<!DOCTYPE html>
<html>


<head>
    <title>School system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7785602405.js" crossorigin="anonymous"></script>
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
            height: 60px;
            background-color: #2c3e50;
            text-align: center;
            font-size: 28px;
            padding-top: 25px;
            color: white;
            height: 80px;
            padding: 15px;
        }

        footer {
            width: 100%;
            height: 65px;
            bottom: 0;
            background-color: #2c3e50;
            text-align: center;
            font-size: 14px;
            padding-top: 25px;
            color: white;
            position: fixed;
            bottom: 0;
            margin-top: 265px;
        }

        header a {
            text-align: center;
            font-size: 22px;
            color: white;
            text-decoration: none;
        }

        i {
            float: right;
        }



        .heading {
            background-color: #FFFF;
        }

        .cards {

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

        }

        .card {
            background-color: #198754;
            color: white;
            margin: 10px;
        }

        .card a {
            color: white;
            text-decoration: none;
        }

        .card:hover {
            background-color: #1d9f63;
            /* #1b915a */
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>School System</header>

    <div class="cards">
        <div class="card">

            <a href="./leerlingenplatform/">
                <div style="  min-width: 24rem; max-width: 25rem; margin-left: 15px;">
                    <div class="card-body">
                        <h5 class="card-title">Leerlingen <i class="fa-solid fa-arrow-right-to-bracket"></i></h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="card">
            <a href="./adminplatform/">
                <div class="" style="min-width: 24rem; max-width: 25rem; margin-left: 15px;">
                    <div class="card-body">
                        <h5 class="card-title">leerkrachten <i class="fa-solid fa-arrow-right-to-bracket"></i></h5>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <footer>
        <span>2023 - 2024 &copy Louis D'Haen | LouisDev </span>
    </footer>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</html>