$(document).ready(function () {
    $('#cliente').autocomplete({
        source: function (request, response) {
            $.ajax({
                url:
                    'http://localhost/seguros_bolivia/asegurados/aseguradosJSON/' +
                    request.term,
                dataType: 'json',
                data: {
                    term: request.term,
                },
                success: function (data) {
                    console.log(data);
                    response(
                        $.map(data, function (item) {
                            return {
                                value: item.nombre,
                                id: item.id,
                                plan: item.plan,
                                precio: item.precio,
                                dependientes: item.dependientes,
                                precioDep: item.precioDependiente,
                            };
                        })
                    );
                },
            });
        },
        select: function (event, ui) {
            $('#plan').val(ui.item.plan);
            $('#aseguradoId').val(ui.item.id);
            $('#precio').val(ui.item.precio);
            $('#dependientes').val(ui.item.dependientes);
            $('#precioDependiente').val(ui.item.precioDep);
        },
    });
});
