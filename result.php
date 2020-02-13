<?php
    session_start(); 
    if( !isset($_SESSION['history']) ) {
        $_SESSION['history']=array();
        $SESSION['iteration']=0;
    }
    $SESSION['iteration']++;
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
        <div class="back">
            <a href="index.php">Вернуться</a>
        </div>
        <h2>Результат расчета:</h2>
        <div class="result">
        <?php
            // Здесь выбирается цветность
            $choise_color = $_POST['color'];
            $money_color = 0; // Выбирается из БД
            switch ($choise_color) {
                case 1:
                    echo "Выбрана цветность: 4+4 - цветная печать с двух сторон два раза<br>";
                    $money_color = 100;
                    break;
                case 2:
                    echo "Выбрана цветность: 4+1 - цветная печать с одной стороны и черно-белая с другой<br>";
                    $money_color = 200;
                    break;
                case 3:
                    echo "Выбрана цветность: 4+0 - цветная печать с одной стороны<br>";
                    $money_color = 300;
                    break;
                case 4:
                    echo "Выбрана цветность: 1+0 - черно-белая печать с одной стороны<br>";
                    $money_color = 400;
                    break;  
            }
            // Здесь выбирается формат бумаги
            $choise_format = $_POST['format'];
            $money_format = 0; // Выбирается из БД
            switch ($choise_format) {
                case 1:
                    echo "Выбран формат: A5<br>";
                    $money_format = 100;
                    break;
                case 2:
                    echo "Выбран формат: A4<br>";
                    $money_format = 200;
                    break;
                case 3:
                    echo "Выбран формат: A3<br>";
                    $money_format = 300;
                    break;
                case 4:
                    echo "Выбран формат: A2<br>";
                    $money_color = 400;
                    break;  
            }
            // Здесь выбирается плотность
            $choise_thickness = $_POST['thickness'];
            $money_thickness = 0; // Выбирается из БД
            switch ($choise_thickness) {
                case 1:
                    echo "Выбрана плотность: 80 г/м2<br>";
                    $money_thickness = 100;
                    break;
                case 2:
                    echo "Выбрана плотность: 115 г/м2<br>";
                    $money_thickness = 200;
                    break;
                case 3:
                    echo "Выбрана плотность: 130 г/м2<br>";
                    $money_thickness = 300;
                    break;
                case 4:
                    echo "Выбрана плотность: 150 г/м2<br>";
                    $money_thickness = 400;
                    break;  
            }
            // Здесь указываетс тираж 
            echo "Тираж: ".$_POST['quantity'].' штук(и)<br>';
            $money_quantity = 100; // Выбирается из БД
            $result = ($money_color + $money_format + $money_thickness + $money_quantity) * $_POST['quantity'];
            echo 'Стоимость вашего заказа: '.$result.' рублей';
        ?>

        </div>
        <div>
            <?php
            echo "<h3>История вычислений:</h3>";
            for($i = count($_SESSION['history']); $i >= 0; $i--) 
                if ($_SESSION['history'][$i]) echo $_SESSION['history'][$i].' рублей<br>';
            if($_POST['quantity'] ) $_SESSION['history'][] = $result;
            ?>
        </div>
        <div class="reg">
        <br>
            <p>Зарегиструйтесь, чтобы сделать заказ</p>
            <a href="registration.php">Регистрация</a>
            <div class="auth-client">
            <a href="auth-client.php">Войти как Клиент или Менеджер</a>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>