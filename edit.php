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
<form style="margin-right: 3%; margin-left: 3%;" action="logic/update_car.php" method="POST">
  <div class="form-group">
    <label for="exampleInputPassword1">Модель</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="model" placeholder="<? echo($car_info['model']);?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Марка</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="mark" placeholder="<? echo($car_info['mark']);?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Пробег</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="probeg" placeholder="<? echo($car_info['probeg']);?>">
  </div>   
  <div class="form-group">
    <label for="exampleInputPassword1">Цена</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="price" placeholder="<? echo($car_info['price']);?>">
  </div>   
    <div class="form-group">
    <label for="exampleInputPassword1">Код клиента</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="code_client" placeholder="<? echo($car_info['code_client']);?>" readonly>
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Код дилера</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="code_diler" placeholder="<? echo($car_info['code_diler']);?>" readonly>
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Код Авто</label>
    
    <input type="hidden" name="id_auto" value="<? echo($id);?>" />
    <input type="text" class="form-control" name="id_auto" value="<? echo($id);?>" disabled="disabled" />
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>