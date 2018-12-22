<?session_start();
include 'logic/func.php';
Head();
CheckAuth();
EndHead();

include 'forms/add_client.php';

include 'forms/add_car.php';

include 'forms/add_diler.php';
//Модуль вывода уведомлений
$result = $_SESSION['result'];
$_SESSION['result'] = '';
//Успешная авторизация
if($result == 'auth_suc'){
echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Успешная авторизация!</strong> Теперь вы можете что-то делать.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$result = '';
}
//Не авторизовалось
if($result == 'auth_not'){
echo '<div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Авторизация не удалась!</strong> Возможно Вы не правильно ввели пароль.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$result = '';
}
//Успешный разлогин
if($result == 'suc_out'){
echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Успешный разлогин!</strong> Теперь Вы можете пойти попить чайку.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$result = '';
}
if($result == 'create_user'){
echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Завершено!</strong> Клиент успешно добавлен.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$result = '';
}
if($result == 'create_auto'){
echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Завершено!</strong> Автомобиль успешно добавлен.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$result = '';
}
if($result == 'solled'){
echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Поздравляем!</strong> Вы продали автомобиль.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$result = '';
}
?>
<div class="main">


<?
$page = $_GET['page'];
if ($page == '') $page = 1;
$homepage = file_get_contents("http://nitdroid.dlinkddns.com/demin/logic/load_main.php?page=$page");
echo $homepage;
// include "logic/load_main.php?page='.$page.'";
?>
<!-- Футер -->
</div>
</body>
</html>