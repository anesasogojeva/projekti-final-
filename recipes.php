<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="./recipes.css">
</head>

<body>

    <header>
        <h1>Recipes</h1>
    </header>


    <?php
    include("database.php");
    $sqlquery = "SELECT * FROM recepies ;";
    $result = $conn->query($sqlquery);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <section id="<?php echo $row["id"]; ?>-recipe">
                <div class="container">
                    <img style="width: 200px;height: 300px;" src="<?php echo $row["img"]; ?>" alt="">
                    <h2>
                        <?php echo $row["title"]; ?>
                    </h2>
                    <p>
                        <?php echo $row["p1"]; ?>
                    </p>
                    <p>
                        <?php echo $row["p2"]; ?>
                    </p>
                    <ul>
                        <h3>Ingrudients</h3>

                        <ul>

                        <li>j hghvg</li>
                            <?php
                            $array = explode(',', $row["ingredients"]);
                            foreach ($array as $ingredient) {
                                echo "<li>" . $ingredient . "</li>";
                            }
                            ?>

                        </ul>
                        <p>
                            <?php echo $row["p3"]; ?>
                        </p>
                        <button class="button-17" role="button"><a href="./home.php">Back home</a></button>

                </div>
            </section>


            <?php
        }
    }
    ?>





<!--
    
    <section id="2-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;" src="https://pinchofyum.com/wp-content/uploads/green-sauce-4.jpg"
                alt="">
            <h2>5 Minute Magic Green Sauce with avo</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>
    
    <section id="3-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;"
                src="https://pinchofyum.com/wp-content/uploads/Sweet-Potato-Curry-3-2.jpg" alt="">
            <h2>Creamy Thai Sweet Potato Curry dish</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>


    <section id="4-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;"
                src="https://allthehealthythings.com/wp-content/uploads/2020/04/img_5e9f4529c8edd.jpg" alt="">
            <h2>Chopped Thai-Inspired Chicken Salad</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>


    <section id="5-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;"
                src="https://pinchofyum.com/wp-content/uploads/sesame-noodles-8.jpg" alt="">
            <h2>Sesame Rice Noodle Bowls</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>
    <section id="6-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;"
                src="https://www.simplyquinoa.com/wp-content/uploads/2022/01/spinach-and-egg-meal-prep-breakfast-sandwiches-8.jpg"
                alt="">
            <h2>Meal Prep Breakfast Sandwiches</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>


    <section id="7-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;"
                src="https://pinchofyum.com/wp-content/uploads/Cauliflower-Fried-Rice-2-1.jpg" alt="">
            <h2>Cauliflower Rice with Crispy Tofu and veggies</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>


    <section id="8-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;" src="https://pinchofyum.com/wp-content/uploads/Green-Curry-5.jpg"
                alt="">
            <h2>Cilantro Chicken and Lentil Rice and veggies</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>


    <section id="9-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;"
                src="https://pinchofyum.com/wp-content/uploads/vegetarian-shepherds-pie-1365x2048.jpg" alt="">
            <h2>Vegetarian Shepherd’s Pie with sesame</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>


    <section id="10-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;"
                src="https://i.pinimg.com/originals/45/72/f6/4572f6734d0a2ca0bb4b2dc6baca6c31.jpg" alt="">
            <h2>Vegetarisan 15 Minute Lo Mein</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>

    <section id="11-recipe">
        <div class="container">
            <img style="width: 200px;height: 300px;"
                src="https://cdn.copymethat.com/media/orig_date_night_mushroom_fettuccine_201807181457268134924368jz.jpg"
                alt="">
            <h2>Date Night Mushroom Fettuccine</h2>
            <p>Detox Crockpot Lentil Soup – a clean and simple soup made with onions, garlic, carrots, olive oil,
                squash, and LENTILS! Super healthy and easy to make.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto modi adipisci, dolor tenetur neque
                aperiam eaque dolorem! Perferendis maxime atque aliquid commodi ratione quisquam, quae doloremque
                temporibus, laudantium ducimus suscipit.</p>
            <ul>
                <h3>Ingrudients</h3>
                <li>lorem</li>
                <li>Lorem Ipsum</li>
                <li>Ipsum lorem</li>
                <li>Lorem Lorem Lorem</li>
            </ul>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, dicta iure! Quia, harum dolorum! Eius
                molestiae quod iure placeat, ipsam animi eveniet natus cumque minus voluptate iste dolorum laboriosam
                nulla.</p>
            <button class="button-17" role="button"><a href="./home.html">Back home</a></button>

        </div>
    </section>
-->
    <footer>
        <h3>Pinch of youm</h3>
    </footer>



</body>

</html>