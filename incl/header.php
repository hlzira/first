<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
    body {
        box-sizing: border-box;
        margin: 0 auto;
        padding: 0;
        list-style: none;
        text-decoration: none;
        outline: none;
        font-family: 'Geologica', sans-serif;
    }

    .container {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0;
    }

    .header {
        color: white;
        background-color: #75151E;
        font-family: 'Geologica', sans-serif;
    }

    .header-btn {
        color: white;
        text-decoration: none;
    }

    .header-btn:hover {
        opacity: 80%;
    }

    .header-text {
        color: white;
    }
</style>

<body>
    <div class="header">
        <div class="container"><br>
            <?php
            if (isset($_SESSION['uid'])) { ?>
                <a class="header-btn" href="?do=exit">Выход</a> |
                <a class="header-btn" href="add_news.php">Добавить новость</a> |
                <a class="header-btn" href="my_news.php">Мои новости</a> |
            <? } else {
                echo '<a class="header-btn" href="signin.php">Войти</a> | '; ?><?
                                                                            }
                                                                                ?>
            <a class="header-btn" href="news.php">Новости</a>
            <hr>
            <h1 class="header-text">Добро пожаловать</h1><br>
        </div>
    </div>
</body>