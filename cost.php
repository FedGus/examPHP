<?php
$host = 'localhost';  // Хост, у нас все локально
$user = 'root';    // Имя созданного вами пользователя
$pass = ''; // Установленный вами пароль пользователю
$db_name = 'print';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
mysqli_query($link, 'SET NAMES UTF8');

// Ругаемся, если соединение установить не удалось
if (!$link) {
  echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
  exit;
}
echo '<table class="table">
<thead>
<tr>
  <th scope="col">№</th>
  <th scope="col">Название</th>
  <th scope="col">Цена(рубли)</th>
</tr>
</thead>
<tbody>';
$sql = mysqli_query($link, 'SELECT * FROM `price`');
  while ($result = mysqli_fetch_array($sql)) {
    echo "<tr><td>{$result['id_price']}</td><td>{$result['name_price']}</td><td> {$result['value']} </td></tr>";
  }
  echo'</tbody></table>';

  echo '<a class="btn btn-dark"   href="main.php?p=editcost"'; // первый пункт меню
  echo '>Редактировать стоимость</a>';
 
?>