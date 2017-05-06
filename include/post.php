<?php
session_start();

$username = $_SESSION["username"];
$post = $_POST["post"];

$conn = mysqli_connect("localhost", "root", "qpalz,", "unicorn");
if(mysqli_connect_errno()){
    die("database connection failed: ". mysqli_connect_error().
    "(".mysqli_connect_errno().")");
};

$query = "INSERT INTO posts (username, date, time, post)
                VALUES ('{$username}', now(), now(), '{$post}')";
echo $query;
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location: ../main.php");
    } else {
        die("database query failed. " . mysqli_error($conn));
    }
