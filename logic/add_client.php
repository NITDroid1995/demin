<?
session_start();
if(($_SESSION['name'] == '') OR ($_SESSION['test'] == '') OR ($_SESSION['fio'] == '')){
	header('Location: http://nitdroid.dlinkddns.com/demin');
     exit();
}else{
include 'config.php';
$sername = $_POST['sername'];
$name = $_POST['name'];
$second_name = $_POST['second_name'];
$city = $_POST['city'];
$adress = $_POST['adress'];
$number = $_POST['number'];
$code = MD5(time());
$bd->query("INSERT INTO clients (sername, name, second_name, city, adress, number, code ) VALUES ('$sername', '$name', '$second_name', '$city', '$adress', '$number', '$code')");
$_SESSION['result'] = 'create_user';
header('Location: http://nitdroid.dlinkddns.com/demin');//Редирект


exit();}



?>