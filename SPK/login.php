<?php

error_reporting(0);
session_start();
require_once 'config.php';

if(!empty($_POST["cmd_login"])){
	if(empty($_POST['txt_username']) || empty($_POST['txt_password']))	{
		exit("<script>window.alert('Kolom Username atau Password harus diisi');window.history.back();</script>");
	}
	$username=$_POST['txt_username'];
	$password=md5($_POST['txt_password']);
	$q=mysql_query("SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'");
	if(mysql_num_rows($q)==0){
		exit("<script>window.alert('Username dan password yang anda masukkan salah');window.history.back();</script>");
	}
	/*simpan data login ke dalam session*/
	$_SESSION['LOGIN_username']=$username;
	exit("<script>window.location='".$wwwroot."';</script>");
}

?>