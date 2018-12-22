<div class="modal fade" id="clients" tabindex="-1" role="dialog" aria-labelledby="clients" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Добавление клиента</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form action="/demin/logic/add_client.php" enctype='multipart/form-data' method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Фамилия</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="sername" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Имя</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="name" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput">Отчество</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="second_name" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput">Город</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="city" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput">Адрес</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="adress" required>
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput">Контактный телефон</label>
    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="+79053211060" size="12" name="number" required>
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