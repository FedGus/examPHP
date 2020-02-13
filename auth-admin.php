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
    <h2>Вход (Администратор)</h2>
    <br><br>
    <form action="auth-admin.php" method="POST">
        <label for="login">Введите логин</label><br>
        <input name="login" type="text" required><br>
        <label for="pass">Введите пароль</label><br>
        <input name="pass" type="password" id="pass" required> <br>
        <button>Войти</button>
    </form>
    <div class="back">
        <a href="index.php">Вернуться</a>
    </div>
    <?php
            $pass_hash = md5($_POST['pass']);
            $mysqli = mysqli_connect('localhost', 'root', '', 'print');
            if (mysqli_connect_errno()) {
                echo 'Ошибка подключения к БД:'.mysqli_connect_error();
            }

            $sql_res = mysqli_query($mysqli, 'SELECT * FROM id_admin');
            for ($i=0; $i < mysqli_num_rows($sql_res); $i++) {
                $row = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);
                // print_r($row);
                $adm_fio = $row['FIO'];
                $adm_log = $row['login'];
                $adm_pass = $row['pass'];
                // echo '<br>'.$adm_log.' '.$adm_pass;
            }

            if(password_verify($_POST['pass'], $adm_pass) == TRUE && $_POST['login'] == $adm_log)
                 echo "<script>window.location = 'admin.php'</script>";
            else {
                echo 'Неправильный логин или пароль';
            }
    ?>
    </main>
    <footer>
    </footer>
</body>
</html>