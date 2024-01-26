
<?php
$servername = "localHost";
$username = "root";
$userpassword = "123456";
$dbname = "BLOG";

$conn = new mysqli($servername, $username, $userpassword, $dbname);

if ($conn->connect_error) {
    die("Pati nje gabim" . $conn->connect_error);
}

?>