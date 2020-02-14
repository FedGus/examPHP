<div>
<?php
	if (!isset($_GET['p'])) {
		$_GET['p']='viewer';
	}
	if (($_GET['p']=='viewer')||($_GET['p']=='add')||($_GET['p']=='delete')||($_GET['p']=='edit')) {
		
	echo "<div class='menu'>";
		echo '<a href="?p=viewer"';
		if ($_GET['p']=='viewer') echo 'class="selected"';
		echo ">История заказов</a>";
		echo '<a href="?p=add"';
		if ($_GET['p']=='add') echo 'class="selected"';
		echo ">Добавление заказа</a>";
		echo '<a href="?p=edit"';
		if ($_GET['p']=='edit') echo 'class="selected"';
		echo ">Редактирование заказа</a>";
		/*echo '<a href="?p=delete"';
		if ($_GET['p']=='delete') echo 'class="selected"';
		echo ">Удаление заказа</a>";*/
		echo '<a href="create-pdf.php">Создать счёт в PDF</a>';
		echo '<a href="?p=exit"';
		if ($_GET['p']=='exit') echo 'class="selected"';
		echo ">Выйти</a>";
	echo '</div>';

} else {
	echo "<h1 id='error'>Неверное значение!</h1>";
}
?>
</div>