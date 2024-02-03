<?php
session_start();
if (!isset($_SESSION["logged"])) {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="homee.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <title>Pinch of yum | home</title>
  <link rel="icon" href="c:\Users\sara\Pictures\Screenshots\Screenshot 2023-11-26 223231.png" type="image/x-icon">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
            <form method="post" action="home.php">
            <li class="nav-link">
              <button type="submit" name="logout" class="btnbutoni">Logout</button>
            </li>
          </form>
          <?php
          if (isset($_SESSION["admin"])) {
            // Display the "Admin" link only if the user is an admin
            echo '<li class="nav-item">';
            echo '<a class="nav-link" id="adminpage" href="./zadduser.php">Admin</a>';
            echo '</li>';
          }
          ?>
          </ul>
    </nav> <script>
      function toggleMenu() {
          const navLinks = document.querySelector('.n');
          navLinks.classList.toggle('show');
      }
  </script>


  <?php
  if (isset($_POST["logout"])) {
    session_start();
    session_destroy();
    header("Location: login.php");
  }
  ?>




  <div class="a">
    <img class="f"
      src="https://img.buzzfeed.com/buzzfeed-static/static/2020-12/23/17/asset/20f9b6998076/sub-buzz-12209-1608745851-11.jpg"
      alt="food">
    <div class="d">
      <h1>Welcome to Pinch of Yum</h1>
      <br>
      <h4> LET’S TALK FOOD</h4>
      <br>
      <p>Well, we hope that’s why you’re here. Our recipes are designed for real, actual, every day life, and we try to
        focus on real foods and healthy recipes (which honestly means a lot of different things to us, including the
        perfect chocolate chip cookie and cheese on cheese on cheese, because health is all about balance, right?).</p>
      <br>
      <p>This is the place to find those recipes — everything from our most popular, to meal prep, to Instant Pot
        recipes, or if you just, like, have some sad greens in your fridge to use up and you need some inspiration.</p>
      <br>
      <p style="color: rgb(104, 103, 103);font-size: 19px; ">You’re here! Have fun. We hope you find something (many
        things) you love.</p>
    </div>
  </div>

  <div class="purple">
    <h1>Search our recipes</h1>
    <input type="search" name="search"> <br>
    <p>or browse our favorite below</p>
  </div>

  <div class="back" id="recipees">
    <h2
      style="text-align: center; color: rgb(119, 27, 97); font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
      Healthy Recipes</h2>

    <div class="healthy">


      <?php
      include("database.php");
      $sqlquery = "SELECT * FROM recepies ;";
      $result = $conn->query($sqlquery);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="soup">
            <img style="width: 200px;height: 300px;" src="<?php echo $row['img']; ?>" alt="">
            <div class="teksti">
              <h2>
                <?php echo $row['title']; ?>
              </h2>
              <p>
                <?php echo $row['p1']; ?>
              </p>
              <br>
              <a href="./recipes.php#<?php echo $row['id']; ?>-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
            </div>
          </div>
          <?php
        }
      }
      ?>











