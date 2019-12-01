function showForm(input){

    $('.main_form_filters').html(input);

}


function showFormUpdate(input){

    $('.main_form_filters_update').html(input);

}

$(document).on('change', '#cat-id',
    function() {
    if ($(this).val() !== '0') {
        var id = $(this).val();
        // alert(id);
        $.ajax({
            type: "get",
            url: "/admin/podguzniki-product/create",
            // async: false,
            data: {id: id},
            success: function (res) {
                if (!res) alert('Ошибка!');
                showForm(res);
            },
            error: function () {
                alert('Error1!');
            }
        });
    }
}

);



$(document).on('change', '#cat-id-update',
    function() {
        if ($(this).val() !== '0') {
            var id_up = $(this).val();
            alert('Вы меняете категорию товара с ID' + id_up);
            $.ajax({
                type: "get",
                url:  window.location.href,
                // async: false,
                data: {id_up: id_up},
                success: function (res) {
                    if (!res) alert('Ошибка!');
                    showFormUpdate(res);
                },
                error: function () {
                    alert('Error!');
                }
            });
        }
    }

);