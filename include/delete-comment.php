<?php

$id = $_POST["delete"];

$conn = mysqli_connect("localhost", "root", "qpalz,", "unicorn");

if(mysqli_connect_errno()){
    die("database connection failed: ". mysqli_connect_error().
    "(".mysqli_connect_errno().")");
};
$query = "DELETE FROM posts WHERE id = $id";

$result = mysqli_query($conn, $query);
if($result){
    header('Location: ../main.php');
} else {
    die("database query failed. " . mysqli_error($conn));
}


mysqli_close($conn);
