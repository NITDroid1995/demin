<?
session_start();

function Head(){echo '<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="http://nitdroid.dlinkddns.com/demin/CSS/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
    <script src="http://nitdroid.dlinkddns.com/demin/js/jquery.js"></script>
    <script src="http://nitdroid.dlinkddns.com/demin/js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="http://nitdroid.dlinkddns.com/demin/js/jquery-ui.css">
    <title>Авто+</title>
 
  </head>
  <body>
    <script src="http://nitdroid.dlinkddns.com/demin/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://nitdroid.dlinkddns.com/demin">Авто+</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="/demin/contacts.php">Контакты</a>
      </li>';
}
function EndHead(){
  echo '    </ul>
           </div>
        </nav>';
}
function CheckAuth(){

  //Делаем более комактно все)
  $button_auth = '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Войти
              </a>
                <div class="dropdown-menu">
                  <form class="px-4 py-3" action="/demin/auth/auth.php?function=login" method="POST">
                      <div class="form-group">
                        <label for="exampleDropdownFormEmail1">Код авторизации</label>
                          <input type="text" name="code" class="form-control" id="code" placeholder="login123">
                      </div>
                      <div class="form-group" >
                        <label for="exampleDropdownFormPassword1">Пароль</label>
                          <input type="text" name="password" class="form-control" id="password" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-primary">Войти</button>
                  </form>
                </div>
            </li>
          </ul>
          <ul class="navbar-nav mr-auto">';

  $diler_buttons = '  <form class="form-inline my-2 my-lg-0" action="/demin/auth/auth.php?function=logout" method="POST">
                        <input style="width: 300px;" name="function" class="form-control mr-sm-2" type="text" placeholder="'.$_SESSION["fio"].'" readonly>
                        <button type="submit" >Выйти</button>
                      </form> 
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Функции
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clients">
                          Добавить клиента
                          </button>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cars">
                          Добавить автомобиль
                          </button>
                          <a href="http://nitdroid.dlinkddns.com/demin/list.php"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sells">
                          Проданные авто
                          </button>
                          </a>
                          <a href="http://nitdroid.dlinkddns.com/demin/view_clients.php"><button type="button" class="btn btn-primary">
                          Список клиентов
                          </button>
                          </a>
                        </div>
                      </li>';     
  $admin_buttons_red = '<form class="form-inline my-2 my-lg-0" action="/demin/auth/auth.php?function=logout" method="POST">
                          <input style="border-width: 2px; border-color: red;" name="function" class="form-control mr-sm-2" type="text" placeholder="'.$_SESSION["fio"].'" readonly>
                          <button type="submit" >Выйти</button>
                        </form>'; 
  $admin_buttons = '<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Админ-Функции
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dilers">Добавить дилера </button>
                        <a href="http://nitdroid.dlinkddns.com/demin/functions/view_clients.php" ><button type="button" class="btn btn-primary">Список клиентов </button></a>
                        <a href="http://nitdroid.dlinkddns.com/demin/functions/view_dilers.php" > <button type="button" class="btn btn-primary">Список дилеров </button></a>
                      </div>
                    </li>';   



	if(($_SESSION['secret'] =='') OR ($_SESSION['name'] =='') OR ($_SESSION['admin'] =='') OR ($_SESSION['test'] =='') OR ($_SESSION['fio'] =='')  ){
		echo ($button_auth);
  }else{
       if($_SESSION['admin'] =='0'){
       	  echo ($diler_buttons);
        }else{
          echo ($admin_buttons_red);
          echo ($admin_buttons);
        }
  }
  }

