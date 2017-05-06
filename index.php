<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body class="center-form-body">

    <section class="center-form">
        <?php if(empty($_POST["existing-member"])){ ?>
        <form class="register-form" action="include/register-process.php" method="post">
            <input type="text" name="username" placeholder="username">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input class="button" type="submit" name="submit" value="Register!">
        </form>
        <div class="member-login-guest">
            <form class="" action="index.php" method="post">
                <input class="button" type="submit" name="existing-member" value="already a member?">
            </form>
            <form class="" action="include/login.php" method="post">
                <input class="button" type="submit" name="guest" value="enter as guest">
            </form>
        </div>
        <?php } else {?>
            <h3>Welcome back!</h3>
        <form class="login" action="include/login.php" method="post">
            <input type="text" name="username" value="username">
            <input type="password" name="password" value="password">

            <input class="button" type="submit" name="login" value="Log in">
        </form>
        <?php } ?>
    </section>

</body>
</html>
