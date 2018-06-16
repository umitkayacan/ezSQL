<?php
	
	include_once ("EzSQL/shared/ez_sql_core.php");
	include_once ("EzSQL/mysql/ez_sql_mysql.php");
	$user = "root";
	$password = '';
	$dbname = "";
	$host = "localhost";
	$db = new ezSQL_mysql($user,$password,$dbname,$host);
	$db->get_results("SET NAMES 'utf8'"); 
	
	
	
	
?>