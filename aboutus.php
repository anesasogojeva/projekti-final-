<?php
session_start();
include("database.php");
if (isset($_POST["addMessagge"])) {


  $messagge = mysqli_real_escape_string($conn, $_POST["message"]);
  $numri = 6;
  $id_perdoruesi = (int) $_SESSION["id"];
  $insertQuery = "INSERT INTO mesazhet(messagge, id_perdoruesi) VALUES ('$messagge','$id_perdoruesi');";

  if ($conn->query($insertQuery)) {
    $res = [
      'status' => 200,
      'message' => ('Mesazhi shkoj')
    ];
    echo json_encode($res);
    return;
  } else {
    $res = [
      'status' => 500,
      'message' => ('Ndodhi nje gabim mesazhi nuk shkoj')
    ];
    echo json_encode($res);
    return;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pinch of yum| About us</title>
  <link rel="stylesheet" href="aboutuss.css">

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



  <div class="pjesa1">
    <img class="f"
      src="https://images.squarespace-cdn.com/content/53b599ebe4b08a2784696956/1468195728498-2IPJKO22A5FPQHK860QH/CEO-portrait-corporate-headshot-15.jpg?format=1000w&content-type=image%2Fjpeg"
      alt="foto e chefes">
    <div class="d">
      <h1>About US</h1>
      <br>
      <h4>HI, MY NAME IS
        Lindsay!</h4>
      <br>
      <p> And Pinch of Yum is my little corner of the internet!</p>
      <br>
      <p>I'm the voice, author, and creator behind Pinch of Yum. What started as a casual hobby over 10 years ago in
        2010 while I was working as a fourth grade teacher has now grown into a full-blown business (!!) that reaches
        millions of people with fun recipes each month,
        with content that has been featured on The Kitchn, CNN, Refinery29, Brit + Co, POPSUGAR, Huffington Post, The
        Everymom, PureWow, and more.</p>
      <br>
      <p>I live in Saint Paul, MN with my husband Bjork and our dog Sage. My favorite things in life are a big plate of
        pad Thai, sunny days, and going to the dog park.</p>
    </div>
  </div>

  <div class="body">
    <div class="containeri">
      <div class="item">
        <div class="contact">
          <div class="firsttext">Lets get in touch</div>
          <img src="https://equicard.in/assets/web-assets/img/share-card.png" alt="" class="image">
          <div class="social-links">
            <span class="second-text">Connect with us:</span>
            <ul class="social-media">
              <li><a href=""><i class='bx bxl-facebook-square'></i></a></li>
              <li><a href=""><i class='bx bxl-twitter'></i></a></li>
              <li><a href=""><i class='bx bxl-youtube'></i></a></li>
              <li><a href=""><i class='bx bxl-instagram'></i></a></li>
            </ul>
          </div>
        </div>

        <div class="submit-form">
          <h4 class="third-text">Contact us</h4>
          <!--
          <form action="aboutus.php" method="Post" id="addMessagge" onsubmit="submitForm.call(this, event)">
            
            <div class="input-box">
              <input type="text" id="name" class="input" required>
              <label for="name">Name</label>
            </div>

            <div class="input-box">
              <input type="email" class="input" id="email" required>
              <label for="email">Email</label>
            </div>

            <div class="input-box">
              <input type="tel" class="input" required>
              <label for="tel">Phone</label>
            </div>

            <div class="input-box">
              <textarea name="" class="input" id="message" cols="25" rows="10" required></textarea>
              <label for="message">Message</label>
            </div>
          --comment-- <input type="submit" class="btn" style="background-color: white;" value="Submit1">  
           
            <button type="submit" class="btn btn-primary">ruaj</button>
</form>
            -->

          <div id="errorMessage" class="alert alert-warning d-none"></div>
          <form id="addMessagge" action="aboutus.php" method="post">
            <div class="modal-body">

              <div class="input-box">
                <textarea name="message" class="input" id="message" cols="25" rows="10" required></textarea>
                <label for="message">Message</label>
              </div>
            </div>

            <div class="modal-footer">

              <button type="submit" class="btn">Sent</button>
            </div>
          </form>





        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


  <script>
    $(document).on('submit', '#addMessagge', function (e) {
      e.preventDefault();


      var formData = new FormData(this);
      formData.append("addMessagge", true);

      $.ajax({
        type: "POST",
        url: "aboutus.php",

        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          var res = jQuery.parseJSON(response);
          if (res.status == 500) {
            $('#errorMessage').removeClass('d-none');
            $('#errorMessage').text(res.message);
          } else if (res.status == 200) {
            $('#errorMessage').addClass('d-none');
            $('#message').val('');
          }
        }
      });
    });
  </script>



  <script>
    function mOver(obj) {
      document.getElementById("f").style.color = "rgb(119, 27, 97)";
    }

    function mOut(element) {
      if (element && element.style) {
        element.style.backgroundColor = "white";
      }
    }
    function submitForm(event) {
      event.preventDefault();
      var email = document.getElementById('email').value;
      if (!isValidEmail(email)) {
        window.alert("Please enter a valid email address.");
        return;
      }

      window.alert("Form submitted!\n\n" +
        "Name: " + document.getElementById('name').value + "\n" +
        "Email: " + email + "\n" +
        "Phone: " + document.querySelector('.input-box input[type="tel"]').value + "\n" +
        "Message: " + document.getElementById('message').value);
    }

    function isValidEmail(email) {

      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  </script>

  <div class="co">
    <div class="card1"><a href="./home.php#recipesmeal">Meal Recipes</a></div>
    <div class="card2"><a href="./home.php#recipees">Healthy recipes</a></div>
    <div class="card3"><a href="./blog.php#latest">Recently added</a></div>
    <div class="card4"><a href="./home.php#recipesvegetarian">Vegetarian Recipes</a></div>
    <div class="card5"><a href="./blog.php#top">Top Recipe</a></div>
  </div>

  <div class="parasection">
    <div class="s">
      <h1>OUR TEAM</h1>
      <p>We have an entire team of geniuses behind us at Pinch of Yum who are experts in a little bit of everything –
        from customer service, to social media, to videography, to assisting with recipe shoots. They are EVERYTHING.
      </p>
    </div>
  </div>

  <?php
  include("database.php");
  $sqlquery = "SELECT * FROM stafi ;";
  $result = $conn->query($sqlquery);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      ?>
      <div class="parasection">
        <div class="section2"
          style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $row['b_url']?>');">
          <div class="hero">
            <article>
              <h1><?php echo $row['header']?></h1>
              <img src="<?php echo $row['i_url']?>" alt="Me">
              <h5><?php echo $row['roli']?></h5>
              <p> <?php echo $row['paragrafi']?></p>
            </article>
          </div>
        </div>
      </div>
      <?php
    }
  }
  ?>

