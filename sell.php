<?session_start();
include 'logic/func.php';
$id = $_GET['id'];
Head();
CheckAuth();
EndHead();

include 'forms/add_client.php';

include 'forms/add_car.php';

include 'forms/add_diler.php';

 $bd = mysqli_connect("localhost", "site", "site", "demin");
    $car = mysqli_query($bd, 'SELECT * FROM cars WHERE id = "'.$id.'"');
    $car_info = mysqli_fetch_assoc($car);
?>
<form style="margin-right: 3%; margin-left: 3%;" action="logic/sell_car.php" enctype='multipart/form-data' method="POST">
  <div class="form-group">
    <label for="exampleInputPassword1">Фамилия покупателя</label>
    <input type="text" class="form-control" id="new_sername" name="new_sername" placeholder="Фамилия" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Имя покупателя</label>
    <input type="text" class="form-control" id="new_name" name="new_name" placeholder="Имя" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Отчество покупателя</label>
    <input type="text" class="form-control" id="new_scnd_name" name="new_scnd_name" placeholder="Отчество" required>
  </div>   
     <div class="form-group">
    <label for="exampleInputPassword1">Город</label>
    <input type="text" class="form-control" id="new_city" name="new_city" placeholder="Адрес" required>
  </div> 
 
  <div class="form-group">
    <label for="exampleInputPassword1">Адрес</label>
    <input type="text" class="form-control" id="new_adress" name="new_adress" placeholder="Адрес" required>
  </div>   
     <div class="form-group">
    <label for="exampleInputPassword1">Номер телефона</label>
    <input type="text" class="form-control" id="new_number" name="new_number" placeholder="телефон" required>
  </div> 
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Дополнительная информация</label>
   <textarea class="form-control" id="info" rows="7" name="info"></textarea>
  </div> 
    <div class="form-group">
    <label for="exampleInputPassword1">Итоговая цена Без учета комиссии</label>
    <input type="text" class="form-control" id="new_price" name="new_price" placeholder="<? echo($car_info['price']);?>" required>
  </div> 
  <div class="form-group">
    <label for="exampleInputPassword1">Комиссия</label>
    <input type="text" class="form-control" id="komis" name="komis" placeholder="4" required>
  </div>
    
    
    <input type="hidden" name="id_auto" value="<? echo($id);?>" />
    



  <button type="submit" class="btn btn-primary">Оформить продажу</button>
</form>