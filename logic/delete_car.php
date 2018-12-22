<?
session_start();
if(($_SESSION['name'] == '') OR ($_SESSION['test'] == '') OR ($_SESSION['fio'] == '') OR ($_SESSION['admin'] == '0')){
	header('Location: http://nitdroid.dlinkddns.com/demin');
     exit();
}else{
include 'config.php';
$id_car = $_GET['id'];
$bd->query("INSERT INTO `trash` SELECT * FROM `cars` WHERE `id`='$id_car'");
$bd->query("DELETE FROM cars WHERE id = '$id_car'");


header('Location: http://nitdroid.dlinkddns.com/demin');//Редирект


exit();}



?>