function loadCar($id){
    $bd = mysqli_connect("localhost", "site", "site", "demin");
    $car = mysqli_query($bd, 'SELECT * FROM cars WHERE id = "'.$id.'"');
    $car_info = mysqli_fetch_assoc($car);
    $user = mysqli_query($bd, 'SELECT * FROM clients WHERE code = "'.$car_info['code_client'].'"');
    $user_info = mysqli_fetch_assoc($user);
    $diler = mysqli_query($bd, 'SELECT * FROM dilers WHERE secretkey = "'.$car_info['code_diler'].'"');
    $diler_info = mysqli_fetch_assoc($diler);
    echo '
    <h1>'.$car_info['model'].' '.$car_info['mark'].'</h1>
<div style="max-width: 40%; position: absolute;" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="http://nitdroid.dlinkddns.com/demin/img/'.$car_info['img'].'" alt="First slide">
    </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
';
if($_SESSION['admin'] == '1'){
  echo '
  <div style="width: 40%; margin-left: 60%;">
  
  <a style="width: 30%;" class="btn btn-primary" href="http://nitdroid.dlinkddns.com/demin/edit.php?id='.$car_info['id'].'" role="button">Редактировать</a>


  <a style="width: 30%;" class="btn btn-primary" href="http://nitdroid.dlinkddns.com/demin/logic/delete_car.php?id='.$car_info['id'].'" role="button">Удалить</a>

</div>
';



}elseif(($_SESSION['admin'] == '0') AND ($car_info['active'] == 'yes')){
  echo '
  <div style="width: 20%; margin-left: 50%;">
  <a class="btn btn-primary" href="http://nitdroid.dlinkddns.com/demin/sell.php?id='.$car_info['id'].'" role="button">Оформить продажу :D</a>
</div>
';
  
}elseif(($_SESSION['admin'] == '0') AND ($car_info['active'] != 'yes')){
   echo '
  <div style="width: 20%; margin-left: 50%;">
  <button type="button" class="btn btn-success">Продано</button>
</div>
'; 
}

echo '


    <div style="width: 40%; text-align: right; margin-left: 50%;">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Машина</th>
      <th scope="col">Пробег</th>
      <th scope="col">Цена (рубли)</th>
      <th scope="col">Дата производства</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">'.$car_info['model'].' '.$car_info['mark'].'</th>
      <td>'.$car_info['probeg'].'</td>
      <td>'.$car_info['price'].'</td>
      <td>'.$car_info['date'].'</td>
    </tr>
  </tbody>
</table>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Дилер</th>
      <th scope="col">Клиент</th>
      <th scope="col">Номер клиента</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">'.$diler_info['FIO'].'</th>
      <td>'.$user_info['sername'].' '.$user_info['name'].' '.$user_info['second_name'].'</td>
      <td>'.$user_info['number'].'</td>
    </tr>
  </tbody>
</table>
      
    </div>



    ';

}


function list_Car($code){
    $bd = mysqli_connect("localhost", "site", "site", "demin");
    $quary = ("SELECT * FROM cars where active != 'yes'");
    $all = mysqli_query($bd, 'SELECT * FROM dogovor');
    $all = mysqli_num_rows($all);
    $diler_sell = mysqli_query($bd, 'SELECT * FROM dogovor WHERE `code-diler` = "'.$code.'"');
    $diler_sell = mysqli_num_rows($diler_sell);

    echo '
<table class="table">
    <thead>
    <tr>
      <th>Продажи этого диллера</th>
      <th>Всего продаж по сайту</th>
    </tr>
  </thead>
<tbody>
<tr>
<td>'.$diler_sell.'</td>
<td>'.$all.'</td>
</tr>
</tbody>
</table>';
    echo '<table class="table">
  <thead>
    <tr>
      <th>Марка машины</th>
      <th>Модель машины</th>
      <th>Дилер</th>
      <th>Владелец</th>
      <th>Покупатель</th>
      <th>Номер договора</th>
    </tr>
  </thead>
  <tbody id="myTable">';
    if ($result = $bd->query($quary)) {
    while ($row = $result->fetch_assoc()) {
      $diler = $bd->query('SELECT * FROM dilers WHERE secretkey = "'.$row['code_diler'].'"');
      $diler = mysqli_fetch_assoc($diler);
      $client = $bd->query('SELECT * FROM clients WHERE code = "'.$row['code_client'].'"');
      $client = mysqli_fetch_assoc($client);
      $buyer = $bd->query('SELECT * FROM client_buy WHERE code_auto = "'.$row['code_auto'].'"');
      $buyer = mysqli_fetch_assoc($buyer);
      $dogovor = $bd->query('SELECT * FROM dogovor WHERE `code-auto` = "'.$row['code_auto'].'"');
      $dogovor = mysqli_fetch_assoc($dogovor);
      echo '   
       <tr>
      <th scope="row">'.$row['mark'].'</th>
      <td>'.$row['model'].'</td>
      <td>'.$diler['FIO'].'</td>
      <td >'.$client['sername'].' '.$client['name'].' '.$client['second_name'].'</td>
      <td>'.$buyer['sername'].' '.$buyer['name'].' '.$buyer['second_name'].'</td>
      <td><a href="http://nitdroid.dlinkddns.com/demin/view_dogovor.php?id='.$dogovor['code'].'">'.$dogovor['code'].'</a></td>
       </tr>';
        
    }
    
}
echo "  </tbody>
</table>";
}


