<?

include "functions.php";
$code_diler = $_SESSION['name'];


?>


<div class="modal fade" id="cars" tabindex="-1" role="dialog" aria-labelledby="cars" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Добавление автомобиля</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="http://nitdroid.dlinkddns.com/demin/logic/add_car.php" enctype='multipart/form-data' method="POST">
            <div class="form-group">
    <select class="form-control" name="user" type="text">
  <?
  loadUsers();

///////////////////////



//////////////////////
  ?>

</select>



  </div>

    <div class="form-group">
    <label for="type">Марка автомобиля</label>
    <select class="form-control" name="mark" id="type" required>
      <option value="1">Lada</option>
      <option value="2">Mersedes</option>
      <option value="3">BMW</option>

    </select>
  </div>
  <div class="form-group">
    <label for="kind">Модель автомобиля</label>
        <select class="form-control" name="model" id="kind" required>
      <option value="0">Не определено</option>

    </select>
  </div>
<script src="http://nitdroid.dlinkddns.com/demin/js/nit.js"></script>

    <div class="form-group">
    <label for="formGroupExampleInput2">Пробег</label>
    <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="пробег" name="probeg" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Цена</label>
    <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="цена" name="price" required> ₽
  </div>

    <div class="form-group">
    <label for="inputDate">Введите дату изготовления авто:</label>
    <input type="date" class="form-control" name="date" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Выберите изображение (форматы: .jpg, .jpeg)</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadfile" accept=".jpg, .jpeg" required>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
</form>

      </div>

    </div>
  </div>
</div>