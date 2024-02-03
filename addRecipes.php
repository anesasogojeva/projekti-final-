<?php

session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");

}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Recepe</title>
    <link rel="stylesheet" href="dashstyle.css">
  
</head>

<body>



    <!-- Adding a modal: -->


    <div class="modal fade" id="AddRecipeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Recipe </h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>

                <form id="Addrecipe" action="">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="img">img</label>
                            <input type="text" id="img" name="img" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="img1">img</label>
                            <select name="img1" id="img1" class="form-control">
                                <option value="">SELECT</option>
                                <option value="https://pinchofyum.com/wp-content/uploads/Sweet-Potato-Curry-3-2.jpg">
                                    Foto1</option>
                                <option
                                    value="https://allthehealthythings.com/wp-content/uploads/2020/04/img_5e9f4529c8edd.jpg">
                                    Foto2</option>
                                <option value="https://pinchofyum.com/wp-content/uploads/sesame-noodles-8.jpg">Foto3
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="p1">Paragrafi1</label>
                            <input type="text" id="p1" name="p1" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="p2">Paragrafi2</label>
                            <input type="text" id="p2" name="p2" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="p3">Paragrafi3</label>
                            <input type="text" id="p3" name="p3" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="ingredients">Ingredients</label>
                            <input type="text" id="ingredients" name="ingredients" class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" id="closeRecipeButon" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->

    <div class="modal fade" id="EditRecipeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Recepe</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>

                <form id="EditRecipe" action="">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="recipe_id" id="recipe_id">

                        <div class="mb-3">
                            <label for="titleEdit">Title</label>
                            <input type="text" id="titleEdit" name="titleEdit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="imgEdit">img</label>
                            <input type="text" id="imgEdit" name="imgEdit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="img1Edit">img</label>
                            <select name="img1Edit" id="img1Edit" class="form-control">
                                <option value="">SELECT</option>
                                <option value="https://pinchofyum.com/wp-content/uploads/Sweet-Potato-Curry-3-2.jpg">
                                    Foto1</option>
                                <option
                                    value="https://allthehealthythings.com/wp-content/uploads/2020/04/img_5e9f4529c8edd.jpg">
                                    Foto2</option>
                                <option value="https://pinchofyum.com/wp-content/uploads/sesame-noodles-8.jpg">Foto3
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="p1Edit">Paragrafi1</label>
                            <input type="text" id="p1Edit" name="p1Edit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="p2Edit">Paragrafi2</label>
                            <input type="text" id="p2Edit" name="p2Edit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="p3Edit">Paragrafi3</label>
                            <input type="text" id="p3Edit" name="p3Edit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="ingredientsEdit">Ingredients</label>
                            <input type="text" id="ingredientsEdit" name="ingredientsEdit" class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Adding a Table: -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Recetat

                            <button type="button" id="addRecipeButon" class="btn btn-primary btn-sm float-end mx-1" data-bs-toggle="modal"
                                data-bs-target="#AddRecipeModal">
                                Shto recete
                            </button>



                            <a href="zadduser.php" class="btn btn-primary btn-sm float-end mx-1">Kthehu</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Titulli</th>
                                    <th>Img</th>
                                    <th>Paragrafi1</th>
                                    <th>Paragrafi2</th>
                                    <th>Paragrafi3</th>
                                    <th>Perberesit</th>
                                    <th>Aksioni</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include("database.php");
                                $sqlquery = "SELECT * FROM recepies;";
                                $result = $conn->query($sqlquery);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row["id"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["title"] ?>
                                            </td>
                                            <td>
                                                <img src="<?php echo $row["img"] ?>" alt="Me"
                                                    style="max-height: 120px; width: auto; height: auto;">
                                            </td>
                                            <td>
                                                <?php echo $row["p1"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["p2"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["p3"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["ingredients"] ?>
                                            </td>

                                            <td>
                                                <button type="button" id="editRecipe" value="<?= $row["id"]; ?>"
                                                    class="editRecipeBtn btn btn-info btn-sm mx-2 mb-2">Edito</button>
                                                <button type="button" id="deleteRecipe" value="<?= $row["id"]; ?>"
                                                    class="deleteRecipeBtn btn btn-danger btn-sm mx-2 mb-2">Fshij</button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            <tbody>
                        </table>


                    </div>

                </div>

            </div>

        </div>


    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>

        $(document).on('click', '#addRecipeButon', function (e) {

            $('#AddRecipeModal').show();


        });

        $(document).on('click', '#closeRecipeButon', function (e) {

            $('#AddRecipeModal').hide();;


        });



        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('Addrecipe').addEventListener('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("addRecepe", true);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "addRecipesServer.php", true);
                xhr.onload = function () {
                    var res = JSON.parse(this.responseText);
                    if (res.status == 422) {
                        document.getElementById('errorMessage').classList.remove('d-none');
                        document.getElementById('errorMessage').textContent = res.message;
                    } else if (res.status == 200) {
                        document.getElementById('errorMessage').classList.add('d-none');
                        document.getElementById('AddRecipeModal').style.display = 'none';
                        document.getElementById('myTable').innerHTML = res.updatedTableHTML;
                        document.getElementById('img').value = "";
                        document.getElementById('title').value = "";
                        document.getElementById('p1').value = "";
                        document.getElementById('p2').value = "";
                        document.getElementById('p3').value = "";
                        document.getElementById('ingredients').value = "";
                    }
                };
                xhr.send(formData);
            });

            document.addEventListener('click', function (event) {
                if (event.target.classList.contains('editRecipeBtn')) {
                    event.preventDefault();

                    var recipe_id = event.target.value;

                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "addRecipesServer.php?recipe_id=" + recipe_id, true);
                    xhr.onload = function () {
                        var res = JSON.parse(this.responseText);
                        if (res.status == 404) {
                            alert(res.message);
                        } else if (res.status == 200) {
                            document.getElementById('recipe_id').value = res.data.id;
                            document.getElementById('imgEdit').value = res.data.img;
                            document.getElementById('titleEdit').value = res.data.title;
                            document.getElementById('p1Edit').value = res.data.p1;
                            document.getElementById('p2Edit').value = res.data.p2;
                            document.getElementById('p3Edit').value = res.data.p3;
                            document.getElementById('ingredientsEdit').value = res.data.ingredients;
                            document.getElementById('EditRecipeModal').style.display = 'block';
                        }
                    };
                    xhr.send();
                }

                if (event.target.id === 'addRecipeBtn') {
                    document.getElementById('AddRecipeModal').style.display = 'block';
                }
            });

            document.getElementById('EditRecipe').addEventListener('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("EditRecipe", true);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "addRecipesServer.php", true);
                xhr.onload = function () {
                    var res = JSON.parse(this.responseText);
                    if (res.status == 422) {
                        document.getElementById('errorMessage').classList.remove('d-none');
                        document.getElementById('errorMessage').textContent = res.message;
                    } else if (res.status == 200) {
                        alert(res.message);
                        document.getElementById('errorMessage').classList.add('d-none');
                        document.getElementById('EditRecipeModal').style.display = 'none';
                        document.getElementById('myTable').innerHTML = res.updatedTableHTML;
                        document.getElementById('AddRecipe').reset();
                    }
                };
                xhr.send(formData);
            });

            document.addEventListener('click', function (event) {
                if (event.target.classList.contains('deleteRecipeBtn')) {
                    event.preventDefault();
                    if (confirm("Are you sure you want to delete this data?")) {
                        var recipe_id = event.target.value;

                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "addRecipesServer.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.onload = function () {
                            var res = JSON.parse(this.responseText);
                            if (res.status == 500) {
                                alert(res.message);
                            } else {
                                document.getElementById('myTable').innerHTML = res.updatedTableHTML;
                            }
                        };
                        xhr.send("deleteRecipe=true&recipe_id=" + recipe_id);
                    }
                }
            });
        });
    </script>



</body>


</html>