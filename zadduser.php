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
    <title>USERS</title>
    <link rel="stylesheet" href="dashstyle.css">
</head>

<body>


    <!-- Add User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Shto</h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <form id="addUser" action="">
                    <div class="modal-body">


                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="emri">Emri</label>
                            <input type="text" id="emri" name="emri" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="mbiemri">Mbiemri</label>
                            <input type="text" id="mbiemri" name="mbiemri" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="roli">Roli</label>
                            <select name="roli" id="roli" class="form-control">
                                <option value="">SELECT</option>
                                <option value="admin">admin</option>
                                <option value="perdorues">perdorues</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="repassword">Repeat Password</label>
                            <input type="password" id="repassword" name="repassword" class="form-control">
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

    <!-- Edit User-->

    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <form id="editUser" action="">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="user_id" id="user_id">

                        <div class="mb-3">
                            <label for="emri">Emri</label>
                            <input type="text" id="editemri" name="emri" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="mbiemri">Mbiemri</label>
                            <input type="text" id="editmbiemri" name="mbiemri" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="editemail" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="roli">Roli</label>
                            <select name="roli" id="roli" class="form-control">
                                <option value="">SELECT</option>
                                <option value="admin">admin</option>
                                <option value="perdorues">perdorues</option>
                            </select>
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

    <!-- Tabela-->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Perdoruesit
                            <?php
                            session_start();
                          
                            echo $_SESSION["id"];

                            ?>
                            <button type="button" class="btn btn-primary btn-sm float-end mx-1" data-bs-toggle="modal"
                                data-bs-target="#addUserModal">
                                AddUser
                            </button>
                            <a href="mesazhet.php" class="btn btn-primary btn-sm float-end mx-1">Mesazhet</a>
                            <a href="stafi.php" class="btn btn-primary btn-sm float-end mx-1">Stafi</a>
                            <a href="addRecipes.php" class="btn btn-primary btn-sm float-end mx-1">Receta</a>
                            <a href="home.php" class="btn btn-primary btn-sm float-end mx-1">Home</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Emri</th>
                                    <th>Mbiemri</th>
                                    <th>Email</th>
                                    <th>Roli</th>
                                    <th>Ndrysho</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include("database.php");
                                $sqlquery = "SELECT id, emri, mbiemri, email,roli FROM perdoruesit";
                                $result = $conn->query($sqlquery);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row["id"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["emri"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["mbiemri"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["email"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["roli"] ?>
                                            </td>
                                            <td>

                                                <button type="button" id="editUser" value="<?= $row["id"]; ?>"
                                                    class="editUserBtn btn btn-info btn-sm">Edito</button>
                                                <button type="button" id="deleteUser" value="<?= $row["id"]; ?>"
                                                    class="deleteUsertBtn btn btn-danger btn-sm">Fshij</button>
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





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script>
        $(document).on('submit', '#addUser', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("addUser", true);

            $.ajax({
                type: "POST",
                url: "zadduserserver.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                    } else if (res.status == 200) {
                        $('#errorMessage').addClass('d-none');
                        $('#addUserModal').modal('hide');
                        $('#addUser')[0].reset();

                        $('#myTable').load(location.href + " #myTable");
                    }
                }
            });
        });


        $(document).on('click', '.editUserBtn', function () {

            var user_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "zadduserserver.php?user_id=" + user_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {

                        alert(res.message);
                    } else if (res.status == 200) {


                        $('#user_id').val(res.data.id);
                        $('#editemri').val(res.data.emri);
                        $('#editmbiemri').val(res.data.mbiemri);
                        $('#editemail').val(res.data.email);
                        $('#roli').val(res.data.roli);
                        $('#editUserModal').modal('show');
                    }

                }
            });

        });
        $(document).on('submit', '#editUser', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("editUser", true);

            $.ajax({
                type: "POST",
                url: "zadduserserver.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {

                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);
                    } else if (res.status == 200) {

                        $('#errorMessageUpdate').addClass('d-none');
                        $('#editUserModal').modal('hide');
                        $('#editUser')[0].reset();

                        $('#myTable').load(location.href + " #myTable");
                    } else {

                    }

                }
            });
        });


        $(document).on('click', '.deleteUsertBtn', function (e) {
            e.preventDefault();

            if (confirm("Are you sure you want to delete this data?")) {
                var user_id = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "zadduserserver.php",
                    data: {
                        'delete_user': true,
                        'user_id': user_id
                    },
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 500) {
                            alert(res.message);
                        } else {
                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });




    </script>



</body>

</html>