<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Гусев Федор 181-321. Экзамен</title>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
	<header>
        <img src="img/polytech_logo_main.png" alt="polytech_logo_main">
	</header>

<div class="menu">
<?php
// если нет параметра меню – добавляем его
if( !isset($_GET['p']) ) $_GET['p']='cost';
echo '<a class="nav-link"   href="main.php?p=cost"'; // первый пункт меню
if( $_GET['p'] == 'cost' ) // если он выбран
echo ' style="color:red"'; // выделяем его
echo '>Расчет для стоимости</a>';

echo '<a class="nav-link" href="main.php?p=paper"'; // второй пункт меню
if( $_GET['p'] == 'paper' ) echo ' style="color:red"';
echo '>Ассортимент бумаги на складе</a>';
echo '<a class="nav-link" href="main.php?p=manager"'; // третий пункт меню
if( $_GET['p'] == 'manager' ) echo ' style="color:red"';
echo '>Учетная запись менеджера</a>';

echo '<a href="index.php">Выйти</a>';


?>
</div>