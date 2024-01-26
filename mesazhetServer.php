<?php
include("database.php");

if (isset($_POST["delete_user"])) {

    $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);

    $insertQuery = "DELETE FROM mesazhet WHERE id='$user_id'";

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
            'message' => ('User was not deleted')
        ];
        echo json_encode($res);
        return;
    }

}

?>