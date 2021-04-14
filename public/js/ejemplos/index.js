// Variables GLOBALES

//When start script
$(".item").each(function (index) {
    var v = $(this).attr('data-name')
    v1 = parseInt(v[v.length - 1])
    if (v1 == id) {
        $(this).addClass('active')
        $('#' + v).toggle('explode')
    }
});

//Changed of item
$(".item").each(function (index) {
    $(this).on('click', (e) => {
        // e.preventDefault()
        $(".item").each(function (index) {
            if ($(this).hasClass('active')) {
                $(this).toggleClass('active')
                let id = '#' + $(this).attr('data-name')
                $(id).toggle('explode')
            }
        })
        $(this).toggleClass('active')
        let id = '#' + $(this).attr('data-name')
        $(id).toggle('explode')
    })
});

//When click to button probar
$(".probar").each(function (index) {
    var id = $(this).attr('data-btnIdentity')
    $(this).on('click', (e) => {
        e.preventDefault()
        if ($(this).hasClass('reduccion')) {
            let reducc = '#reducc' + id,
                explain = '#explain' + id
            $(reducc).toggle('explode')
            $(explain).toggle('explode')
            $(this).toggle('explode')
            $('#ejemplocuadro'+id).toggle('explode')
        } else {
            var id_form = "#form" + id
            $(id_form).addClass('form-inline')
            $(this).toggle('explode')
        }
    })
});


// When start script
if(page == 'funciones-orden-superior' || page == 'definicion-tipos' || page == 'clases'){
    var mx = 4
}else{
    var mx = 6
}

for (let i = 1; i <= mx; i++) {
    let linea = '#explain_code' + i,
        reference = 'ejercicio' + i,
        id_ = pasoapaso[reference]['line_actual'],
        msg = pasoapaso[reference][id_]
    $(linea).text(msg)
}


$('.paso-right').each(function (index) {
    var num_exercise = parseInt($(this).attr('data-exercise')),
        id_ = 'ejercicio' + num_exercise
    $(this).on('click', (e) => {
        e.preventDefault()
        if (pasoapaso[id_]['line_actual'] != pasoapaso[id_]['total_lines']) {
            pasoapaso[id_]['line_actual'] += 1
            var i = pasoapaso[id_]['line_actual'],
                msg = pasoapaso[id_][i],
                linea = '#explain_code' + num_exercise,
                valor = $('#ejemplocuadro' + num_exercise).css('top'),
                lon = (valor.length - 2),
                num = ''
            for (let i = 0; i < lon; i++) {
                num += valor[i]
            }
            num = parseFloat(num)
            num += 23.5
            $(linea).text(msg)
            $('#ejemplocuadro' + num_exercise).css('top', num)
        }
    })
})

$('.paso-left').each(function (index) {
    var num_exercise = parseInt($(this).attr('data-exercise')),
        id_ = 'ejercicio' + num_exercise
    $(this).on('click', (e) => {
        e.preventDefault()
        if (pasoapaso[id_]['line_actual'] != 1) {
            pasoapaso[id_]['line_actual'] -= 1
            var i = pasoapaso[id_]['line_actual'],
                msg = pasoapaso[id_][i],
                linea = '#explain_code' + num_exercise,
                valor = $('#ejemplocuadro' + num_exercise).css('top'),
                lon = (valor.length - 2),
                num = ''
            for (let i = 0; i < lon; i++) {
                num += valor[i]
            }
            num = parseFloat(num)
            num -= 23.5
            $(linea).text(msg)
            $('#ejemplocuadro' + num_exercise).css('top', num)
        }

    })
})