<!--
  <div class="parasection">
    <div class="section2"
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://d2hg8ctx8thzji.cloudfront.net/expertopedia.net/wp-content/uploads/2020/09/CookingmadeeasywithWilliamsSonomarecipes.jpg');">
      <div class="hero">
        <article>
          <h1>about arta</h1>
          <img src="https://www.carvermostardi.com/cmos/wp-content/uploads/2018/05/professional_headshots_tampa_011.jpg"
            alt="Me">
          <h5>Shefja 2</h5>
          <p>Arta is the Communications Manager at Pinch of Yum. She manages much of the day-to-day communication with
            readers and brands – on and off the blog.
            You can find her answering recipe questions on posts, helping readers with ebook purchases,
            coordinating partnership details with brands, and other various behind-the-scenes projects. Arta lives in
            Minnesota with her husband.</p>
        </article>
      </div>
    </div>
  </div>


  <div class="parasection">
    <div class="section2"
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://d2hg8ctx8thzji.cloudfront.net/expertopedia.net/wp-content/uploads/2020/09/CookingmadeeasywithWilliamsSonomarecipes.jpg');">
      <div class="hero">
        <article>
          <h1>About Ramsay</h1>
          <img src="https://www.2luxury2.com/wp-content/uploads/2022/11/las-vegas-harras-gordon-2022.jpg" alt="Me">
          <h5>Chief Tech</h5>
          <p> Gordon Ramsay is the chief tech consultant / business advisor / taste tester at Pinch of Yum. Day-to-day,
            you’ll mostly see him around
            7Food Blogger Pro, as well as hosting the Food Blogger Pro podcast. Ramsay is also husband to Lindsay,
            dad to Solvi, and lives in Minnesota with their dog Sage. He can usually be found with a coffee in hand.</p>
        </article>
      </div>
    </div>
  </div>


-->
  <fieldset class="b"></fieldset>

  <fieldset style="border-color: gray; background-color: rgb(241, 241, 241);">
    <footer>
      <div class="parafooter">
        <div class="pinch">
          <p>PINCH OF YUM</p><br>
          <a href="./home.php">Home</a><br>
          <a href="./aboutus.php">About</a><br>
          <a href="./blog.php">Blog</a><br>
          <a href="./home.php#recipees">Recipes</a><br>
        </div>
        <div class="pinch2">
          <p>FOOD AND RECIPES</p><br>
          <a href=""></a><br>
          <a href=""></a><br>
          <a href=""></a><br>
          <a href=""></a><br>
        </div>
        <!-- <form class="logini">
          <p id="parag">Sign up for email updates</p>
          <label for="firstName"></label>
          <input class="in" type="text" name="first name" placeholder="First Name" required id="firstName">
          <label for="emaili"></label>
          <input class="in" type="email" name="email" placeholder="Email" required id="emaili">
          <button type="button" id="butoni" onclick="validateEmail()"><b>GO</b></button>

        </form> -->

      </div>
      </div>
      <div class="ft">
        <div class="social-links">
          <ul class="social-media">
            <li><a href=""><i class='bx bxl-facebook-square'></i></a></li>
            <li><a href=""><i class='bx bxl-twitter'></i></a></li>
            <li><a href=""><i class='bx bxl-youtube'></i></a></li>
            <li><a href=""><i class='bx bxl-instagram'></i></a></li>
          </ul>
        </div>
        <p style="margin-left: 20px;">© 2023 Pinch of Yum. All Rights Reserved. <br>A Raptive Partner Site.</p>
      </div>
      <p style="color: gray; text-align: center;">Privacy PolicyTerms</p>
    </footer>
  </fieldset>

  <script>
    function validateEmail() {
      const emailInput = document.getElementById('emaili');
      const emailValue = emailInput.value;

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailRegex.test(emailValue)) {
        alert('Please enter a valid email address.');
        emailInput.focus();
      } else {
        alert('Email submitted successfully!');
      }
    }
  </script>

</body>

</html>