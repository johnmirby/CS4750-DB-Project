<?php
class DbUtil{
	public static $loginUser = "cs4750jmi8fs";
	public static $loginPass = "cs4750mtgproject.";
	public static $host = "stardock.cs.virginia.edu"; // DB Host
	public static $schema = "cs4750jmi8fs"; // DB Schema

	public static function loginConnection(){
		$db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);

		if($db->connect_errno){
			echo("Could not connect to db");
			$db->close();
			exit();
		}

		return $db;
	}

}
?>
