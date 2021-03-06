<?php
session_start();
if(empty($_SESSION["id"])){
    header("Location: index.php");
} elseif (isset($_GET["log"]) &&$_GET["log"] == "out"){
    session_unset();
    session_destroy();
    header("Location: index.php");
}else{

$conn = mysqli_connect("localhost", "root", "qpalz,", "unicorn");

if(mysqli_connect_errno()){
    die("database connection failed: ". mysqli_connect_error().
    "(".mysqli_connect_errno().")");
};
$post_query = "SELECT * FROM posts ORDER BY id DESC ";
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
            <?php  if($_SESSION["id"] != -1){ ?>
            <div class="post-box">
                <div class="post-message">Post a message:</div>
                <form class="" action="include/post.php" method="post">
                    <textarea name="post" required></textarea><br>
                    <input type="submit" name="submit" value="submit">
                </form>
            </div>
            <?php } ?>
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
                            <?php if($_SESSION["username"] == $post["username"]){ ?>
                                <form action="include/delete-comment.php">
                                    <button type="submit" name="delete" value=" <?= $post["id"] ?>">Delete</button>
                                </form>
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
