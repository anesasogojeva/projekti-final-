<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MESAZHET</title>
    <link rel="stylesheet" href="dashstyle.css">
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
                                            <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row["messagge"] ?></td>
                                            <td><?php echo $row["id_perdoruesi"] ?></td>
                                            <td><?php echo $row["koha"] ?></td>
                                            <td>
                                                <button type="button" class="deleteUsertBtn btn btn-danger btn-sm" data-id="<?= $row["id"]; ?>">Fshij</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <script>
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('deleteUsertBtn')) {
                e.preventDefault();
                if (confirm("Are you sure you want to delete this data?")) {
                    var user_id = e.target.getAttribute('data-id');
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var res = JSON.parse(xhr.responseText);
                            if (res.status == 500) {
                                alert(res.message);
                            } else {
                                document.getElementById('myTable').innerHTML = xhr.responseText;
                            }
                        }
                    };
                    xhr.open("POST", "mesazhetServer.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send("delete_user=true&user_id=" + user_id);
                }
            }
        });
    </script>

</body>
    </html>