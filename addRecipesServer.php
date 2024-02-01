<?php

include("database.php");
session_start();

if (isset($_POST["addRecepe"])) {

    $img = mysqli_real_escape_string($conn, $_POST["img"]);
    $img1 = mysqli_real_escape_string($conn, $_POST["img1"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $p1 = mysqli_real_escape_string($conn, $_POST["p1"]);
    $p2 = mysqli_real_escape_string($conn, $_POST["p2"]);
    $p3 = mysqli_real_escape_string($conn, $_POST["p3"]);
    $ingredients = mysqli_real_escape_string($conn, $_POST["ingredients"]);

    $id_perdoruesi =(int)$_SESSION["id"];

    if (((empty($img))&&(empty($img1))) || empty($title) || (empty($p1)) || empty($p2) || empty($p3)||empty($ingredients)) {
        $res = [
            'status' => 422,
            'message' => ('All fields are mandatory')
        ];
        echo json_encode($res);
        return;
    }    
    if(empty($img1)){
        $foto=$img;
    }else{
        $foto=$img1;
    }
    $insertQuery = ("INSERT INTO recepies(img, title, p1, p2, p3, ingredients, id_perdoruesi) VALUES ('$foto','$title','$p1','$p2','$p3','$ingredients',$id_perdoruesi);"); 
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


if (isset($_GET["recipe_id"])) {


    $recipe_id = mysqli_real_escape_string($conn, $_GET["recipe_id"]);
    $selectQuery = "SELECT * FROM recepies WHERE id='$recipe_id' LIMIT 1;";
   
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

if (isset($_POST["EditRecipe"])) {

    $img = mysqli_real_escape_string($conn, $_POST["imgEdit"]);
    $img1 = mysqli_real_escape_string($conn, $_POST["img1Edit"]);
    $title = mysqli_real_escape_string($conn, $_POST["titleEdit"]);
    $p1 = mysqli_real_escape_string($conn, $_POST["p1Edit"]);
    $p2 = mysqli_real_escape_string($conn, $_POST["p2Edit"]);
    $p3 = mysqli_real_escape_string($conn, $_POST["p3Edit"]);
    $ingredients = mysqli_real_escape_string($conn, $_POST["ingredientsEdit"]);
    $recipe_id = mysqli_real_escape_string($conn, $_POST["recipe_id"]);
    $id_perdoruesi =(int)$_SESSION["id"];


    if (((empty($img))&&(empty($img1))) || empty($title) || (empty($p1)) || empty($p2) || empty($p3)||empty($ingredients)) {
        $res = [
            'status' => 422,
            'message' => ('All fields are mandatory')
        ];
        echo json_encode($res);
        return;
    }  

    if(empty($img1)){
        $foto=$img;
    }else{
        $foto=$img1;
    }

$insertQuery = ("UPDATE recepies SET img='$foto',title='$title', p1='$p1', p2='$p2', p3='$p3',
ingredients='$ingredients',id_perdoruesi='$id_perdoruesi' WHERE id='$recipe_id';"); 



    if ($conn->query($insertQuery)) {
        $res = [
            'status' => 200,
            'message' => ('User Edited successfully'),
 
       
        ];
        echo json_encode($res);
        return;
    
    } else {
        $res = [
            'status' => 500,
            'message' => ('User was not Edited')
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST["deleteRecipe"])){

    $recipe_id = mysqli_real_escape_string($conn, $_POST["recipe_id"]);

   // $insertQuery = "DELETE FROM staf WHERE id='$user_id'";
    

     $insertQuery = "DELETE FROM recepies WHERE id='$recipe_id'";
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