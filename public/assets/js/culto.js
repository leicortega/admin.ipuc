$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function agregar_asistencia(id, pico_cedula) {
    $('#agregar-hermanos-modal').modal('show')

    $('#culto_id').val(id)
    $('#pico_cedula').val(pico_cedula)

    cargar_hermanos_culto(id, pico_cedula)
    cargar_asistentes(id)
}

function cargar_hermanos_culto(id, pico_cedula) {
    $.ajax({
        url: '/cultos/cargar_asistencia',
        type: 'GET',
        data: {id:id, pico_cedula:pico_cedula},
        success: function (data) {
            console.log(data)
            content = '';
            data.forEach(hermano => {
                content += `
                    <option value="${hermano.id}">${hermano.nombre} - ${hermano.telefono}</option>
                `
            });
            $('#hermano_id').html(content)
        }
    })
}

$('#agregar_asistencia').submit(function () {
    $.ajax({
        url: '/cultos/agregar_asistencia',
        type: 'POST',
        data: $('#agregar_asistencia').serialize(),
        success: function (data) {
            console.log(data)
            if (data.id > 0) {
                cargar_asistentes(data.id)
                cargar_hermanos_culto(data.id, data.pico_cedula)
            }
        }
    })

    return false;
})

function cargar_asistentes(culto_id) {
    $.ajax({
        url: '/cultos/cargar_asistentes',
        type: 'GET',
        data: {culto_id:culto_id},
        success: function (data) {
            content = ''
            data.forEach(item => {
                content += `
                    <tr class="intro-x">
                        <td class="w-40">
                            <span class="font-medium whitespace-no-wrap">${ item.hermano.nombre }</span> 
                        </td>
                        <td>
                            <span class="font-medium whitespace-no-wrap">${ item.hermano.telefono }</span> 
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-theme-9 mr-3" href="javascript:;" onclick="confirmar_asistencia_modal(${ item.id }, ${ item.culto_id }, '${ item.hermano.nombre }')"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Confirmar </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" onclick="eliminar_asistencia(${ item.id }, ${ item.culto_id })"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                `
            });
            $('#hermanos_asistentes').html(content)
        }
    })
}

function eliminar_asistencia(id, culto_id) {
    $.ajax({
        url: '/cultos/eliminar_asistencia',
        type: 'POST',
        data: {id:id, culto_id:culto_id},
        success: function (data) {
            cargar_asistentes(data)
        }
    })
}

function confirmar_asistencia_modal(id, culto_id, nombre) {
    $('#confirmar_asistencia_modal_title').text('Confirmar asistencia de '+nombre)
    $('#asistencia_id').val(id)
    $('#culto_id_asistencia').val(culto_id)

    $('#confirmar_asistencia_modal').modal('show');
}

function confirmar_realizado(id) {
    $('#confirmar-realizado-modal').modal('show')
    $('#culto_id_realizado').val(id)
}

$('#confirmar_asistencia').submit(function () {
    $.ajax({
        url: '/cultos/confirmar_asistencia',
        type: 'POST',
        data: $('#confirmar_asistencia').serialize(),
        success: function (data) {
            cargar_asistentes(data)
            $('#confirmar_asistencia_modal').modal('hide');
        }
    })

    return false;
})