<?php
include("database.php");

if (isset($_POST["addUser"])) {

    $emri = mysqli_real_escape_string($conn, $_POST["emri"]);
    $mbiemri = mysqli_real_escape_string($conn, $_POST["mbiemri"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $roli = mysqli_real_escape_string($conn, $_POST["roli"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $repassword = mysqli_real_escape_string($conn, $_POST["repassword"]);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);



    if (empty($emri) || empty($mbiemri) || empty($email) || empty($password) || empty($repassword)|| empty($repassword)||empty($roli)) {
        $res = [
            'status' => 422,
            'message' => ('All fields are mandatory')
        ];
        echo json_encode($res);
        return;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $res = [
            'status' => 422,
            'message' => ('Email is not valid')
        ];
        echo json_encode($res);
        return;
    }
    if (strlen($password) < 8) {
        $res = [
            'status' => '422',
            'message' => ('Password should be 8 letters')
        ];
        echo json_encode($res);
        return;
    }

    if ($password !== $repassword) {
        $res = [
            'status' => 422,
            'message' => ('Passwords do not match')
        ];
        echo json_encode($res);
        return;
    }


    $emailQuery = "Select id FROM perdoruesit where email='$email';";
    $result = $conn->query($emailQuery);

    if ($result->num_rows > 0) {
        $res = [
            'status' => 422,
            'message' => ('Email already exists')
        ];
        echo json_encode($res);
        return;
    }

    $insertQuery = ("INSERT INTO perdoruesit(emri, mbiemri, email, password, roli) VALUES ('$emri','$mbiemri','$email','$password_hash','$roli');");

    if ($conn->query($insertQuery)) {
        $res = [
            'status' => 200,
            'message' => ('User created successfully')
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => ('User wasnt created')
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET["user_id"])) {

    $user_id = mysqli_real_escape_string($conn, $_GET["user_id"]);
    $selectQuery = "SELECT * FROM perdoruesit WHERE id='$user_id' LIMIT 1;";

   
    
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $res = [
            'status' => 200,
            'message' => ('User fetched successfully'),
            'data'=>$row
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => ('Ndodhi nje problem,  Id-ja nuk u gjet')
        ];
        echo json_encode($res);
        return;

    }


}


if (isset($_POST["editUser"])) {

    $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
    $emri = mysqli_real_escape_string($conn, $_POST["emri"]);
    $mbiemri = mysqli_real_escape_string($conn, $_POST["mbiemri"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $roli = mysqli_real_escape_string($conn, $_POST["roli"]);



    if (empty($emri) || empty($mbiemri) || empty($email)||empty($roli)) {
        $res = [
            'status' => 422,
            'message' => ('All fields are mandatory')
        ];
        echo json_encode($res);
        return;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $res = [
            'status' => 422,
            'message' => ('Email is not valid')
        ];
        echo json_encode($res);
        return;
    }


    
    $insertQuery = "UPDATE perdoruesit SET emri='$emri', mbiemri='$mbiemri', email='$email', roli='$roli' WHERE ID='$user_id'";
    
    if ($conn->query($insertQuery)) {
        $res = [
            'status' => 200,
            'message' => ('User updated successfully')
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => ('User wasnt updated')
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST["delete_user"])){

    $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);

    $insertQuery = "DELETE FROM perdoruesit WHERE id='$user_id'";
    
    if ($conn->query($insertQuery)) {
        $res = [
            'status' => 200,
            'message' => ('User Deleted successfully')
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => ('Student was not deleted')
        ];
        echo json_encode($res);
        return;
    }

}

?>