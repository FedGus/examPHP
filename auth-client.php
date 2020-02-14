<? session_start();
?>
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
    <h2>Вход (клиент | менеджер)</h2>
<br><br>
    <form action="auth-client.php" method="POST">
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

            $sql_res = mysqli_query($mysqli, 'SELECT id_client, login, pass, role FROM client');
            for ($i=0; $i < mysqli_num_rows($sql_res); $i++) {
                $row = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);
                // print_r($row);
                $adm_id = $row['id_client'];
                $adm_log = $row['login'];
                $adm_pass = $row['pass'];
                $adm_role = $row['role'];
                // echo '<br>'.$adm_log.' '.$adm_pass;
                if(password_verify($_POST['pass'], $adm_pass) == TRUE && $_POST['login'] == $adm_log && $adm_role == "M") {
                    echo "<script>window.location = 'manager/manindex.php?id=".$adm_id."';</script>";
                } else if (password_verify($_POST['pass'], $adm_pass) == TRUE && $_POST['login'] == $adm_log && $adm_role == "P") {
                    echo "<script>window.location = 'client/noindex.php?id=".$adm_id."';</script>";
                }
                else {
                    //echo 'Неправильный логин или пароль';
                }
            }

            
    ?>
    </main>
    <footer>
    </footer>
</body>
</html>