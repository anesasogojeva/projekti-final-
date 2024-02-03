<?php
session_start();
if (isset($_SESSION["admin"])) {
    header("Location: zadduser.php");
} else if (isset($_SESSION["logged"])) {
    header("Location: home.php");
}
?>
<?php
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["psw"];
    // Do not hash the password here; it should be hashed before comparing with the database
}

require_once("database.php");

$sql = "SELECT password,roli,id FROM perdoruesit WHERE email='$email'";
$record = $conn->query($sql);

if ($record->num_rows > 0) {
    while ($row = $record->fetch_assoc()) {

        // Hash the user-entered password and compare with the hashed password in the database
        if (password_verify($password, $row["password"])) {


            session_start();
            $_SESSION["logged"] = ["yes"];
            /* Ading messagges*/  
            $_SESSION["id"] = $row["id"];          
            if ($row["roli"] == "admin") {
                $_SESSION["admin"] = ["yes"];
                header("Location: zadduser.php");
                exit();       
            }
          
            header("Location: home.php");
            exit();



        } else {

            echo "<div class='alert alert-danger'>Nuk u lidh</div>";
        }

    }
} else {
    if (isset($_POST["submit"])) {
        echo "<div class='alert alert-danger'>There are no such emails registered</div>";
    }

}

$conn->close(); // Close the database connection
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <head>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="stylehhome.css">
        <title>Sign in</title>
        <style>
            body {
                background-color: rgb(233, 233, 233);
                font-family: 'Ubuntu', sans-serif;
            }
            nav {
                background-color: #f8f9fa;
                padding: 10px 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            nav h1 {
                font-family: 'Georgia', 'Times New Roman', Times, serif;
                font-style: oblique;
                color: #e06767;
                font-size: 40px;
            }

            nav span {
                color: grey;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            nav ul {
                list-style: none;
                display: flex;
                margin-right: 20px;
            }

            nav ul li {
                margin: 0 15px;
            }

            nav a {
                text-decoration: none;
                color: #33333397;
                font-size: 16px;
            }

            .burger {
                display: none;
                flex-direction: column;
                cursor: pointer;
                margin-right: 20px;
            }

            .line1, .line2, .line3 {
                width: 25px;
                height: 3px;
                background-color: #333;
                margin: 4px 0;
            }
            .main {
                background-color: #FFFFFF;
                width: 400px;
                height: 400px;
                margin: 7em auto;
                border-radius: 1.5em;
                box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
            }

            .sign {
                padding-top: 40px;
                color: #796f7e;
                font-family: 'Ubuntu', sans-serif;
                font-weight: bold;
                font-size: 23px;
            }

            .un {
                width: 76%;
                color: rgb(38, 50, 56);
                font-weight: 700;
                font-size: 14px;
                letter-spacing: 1px;
                background: rgba(136, 126, 126, 0.04);
                padding: 10px 20px;
                border: none;
                border-radius: 20px;
                outline: none;
                box-sizing: border-box;
                border: 2px solid rgba(0, 0, 0, 0.02);
                margin-bottom: 50px;
                margin-left: 46px;
                text-align: center;
                margin-bottom: 27px;
                font-family: 'Ubuntu', sans-serif;
            }

            form.form1 {
                padding-top: 40px;
            }

            .pass {
                width: 76%;
                color: rgb(38, 50, 56);
                font-weight: 700;
                font-size: 14px;
                letter-spacing: 1px;
                background: rgba(136, 126, 126, 0.04);
                padding: 10px 20px;
                border: none;
                border-radius: 20px;
                outline: none;
                box-sizing: border-box;
                border: 2px solid rgba(0, 0, 0, 0.02);
                margin-bottom: 50px;
                margin-left: 46px;
                text-align: center;
                margin-bottom: 27px;
                font-family: 'Ubuntu', sans-serif;
            }


            .un:focus,
            .pass:focus {
                border: 2px solid rgba(0, 0, 0, 0.18);

            }


            .forgot {
                text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
                color: #E1BEE7;
                padding-top: 15px;
            }

            .buttons {
                width: 100px;
                display: flex;
                padding-left: 20px;
            }

            .buttons .submit {
                cursor: pointer;
                border-radius: 5em;
                color: #fff;
                background-color: #796f7e;
                border: 0;
                padding: 10px 50px;
                font-family: 'Ubuntu', sans-serif;
                margin-left: 25%;
                font-size: 12px;
                box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
            }
            @media(max-width:900px){
        nav h1 {
          margin-left: 0%;
        }
      .navb {
        flex-direction: column;
        align-items: flex-start;
      }
        .n {
          display: none;
          flex-direction: column;
          width: 100%;
          background-color: #f8f9fa;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
      
        .n.show {
          display: flex;
        }
      
        .burger {
          display: flex;
          flex-direction: column;
        }
      
        nav ul {
          flex-direction: column;
          text-align: left;
        }
      
        nav ul li {
          margin: 10px 20px;
        }
    }
            @media (max-width: 600px) {}

            .main {
                border-radius: 0px;
            }
        </style>

    </head>
    <nav class="navb"><h1> pinch <span>of </span> yum</h1>
    <div class="burger" onclick="toggleMenu()">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
  </div>
        
          <ul  class="n" id="n">
            <li >
              <a class="nav-link" href="./home.php">Home</a>
            </li>
            <li >
              <a class="nav-link" href="./aboutus.php">About</a>
            </li>
            <li >
              <a class="nav-link" href="./blog.php">Blog</a>
            </li>
            <li >
              <a class="nav-link" href="./home.php#recipees">Recipes</a>
            </li>
          </ul>
    </nav> <script>
      function toggleMenu() {
          const navLinks = document.querySelector('.n');
          navLinks.classList.toggle('show');
      }
  </script>

    <div class="main">
        <p class="sign" align="center">Sign in</p>

        <form method="post" class="form1" action="<?php echo htmlspecialchars($_SESSION["SELF"]); ?>"
            onsubmit="return validation()">

            <input class="un" id="email" name="email" type="email" align="center" placeholder="email">
            <span id="mail" class="text-danger font-weight-bold"></span>

            <input class="pass" id="psw" name="psw" type="password" align="center" placeholder="Password">
            <span id="pass" class="text-danger font-weight-bold"></span>

            <div class="buttons">
                <a class="submit" align="center"><button type="submit" name="submit" value="login"
                        style="background-color: #796f7e; border: none; color: white;">Login</button></a>

                <!--<input type="submit" name="submit" value="login">-->

                <a href="./register.html" class="submit" align="center">Register</a>
            </div>



            <p class="forgot" align="center"><a href="#">Forgot Password?</p>
        </form>

    </div>
    <script>
        function validation() {
            var email = document.getElementById('email').value;
            var psw = document.getElementById('psw').value;


            var emailcheck = /.*@[a-z0-9.-]*/i;
            // var pswcheck = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,20})$/;
            var pswcheck = /^[A-Za-z0-9. ]{3,20}$/;

            if (emailcheck.test(email)) {
                document.getElementById('mail').innerHTML = "";
            } else {
                document.getElementById('mail').innerHTML = "Invalid email";
                return false;
            }
            if (pswcheck.test(psw)) {
                document.getElementById('pass').innerHTML = "";
            } else {
                document.getElementById('pass').innerHTML = "Password is too short";
                return false;
            }

        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <p></p>






</body>

</html>