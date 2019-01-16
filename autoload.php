<?php 
	session_start();
	require_once ("../database.php");
	require_once ("../function.php");
	$db = new Database;

	define ("ROOT",$_SERVER["DOCUMENT_ROOT"]."/public/uploads/");
?>
	