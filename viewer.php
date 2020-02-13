<?php
    session_start(); 
    if( !isset($_SESSION['id']) ) {
        $_SESSION['id']=$_GET['id'];
    }
?> 
<?php  
	
	function getList ($type, $page) {
	
		$mysqli = mysqli_connect('localhost', 'root', '', 'print');

		if (mysqli_connect_errno()) {
			echo '<h1>Ошибка подключения к БД:'.mysqli_connect_error().'</h1>';
		}
		if (isset($_GET['id_order'])) {
			$sql_res = mysqli_query($mysqli, 'DELETE FROM zakaz WHERE id_order="'.$_GET['id_order'].'"');
			echo '<div class="error">Удалено</div>';
		}
		$sql_res = mysqli_query($mysqli, 'SELECT count(*) FROM zakaz_new');

		//$row = mysqli_fetch_assoc($sql_res); 
		if (!(mysqli_errno($mysqli)) && ($row=mysqli_fetch_row($sql_res))) {
			if (!$TOTAL=$row[0]) {
				return 'В таблице нет данных';
			}
					$PAGES = ceil($TOTAL/10);

					if ($page >= $TOTAL) {
						$page=$TOTAL-1;
					}
					$prev_page=($page*10)-10;
					
					$sql = 'SELECT * FROM zakaz_new';
					//if ($_GET['sub']=='name') $sql .= 'ORDER BY secondname';
					//$sql .=' LIMIT '.$prev_page.', '.$page.'0 ';
					$sql_res = mysqli_query($mysqli, $sql);
					$ret='<table>';
					$ret.='<tr style="font-weight: bold;"><td>No</td><td>Клиент</td><td>Цвет</td><td>Формат</td><td>Плотность</td><td>Тираж</td><td>Статус</td></tr>';
					$serial=$page*10-10;
					$res_arr = array();
					while ($row = mysqli_fetch_assoc($sql_res)) {
						$serial++;
						$ret.='<tr><td>'.$serial.'</td><td>'.$row['client'].'</td><td>'.$row['color'].'</td><td>'.$row['format'].'</td><td>'.$row['density'].'</td><td>'.$row['tiraz'].'</td><td>'.$row['status'].'</td><td><form method="GET"><input name="id_order" type="hidden" value="'.$row['id_order'].'"><button type="submit">Удалить</button></form></td></tr>';
						//$index=$row['secondname'];
						//$res_arr = array($index => '<tr><td>'.$serial.'</td><td>'.$row['secondname'].'</td><td>'.$row['firstname'].'</td><td>'.$row['patronymic'].'</td><td>'.$row['sex'].'</td><td>'.$row['birthday'].'</td><td>'.$row['phone'].'</td><td>'.$row['addres'].'</td><td>'.$row['email'].'</td><td>'.$row['comment'].'</td></tr>');
					} 
					$ret.='</table>';
					
					$content = [];

					while ($d = mysqli_fetch_array($sql_res, MYSQLI_ASSOC)) {

					mysqli_stmt_bind_param( $d['id_order'], $d['client'], $d['color'],
					$d['format'], $d['density'],
					$d['tiraz'], $d['status']) or die(mysqli_error($conn2));
					mysqli_stmt_execute($stmt) or die(mysqli_error($conn2));
					$content[] = $d;
					}

					//file_put_contents('C:\openserver\domains\localhost\exam\zakaz.json',json_encode($content));


					if ($PAGES>1) {
						$ret.='<br><div class="pagination">';
						for ($i=1; $i<=$PAGES; $i++) {
							$ret.='<a href="?p=viewer&page='.$i.'';
							if ($_GET['sub']=='name') {
								$ret.='&sub=name';
							} else if ($_GET['sub']=='def') {
								$ret.='&sub=def"';
							}
							if ($_GET['page']==$i) {$ret.='class="pag-active"';}
							$ret.='>'.$i.'</a>';
						}
					}
					return $ret;
				} else {
					return 'Что-то пошло не так';
	}
	if (mysqli_connect_errno()) {
        echo 'Ошибка подключения к базе данных:'.mysqli_connect_error();
        exit();
    }
    	mysql_close($mysqli);


    
	}
?>