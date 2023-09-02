<?php
session_start();
include('incl/connect.php');
$user_id = $_SESSION['uid'];
if (isset($_GET['do'])) {
    if ($_GET['do'] == 'exit') {
        session_unset();
    }
}

if (!isset($_SESSION['uid'])) { ?>
    <script>
        document.location.href = "signin.php"
    </script>
<? } else {



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
        .text-add {
            padding: 10px 10px;
            color: black;
            background-color: white;
            border: 1px solid black;
            font-family: 'Geologica', sans-serif;
        }

        .btn-add {
            padding: 10px 20px;
            color: white;
            background-color: #75151E;
            border: 1px solid #75151E;
            font-family: 'Geologica', sans-serif;
        }

        .btn-add:hover {
            opacity: 80%;
        }
    </style>

    <body>
        <?php
        include('incl/header.php');
        if (isset($_POST['add_news'])) {
            $name = $_POST['name'];
            $text = $_POST['text'];

            $sql = "INSERT INTO news (name,text,user_id)
                    VALUES ('$name','$text','$user_id')";
            $link->query($sql);
            echo 'Новость добавлена';
        }
        ?>
        <div class="container">
            <h2>Добавление новости<h2>
                    <form method="POST" name="add_news">
                        <input class="text-add" type="text" name="name" placeholder="Название новости"><br><br>
                        <textarea class="text-add" name="text" placeholder="Текст новости"></textarea><br><br>
                        <input class="btn-add" type="submit" name="add_news" value="Опубликовать">
                    </form>
        </div>
    </body>

    </html>

<? } ?>