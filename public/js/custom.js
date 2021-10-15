/**
 * Отлавливаем нажатие кнопки сохранить
 */
$( document ).ready(function() {
    $("#send_ajax").click(
        function(){
            sendAjax();
            return false;
        }
    );
});


/**
 * Получение данных с формы и отправка их через AJAX
 */
function sendAjax() {
    console.log($('#photo'));
    var check_type = $('#check_type').val();
    var photo  = $('#photo').prop('files')[0];
    var form_data = new FormData();

    form_data.append('check_type', check_type);
    form_data.append('photo', photo);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:     '/check/creat',
        type:     "POST",
        data: form_data,
        contentType: false,
        processData: false,
        success: function() {
            alert('Чек успешно загружен');
        },
        error: function() {
            alert ('Ошибка зазгрузки чека, проверьте фото')
        }
    });
}
