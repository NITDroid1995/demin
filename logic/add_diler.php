<?
session_start();
if(($_SESSION['name'] == '') OR ($_SESSION['test'] == '') OR ($_SESSION['fio'] == '')){
	header('Location: http://nitdroid.dlinkddns.com/demin');
     exit();
}else{
include 'config.php';
$code_diler = $_POST['code'];
$fio = $_POST['fio'];
$adress = $_POST['adress'];
$number = $_POST['number'];
$password = $_POST['password'];
$secretkey = MD5(time());
copy($_FILES['uploadfile']['tmp_name'],"../diler/".basename($_FILES['uploadfile']['name']));

$photo = $_FILES['uploadfile']['name'];

$bd->query("INSERT INTO dilers (code, FIO, photo, adres, number, password, secretkey) VALUES ('$code_diler', '$fio', '$photo', '$adress', '$number', '$password', '$secretkey')");

header('Location: http://nitdroid.dlinkddns.com/demin');//Редирект


exit();}



?>