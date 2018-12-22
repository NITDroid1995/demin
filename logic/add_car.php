<?
session_start();
if(($_SESSION['name'] == '') OR ($_SESSION['test'] == '') OR ($_SESSION['fio'] == '')){
	header('Location: http://nitdroid.dlinkddns.com/demin');
     exit();
}else{
include 'config.php';
$code_diler = $_SESSION['secret'];

$user = $_POST['user'];
$mark = $_POST['mark'];
$price = $_POST['price'];
$model = $_POST['model'];
$probeg = $_POST['probeg'];
$date = $_POST['date'];
list($sername, $name, $second_name) = explode(" ", $user);
$code = $bd->query('SELECT * FROM clients WHERE sername LIKE "'.$sername.'" AND name LIKE "'.$name.'" AND second_name LIKE "'.$second_name.'"');
$code = mysqli_fetch_assoc($code);
$code = $code['code'];
$_FILES['uploadfile']['name'] = MD5(MD5(time()));
copy($_FILES['uploadfile']['tmp_name'],"../img/".basename($_FILES['uploadfile']['name']));

$img = $_FILES['uploadfile']['name'];
$code_auto = MD5(time());



if($mark == '3'){
	if($model == '1'){$model = 'X3';}
	if($model == '2'){$model = 'X5M';}
	if($model == '3'){$model = 'X6M';}
$mark = 'BMW';
}elseif($mark == '2'){
	$mark = 'Mersedes';
		if($model == '1'){$model = 'G63';}
		if($model == '2'){$model = 'C-Class';}
		if($model == '3'){$model = 'E_Class';}

}elseif($mark == '1'){
	$mark = 'Lada';
		if($model == '1'){$model = 'Granta';}
		if($model == '2'){$model = 'X-Ray';}
		if($model == '3'){$model = 'Priora';}
}





$bd->query("INSERT INTO cars (mark, model, probeg, date, img, code_client, code_diler, price, code_auto) VALUES ('$mark', '$model', '$probeg', '$date', '$img', '$code', '$code_diler', '$price', '$code_auto')");
$_SESSION['result'] = 'create_auto';
header('Location: http://nitdroid.dlinkddns.com/demin');//Редирект


exit();}



?>