function loadDogovor($id){
      $bd = mysqli_connect("localhost", "site", "site", "demin");
      $dogovor = $bd->query('SELECT * FROM dogovor WHERE `code` = "'.$id.'"');
      $dogovor = mysqli_fetch_assoc($dogovor);
      $diler = $bd->query('SELECT * FROM dilers WHERE code = "'.$dogovor['code-diler'].'"');
      $diler = mysqli_fetch_assoc($diler);
      $client = $bd->query('SELECT * FROM clients WHERE code = "'.$dogovor['code-client'].'"');
      $client = mysqli_fetch_assoc($client);
      $buyer = $bd->query('SELECT * FROM client_buy WHERE code_auto = "'.$dogovor['code-buyer'].'"');
      $buyer = mysqli_fetch_assoc($buyer);
      $car = mysqli_query($bd, 'SELECT * FROM cars WHERE `code_auto` = "'.$dogovor['code-auto'].'"');
      $car = mysqli_fetch_assoc($car);
      echo '
      <table class="table">
  <thead>
    <tr>
      <th>Код договора</th>
      <th>Код клиента</th>
      <th>Код дилера</th>
      <th>Дата заключения</th>
      <th>Марка</th>
      <th>Фото авто</th>
      <th>Дата выпуска</th>
      <th>Пробег</th>
      <th>Дата продажи</th>
    </tr>
  </thead>
  <tbody>
       <tr>
      <th scope="row">'.$id.'</th>
      <td>'.$client['code'].'</td>
      <td>'.$diler['secretkey'].'</td>
      <td>'.$dogovor['data-sell'].'</td>
      <td>'.$car['mark'].'</td>
      <td><a href="/demin/view_photo.php?img='.$car['img'].'">'.$car['img'].'</a></td>
      <td>'.$car['date'].'</td>
      <td>'.$car['probeg'].'</td>
      <td>'.$dogovor['data-sell'].'</td>
       </tr>
       <tr>
        <th>Цена</th>
      <th>Комиссия</th>
        <th>Примечание</th>
       </tr>
        <tr>
          <td>'.$dogovor['price'].'</td>
          <td>'.$dogovor['komisia'].'</td>
            <td>'.$dogovor['PS'].'</td>
        </tr> 
   </tbody>
</table>';

}

function loadClientList($code){
  $bd = mysqli_connect("localhost", "site", "site", "demin");
  $quary = ("SELECT * FROM clients");
    echo '<table class="table">
          <thead>
            <tr>
              <th>Код клиента</th>
              <th>Фамилия</th>
              <th>Имя</th>
              <th>Отчество</th>
              <th>Город</th>
              <th>Адрес</th>
              <th>Контактный телефон</th>
              <th>Кол-во договоров</th>
            </tr>
          </thead>
          <tbody id="myTable">';
  if ($result = $bd->query($quary)) {
    while ($row = $result->fetch_assoc()) {
            $dogovor = mysqli_query($bd, 'SELECT id FROM dogovor WHERE `code-client` = "'.$row['code'].'" AND `code-diler` = "'.$code.'"');
            $dogovor = mysqli_num_rows($dogovor);

            echo '
            <tr>
              <th scope="row"><a href="http://nitdroid.dlinkddns.com/demin/view_carlist.php?code='.$row['code'].'">'.$row['code'].'</a></th>
              <td>'.$row['sername'].'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['second_name'].'</td>
              <td>'.$row['city'].'</td>
              <td>'.$row['adress'].'</td>
              <td>'.$row['number'].'</td>
              <td>'.$dogovor.'</td>
            </tr>';
            }
            
         


}
echo ' 
          </tbody>
        </table>';
}


