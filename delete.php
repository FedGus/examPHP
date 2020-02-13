<h1 style="font-family: sans-serif; margin: 10px 15px; border-bottom: 1px solid black; width: 40vw;">Удалить заказ</h1> 
<?php
    $mysqli = mysqli_connect('localhost', 'root', '', 'print');

    if (mysqli_connect_errno()) {
        echo 'Ошибка подключения к базе данных:'.mysqli_connect_error();
        exit();
    }
    if (isset($_GET['id'])) {
        $sql_res = mysqli_query($mysqli, 'DELETE FROM zakaz WHERE id_order="'.$_GET['id'].'"');
        echo '<div class="error">Данные о заказе "'.$_GET['name'].'" удалены</div>';
    }
    $sql_res = mysqli_query($mysqli, 'SELECT * FROM zakaz_new ORDER BY id_order');
    if (!mysqli_errno($mysqli)) {
        $currentROW = array();
        echo '<ul class="deleteForm">';
        while ($row=mysqli_fetch_assoc($sql_res)) {
                echo '<li><a href="?p=delete&id='.$row['id_order'].'&name='.$row['client'].'">Заказ №'.$row['id_order'].' - '.$row['client'].'<a></li>';
            } 
        }
        echo '</ul>';
     
?>