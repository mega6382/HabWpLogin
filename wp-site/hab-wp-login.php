<?php

include 'wp-includes/class-phpass.php';
include 'wp-includes/wp-db.php';
include 'wp-config.php';
include 'wp-load.php';

if(isset($_POST['user']) && isset($_POST['pass'])){
	$user = htmlspecialchars($_POST['user'],ENT_QUOTES);
	$pass = $_POST['pass'];

	$userinfo = get_userdatabylogin($user);
	$wp_hasher = new PasswordHash(8, TRUE);
	$check = $wp_hasher->CheckPassword($pass, $userinfo->user_pass);	
	if ($check)
	{
		exit(json_encode($userinfo));
	}
	else
	{
		die(json_encode(array("ID"=>"failled")));
	}
}else
{
	die(json_encode(array("ID"=>"null")));
}