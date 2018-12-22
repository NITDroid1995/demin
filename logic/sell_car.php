<?
session_start();
if(($_SESSION['name'] == '') OR ($_SESSION['test'] == '') OR ($_SESSION['fio'] == '') OR ($_SESSION['admin'] == '1')){
	header('Location: http://nitdroid.dlinkddns.com/demin');
     exit();
}else{
include 'config.php';

//Получаем все переменные с формы
$new_sername = $_POST['new_sername'];
$new_name = $_POST['new_name'];
$new_scnd_name = $_POST['new_scnd_name'];
$new_city = $_POST['new_city'];
$new_adress = $_POST['new_adress'];
$new_number = $_POST['new_number'];
$new_price = $_POST['new_price'];
$info = $_POST['info'];
$id_car = $_POST['id_auto']; 
$komis = $_POST['komis'];

//Получаем всю инфу о машине
$car_info = mysqli_query($bd, "SELECT * FROM cars WHERE id = '$id_car'");
$car_info = mysqli_fetch_assoc($car_info);
if($car_info['active'] != 'yes'){
	echo "Данная машина уже продана";
	exit();
}
$car_code = $car_info['code_auto'];
$diler_code = $car_info['code_diler'];
$client_code = $car_info['code_client'];

// Получаем всю инфу о дилере по коду дилера в таблице машины
$diler_info = mysqli_query($bd, "SELECT * FROM dilers WHERE secretkey = '$diler_code'");
$diler_info = mysqli_fetch_assoc($diler_info);
$code_diler = $diler_info['code'];

//Получаем всю инфу о клиенте по коду клиента из таблицы с машиной
$old_client = mysqli_query($bd, "SELECT * FROM clients WHERE code = '$client_code'");
$old_client = mysqli_fetch_assoc($old_client);
$code_client = $old_client['code'];

$code_dog = MD5(time());
$date_sell = date("d.m.y"); 
$code_buyer = MD5($code_dog);

// Проверка. Была ли изменена сумма при заключении договора, Если да, то указываем новую. Если нет, то и суда нет....
///////////////////////////// 0.5
$lol = '100';
$koef = $new_price*$komis/$lol;
$summ_price = $new_price+$koef;


//Заносим всю информацию в договор (создаем)
$bd->query("INSERT INTO dogovor (`code`, `code-client`, `code-diler`, `code-buyer`, `code-auto`, `data-sell`, `summa`, `price`, `komisia`, `PS`) VALUES ('$code_dog','$code_client', '$code_diler', '$code_buyer', '$car_code', '$date_sell', '$summ_price', '$new_price', '$koef', '$info')");

//Заносим данные о новом обладателе АВТОМОБИЛЯ))
$bd->query("INSERT INTO client_buy (`code`,`sername`, `name`, `second_name`, `code_auto`, `city`, `number`, `adress`) VALUES ('$code_buyer','$new_sername', '$new_name', '$new_scnd_name', '$car_code', '$new_city', '$new_number', '$new_adress')");

//Добавляем в таблицу историй информацию о совершении сделки

$bd->query("INSERT INTO history (`code-diler`, `code-dog`, `chto-sdelal`) VALUES ('$code_diler', '$code_dog', 'Продажа')");

//Наконец перемещаем машину из продаваемых в таблицу с проданными авто $car_info

$bd->query("INSERT INTO `sells-car` (`code_auto`, `code_dog`) VALUES ('$car_code', '$code_dog')");
$bd->query("UPDATE cars SET active = 'solled' WHERE id = '$id_car'");


$_SESSION['result'] = 'solled';
header('Location: http://nitdroid.dlinkddns.com/demin');//Редирект


exit();}



?>