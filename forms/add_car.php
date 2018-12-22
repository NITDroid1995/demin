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
  ?>

</select>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Модель автомобиля</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="модель" name="model" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Марка автомобиля</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="марка" name="mark" required >
  </div>

    <div class="form-group">
    <label for="formGroupExampleInput2">Пробег</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="пробег" name="probeg" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Цена</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="цена" name="price" required>
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