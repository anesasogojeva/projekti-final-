<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleblogg.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Pinch of yum|Blog</title>
    <style>
       .sibody {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .recipes-rating {
            padding: 20px;
            background-color: #f8f9fa;
        }

        .title.container {
            text-align: center;
        }

        .title h3 {
            color: #343a40;
        }

        #latest {
            color: #6c757d;
        }

        .container.d-flex {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; 
            justify-content: space-evenly; 
        }

        .flex-container {
            flex: 0 1 calc(33.33% - 10px); 
            max-width: calc(33.33% - 10px); 
        }

        .card {
            margin-bottom: 20px;
            max-width: 300px; 
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 8px 0 0 8px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            color: #343a40;
        }

        .card-text {
            color: #6c757d;
        }

        .text-body-secondary {
            color: #6c757d;
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

  
<div class="sibody">
<section class="recipes-rating">
    <div class="title container">
        <div class="title">
            <h3>Pinch of yum</h3>
            <p id="latest">Here's where you can find all the latest and greatest from the blog—recipes, tips and tricks, personal updates, and more. Be sure to sign up for email updates to receive all our new posts, right in your inbox.</p>
        </div>
    </div>
    <div class="container d-flex sm">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://pinchofyum.com/wp-content/uploads/Bucket-List-3-1200x1200.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Join us for the 2023 Holiday Bucket List!</h5>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius omnis voluptates odio atque assumenda delectus at molestias culpa.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://pinchofyum.com/wp-content/uploads/Mushroom-Gnocchi-12-1200x1200.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Gnocchi with Creamy Mushroom Sauce</h5>
                        <p class="card-text">  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius omnis voluptates odio atque assumenda delectus at molestias culpa.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://pinchofyum.com/wp-content/uploads/Applesauce-1-4-1200x1200.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Easy Instant Pot Applesauce</h5>
                        <p class="card-text">    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius omnis voluptates odio atque assumenda delectus at molestias culpa.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container d-flex">
    
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://pinchofyum.com/wp-content/uploads/Slow-Cooker-Texas-Chili_HighRes-012-1200x1200.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Slow Cooker Texas Style Chili</h5>
                        <p class="card-text">    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius omnis voluptates odio atque assumenda delectus at molestias culpa.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://pinchofyum.com/wp-content/uploads/Tomato-Soup-3-1-1200x1200.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">5 Ingredient Tomato Soup</h5>
                        <p class="card-text">    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius omnis voluptates odio atque assumenda delectus at molestias culpa.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://pinchofyum.com/wp-content/uploads/Bucket-List-3-1200x1200.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card titleHouse Favorite Garlic Bread</h5>
                        <p class="card-text">    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius omnis voluptates odio atque assumenda delectus at molestias culpa.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</section>
</div>


      <section class="rating-cards">
        <div class="top-title">
          <h1 id="top">Top rated recipes</h1>
        </div>
        <div class="container">
          <div class="rating-card">
            <img src="https://pinchofyum.com/wp-content/uploads/Chocolate-Chip-Cookies-183x183.jpg" alt="">
            <div class="rating-txt">
              <h3>The best chocolade Chip cookies</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <h4>1650 reviews</h4>
            </div>
          </div>
          <div class="rating-card">
            <img src="https://pinchofyum.com/wp-content/uploads/Sunday-Chili-183x183.jpg" alt="">
            <div class="rating-txt">
              <h3>The Best Sunday Chili</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <h4>1090 reviews</h4>
            </div>
          </div>
          <div class="rating-card">
            <img src="https://pinchofyum.com/wp-content/uploads/Miracle-No-Knead-Bread-3-2-183x183.jpg" alt="">
            <div class="rating-txt">
              <h3>Miracle No Knead Bread</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <h4>1650 reviews</h4>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="rating-card">
            <img src="https://pinchofyum.com/wp-content/uploads/Baked-Chicken-Meatball-Feature-1-150x150.jpg" alt="">
            <div class="rating-txt">
              <h3>The best chocolade Chip cookies</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <h4>1650 reviews</h4>
            </div>
          </div>
          <div class="rating-card">
            <img src="https://pinchofyum.com/wp-content/uploads/Chicken-Tinga-Tacos-6-183x183.jpg" alt="">
            <div class="rating-txt">
              <h3>The Best Sunday Chili</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <h4>1090 reviews</h4>
            </div>
          </div>
          <div class="rating-card">
            <img src="https://pinchofyum.com/wp-content/uploads/Crockpot-Lentil-Soup-3-Homepage-183x183.jpg" alt="">
            <div class="rating-txt">
              <h3>Miracle No Knead Bread</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <h4>1650 reviews</h4>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="rating-card">
            <img src="https://pinchofyum.com/wp-content/uploads/vegetarian-shepherds-pie-183x183.jpg" alt="">
            <div class="rating-txt">
              <h3>The best chocolade Chip cookies</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <h4>1650 reviews</h4>
            </div>
          </div>
          <div class="rating-card">
            <img src="https://pinchofyum.com/wp-content/uploads/Fruit-Pizza-Design-1-183x183.jpg" alt="">
            <div class="rating-txt">
              <h3>The Best Sunday Chili</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <h4>1090 reviews</h4>
            </div>
          </div>
          <div class="rating-card">
            <img src="https://pinchofyum.com/wp-content/uploads/Taking-a-Bite-of-Blueberry-Pancakes-183x183.jpg" alt="">
            <div class="rating-txt">
              <h3>Miracle No Knead Bread</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <h4>1650 reviews</h4>
            </div>
          </div>
        </div>
        </section>

        <div id="slider">
          <section class="slider">
        
            <div class="title">
              <h3>Our best recipes</h3>
              <p>Here's where you can find all the latest and greatest from the blog—recipes, tips and tricks, personal updates, and more. Be sure to sign up for email updates to receive all our new posts, right in your inbox.</p>
            </div>
            <div class="slideshow-container">
        
              <div class="mySlides fade one">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/5ZAfN5owxJc?si=14tpHvGplCClIis8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
            
              <div class="mySlides fade two">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/lddzVIKahPA?si=96VgZOqS_gyrhsO1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
            
              <div class="mySlides fade three">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/bb3zMxjIp_w?si=7DKSFZ1HW7KZsHq6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
              <div class="mySlides fade four">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/HNQfgY-TBHY?si=rkRieAgdcHPMncUu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
              <div class="sliderSing">
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
              </div>
              
            </div>
            <br>
          </section>
        </div>
        

        <div class="buttons">
          <button onclick="location.href='./login.php'">Login</button>
          <button onclick="location.href='./register.php'">Register</button>
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
              
              
          </div>
            </div>
            <div class="ft">
              <div class="social-links" >
                <ul class="social-media">
                    <li><a href=""><i class='bx bxl-facebook-square'></i></a></li>
                    <li><a href=""><i class='bx bxl-twitter' ></i></a></li>
                    <li><a href=""><i class='bx bxl-youtube'></i></a></li>
                    <li><a href=""><i class='bx bxl-instagram' ></i></a></li>
                </ul>
               </div>
            <p style="margin-left: 20px;">© 2023 Pinch of Yum. All Rights Reserved. <br>A RaptivePartner Site.</p>
            </div>
           
            
            <p class="privacy-policy" style="color: gray; text-align: center;">Privacy PolicyTerms</p>
          </footer>
          <script>
            let slideIndex = 1;
              showSlides(slideIndex);

              function plusSlides(n) {
                showSlides(slideIndex += n);
              }
    
              function currentSlide(n) {
                showSlides(slideIndex = n);
              }
              function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
              }
    </script>

</body>
</html>