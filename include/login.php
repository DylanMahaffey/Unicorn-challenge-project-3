<?php
    if(isset($_POST['guest'])){

        session_start();
        $_SESSION["username"] = "Guest";
        $_SESSION["id"] = -1;
        header("Location: ../main.php");

    }elseif(isset($_POST['login'])){



        $conn = mysqli_connect("localhost", "root", "qpalz,", "unicorn");
        if(mysqli_connect_errno()){
            die("database connection failed: ". mysqli_connect_error().
            "(".mysqli_connect_errno().")");
        };
        $query = "SELECT * FROM users";
        $users = mysqli_query($conn, $query);

        while($user = mysqli_fetch_assoc($users)){
             if ($user["username"] = $_POST["username"]) {
                if($user["password"]= $_POST["password"]){
                    session_start();
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["id"] = $user["id"];
                    header("Location: ../main.php");
                } else {
                    echo "failed password";
                }
            } else{echo "failed username";}
        }

    }
