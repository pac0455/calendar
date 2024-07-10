$(document).ready(() => {
    $('#fondo').val($('#color_fondo').val())
    $('#color_fondo').change(() => {
        $('#fondo').val($('#color_fondo').val())
    })
    $('#border').val($('#color_border').val())
    $('#color_border').change(() => {
        $('#border').val($('#color_border').val())
    })
    $('#texto').val($('#color_texto').val())
    $('#color_texto').change(() => {
        $('#texto').val($('#color_texto').val())
    })
    $('#update_calendar').on('click', () => {
        $.ajax({
            url: 'calendar/' + $('#event_id').data('id'),
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                titulo: $('#edit_title').val(),
                fechaHora_incio: $('#date_edit_start').val(),
                fechaHora_fin: $('#date_edit_end').val(),
                tipo_evento_id: $('#tipos_eventos_edit').val()
            },
            success(response) {
                console.log(response)
                window.location.reload()
            },
            error(error) {
                console.log(error)
            }
        })

    })
    $('.update_tipoEventos').on('click',async (e) => {
        const id = $(e.currentTarget).data('id')
        const data = await JSON.parse(localStorage.getItem('tipos_eventos'))
        let row = data.filter(item =>item.id == Number(id))
        $('#id_event_toUpdate').val(id)
        $('#nombre_toUpdate').val(row[0].nombre)
        $('#color_fondo, #fondo').val(row[0].fondo)
        $('#color_border, #border').val(row[0].border)
        $('#color_texto, #texto').val(row[0].texto)
    })
    $('#form_edit_tipoEventos').on('submit', (e) =>{
        e.preventDefault()
        let data = {}
         $('form#form_edit_tipoEventos :input').each((i,value) => {
            const name = $(value).attr('name')
            if(name && name !== 'id_event_toUpdate'){
                data[name] = ($(value).val())
            }
        })
        const id =  $('#id_event_toUpdate').val()
        $.ajax({
            url: `tipo_evento/${id}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'PUT',
            data: {...data},
            success(response){
                location.reload()
            },
            error(error){
                console.log(error)
            }
        })

    })
})
