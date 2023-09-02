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

<body>
    <?php
    include('incl/header.php');
    ?>

    <div class="container">
        <h2>Новости</h2><hr>
        <div class="news_list">
            <?php
            $sql = "SELECT * FROM news";
            $result = $link->query($sql);
            foreach ($result as $news) {
                $news_user_id = $news['user_id'];
                $sql2 = "SELECT * FROM users WHERE id = '$news_user_id'";
                $result2 = $link->query($sql2);
                $author = $result2->fetch();
            ?>
                <div class="news_item">
                    <h3><?= $news['name'] ?></h3>
                    <p>Автор: <?= $author['name'] ?></p>
                    <hr>
                </div>
            <? }
            ?>
        </div>
    </div>
</body>

</html>