<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dashstyle.css">
    <title>USERS</title>
</head>

<body>

    <!-- Add User Modal -->
    <div id="addUserModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Shto</h1>
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
                    <button type="button" class="btn btn-secondary" onclick="closeModal('addUserModal')">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm('addUser')">Save changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUserModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit</h1>
            </div>
            <form id="editUser" action="">
                <div class="modal-body">
                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="mb-3">
                        <label for="editemri">Emri</label>
                        <input type="text" id="editemri" name="emri" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="editmbiemri">Mbiemri</label>
                        <input type="text" id="editmbiemri" name="mbiemri" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="editemail">Email</label>
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
                    <button type="button" class="btn btn-secondary" onclick="closeModal('editUserModal')">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm('editUser')">Save changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabela -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Perdoruesit
                            <?php echo $_SESSION["id"]; ?>
                            <button type="button" class="btn btn-primary btn-sm float-end mx-1"
                                onclick="openModal('addUserModal')">AddUser</button>
                            <a href="home.php" class="btn btn-primary btn-sm float-end mx-1">Home</a>
                            <a href="mesazhet.php" class="btn btn-primary btn-sm float-end mx-1">Mesazhet</a>
                            <a href="stafi.php" class="btn btn-primary btn-sm float-end mx-1">Stafi</a>
                            <a href="addRecipes.php" class="btn btn-primary btn-sm float-end mx-1">Receta</a>
                            
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
                                            <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row["emri"] ?></td>
                                            <td><?php echo $row["mbiemri"] ?></td>
                                            <td><?php echo $row["email"] ?></td>
                                            <td><?php echo $row["roli"] ?></td>
                                            <td>
                                                <button type="button" class="editUserBtn btn btn-info btn-sm"
                                                    onclick="editUser('<?php echo $row["id"]; ?>')">Edito</button>
                                                <button type="button" class="deleteUserBtn btn btn-danger btn-sm"
                                                    onclick="deleteUser('<?php echo $row["id"]; ?>')">Fshij</button>
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
        function openModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = 'block';
        }

        function closeModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = 'none';
        }

        function submitForm(formId) {
            var formData = new FormData(document.getElementById(formId));
            formData.append(formId, true);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "zadduserserver.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var res = JSON.parse(xhr.responseText);
                    if (res.status == 422) {
                        document.getElementById('errorMessage').classList.remove('d-none');
                        document.getElementById('errorMessage').innerText = res.message;
                    } else if (res.status == 200) {
                        document.getElementById('errorMessage').classList.add('d-none');
                        closeModal(formId + 'Modal');
                        document.getElementById(formId).reset();
                        location.reload(); // Reload the page or update the table as needed
                    }
                }
            };
            xhr.send(formData);
        }

        function editUser(user_id) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "zadduserserver.php?user_id=" + user_id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var res = JSON.parse(xhr.responseText);
                    if (res.status == 404) {
                        alert(res.message);
                    } else if (res.status == 200) {
                        document.getElementById('user_id').value = res.data.id;
                        document.getElementById('editemri').value = res.data.emri;
                        document.getElementById('editmbiemri').value = res.data.mbiemri;
                        document.getElementById('editemail').value = res.data.email;
                        document.getElementById('roli').value = res.data.roli;
                        openModal('editUserModal');
                    }
                }
            };
            xhr.send();
        }

        function deleteUser(user_id) {
            if (confirm("Are you sure you want to delete this data?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "zadduserserver.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var res = JSON.parse(xhr.responseText);
                        if (res.status == 500) {
                            alert(res.message);
                        } else {
                            location.reload(); // Reload the page or update the table as needed
                        }
                    }
                };
                xhr.send("delete_user=true&user_id=" + user_id);
            }
        }
    </script>

</body>

</html>
