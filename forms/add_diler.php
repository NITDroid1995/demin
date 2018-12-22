<div class="modal fade" id="dilers" tabindex="-1" role="dialog" aria-labelledby="dilers" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Добавление дилера</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form action="/demin/logic/add_diler.php" enctype='multipart/form-data' method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Код авторизации дилера</label>
    <input type="text" class="form-control" id="diler_code" placeholder="" name="code" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput">Пароль дилера</label>
    <input type="text" class="form-control" id="password_diler" placeholder="" name="password" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">ФИО дилера</label>
    <input type="text" class="form-control" id="fio" placeholder="" name="fio" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput">Адрес дилера</label>
    <input type="text" class="form-control" id="adress" placeholder="" name="adress" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput">Телефон дилера</label>
    <input type="text" class="form-control" id="number" placeholder="" name="number" required>
  </div>
    <div class="form-group">
    <label for="exampleFormControlFile1">Выберите изображение</label>
    <input type="file" class="form-control-file" id="img" name="uploadfile" required>
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