<!--
      <div class="soup">
        <img style="width: 200px;height: 300px;"
          src="https://i.pinimg.com/originals/a2/f4/0a/a2f40a197ca241a810613674bc8a757f.jpg" alt="">
        <div class="teksti">
          <h2>The Best Detox Crockpot Lentil Soup</h2>
          <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic,olive oil, squash, and
            LENTILS! Super healthy and easy to make.</p>
          <br>
          <a href="./recipes.html#1-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

      <div class="soup">
        <img style="width: 200px;height: 300px;" src="https://pinchofyum.com/wp-content/uploads/green-sauce-4.jpg"
          alt="">
        <div class="teksti">
          <h2>5 Minute Magic Green Sauce with avo</h2>
          <p>5 Minute Magic Green Sauce with Avo – SO AWESOME. Made with easy ingredients like avocado, olive oil,
            cilantro, lime, garlic, and parsley! Vegan.</p>
          <br>
          <a href="./recipes.html#2-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

      <div class="soup">
        <img style="width: 200px;height: 300px;"
          src="https://pinchofyum.com/wp-content/uploads/Sweet-Potato-Curry-3-2.jpg" alt="">
        <div class="teksti">
          <h2>Creamy Thai Sweet Potato Curry dish</h2>
          <p>Creamy Thai Sweet Potato Curry – packed with nutrition! Our favorite easy, healthy,vegetrian, winter
            comfort food recipe.</p>
          <br>
          <a href="./recipes.html#3-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

      <div class="soup">
        <img style="width: 200px;height: 300px;"
          src="https://allthehealthythings.com/wp-content/uploads/2020/04/img_5e9f4529c8edd.jpg" alt="">
        <div class="teksti">
          <h2>Chopped Thai-Inspired Chicken Salad</h2>
          <p>This simple chopped Thai chicken salad has BIG flavors – peanut, lime, soy, chili, cilantro. Topped with a
            homemade peanut dressing! Healthy and fresh.</p>
          <br> <a href="./recipes.html#4-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

    -->
      <!-- </div>  
   
   
    <h2 id="recipesmeal"
      style="text-align: center; color: rgb(119, 27, 97); font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
      Meal Prep Recipes</h2>
    <div class="healthy">
   -->


   <!--
      <div class="soup">
        <img style="width: 200px;height: 300px;" src="https://pinchofyum.com/wp-content/uploads/sesame-noodles-8.jpg"
          alt="">
        <div class="teksti">
          <h2>Sesame Rice Noodle Bowls</h2>
          <p>Meal Prep Sesame Noodle Bowls! Fork-twirly noodles, an easy creamy sesame sauce, perfect browned chicken,
            and all the veg. YUM.</p>
          <br>
          <a href="./recipes.html#5-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

      <div class="soup">
        <img style="width: 200px;height: 300px;"
          src="https://www.simplyquinoa.com/wp-content/uploads/2022/01/spinach-and-egg-meal-prep-breakfast-sandwiches-8.jpg"
          alt="">
        <div class="teksti">
          <h2>Meal Prep Breakfast Sandwiches</h2>
          <p>Breakfast Sandwiches – meal prep style! Bake up your eggs , tuck them into english muffin with some cheese,
            and stash them in the freezer. </p>
          <br>
          <a href="./recipes.html#6-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

      <div class="soup">
        <img style="width: 200px;height: 300px;"
          src="https://pinchofyum.com/wp-content/uploads/Cauliflower-Fried-Rice-2-1.jpg" alt="">
        <div class="teksti">
          <h2>Cauliflower Rice with Crispy Tofu and veggies </h2>
          <p>Cauliflower Fried Rice! Healthy + clean fried rice made with cauliflower, carrots, onions, garlic, eggs,
            sesame oil and THE BEST baked crispy tofu.</p>
          <br>
          <a href=""><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

      <div class="soup">
        <img style="width: 200px;height: 300px;"
          src="https://pinchofyum.com/wp-content/uploads/Cilantro-Lime-Chicken-and-Lentils-1-2.jpg" alt="">
        <div class="teksti">
          <h2>Cilantro Chicken and Lentil Rice and veggies</h2>
          <p>15 Minute Meal Prep Cilantro Lime Chicken and Lentils! The BEST easy protein powerhouse meal prep. Just 15
            mins of prep and totally hands-off cooking!</p>
          <br> <a href="./recipes.html#7-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>
    -->
      <!--    </div>
    
    <h2 id="recipesvegetarian"
      style="text-align: center; color: rgb(119, 27, 97); font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
      Vegetarian Recipes</h2>

    <div class="healthy">
-->



<!--
      <div class="soup">
        <img style="width: 200px;height: 300px;"
          src="https://pinchofyum.com/wp-content/uploads/vegetarian-shepherds-pie-1365x2048.jpg" alt="">
        <div class="teksti">
          <h2>Vegetarian Shepherd’s Pie with sesame</h2>
          <p>Meal Prep Sesame Noodle Bowls! Fork-twirly noodles, an easy creamy sesame sauce, perfect browned chicken,
            and all the veg. YUM</p><br>
          <a href="./recipes.html#8-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

      <div class="soup">
        <img style="width: 200px;height: 300px;"
          src="https://i.pinimg.com/originals/45/72/f6/4572f6734d0a2ca0bb4b2dc6baca6c31.jpg" alt="">
        <div class="teksti">
          <h2>Vegetarisan 15 Minute Lo Mein</h2>
          <p>15 Minute Lo Mein! Made with just soy sauce, sesame oil, ramen noodles or spaghetti noodles, and any
            veggies or protein you like. SO YUMMY!</p>
          <br>
          <a href="./recipes.html#9-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

      <div class="soup">
        <img style="width: 200px;height: 300px;"
          src="https://cdn.copymethat.com/media/orig_date_night_mushroom_fettuccine_201807181457268134924368jz.jpg"
          alt="">
        <div class="teksti">
          <h2>Date Night Mushroom Fettuccine</h2>
          <p>Date Night Mushroom Fettuccine(Pasta) – elegant and luscious and FIVE INGREDIENT AND IT IS ALSO VERY EASY.
          </p>
          <br> <a href="./recipes.html#10-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>

      <div class="soup">
        <img style="width: 200px;height: 300px;" src="https://pinchofyum.com/wp-content/uploads/Green-Curry-5.jpg"
          alt="">
        <div class="teksti">
          <h2>
            only 5-Ingredient Green Curry</h2>
          <p>Packed with tons of veggies, an easy green curry sauce,its also very healthy, and finished with golden
            raisins and cilantro.</p>
          <br> <a href="./recipes.html#11-recipe"><button class="bp">MAKE THIS RECIPE</button></a>
        </div>
      </div>
    -->
    </div>
  </div>



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
        <a href=""></a>
        <a href=""></a>
        <a href=""></a>
        <a href=""></a>
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
    <div class="ft">
      <div class="social-links">
        <ul class="social-media">
          <li><a href=""><i class='bx bxl-facebook-square'></i></a></li>
          <li><a href=""><i class='bx bxl-twitter'></i></a></li>
          <li><a href=""><i class='bx bxl-youtube'></i></a></li>
          <li><a href=""><i class='bx bxl-instagram'></i></a></li>
        </ul>
      </div>
      <p style="margin-left: 20px;">© 2023 Pinch of Yum. All Rights Reserved. <br>A RaptivePartner Site.</p>
    </div>
    <p class="privacy-policy" style="color: gray; text-align: center;">Privacy Policy Terms</p>
  </footer>

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