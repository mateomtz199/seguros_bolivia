$(document).ready(function () {
    let costoMensualAsegurado;
    let costoMensualDependiente;
    let nDependientes;
    let ultimaFecha;
    let nMes;
    let nombreAsegurado;
    let plan;
    let precioDependiente;
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

            nombreAsegurado = ui.item.value;
            plan = ui.item.plan;
            precioDependiente = ui.item.precioDep;

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

        //Asignar a parametros
        $('#nombreAseg').val(nombreAsegurado);
        $('#mesPago').val(itemsHelper.fechaTermino());
        $('#cantidad').val(itemsHelper.granTotal());
        $('#factura').val(itemsHelper.facturaPlantilla());
        $('#factura').val(itemsHelper.facturaPlantilla());
        $('#fechaPago').val(moment().format('YYYY-MM-DD'));
        $('#nMes').val(nMes);
        $('#nDependiente').val(nDependientes);
        $('#precioDependiente').val(nDependientes);
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
            $('#fechaPago').val('');
            $('#mesPago').val('');
            $('#cantidad').val('');
            $('#factura').val('');
            $('#nombreAseg').val('');
            $('#nMes').val('');
            $('#nDependiente').val('');
            $('#precioDependiente').val('');
        },
        granTotal: function () {
            let subAseg = $('#subTotalAsegurado').val();
            let subDep = $('#subTotalDependientes').val();
            let total = subAseg * 1 + subDep * 1;
            $('#granTotal').text('$ ' + total);
            return total;
        },
        fechaTermino: function () {
            let inicio = moment(ultimaFecha);
            let final = inicio.add(nMes, 'months');
            $('#mesTermino').text(final.format('YYYY-MM-DD'));
            return final.format('YYYY-MM-DD');
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
            if (nMes < 0) {
                $('#primerPago').text(
                    'Tienes meses pagados adelantados: ' + nMes * -1
                );
                return 0;
            } else if (nMes > 0) {
                return nMes;
            } else {
                $('#primerPago').text(
                    'El asegurado no ha realizado ningún pago aún'
                );
                return 0;
            }
        },
        facturaPlantilla: function () {
            return (
                '[Asegurado: ' +
                nombreAsegurado +
                ', Plan: ' +
                plan +
                ', Costo x mes: ' +
                costoMensualAsegurado +
                ', Dependientes: ' +
                nDependientes +
                ', Último mes: ' +
                ultimaFecha +
                ', Fecha termino: ' +
                this.fechaTermino() +
                ', meses pagados: ' +
                nMes +
                ']'
            );
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
