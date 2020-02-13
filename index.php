
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Гусев Федор 181-321. Экзамен</title>
</head>
<body>
    <header>
        <img src="img/polytech_logo_main.png" alt="polytech_logo_main">
    </header>
    <main>
    <h1></h1>
        <div class="calculation">
            <br><br>
        <form method="POST" action="result.php">
            <h2 class="row">Введите параметры заказа</h2>
            <br><br>
            <label for="color">Выберите вариант цветности:</label>
            <select name="color" id="color">
                <option disabled>Не выбрано</option>
                <option value="1">4+4 - цветная с двух сторон</option>
                <option value="2">4+1 - цветная и черно-белая</option>
                <option value="3">4+0 - цветная с одной стороны</option>
                <option value="4">1+0 - черно-белая с одной стороны</option>
            </select><br>
            <label for="format">Выберите формат бумаги:</label>
            <select name="format" id="format">
                <option disabled>Не выбрано</option>
                <option value="1">A5</option>
                <option value="2">A4</option>
                <option value="3">A3</option>
                <option value="4">A2</option>
            </select><br>
            <label for="thickness">Выберите плотность бумаги:</label>
            <select name="thickness" id="thickness">
                <option disabled>Не выбрано</option>
                <option value="1">80 г/м2</option>
                <option value="2">115 г/м2</option>
                <option value="3">130 г/м2</option>
                <option value="4">150 г/м2</option>
            </select><br>
            <label for="quantity">Введите необходимый тираж (количество):</label><br>
            <input name="quantity" type="number" required min="0" max="<?php
            $mysqli = mysqli_connect('localhost', 'root', '', 'print');
            $sql_sum = mysqli_query($mysqli, 'SELECT SUM(count) FROM paper'); 
            while ($row = mysqli_fetch_assoc($sql_sum)) {
                echo $row['SUM(count)'];
            } 
            ?>"><br>
            <button>Рассчитать</button>
        </form>
        </div>
        <div class="reg">
            <p>Зарегиструйтесь, чтобы сделать заказ</p>
            <a href="registration.php">Регистрация</a>
            <div class="auth-client">
            <a href="auth-client.php">Войти как Клиент или Менеджер</a>
        </div>
        </div>
    </main>
    <a href="auth-admin.php">Войти как Администратор</a>
    <footer>
                
    </footer>
</body>
</html>