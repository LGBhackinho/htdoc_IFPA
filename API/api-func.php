<?php
	require_once("connect.php");
	function genToken(){
		if(function_exists('com_create_guid')===true){
			return trim(com_create_guid(),"{}");
		}
		else {
			return sprintf("%04X%04X-%04X-%04X-%04X-%04X%04X%04X",mt_rand(0,65535),mt_rand(0,65535),mt_rand(0,65535),mt_rand(16394,20479),mt_rand(32768,49151),mt_rand(0,65535),mt_rand(0,65535),mt_rand(0,65535));
		}
	}
	
	function auth($log, $pass){
		global $mysqli;
		$req = $mysqli->prepare("SELECT id, token,expire FROM utilisateurs WHERE login=? AND password=?");
		$req->bind_param('ss',$log,$pass);
		$req->execute();
		$curs = $req -> get_result();
		if($curs->num_rows > 0){
			$user=$curs->fetch_object();
			$new_exp = date($user->expire);
			$new_exp = date('Y-m-d', strtotime($new_exp. ' + 8 days'));
			//auth OK
			$upd = $mysqli->prepare("UPDATE utilisateurs SET expire = ? , token=? WHERE id=?;");
			$token=genToken();
			$upd -> bind_param('sss',$new_exp,$token,$user->id);
			$upd -> execute();
			if($mysqli->affected_rows > 0){
				$user->token=$token;
				$user->expire=$new_exp;
			}
			return $user;
		}
		else {
			return null;
		}
	}
	
	function token_log($token) {
		global $mysqli;
		$req = $mysqli->prepare("SELECT id, token,expire FROM utilisateurs WHERE token=?");
		$req->bind_param('s',$token);
		$req->execute();
		$curs = $req -> get_result();
		if($curs->num_rows > 0){
			$user=$curs->fetch_object();
			$new_exp = date($user->expire);
			$new_exp = date('Y-m-d', strtotime($new_exp. ' + 8 days'));
			//auth OK
			$upd = $mysqli->prepare("UPDATE utilisateurs SET expire = ? WHERE id=?;");
			$upd -> bind_param('ss',$new_exp,$user->id);
			$upd -> execute();
			if($mysqli->affected_rows > 0){
				$user->expire=$new_exp;
			}
			return $user;
		}
		else {
			return null;
		}
	}
?>