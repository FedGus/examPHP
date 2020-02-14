<?php
    session_start(); 
    if( !isset($_SESSION['id']) ) {
        $_SESSION['id']=$_GET['id'];
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Гусев Федор 181-321. Экзамен</title>
	<link rel="stylesheet" href="../style.css">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
	<header>
        <img src="../img/polytech_logo_main.png" alt="polytech_logo_main">
		<span style="position: absolute; top: 20px; right: 100px; color: white;">Добро пожаловать, клиент
		<?php
			
				$mysqli = mysqli_connect('localhost', 'root', '', 'print');

				if (mysqli_connect_errno()) {
					echo 'Ошибка подключения к БД:'.mysqli_connect_error();
				}

				$sql_res = mysqli_query($mysqli, 'SELECT * FROM client WHERE id_client = '.$_SESSION['id'].';');

				if (mysqli_errno($mysqli)) {
					echo '<div class="error">Error</div>';
					echo mysqli_errno($mysqli);
				}
				else {
					while ($row = mysqli_fetch_assoc($sql_res)) {
					echo $row['FIO'];
					} ;
			}
			
		?></span>
	</header>
	<?php
	require 'menu.php';

	if ($_GET['p']=='viewer') {
		include 'viewer.php';
		if ((!isset($_GET['sub'])) || (($_GET['sub']!='def'))&&($_GET['sub']!='name')) {$_GET['sub']='def';}
		if ((!isset($_GET['page']))||($_GET['page']<-1)) {$_GET['page']=1;}
		echo getList($_GET['sub'],$_GET['page']); 
	}
	if ($_GET['p']=='add') {include 'add.php';}
	if ($_GET['p']=='edit') {include 'edit.php';}
	if ($_GET['p']=='delete') {include 'delete.php';}
	if ($_GET['p']=='exit') {
		echo "<script>window.location = '../index.php';</script>";
		session_destroy();
	}
	?>
	<footer>
		<div class="date">
            
        </div>
	</footer>
</body>
</html>

