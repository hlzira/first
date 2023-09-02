<?php
session_start();
include('incl/connect.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        .text-auth {
            padding: 10px 10px;
            color: black;
            background-color: white;
            border: 1px solid black;
            font-family: 'Geologica', sans-serif;
        }

        .btn-auth {
            padding: 10px 20px;
            color: white;
            background-color: #75151E;
            border: 1px solid #75151E;
            font-family: 'Geologica', sans-serif;
        }

        .btn-auth:hover {
            opacity: 80%;
        }
    </style>
<body>
    <?php
    include('incl/header.php');
    ?>
    <div class="container">
        <h2>Авторизация</h2>
        <?php
        if (isset($_SESSION['uid'])) {?>
            <h2>Вы авторизованы.</h2><?
        } else {
            if (isset($_POST['signin'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $pass_md5 = md5($pass);

                $user_email = $link->query("SELECT * FROM users WHERE email = '$email'")->fetch();

                if (empty($email)) {
                    $error_email = 'Введите email';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error_email = 'email не корректный';
                } elseif (empty($user_email)) {
                    $error_email = 'Вы не зареганы';
                }

                $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass_md5'";
                $result = $link->query($sql);
                $user_pass = $result->fetch();
                if (empty($pass)) {
                    $error_pass = 'Введите пароль';
                } elseif (empty($user_pass)) {
                    $error_pass = 'Неверный пароль';
                }

                if (empty($error_email) && empty($error_pass)) {
                    $_SESSION['uid'] = $user_pass['id'];
                    echo '<script>document.location.href=""</script>';
                }
            }
        ?>
            <form method="POST" name="signin">
                <input class="text-auth" type="text" name="email" value="<?php if (isset($email)) echo $email ?>"><br>
                <p><?php if (isset($error_email)) echo $error_email ?></p>
                <input class="text-auth" type="password" name="pass"><br>
                <p><?php if (isset($error_pass)) echo $error_pass ?></p>
                <input class="btn-auth" type="submit" name="signin">
            </form>

        <? } ?>
    </div>
</body>

</html>