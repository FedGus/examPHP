<?php 
 
    $mysqli = mysqli_connect('localhost', 'root', '', 'print');

    if (mysqli_connect_errno()) {
        echo 'Ошибка подключения к базе данных:'.mysqli_connect_error();
        exit();
    }
    if (isset($_GET['id'])) {
        $sql_res = mysqli_query($mysqli, 'DELETE FROM paper WHERE id_paper="'.$_GET['id'].'"');
        echo '<div class="error">Удалено</div>';
    }
    $sql_res = mysqli_query($mysqli, 'SELECT * FROM paper ORDER BY id_paper');
    if (!mysqli_errno($mysqli)) {
        $currentROW = array();
        echo '<h3>Нажмите, чтобы удалить</h3>';
        echo '<div class="container col">';
        while ($row=mysqli_fetch_assoc($sql_res)) {
                echo '<a href="?p=deletepaper&id='.$row['id_paper'].'"> №'.$row['id_paper'].' Ширина: '.$row['width'].', Длина '.$row['length'].
                ', Плотность '.$row['density'].', Колличество '.$row['count'].'<a><br>';
            } 
        }
        echo '</div>';

?>