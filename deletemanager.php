
<?php
echo '<h3>Нажмите, чтобы удалить</h3>';
    $mysqli = mysqli_connect('localhost', 'root', '', 'print');
    mysqli_query($mysqli, 'SET NAMES UTF8');
    if (mysqli_connect_errno()) {
        echo 'Ошибка подключения к базе данных:'.mysqli_connect_error();
        exit();
    }
    if (isset($_GET['id'])) {
        $sql_res = mysqli_query($mysqli, 'DELETE FROM manager WHERE id_manager="'.$_GET['id'].'"');
        echo '<div class="error">Менеджер "'.$_GET['name'].'" удален</div>';
    }
    $sql_res = mysqli_query($mysqli, 'SELECT * FROM manager ORDER BY id_manager');
    if (!mysqli_errno($mysqli)) {
        $currentROW = array();
        echo '<ul class="deleteForm">';
        while ($row=mysqli_fetch_assoc($sql_res)) {
                echo '<li><a href="?p=deletemanager&id='.$row['id_manager'].'&name='.$row['FIO'].'">'.$row['id_manager'].' '.$row['FIO'].'<a></li>';
            } 
        }
        echo '</ul>';
     
?>