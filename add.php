<?php
    session_start(); 
    if( !isset($_SESSION['id']) ) {
        $_SESSION['id']=$_GET['id'];
    }
?> 
<h1 style="font-family: sans-serif; margin: 10px 15px; border-bottom: 1px solid black; width: 40vw;">Добавление записи</h1>    
<?php
    if ((isset($_POST['btn']) && ($_POST['btn']='Оформить заказ'))) {
        $mysqli = mysqli_connect('localhost', 'root', '', 'print');

        if (mysqli_connect_errno()) {
            echo 'Ошибка подключения к БД:'.mysqli_connect_error();
        }

        $sql_res = mysqli_query($mysqli, 'INSERT INTO zakaz (client, color, format, density, tiraz, status) VALUES ("'.htmlspecialchars($_SESSION['id']).'", "'.htmlspecialchars($_POST['color']).'", "'.htmlspecialchars($_POST['format']).'", "'.htmlspecialchars($_POST['thickness']).'", "'.htmlspecialchars($_POST['quantity']).'", "1");');

        if (mysqli_errno($mysqli)) {
            echo '<div class="error">Запись не добавлена</div>';
            echo mysqli_errno($mysqli);
        }
        else echo '<div class="ok">Заказ добавлен</div>';
    }
?>
<form method="POST" action="noindex.php?p=add">
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
            <input name="quantity" type="number" required><br>
            <center><button>Рассчитать</button><button type="submit" name="btn" value="Оформить заказ">Оформить заказ</button></center>
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

            
        </form>
        <div class="result">
        
        </div>
