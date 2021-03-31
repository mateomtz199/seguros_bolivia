$(document).ready(function () {
    let costoMensualAsegurado;
    let costoMensualDependiente;
    let nDependientes;
    let ultimaFecha;
    let nMes;
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
                    response(
                        $.map(data, function (item) {
                            return {
                                value: item.nombre,
                                id: item.id,
                                plan: item.plan,
                                precio: item.precio,
                                dependientes: item.dependientes,
                                precioDep: item.precioDependiente,
                                mesPendiente: item.numeroMesPendiente,
                                ultimoMes: item.ultimoPagoMes,
                            };
                        })
                    );
                },
            });
        },
        select: function (event, ui) {
            itemsHelper.vaciarValores();
            $('#plan').val(ui.item.plan);
            $('#aseguradoId').val(ui.item.id);
            $('#precio').val(ui.item.precio);
            $('#dependientes').val(ui.item.dependientes);
            $('#precioDependiente').val(ui.item.precioDep);

            costoMensualAsegurado = ui.item.precio;
            costoMensualDependiente = ui.item.precioDep;
            nDependientes = ui.item.dependientes;
            ultimaFecha = itemsHelper.mesPendiente(ui.item.ultimoMes);

            let nmes = itemsHelper.mesPendientePago(ui.item.mesPendiente);
            $('#ultimoMes').val(ultimaFecha);
            $('#mesPendiente').val(nmes);
        },
    });

    $('#nMesPagar').on('keyup keydown change', function (event) {
        nMes = $('#nMesPagar').val();
        $('#subTotalAsegurado').val(itemsHelper.subtotalAsegurado(nMes));
        $('#subTotalDependientes').val(
            itemsHelper.subTotalDependientes(
                nMes,
                nDependientes,
                costoMensualDependiente
            )
        );
        itemsHelper.granTotal();
        itemsHelper.fechaTermino();
    });

    var itemsHelper = {
        subtotalAsegurado: function (nMes) {
            return nMes * costoMensualAsegurado;
        },
        subTotalDependientes: function (mes, nDep, precioDep) {
            return mes * nDep * precioDep;
        },
        vaciarValores: function () {
            $('#nMesPagar').val('');
            $('#subTotalAsegurado').val('');
            $('#subTotalDependientes').val('');
            $('#granTotal').text('0.0');
            $('#mesTermino').text('');
            $('#primerMesPago').text('');
            $('#primerPago').text('');
        },
        granTotal: function () {
            let subAseg = $('#subTotalAsegurado').val();
            let subDep = $('#subTotalDependientes').val();
            let total = subAseg * 1 + subDep * 1;
            $('#granTotal').text('$ ' + total);
        },
        fechaTermino: function () {
            let inicio = moment(ultimaFecha);
            let final = inicio.add(nMes, 'months');
            $('#mesTermino').text(final.format('DD-MM-YYYY'));
        },
        mesPendiente: function (mes) {
            if (mes) {
                return mes;
            } else {
                $('#primerMesPago').text('Empieza su mensualidad');
                return moment().format('YYYY-MM-DD');
            }
        },
        mesPendientePago: function (nMes) {
            if (nMes) {
                return nMes;
            } else {
                $('#primerPago').text(
                    'El asegurado no ha realizado ningún pago aún'
                );
                return 0;
            }
        },
    };
});

(function () {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            'submit',
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            },
            false
        );
    });
})();
