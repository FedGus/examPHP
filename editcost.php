<?php 

$mysqli = mysqli_connect('localhost', 'root', '', 'print');

mysqli_query($mysqli, 'SET NAMES UTF8');
if( mysqli_connect_errno() ) // если при подключении к серверу произошла ошибка
{
// выводим сообщение и принудительно останавливаем РНР-программу
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
exit();
}
// если были переданы данные для изменения записи в таблице
if( isset($_POST['button']) && $_POST['button']== 'Сохранить')
{
// формируем и выполняем SQL-запрос на изменение записи с указанным id
$sql_res=mysqli_query($mysqli, 'UPDATE `print` SET value="'.htmlspecialchars($_POST['value']).  'WHERE id='.$_GET['id']);
echo '<hr><div class="col" style="color:green; font-size:20px">Данные изменены</div>'; // и выводим сообщение об изменении данных
}

$sql = mysqli_query($mysqli, 'SELECT * FROM `price`');
  while ($result = mysqli_fetch_array($sql)) {
    echo '<div class=" m-3"><strong class="mr-2">'.$result["id_price"].'</strong>'.$result["name_price"].'
    <br><form class="form" name="form_edit" method="post" action="main.php?p=editcost&id='.$result['id_price'].'">
  <div class="col">
   <div class="">
 <input type="text" class="form-control" name="value" id="value" size="8" value="'.$result['value'].'">
 </div>';
 
  }
  echo '<div class="col">
  <input type="submit" name="button" class="btn btn-primary" value="Сохранить">
  </div>
  </div>
  </form></div>';

// else // если запрос не может быть выполнен
// echo 'Ошибка базы данных'; // выводим сообщение об ошибке

?>