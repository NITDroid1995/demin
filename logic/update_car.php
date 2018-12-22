<?
session_start();
if(($_SESSION['name'] == '') OR ($_SESSION['test'] == '') OR ($_SESSION['fio'] == '') OR ($_SESSION['admin'] == '0')){
	header('Location: http://nitdroid.dlinkddns.com/demin');
     exit();
}else{
include 'config.php';
$model = $_POST['model'];
$mark = $_POST['mark'];
$probeg = $_POST['probeg'];
$price = $_POST['price'];
$id_car = $_POST['id_auto'];

$bd->query("UPDATE cars SET mark = '$mark', model = '$model', probeg = '$probeg',price = '$price' WHERE id = '$id_car' ");


header('Location: http://nitdroid.dlinkddns.com/demin');//Редирект


exit();}



?>