<?php
session_start();
  $func = $_GET['function'];
  $code = $_POST['code'];
  $password = $_POST['password'];

if($func == 'logout'){

	 $_SESSION['name'] = '';
     $_SESSION['test'] = '';
     $_SESSION['fio'] = '';
     $_SESSION['secret'] = '';
       $_SESSION['id'] = '';
         $_SESSION['admin'] = '';
         $_SESSION['result'] = 'suc_out';
     header('Location: http://nitdroid.dlinkddns.com/demin');

     die();

}
	 if($func == 'login'){
    $bd = mysqli_connect("localhost", "site", "site", "demin");
    $check = mysqli_query($bd, 'SELECT * FROM dilers WHERE code = "'.$code.'" LIMIT 1');
    $check = mysqli_fetch_assoc($check);

if($password == $check['password']){
  $_SESSION['secret'] = $check['secretkey'];
	$_SESSION['name'] = $code;
  $_SESSION['id'] = $check['id'];
  $_SESSION['admin'] = '0';
  $_SESSION['test'] = MD5($check['password']);
  $_SESSION['fio'] = $check['FIO'];
  $_SESSION['code'] = $check['code'];
  mysqli_query($bd, 'UPDATE dilers SET last_login_datetime = "'.time().'" WHERE code = "'.$code.'" LIMIT 1');
  $_SESSION['result'] = 'auth_suc';
  header('Location: http://nitdroid.dlinkddns.com/demin');
  
 die();
}
if($password != $check['password']){
   $check = mysqli_query($bd, 'SELECT * FROM admins WHERE name = "'.$code.'" LIMIT 1');
    $check = mysqli_fetch_assoc($check);
    if($password == $check['password']){
  $_SESSION['secret'] = 'admin';
  $_SESSION['name'] = $check['name'];
  $_SESSION['id'] = $check['id'];
  $_SESSION['admin'] = '1';
  $_SESSION['test'] = MD5($check['password']);
  $_SESSION['fio'] = 'admin';
  $_SESSION['result'] = 'auth_suc';
  $_SESSION['code'] = $check['name'];
  header('Location: http://nitdroid.dlinkddns.com/demin');

 die();
}
}else{
       $_SESSION['result'] = 'auth_not';
	 	
       header('Location: http://nitdroid.dlinkddns.com/demin');
       die();
}
        $_SESSION['result'] = 'auth_not';
	 	
       header('Location: http://nitdroid.dlinkddns.com/demin');
       die();
	 	
	 }

?>