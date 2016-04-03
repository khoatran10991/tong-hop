<?php 
session_start();
require_once 'config.php';
require_once 'database.php';

$db = new database();

if(isset($_POST['StoreName'])) {
	$storename = addslashes($_POST['StoreName']);
	$db->query("select id_user from site_users  where username = '{$storename}' ");
	if($db->num_rows() >= 1) {
		echo "<p style='color:red'>Tên miền này đã tồn tại, vui lòng chọn tên khác</p>";
		return false;
	}
	$email = addslashes($_POST['Email']);
	$db->query("select id_user from site_users  where email = '{$email}' ");
	if($db->num_rows() >=1) {
		echo "<p style='color:red'>Email đã tồn tại, vui lòng đăng nhập hoặc bấm vào quên mật khẩu.</p>";
		return false;
	} 
	
	$BusinessType = addslashes($_POST['BusinessType']);
	$FullName = addslashes($_POST['FullName']);
	$Address = addslashes($_POST['Address']);
	$Password = md5($_POST['Password']);
	$Phone = addslashes($_POST['PhoneNumber']);
	
	$db->query("insert into site_users(username,password,email,full_name,phone,address) values ('{$storename}','{$Password}','{$email}','{$FullName}','{$Phone}','{$Address}') ");
	
	// set session de chuyen den trang khoi tao.
	$_SESSION['user'] = array();
	$_SESSION['user']['StoreName'] = $storename;
	
	$domain = $_SERVER["SERVER_NAME"];
	echo 1;
}