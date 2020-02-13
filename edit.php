<?php 
    $mysqli = mysqli_connect('localhost', 'root', '', 'print');

    if (mysqli_connect_errno()) {
        echo 'Ошибка подключения к базе данных:'.mysqli_connect_error();
        exit();
    }

    echo '<h1 сlass="head" style="font-family: sans-serif; margin: 10px 15px; border-bottom: 1px solid black; width: 40vw;">Редактировать</h1><ul class="edit_links">';
       
    if ((isset($_POST['btn']) && isset($_GET['id_order']))) {
        $sql_res = mysqli_query($mysqli, 'UPDATE zakaz SET color="'.htmlspecialchars($_POST['color']).'", format="'.htmlspecialchars($_POST['format']).'", density="'.htmlspecialchars($_POST['density']).'", tiraz="'.htmlspecialchars($_POST['tiraz']).'", status="'.htmlspecialchars($_POST['status']).'" WHERE id_order="'.htmlspecialchars($_GET['id_order']).'";');
        echo '<div class="ok">Данные отредактированы</div>';
        $_GET['id_order']=$_POST['id_order'];
    }
    $sql_res = mysqli_query($mysqli, 'SELECT * FROM zakaz_new ORDER BY id_order');
    if (!mysqli_errno($mysqli)) {
        $currentROW = array();
         while ($row=mysqli_fetch_assoc($sql_res)) {
            if ((!$currentROW) && ((!isset($_GET['id_order']))||($_GET['id_order']==$row['id_order']))) {
                $currentROW=$row;
                echo '<li style="padding: 10px 15px;">Заказ №'.$row['id_order'].' - '.$row['client'].'</li>';
            } else {
                echo '<li><a href="?p=edit&id_order='.$row['id_order'].'">Заказ №'.$row['id_order'].' - '.$row['client'].'</li></a>';
            }
        }
        echo '</li></ul>';

        echo '<form class="editForm" action="?p=edit&id_order='.$currentROW['id_order'].'" method="POST">
        <label for="color">Цветность:</label><select name="color" id="color">';
        if ($currentROW) {
            $sql_color = mysqli_query($mysqli, 'SELECT id_colors, colors FROM colors;');
            while ($row = mysqli_fetch_assoc($sql_color)) {
                echo '<option value="'.$row['id_colors'].'" ';
                
                    if ($row['colors'] == $currentROW['color']) echo 'selected';
                
                echo ' >'.$row['colors'].'</option>';
            } 
        }
        echo ' </select><br><label for="format">Формат:</label><select name="format" id="format">';
        if ($currentROW) {
            $sql_format = mysqli_query($mysqli, 'SELECT id_format, format FROM formats;');
            while ($row = mysqli_fetch_assoc($sql_format)) {
                echo '<option value="'.$row['id_format'].'" ';
                
                    if ($row['format'] == $currentROW['format']) echo 'selected';
                
                echo ' >'.$row['format'].'</option>';
            } 
        }
        echo '</select><br><label for="density">Плотность бумаги:</label><select name="density" id="density">';
        if ($currentROW) {
            $sql_density = mysqli_query($mysqli, 'SELECT id_density, density FROM density;');
            while ($row = mysqli_fetch_assoc($sql_density)) {
                echo '<option value="'.$row['id_density'].'" ';
                
                    if ($row['density'] == $currentROW['density']) echo 'selected';
                
                echo ' >'.$row['density'].'</option>';
            } 
        }
        echo '</select><br><label for="tiraz">Тираж (количество):</label><input name="tiraz" type="number" id="tiraz" min="0" max="';
            $sql_sum = mysqli_query($mysqli, 'SELECT SUM(count) FROM paper'); 
            while ($row = mysqli_fetch_assoc($sql_sum)) {
                echo $row['SUM(count)'];
            } 
            if ($currentROW) {
                echo '" value="'.$currentROW['tiraz'].'"';
            }
         echo '><br><label for="status">Статус:</label><select name="status" id="status">';
        if ($currentROW) {
            $sql_status = mysqli_query($mysqli, 'SELECT id_status, name FROM status;');
            while ($row = mysqli_fetch_assoc($sql_status)) {
                echo '<option value="'.$row['id_status'].'" ';
                
                    if ($row['name'] == $currentROW['status']) echo 'selected';
                
                echo ' >'.$row['name'].'</option>';
            } 
        }
        echo '</select><br><input type="hidden" name="id" value=" ';
        if ($currentROW) {
            echo $currentROW['id_order'];
        }
        echo '"><input type="submit" name="btn" value="Изменить запись">
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