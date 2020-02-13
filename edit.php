<?php 
    $mysqli = mysqli_connect('localhost', 'root', '', 'print');

    if (mysqli_connect_errno()) {
        echo 'Ошибка подключения к базе данных:'.mysqli_connect_error();
        exit();
    }

    echo '<h1 сlass="head" style="font-family: sans-serif; margin: 10px 15px; border-bottom: 1px solid black; width: 40vw;">Редактировать</h1><ul class="edit_links">';
       
    if ((isset($_POST['btn'])) && ($_POST['btn']='Изменить запись')) {
        $sql_res = mysqli_query($mysqli, 'UPDATE zakaz SET color="'.htmlspecialchars($_POST['color']).'", format="'.htmlspecialchars($_POST['format']).'", density="'.htmlspecialchars($_POST['density']).'", tiraz="'.htmlspecialchars($_POST['tiraz']).'", status="'.htmlspecialchars($_POST['status']).'" WHERE id="'.$_POST['id'].'"');
        echo '<div class="ok">Данные отредактированы</div>';
        $_GET['id']=$_POST['id'];
    }
    $sql_res = mysqli_query($mysqli, 'SELECT * FROM zakaz_new ORDER BY id_order');
    if (!mysqli_errno($mysqli)) {
        $currentROW = array();
         while ($row=mysqli_fetch_assoc($sql_res)) {
            if ((!$currentROW) && ((!isset($_GET['id']))||($_GET['id']==$row['id_order']))) {
                $currentROW=$row;
                echo '<li style="padding: 10px 15px;">Заказ №'.$row['id_order'].' - '.$row['client'].'</li>';
            } else {
                echo '<li><a href="?p=edit&id='.$row['id_order'].'">Заказ №'.$row['id_order'].' - '.$row['client'].'</li></a>';
            }
        }
        echo '</li></ul>';

        echo '<form class="editForm" action="?p=edit&id='.$currentROW['id'].'" method="POST">
            <input type="text" name="color" id="color" placeholder="цвет"';
        if ($currentROW) {
            echo 'value="'.$currentROW['color'].'"';
        }
        echo ' required><br><input name="format" type="text" placeholder="Имя"';
         if ($currentROW) {
            echo 'value="'.$currentROW['format'].'"';
        }
        echo ' required><br><input name="density" type="text" placeholder="Отчество"';
        if ($currentROW) {
            echo 'value="'.$currentROW['density'].'"';
        }
        echo '><br><input name="tiraz" type="text" placeholder="Пол"';
        if ($currentROW) {
            echo 'value="'.$currentROW['tiraz'].'"';
        }
         echo '><br><input name="status" type="text" ';
         if ($currentROW) {
            echo 'value="'.$currentROW['status'].'"';
        }
        echo ' "><br><input type="submit" name="btn" value="Изменить запись"><input type="hidden" name="id" value=" ';
        if ($currentROW) {
            echo $currentROW['id'];
        }
        echo '">
        <div>* - поля, обязательные к заполнению</div>
        </form>';
        if (!$currentROW) {
            echo 'Нет записей';
        }
    } else {
        echo 'Неизвестная ошибка';
    }
    print_r($curre);
?>