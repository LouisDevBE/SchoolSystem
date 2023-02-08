<?php 

session_start();

	include("./utils/config.php");
	include("./utils/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: ./pages/dashboard/");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>
<!DOCTYPE html>
<!-- === Coding by Louis dhaen | www.codinglabweb.com === -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <!-- ===== CSS ===== -->
  <style type="text/css">
    /* ===== Google Font Import - Poformsins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #4070f4;
    }

    .container {
      position: relative;
      max-width: 430px;
      width: 100%;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin: 0 20px;
    }

    .container .forms {
      display: flex;
      align-items: center;
      height: 440px;
      width: 200%;
      transition: height 0.2s ease;
    }


    .container .form {
      width: 50%;
      padding: 30px;
      background-color: #fff;
      transition: margin-left 0.18s ease;
    }

    .container.active .login {
      margin-left: -50%;
      opacity: 0;
      transition: margin-left 0.18s ease, opacity 0.15s ease;
    }

    .container .signup {
      opacity: 0;
      transition: opacity 0.09s ease;
    }

    .container.active .signup {
      opacity: 1;
      transition: opacity 0.2s ease;
    }

    .container.active .forms {
      height: 600px;
    }

    .container .form .title {
      position: relative;
      font-size: 27px;
      font-weight: 600;
    }

    .form .title::before {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      background-color: #4070f4;
      border-radius: 25px;
    }

    .form .input-field {
      position: relative;
      height: 50px;
      width: 100%;
      margin-top: 30px;
    }

    .input-field input {
      position: absolute;
      height: 100%;
      width: 100%;
      padding: 0 35px;
      border: none;
      outline: none;
      font-size: 16px;
      border-bottom: 2px solid #ccc;
      border-top: 2px solid transparent;
      transition: all 0.2s ease;
    }

    .input-field input:is(:focus, :valid) {
      border-bottom-color: #4070f4;
    }

    .input-field i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      font-size: 23px;
      transition: all 0.2s ease;
    }

    .input-field input:is(:focus, :valid)~i {
      color: #4070f4;
    }

    .input-field i.icon {
      left: 0;
    }

    .input-field i.showHidePw {
      right: 0;
      cursor: pointer;
      padding: 10px;
    }

    .form .checkbox-text {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 20px;
    }

    .checkbox-text .checkbox-content {
      display: flex;
      align-items: center;
    }

    .checkbox-content input {
      margin-right: 10px;
      accent-color: #4070f4;
    }

    .form .text {
      color: #333;
      font-size: 14px;
    }

    .form a.text {
      color: #4070f4;
      text-decoration: none;
    }

    .form a:hover {
      text-decoration: underline;
    }

    .form .button {
      margin-top: 35px;
    }

    .form .button input {
      border: none;
      color: #fff;
      font-size: 17px;
      font-weight: 500;
      letter-spacing: 1px;
      border-radius: 6px;
      background-color: #4070f4;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .button input:hover {
      background-color: #265df2;
    }

    .form .login-signup {
      margin-top: 30px;
      text-align: center;
    }
  </style>

  <!--<title>Login & Registration Form</title>-->
</head>

<body>

  <div class="container">
    <div class="forms">
      <div class="form login">
        <span class="title">Leerkrachten</span>

        <form  method="POST">
          <div class="input-field">
            <input type="text" placeholder="Uw gebruikersnaam" name="user_name" required>
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">
            <input type="password" class="password" name="password" placeholder="Uw wachtwoord" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

         

          <div class="input-field button">
            <input type="submit" value="Login">
          </div>

          <div class="login-signup">
                    <span class="text">Bent u een leerling
                        <a href="../leerlingenplatform/" class="text signup-link">ga naar hier</a>
                    </span>
                </div>
        </form>

      </div>

    </div>
  </div>

  
</body>
    <script type="text/JavaScript">
      const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })



    </script>
</html>