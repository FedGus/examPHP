<!DOCTYPE html> 
<html> 
<head> 
    <meta charset='utf-8' /> 
    <title>Гусев Федор 181-321. Экзамен</title>
    <link rel="stylesheet" href="style.css" /> 
</head> 
<body> 
    <div id="wrap"><div> 
    <h3>Создание счёта</h3>
    <form method="post" action="create_receipt.php"> 
    <fieldset> 
    <legend>Счёт</legend> 
    <div class="col"> 
        <p> 
            <label for="name">Введите ФИО</label> 
            <input type="text" name="name" placeholder="Фамилия Имя Отчество" /> 
        </p> 
        <p> 
            <label for="email">Введите стоимость</label> 
            <input type="text" name="cost" placeholder="1000" /> 
        </p> 
    </div> 
    </fieldset>
    <fieldset> 
    <legend>Детали</legend> 
    <table> 
        <thead> 
            <tr><td>Позиция</td><td>Стоимость</td></tr> 
        <thead> 
        <tbody> 
            <tr> 
                <td>Цветность:
                    <select name="color" id="color">
                        <option disabled>Не выбрано</option>
                        <option value="1">4+4 - цветная с двух сторон</option>
                        <option value="2">4+1 - цветная и черно-белая</option>
                        <option value="3">4+0 - цветная с одной стороны</option>
                        <option value="4">1+0 - черно-белая с одной стороны</option>
                    </select>
                </td> 
                <td><input type='text' name='price-color' /> Рублей</td> 
            </tr> 
            <tr> 
                <td>Формат:
                    <select name="format" id="format">
                        <option disabled>Не выбрано</option>
                        <option value="1">A5</option>
                        <option value="2">A4</option>
                        <option value="3">A3</option>
                        <option value="4">A2</option>
                    </select>
                </td> 
                <td><input type='text' name='price-format'/> Рублей</td> 
            </tr> 
            <tr> 
            <td>Плотность:
                <select name="thickness" id="thickness">
                    <option disabled>Не выбрано</option>
                    <option value="1">80 г/м2</option>
                    <option value="2">115 г/м2</option>
                    <option value="3">130 г/м2</option>
                    <option value="4">150 г/м2</option>
                </select>
            </td> 
                <td><input type='text' name='price-format'/> Рублей</td> 
            </tr> 
            <tr> 
            <td>Тираж: <input name="quantity" type="number" required><br></td> 
                <td><input type='text' name='price-format'/> Рублей</td> 
            </tr> 
        </tbody> 
        </table> 
    </fieldset>
    <button type="submit">Сформировать счёт</button>
    </form> 
</div>
</div>