function loadClientsCar($code){
	 echo '<table class="table">
          <thead>
            <tr>
              <th>Название авто</th>
              <th>Пробег</th>
              <th>Дата производства</th>
              <th>Статус</th>
            </tr>
          </thead>
          <tbody id="myTable">';
	$bd = mysqli_connect("localhost", "site", "site", "demin");
	if ($list_car = $bd->query("SELECT * FROM cars WHERE code_client = '$code'")) {
    while ($row = $list_car->fetch_assoc()) {
    	if($row['active'] == 'yes'){
    		$status = 'Продается';
    	}else{
    		$status = 'Продано';
    	}

            echo '
            <tr>
              <th scope="row"><a href="http://nitdroid.dlinkddns.com/demin/view.php?id='.$row['id'].'">'.$row['model'].' '.$row['mark'].'</a></th>
              <td>'.$row['probeg'].'</td>
              <td>'.$row['date'].'</td>
              <td>'.$status.'</td>
            </tr>';
            


}}
echo ' 
          </tbody>
        </table>';
        }

function admin_dilers(){
  $bd = mysqli_connect("localhost", "site", "site", "demin");
  $nums_dog = $bd->query("SELECT id FROM dogovor");
  $nums_dog = mysqli_num_rows($nums_dog);
echo '<table class="table">
          <thead>
            <tr>
              <th>Код авторизации</th>
              <th>ФИО</th>
              <th>Адрес</th>
              <th>Телефон</th>
              <th>Договоров</th>
              <th>Всего: '.$nums_dog.'</th>
            </tr>
          </thead>
          <tbody id="myTable">';
if ($list_dilers = $bd->query("SELECT * FROM dilers")) {
    while ($row = $list_dilers->fetch_assoc()) {
      $code_diler = $row['code'];
      $num_dog = $bd->query("SELECT id FROM dogovor WHERE `code-diler` = '$code_diler'");
      $num_dog = mysqli_num_rows($num_dog);
      echo '
            <tr>
              <th scope="row">'.$row['code'].'</th>
              <td>'.$row['FIO'].'</td>
              <td>'.$row['adres'].'</td>
              <td>'.$row['number'].'</td>
              <td>'.$num_dog.'</td>
            </tr>';

}
}


echo ' 
          </tbody>
        </table>';


}

function admin_clients(){
  $bd = mysqli_connect("localhost", "site", "site", "demin");
  $quary = ("SELECT * FROM clients");
    echo '<table class="table">
          <thead>
            <tr>
              <th>Код клиента</th>
              <th>Фамилия</th>
              <th>Имя</th>
              <th>Отчество</th>
              <th>Город</th>
              <th>Адрес</th>
              <th>Контактный телефон</th>
              <th>Кол-во договоров</th>
            </tr>
          </thead>
          <tbody id="myTable">';
  if ($result = $bd->query($quary)) {
    while ($row = $result->fetch_assoc()) {
            $dogovor = mysqli_query($bd, 'SELECT id FROM dogovor WHERE `code-client` = "'.$row['code'].'"');
            $dogovor = mysqli_num_rows($dogovor);

            echo '
            <tr>
              <th scope="row"><a href="http://nitdroid.dlinkddns.com/demin/view_carlist.php?code='.$row['code'].'">'.$row['code'].'</a></th>
              <td>'.$row['sername'].'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['second_name'].'</td>
              <td>'.$row['city'].'</td>
              <td>'.$row['adress'].'</td>
              <td>'.$row['number'].'</td>
              <td>'.$dogovor.'</td>
            </tr>';
            }


}
}


?>