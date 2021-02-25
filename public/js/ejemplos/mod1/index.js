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
        } else {
            var id_form = "#form" + id
            $(id_form).addClass('form-inline')
            $(this).toggle('explode')
        }
    })
});

//Return result
var cal = (state, val) => {
    switch (state) {
        case 1: {
            return val * 2
            break
        }
        case 2: {
            return "La suma del doble del numero mas el numeros es " + ((val * 2) + val)
            break
        }
        case 3: {
            let sum = 0
            for (let i = 1; i <= val; i++) {
                sum += i
            }
            return "La suma de los numeros comprendidos es: " + sum
            break
        }
    }
}

$(".formulario").each(function (index) {
    $(this).submit((e) => {
        e.preventDefault()
        var id_resultado = parseInt($(this).attr('data-form')),
            input = '#input' + id_resultado,
            explain = '#explain' + id_resultado,
            resultp = '#resultp' + id_resultado,
            ejemplocuadro = '#ejemplocuadro' + id_resultado,
            id_resultado_content = '#resultado' + id_resultado,
            dato = parseInt($(input).val())

        var validation = !isNaN(dato) ? true : false

        if (validation) {
            $(id_resultado_content).toggle('explode')
            $(resultp).text(cal(id_resultado, dato)) //Set value to resultp id
            $(explain).toggle('explode')
            $(this).toggle('explode')
            $(ejemplocuadro).toggle('explode')
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Dato incorrecto!!',
                text: 'Por favor ingrese un numero',
            })
        }
    })
});


// When start script

for (let i = 1; i <= 6; i++) {
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
            console.log(num)
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
            console.log(num)
            num -= 23.5
            $(linea).text(msg)
            $('#ejemplocuadro' + num_exercise).css('top', num)
        }

    })
})