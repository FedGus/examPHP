<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Гусев Федор 181-321. Экзамен</title>
</head>
<body>
    <header>
        <img src="img/polytech_logo_main.png" alt="polytech_logo_main">
    </header>
    <main>
    
    <h1></h1>
    <h2>Регистрация нового клиента</h2>
    <br><br>
    <form method="POST">
        <label for="FIO">Введите ФИО</label><br>
        <input name="FIO" type="text" required><br>
        <label for="login">Введите логин</label><br>
        <input name="login" type="text" required><br>
        <label for="password" >Введите пароль</label><br>
        <input name="pass" type="password" id="password"><br>
        <button name='submit' type="submit" required>Зарегистрироваться</button><br>
        <?php
            if ((isset($_POST['submit']) && ($_POST['submit']='Зарегистрироваться'))) {
                $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $mysqli = mysqli_connect('localhost', 'root', '', 'print');
                if (mysqli_connect_errno()) {
                    echo 'Ошибка подключения к БД:'.mysqli_connect_error();
                }

                $sql_res = mysqli_query($mysqli, 'INSERT INTO client (FIO, login, pass) VALUES ("'.htmlspecialchars($_POST['FIO']).'", "'.htmlspecialchars($_POST['login']).'", "'.$pass_hash.'");');
                if (mysqli_errno($mysqli)) {
                    echo '<div class="error">Запись не добавлена</div>';
                    echo mysqli_errno($mysqli);
                }
                else {
                    echo '<div class="ok">Вы успешно зарегистрированы</div>';
                    echo "<script>setTimeout(() => window.location = 'index.php', 1500);</script>";
                } 

            }
        ?>
    </form>
    <div class="back">
        <a href="index.php">Вернуться</a>
    </div>
    </main>
    <footer>
    </footer>
</body>
</html>