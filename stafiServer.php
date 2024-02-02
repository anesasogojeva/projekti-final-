<?php
include("database.php");
session_start();

if (isset($_POST["addstaf"])) {

    $b_url = mysqli_real_escape_string($conn, $_POST["b_url"]);
    $b_url1 = mysqli_real_escape_string($conn, $_POST["b_url1"]);
    $header = mysqli_real_escape_string($conn, $_POST["header"]);
    $i_url = mysqli_real_escape_string($conn, $_POST["i_url"]);
    $i_url1 = mysqli_real_escape_string($conn, $_POST["i_url1"]);
    $roli = mysqli_real_escape_string($conn, $_POST["roli"]);
    $paragraph = mysqli_real_escape_string($conn, $_POST["paragraph"]);

    $id_perdoruesi =(int)$_SESSION["id"];

    if (((empty($b_url))&&(empty($b_url1))) || empty($header) || (empty($i_url)&&(empty($i_url1))) || empty($roli) || empty($paragraph)) {
        $res = [
            'status' => 422,
            'message' => ('All fields are mandatory')
        ];
        echo json_encode($res);
        return;
    }
    
    if(empty($b_url1)){
        $fotob=$b_url;
    }else{
        $fotob=$b_url1;
    }

    if(empty($i_url1)){
        $fotoi=$i_url;
    }else{
        $fotoi=$i_url1;
    }

    $insertQuery = ("INSERT INTO stafi(b_url, header, i_url, roli, paragrafi, id_perdoruesi) VALUES ('$fotob','$header','$fotoi','$roli','$paragraph','$id_perdoruesi');"); 
   

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
            'message' => ('User was not created')
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET["user_id"])) {

    $user_id = mysqli_real_escape_string($conn, $_GET["user_id"]);
    $selectQuery = "SELECT * FROM stafi WHERE id='$user_id' LIMIT 1;";

   
    
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

if (isset($_POST["editStaf"])) {


    $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
    
    $b_url = mysqli_real_escape_string($conn, $_POST["b_urlEdit"]);
    $b_url1 = mysqli_real_escape_string($conn, $_POST["b_urlEdit1"]);
    
    $header = mysqli_real_escape_string($conn, $_POST["headerEdit"]);
    $i_url = mysqli_real_escape_string($conn, $_POST["i_urlEdit"]);
    $i_url1 = mysqli_real_escape_string($conn, $_POST["i_urlEdit1"]);
    $roli = mysqli_real_escape_string($conn, $_POST["roliEdit"]);
    $paragraph = mysqli_real_escape_string($conn, $_POST["paragraphEdit"]);
    $id_perdoruesi =(int)$_SESSION["id"];


    if ((empty($b_url)&&empty($b_url1))||empty($user_id) || empty($header) || (empty($i_url)&&empty($i_url1)) || empty($roli) || empty($paragraph)) {
        $res = [
            'status' => 422,
            'message' => ('All fields are mandatory')
        ];
        echo json_encode($res);
        return;
    }

    if(empty($b_url1)){
        $fotob=$b_url;
    }else{
        $fotob=$b_url1;
    }

    if(empty($i_url1)){
        $fotoi=$i_url;
    }else{
        $fotoi=$i_url1;
    }
    $insertQuery = "UPDATE stafi SET b_url='$fotob',header='$header',i_url='$fotoi',
    roli='$roli',paragrafi='$paragraph',id_perdoruesi='$id_perdoruesi' WHERE id='$user_id'";
    
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



if(isset($_POST["delete_staf"])){

    $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);

   // $insertQuery = "DELETE FROM staf WHERE id='$user_id'";
    

     $insertQuery = "DELETE FROM stafi WHERE id='$user_id'";
    if ($conn->query($insertQuery)) {
        $res = [
            'status' => 200,
            'message' => ('Staf Deleted successfully')
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => ('Staf was not deleetd')
        ];
        echo json_encode($res);
        return;
    }

}

?>