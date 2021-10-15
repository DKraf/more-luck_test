@extends('layouts.app')

@section('content')
<div class="container">
    <div class="input-group">
        <p class="text-info">Максимальный размер файла, не должен превышать 3MB</p>
    </div>
     <form method="post" id="send_form" action="" enctype="multipart/form-data" class="form-inline md-form">
         <div class="card-body">
             <div class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupFile01">Загрузка чека</label>
                 <input type="file" class="form-control" name="photo" id="photo">
             </div>
             <div class="form-floating mb-3">
                 <select class="form-select" id="check_type" aria-label="Floating label select example">
                     <option selected>Открыть список</option>
                     <option value="0">Обычный</option>
                     <option value="1">Призовой</option>
                 </select>
                 <label for="floatingSelectGrid">Тип чека</label>
             </div>
             <div>
                 <button type="button" id="send_ajax" class="btn btn-primary mb-3">Сохранить</button>
             </div>
         </div>
     </form>
</div>
<div id="result_form"></div>
@endsection
