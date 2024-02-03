<?php


session_start();
if(isset($_SESSION["logged"])){  
header("Location: home.php");
}

?>

<?php




if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $psw_repeat = $_POST["psw_repeat"];
    $psw_hash = password_hash($psw, PASSWORD_DEFAULT);


}


$errors = array();

// kontrollon a jane te gjitha kolonat e plotesuara
if (empty($fname) || empty($lname) || empty($email) || empty($psw) || empty($psw_repeat)) {
    array_push($errors, "Ploteso secilen kolone");
}

// kontrollon emailin    
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Shkruaj emailin mire");
}

// kontrollon emailin dhe a perkojne emailat
if (strlen($psw) < 8) {
    array_push($errors, "Passwordi duhet te kete se paku 8 simbole");
}

if ($psw != $psw_repeat) {
    array_push($errors, "Shkruani passwordin e njejte");
}


require_once("database.php");



$emailQuery = "Select id FROM perdoruesit where email='$email';";
$result = $conn->query($emailQuery);

if ($result->num_rows > 0) {
    array_push($errors, "Emaili eshte ne perdorim");
}


if (count($errors) > 0) {

    if (isset($_POST["submit"])) {
    foreach ($errors as $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
}

} else {



    require_once("database.php");

    $sqlquery = ("INSERT INTO perdoruesit(emri, mbiemri, email, password, roli) VALUES ('$fname','$lname','$email','$psw_hash','perdorues');");

    if ($conn->query($sqlquery)) {

       echo "<div class='alert alert-success'> U regjistrua me sukses</div>";

        session_start();         
        // me windows location me ja ndrru venin
        header("Location: login.php");
        die();


    } else {

        echo "<div class='alert alert-danger'> Ndodhi nje gabim ne regjistrim</div>";
    }

    $conn->close();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--
    <link rel="stylesheet" href="css/style.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="stylehhome.css">
-->
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
        body {
            background-color: rgb(233, 233, 233);
            font-family: 'Ubuntu', sans-serif;
        }

        .navbar .hederi h1 {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-style: oblique;
            color: rgb(224, 103, 103);
            margin-left: 30px;
        }

        .navbar .hederi span {
            color: grey;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }


        .main {
            background-color: #FFFFFF;
            width: 400px;
            margin: 7em auto;
            border-radius: 1.5em;
            box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
            padding-bottom: 40px;
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

        .submit {
            cursor: pointer;
            border-radius: 5em;
            color: #fff;
            background-color: #796f7e;
            border: 0;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 10px;
            padding-top: 10px;
            font-family: 'Ubuntu', sans-serif;
            margin-left: 35%;
            font-size: 13px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
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

        .main .form1 .text-danger {
            color: darkred;
            font-size: 15px;
            padding: 33px;
        }

        @media (max-width: 600px) {}

        .main {
            border-radius: 0px;
        }

        .custom-submit {
        background-color: #796f7e;
        border: none;
        color: white;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
        text-decoration: none; /* Add this line to remove underline for anchor tags */
        display: inline-block; /* Add this line to ensure consistent spacing */
        text-align: center; /* Center text within the button */
        margin-right: auto; /* Add margin to separate buttons */
        margin-left: auto; /* Add margin to separate buttons */
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

    </style>
</head>

<body>

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
        <form method="post" action="register.php" class="form1" onsubmit="return validation()">

            <input class="un" id="fname" name="fname" type="text" align="center" placeholder="Name">
            <span id="fnameerror" class="text-danger font-weight-bold"></span>

            <input class="un" id="lname" name="lname" type="text" align="center" placeholder="Surname">
            <span id="fnameerror" class="text-danger font-weight-bold"></span>

            <input class="un" id="email" name="email" type="email" align="center" placeholder="email">
            <span id="mail" class="text-danger font-weight-bold"></span>

            <input class="pass" id="psw" name="psw" type="password" align="center" placeholder="Password">
            <span id="pass" class="text-danger font-weight-bold"></span>

            <input class="pass" id="psw_repeat" name="psw_repeat" type="password" align="center"
                placeholder="Comfirm Password">
            <span id="conpass" class="text-danger font-weight-bold"></span>
            <div class="buttons">
            
              <a class="submit" align="center">
                <input type="submit" name="submit" class="custom-submit"  value="                      Register                      "> 
                </a>
            </div>
        </form>

    </div>
    
        <script>
        
        function validation() {
                var fname = document.getElementById('fname').value;
                var lname = document.getElementById('lname').value;
                var email = document.getElementById('email').value;
                var psw = document.getElementById('psw').value;
                var psw_repeat = document.getElementById('psw_repeat').value;

                // name pa karaktere
              //  var fnamecheck = /^[A-Za-z. ]{3,20}$/;
                var fnamecheck = /^[A-Za-z0-9. ]{3,20}$/;
              //var lnamecheck = /^[A-Za-z. ]{3,20}$/;
              var lnamecheck = /^[A-Za-z0-9. ]{3,20}$/;
                var emailcheck = /.*@[a-z0-9.-]*/i;
               
               //regular password limitations
               // var pswcheck = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,20})$/;
               
               // softer password limitations which make checking easier
               var pswcheck = /^[A-Za-z0-9. ]{3,20}$/;
                
                if (fnamecheck.test(fname)) {
                    document.getElementById('fnameerror').innerHTML = "";
                } else {
                    document.getElementById('fnameerror').innerHTML = "Invalid name";
                    return false;
                }
                if (emailcheck.test(email)) {
                    document.getElementById('mail').innerHTML = "";
                } else {
                    document.getElementById('mail').innerHTML = "**Email-id is invalid";
                    return false;
                }
                if (pswcheck.test(psw)) {
                    document.getElementById('pass').innerHTML = "";
                } else {
                    document.getElementById('pass').innerHTML = "Password is too short";
                    return false;
                }
                if (psw.match(psw_repeat)) {
                    document.getElementById('conpass').innerHTML = "";
                } else {
                    document.getElementById('conpass').innerHTML = "Password doesnot match";
                    return false;
                }
            }
            
        </script>
        



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


   

    <?php



    ?>
</body>