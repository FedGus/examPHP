<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Гусев Федор 181-321. Экзамен</title>
</head>
<body>
  <main>
<?php   
require 'admin.php'; // главное меню
// модули с контентом страницы
if( $_GET['p'] == 'cost' ) { 
    include 'cost.php';

} else
if( $_GET['p'] == 'paper' ) { include 'paper.php'; } else
if( $_GET['p'] == 'manager' ) { include 'manager.php'; } 
else
if( $_GET['p'] == 'editcost' ) { include 'editcost.php'; } 
else
if( $_GET['p'] == 'addpaper' ) { include 'addpaper.php'; } 
else
if( $_GET['p'] == 'deletepaper' ) { include 'deletepaper.php'; }
else
if( $_GET['p'] == 'deletemanager' ) { include 'deletemanager.php'; }
else
if( $_GET['p'] == 'addmanager' ) { include 'addmanager.php'; } 
?>
 </main>




<footer>
<?php
// echo '<ul class="nav "><li class="nav-item">
// <a class="nav-link" href="index.php"
// >Выход</a></li></ul>';
?>
</footer>
</body>
</html>