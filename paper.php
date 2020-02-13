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
  <th scope="col">Ширина</th>
  <th scope="col">Длина</th>
  <th scope="col">Плотность</th>
  <th scope="col">Колличество</th>
</tr>
</thead>
<tbody>';
$sql = mysqli_query($link, 'SELECT * FROM `paper`');
  while ($result = mysqli_fetch_array($sql)) {
    echo "<tr><td>{$result['id_paper']}</td><td>{$result['width']}</td><td> {$result['length']} </td><td> {$result['density']} </td><td> {$result['count']} </td></tr>";
  }
  echo'</tbody></table>';
  echo '<a class="btn btn-dark"   href="main.php?p=addpaper"'; // первый пункт меню
  echo '> Добавить</a>     ';
  echo '<a class="btn btn-dark ml-5"   href="main.php?p=deletepaper"'; // первый пункт меню
  echo '> Удалить</a>';