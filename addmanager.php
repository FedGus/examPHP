<br>
<form class="form col" name="form_add" method="post" action="main.php?p=addmanager">
<input class="form-control" type="text" name="FIO" id="FIO" placeholder="ФИО"><br>
<input class="form-control" type="text" name="login" id="lodin" placeholder="Логин"><br>
<input class="form-control" type="text" name="pass" id="pass" placeholder="Пароль"><br>
<input class="btn btn-dark" type="submit" name="button" value="Добавить">
</form><?php
// если были переданы данные для добавления в БД
if( isset($_POST['button']) && $_POST['button']== 'Добавить')
{
$mysqli = mysqli_connect('localhost', 'root', '', 'print');
mysqli_query($mysqli, 'SET NAMES UTF8');
if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
// формируем и выполняем SQL-запрос для добавления записи
$sql_res=mysqli_query($mysqli, 'INSERT INTO manager VALUES (
    "",
    "'.htmlspecialchars($_POST['FIO']).'",
    "'.htmlspecialchars($_POST['login']).'",
    "'.htmlspecialchars($_POST['pass']).'")');
// если при выполнении запроса произошла ошибка – выводим сообщение
if( mysqli_errno($mysqli) )
echo '<hr><div class="error col" style="color:red; font-size:20px">Запись не добавлена</div>';
else // если все прошло нормально – выводим сообщение
echo '<hr><div class="ok col" style="color:green; font-size:20px">Запись добавлена</div>';
}