<?php
include 'db_connect.php';
function show_all_games() {
	$sql="select * from games";
		$result=mysql_query($sql,Database::$mConnect);
		$results=array();
		while($row=mysql_fetch_assoc($result)) {
			$results[]=$row;
		}
		return $results;
}

function registration($reg_data) {
		$sql=<<<here
		INSERT INTO  users (
		`name` ,
		`login` ,
		`password`,
		`id_game`,
		`person`,
		`email`
		)
		VALUES (
		'{$reg_data['name']}', '{$reg_data['login']}', '{$reg_data['password']}', 
		'{$reg_data['id_game']}', '{$reg_data['person']}', '{$reg_data['email']}'
		);
here;
		//echo $sql;
		$result=mysql_query($sql,Database::$mConnect);
		$last_id=mysql_insert_id(Database::$mConnect);
		session_start();
		$_SESSION['id']=$last_id;
		$_SESSION['admin'] = 1;
		$_SESSION['about'] = '';
		foreach($reg_data as $index=>$value) {
			$_SESSION[$index]=$value;
		}
		//echo $last_id;
		mkdir('../gallery/'.$last_id);
		mkdir('../news/'.$last_id);
		return $result;
	}

function show_clans($id_game) {
	$sql="select * from users where id_game=$id_game";
	$result=mysql_query($sql,Database::$mConnect);
	$results=array();
	while($row=mysql_fetch_assoc($result)) {
		$results[]=$row;
	}
	return $results;
}

function show_requests() {
	$sql="select * from members where id_clan={$_SESSION['id']} and active=0";
	$result=mysql_query($sql,Database::$mConnect);
	$results=array();
	while($row=mysql_fetch_assoc($result)) {
		$results[]=$row;
	}
	return $results;
}

function show_members() {
	$sql="select * from members where id_clan={$_SESSION['id']} and active=1";
	$result=mysql_query($sql,Database::$mConnect);
	$results=array();
	while($row=mysql_fetch_assoc($result)) {
		$results[]=$row;
	}
	return $results;
}

function show_game_name($id_game) {
		$sql="select * from games where id=$id_game";
		$result=mysql_query($sql,Database::$mConnect);
		//$results=array();
		$row=mysql_fetch_assoc($result);
		return $row['name'];
}

function show_clan_about($id_clan) {
		$sql="select * from users where id=$id_clan";
		$result=mysql_query($sql,Database::$mConnect);
		//$results=array();
		$row=mysql_fetch_assoc($result);
		return $row;
}


function add_request($data,$id_clan) {
	$sql=<<<here
	INSERT INTO  members (
	`name` ,
	`id_clan` ,
	`date` ,
	`email` ,
	`lvl` ,
	`money` ,
	`last_klan`, 
	`about`
	)
	VALUES (
	'{$data['name']}', {$id_clan}, NOW(),
	'{$data['email']}', {$data['lvl']}, '{$data['money']}',
	'{$data['last_klan']}', '{$data['about']}''
	);
here;
	//echo $sql;
	$result=mysql_query($sql,Database::$mConnect);
	return $result;


}

function add_member($id) {
	$sql=<<<here
	update members set 
	active = 1
	where id={$id};
here;
	$result=mysql_query($sql,Database::$mConnect);
	return $result;
}

function delete_member($id) {
	$sql="delete from members where id={$id}";
	$result=mysql_query($sql,Database::$mConnect);
	return $result;
}

function delete_active_member($id) {
	$sql="delete from members where id={$id}";
	$result=mysql_query($sql,Database::$mConnect);
	return $result;
}

?>