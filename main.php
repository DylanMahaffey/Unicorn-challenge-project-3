<?php
session_start();
if(empty($_SESSION["id"])){
    header("Location: index.php");
}elseif($_GET["log"] == "out"){
    session_unset();
    session_destroy();
    header("Location: index.php");
}else{

$conn = mysqli_connect("localhost", "root", "qpalz,", "unicorn");

if(mysqli_connect_errno()){
    die("database connection failed: ". mysqli_connect_error().
    "(".mysqli_connect_errno().")");
};
$post_query = "SELECT * FROM posts";
$posts = mysqli_query($conn, $post_query);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <header>
            <img src="img/icon.png" alt="img">
            <nav>
                <ul>
                    <li><a href="main.php?log=out">sign out</a></li>
                    <li>premium member</li>
                </ul>
            </nav>
        </header>
    <div class="main-body">
        <aside class="main-aside">
            <h2>Welcome <?= $_SESSION["username"] ?>!</h2>
        </aside>
        <main class="main">
            <section class="chat-feed">
                <?php while($post = mysqli_fetch_assoc($posts)){  ?>
                        <div class="comment-box">
                            <div class="comment-info">
                                <p> <?= $post["username"] ?></p>
                                <div class="comment-datetime"><p><?= $post["date"] ?></p><p><?= $post["time"] ?></p></div>
                            </div>
                            <div class="comment">
                                <p><?= $post["post"] ?></p>
                            </div>
                            <?php if($_SESSION["id"] != -1){ ?>
                                <button class="button" type="button" name="button">Comment</button>
                                <?php } ?>
                        </div>
                <?php }; ?>
            </section>

        </main>
    </div>
</body>
</html>
<?php
mysqli_free_result($post);
mysqli_close($conn);
};
?>
