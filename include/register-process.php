<?php

$username = $_POST["username"];
$password =  $_POST["password"];
$email =  $_POST["email"];
$conn = mysqli_connect("localhost", "root", "qpalz,", "unicorn");
if(mysqli_connect_errno()){
    die("database connection failed: ". mysqli_connect_error().
    "(".mysqli_connect_errno().")");
};
$query = "INSERT INTO users (username, password, email, member)
                VALUES ('{$username}', '{$password}', '{$email}', 'no')";

    $result = mysqli_query($conn, $query);
    if($result){
        header("Location: ../main.php?username=$username");
    } else {
        die("database query failed. " . mysqli_error($conn));
    }
