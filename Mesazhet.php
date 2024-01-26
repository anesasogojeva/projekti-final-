<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MESAZHET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Perdoruesit
                            <?php /*
                       session_start();

                       echo $_SESSION["id"];
*/
                            ?>
                            <!--
                            <button type="button" class="btn btn-primary btn-sm float-end mx-1" data-bs-toggle="modal"
                                data-bs-target="#addUserModal">
                                AddUser
                            </button>
-->
                            <a href="zadduser.php" class="btn btn-primary btn-sm float-end mx-1">Kthehu</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Mesazhi</th>
                                    <th>Perdoruesi</th>
                                    <th>Koha</th>
                                    <th>Fshij</th>
                                </tr>
                            </thead>

                            <tbody>




                                <?php
                                include("database.php");
                                $sqlquery = "SELECT * FROM mesazhet";
                                $result = $conn->query($sqlquery);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row["id"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["messagge"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["id_perdoruesi"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["koha"] ?>
                                            </td>
                                            <td>
                                                <!--
                                                <button type="button" id="editUser" value="<?= $row["id"]; ?>"
                                                    class="editUserBtn btn btn-info btn-sm">Edito</button>  -->
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
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).on('click', '.deleteUsertBtn', function (e) {
        e.preventDefault();

        if (confirm("Are you sure you want to delete this data?")) {

            var user_id = $(this).val();



            $.ajax({
                type: "POST",
                url: "mesazhetServer.php",
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

</html>