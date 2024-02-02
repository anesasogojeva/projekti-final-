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
    <title>Stafi</title>
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

                <form id="addStaf" action="">
                    <div class="modal-body">


                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="b_url">Background</label>
                            <input type="text" id="b_url" name="b_url" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="b_url">Background</label>
                            <select name="b_url1" id="b_url1" class="form-control">
                                <option value="">SELECT</option>
                                <option value="https://d2hg8ctx8thzji.cloudfront.net/expertopedia.net/wp-content/uploads/2020/09/CookingmadeeasywithWilliamsSonomarecipes.jpg">Foto1</option>
                                <option value="https://d2hg8ctx8thzji.cloudfront.net/expertopedia.net/wp-content/uploads/2020/09/CookingmadeeasywithWilliamsSonomarecipes.jpg">Foto2</option>
                                <option value="https://d2hg8ctx8thzji.cloudfront.net/expertopedia.net/wp-content/uploads/2020/09/CookingmadeeasywithWilliamsSonomarecipes.jpg">Foto3</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="header">Header</label>
                            <input type="text" id="header" name="header" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="i_url">Image</label>
                            <input type="text" id="i_url" name="i_url" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="b_url">Image</label>
                            <select name="i_url1" id="i_url1" class="form-control">
                                <option value="">SELECT</option>
                                <option value="https://www.2luxury2.com/wp-content/uploads/2022/11/las-vegas-harras-gordon-2022.jpg">Foto1</option>
                                <option value="https://www.carvermostardi.com/cmos/wp-content/uploads/2018/05/professional_headshots_tampa_011.jpg">Foto2</option>
                                <option value="https://i.pinimg.com/474x/98/80/ad/9880ad7ae4b10d721662eb7a392b371a--consultant-html.jpg">Foto3</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="roli">Role</label>
                            <select name="roli" id="roli" class="form-control">
                                <option value="">SELECT</option>
                                <option value="Shef">Shef</option>
                                <option value="Punetor i thjeshte">Punetor i thjeshte</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="paragraph">Text (max. 200ch)</label>
                            <input type="text" id="paragraph" name="paragraph" class="form-control">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editStaf" action="">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="" name="user_id" id="user_id">

                        <div class="mb-3">
                            <label for="b_urlEdit">Background</label>
                            <input type="text" id="b_urlEdit" name="b_urlEdit" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="b_urlEdit">Background</label>
                            <select name="b_urlEdit1" id="b_urlEdit1" class="form-control">
                                <option value="">SELECT</option>
                                <option value="https://d2hg8ctx8thzji.cloudfront.net/expertopedia.net/wp-content/uploads/2020/09/CookingmadeeasywithWilliamsSonomarecipes.jpg">Foto1</option>
                                <option value="https://d2hg8ctx8thzji.cloudfront.net/expertopedia.net/wp-content/uploads/2020/09/CookingmadeeasywithWilliamsSonomarecipes.jpg">Foto2</option>
                                <option value="https://d2hg8ctx8thzji.cloudfront.net/expertopedia.net/wp-content/uploads/2020/09/CookingmadeeasywithWilliamsSonomarecipes.jpg">Foto3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="headerEdit">Header</label>
                            <input type="text" id="headerEdit" name="headerEdit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="i_urlEdit">Image</label>
                            <input type="text" id="i_urlEdit" name="i_urlEdit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="i_urlEdit1">Image</label>
                            <select name="i_urlEdit1" id="i_urlEdit1" class="form-control">
                                <option value="">SELECT</option>
                                <option value="https://www.2luxury2.com/wp-content/uploads/2022/11/las-vegas-harras-gordon-2022.jpg">Foto1</option>
                                <option value="https://www.carvermostardi.com/cmos/wp-content/uploads/2018/05/professional_headshots_tampa_011.jpg">Foto2</option>
                                <option value="https://i.pinimg.com/474x/98/80/ad/9880ad7ae4b10d721662eb7a392b371a--consultant-html.jpg">Foto3</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="roliEdit">Role</label>
                            <select name="roliEdit" id="roliEdit" class="form-control">
                                <option value="">SELECT</option>
                                <option value="Shef">Shef</option>
                                <option value="Punetor i thjeshte">Punetor i thjeshte</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="paragraphEdit">Text(max. 200ch)</label>
                            <input type="text" id="paragraphEdit" name="paragraphEdit" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="buttonEdit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submitEdit" class="btn btn-primary">Save changes</button>
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
                            <a href="zadduser.php" class="btn btn-primary btn-sm float-end mx-1">Kthehu</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Header</th>
                                    <th>Imazhi</th>
                                    <th>Roli</th>
                                    <th>Paragrafi</th>
                                    <th>Perdoruesi</th>
                                    <th>Ndrysho</th>
                                </tr>
                            </thead>

                            <tbody style="max-height: 300px; overflow-y: auto;">
                                <?php

                                include("database.php");
                                $sqlquery = "SELECT stafi.id, stafi.b_url, stafi.header, stafi.i_url, stafi.roli,stafi.paragrafi,(CONCAT(perdoruesit.emri,' ',perdoruesit.mbiemri)) As Perdoruesi
                                FROM stafi JOIN perdoruesit ON stafi.id_perdoruesi=perdoruesit.id;";
                                $result = $conn->query($sqlquery);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row["id"] ?>
                                            </td>
                                            <td>
                                                <img src="<?php echo $row["b_url"] ?>" alt="Me"
                                                    style="max-height: 120px; width: auto; height: auto;">
                                            </td>
                                            <td>
                                                <?php echo $row["header"] ?>
                                            </td>
                                            <td>
                                                <img src="<?php echo $row["i_url"] ?>" alt="Me"
                                                    style="max-height: 120px; width: auto; height: auto;">
                                            </td>
                                            <td>
                                                <?php echo $row["roli"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["paragrafi"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["Perdoruesi"] ?>
                                            </td>
                                            <td>

                                                <button type="button" id="editUser" value="<?= $row["id"]; ?>"
                                                    class="editUserBtn btn btn-info btn-sm mx-2 mb-2">Edito</button>
                                                <button type="button" id="deleteUser" value="<?= $row["id"]; ?>"
                                                    class="deleteUsertBtn btn btn-danger btn-sm mx-2 mb-2">Fshij</button>
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


    <!-- <script>
        $(document).on('submit', '#addStaf', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("addstaf", true);

            $.ajax({
                type: "POST",
                url: "stafiServer.php",
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
                        $('#addStaf')[0].reset();
                        $('#myTable').load(location.href + " #myTable");

                    }
                }


            });
        });


        $(document).on('click', '.editUserBtn', function () {

            var user_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "stafiServer.php?user_id=" + user_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {

                        alert(res.message);
                    } else if (res.status == 200) {

                        $('#user_id').val(res.data.id);
                        $('#b_urlEdit').val(res.data.b_url);
                        $('#headerEdit').val(res.data.header);
                        $('#i_urlEdit').val(res.data.i_url);
                        $('#roliEdit').val(res.data.roli);
                        $('#paragraphEdit').val(res.data.paragrafi);
                        $('#editUserModal').modal('show');


                    }
                }
            });

        });


        $(document).on('submit', '#editStaf', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("editStaf", true);


            $.ajax({
                type: "POST",
                url: "stafiServer.php",
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
                        $('#editStaf')[0].reset();
                        $('#myTable').load(location.href + " #myTable");

                    } else {
                        $('#errorMessageUpdate').text(res.message);
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
                    url: "stafiServer.php",
                    data: {
                        'delete_staf': true,
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


    </script> -->
<script>

    $(document).on('submit', '#addStaf', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("addstaf", true);

    $.ajax({
        type: "POST",
        url: "stafiServer.php",
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
                $('#addStaf')[0].reset();
                $('#myTable').load(' #myTable'); // Reload only the content of the element with ID 'myTable'
            }
        }
    });
});

$(document).on('click', '.editUserBtn', function () {
    var user_id = $(this).val();

    $.ajax({
        type: "GET",
        url: "stafiServer.php?user_id=" + user_id,
        success: function (response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 404) {
                alert(res.message);
            } else if (res.status == 200) {
                $('#user_id').val(res.data.id);
                $('#b_urlEdit').val(res.data.b_url);
                $('#headerEdit').val(res.data.header);
                $('#i_urlEdit').val(res.data.i_url);
                $('#roliEdit').val(res.data.roli);
                $('#paragraphEdit').val(res.data.paragrafi);
                $('#editUserModal').modal('show');
            }
        }
    });
});

$(document).on('submit', '#editStaf', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("editStaf", true);

    $.ajax({
        type: "POST",
        url: "stafiServer.php",
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
                $('#editStaf')[0].reset();
                $('#myTable').load(' #myTable'); // Reload only the content of the element with ID 'myTable'
            } else {
                $('#errorMessageUpdate').text(res.message);
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
            url: "stafiServer.php",
            data: {
                'delete_staf': true,
                'user_id': user_id
            },
            success: function (response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 500) {
                    alert(res.message);
                } else {
                    $('#myTable').load(' #myTable'); // Reload only the content of the element with ID 'myTable'
                }
            }
        });
    }
});
</script>


</body>

</html>