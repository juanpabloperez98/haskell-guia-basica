let resultados = {
    1 : {
        "respuest_correct" : "option3",
        "respuest_selected" : ""
    },
    2: {
        "question1" : {
            "respuest_correct" : "true",
            "respuest_selected" : "false"
        },
        "question2" : {
            "respuest_correct" : "true",
            "respuest_selected" : "false"
        },
        "question3" : {
            "respuest_correct" : "false",
            "respuest_selected" : "false"
        }
    },
    3 : {
        "respuest_correct" : "option1",
        "respuest_selected" : ""
    }
}


var getNumResults = () => {
    var total = 0    
    for(var key in resultados){
        var index = key.toString(),
            obj = resultados[index] 
        if(key != 2){
            if(obj.respuest_correct == obj.respuest_selected){
                total += 1
            }
        }else{
            for(var key2 in obj){
                if(obj[key2].respuest_correct == obj[key2].respuest_selected){
                    total += 1
                }
            }
        }
    }
    return total
}

//Reset Forms when script is loaded
$('.form').each(function(index) {
    $(this)[0].reset()
});

// Changed color when is active
$(".item").each(function(index) {
    $(this).on('click', (e) => {
        // e.preventDefault()
        $(".item").each(function(index) {
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

$('.ejecutar').each(function(index) {
    $(this).on('click', (e) => {
        e.preventDefault()
        $(this).toggle('explode')
        let id = '#btn' + $(this).attr('data-close'),
            id_content = '#result-code' + $(this).attr('data-close')
        $(id).addClass('btn')
        $(id_content).toggle('explode')
    })
});

$('.cerrar').each(function(index) {
    $(this).on('click', (e) => {
        e.preventDefault()
        $(this).removeClass('btn')
        let id = $(this).attr('id')
        id = id[id.length - 1]
        id_content = '#result-code' + id
        id = '#probar' + id
        $(id).toggle('explode')
        $(id_content).toggle('explode')
    })
});

$('#start-exe').on('click', (e) => {
    e.preventDefault()
    $('#ejercicio1').toggle('explode')
    $('#enunciado').toggle('explode')
})

$('.continue').each(function(index) {
    $(this).on('click', (e) => {
        // e.preventDefault()
        var id = parseInt($(this).attr('data-btnindex'))
        switch(id){
            case 1:{
                var selected = $("input[type='radio'][name='radiosexercise1']:checked");
                if (selected.length > 0) {
                    selectedVal = selected.val();
                    resultados[1].respuest_selected = selectedVal
                    $('#ejercicio'+id).toggle('explode')
                    $('#ejercicio'+(id+1)).toggle('explode')
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'No se ha escogido ninguna opcion',
                        text: 'Por favor escoja alguna opción para poder continuar',
                    })
                }
                break
            }
            case 2:{
                $('#ejercicio'+id).toggle('explode')
                $('#ejercicio'+(id+1)).toggle('explode')
                break
            }
            case 3:{
                var selected = $("input[type='radio'][name='radiosexercise2']:checked");
                if (selected.length > 0) {
                    selectedVal = selected.val();
                    resultados[3].respuest_selected = selectedVal
                    $('#ejercicio'+id).toggle('explode')
                    $('#result').toggle('explode')
                    let num_total = getNumResults()
                    $('#correct_ans').text(num_total)
                    if(num_total > 3){
                        $('#recomendation').addClass('succ')
                        $('#recomendation').html('Felicidades ha acertado en la mayoría de preguntas<br>Puede pasar al siguiente módulo')
                    }else{
                        $('#recomendation').addClass('err')
                        $('#recomendation').html('Lo sentimos no ha acertado en la mayoría de preguntas<br>Le recomendamos volver a practicar el módulo')
                    }
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'No se ha escogido ninguna opcion',
                        text: 'Por favor escoja alguna opción para poder continuar',
                    })
                }
                break
            }
        }
    })
});

$('.btontruefalse').each(function(index) {
    $(this).change(() => {
        var index_btn = parseInt($(this).attr('data-indexbton')),
            datastatus = '#data-status'+index_btn,
            result_index = "question"+index_btn
        if(this.checked){
            resultados[2][result_index].respuest_selected = "true"
            $(datastatus).text('Verdadero')
            $(datastatus).removeClass('false')
            $(datastatus).addClass('true')
        }else{
            resultados[2][result_index].respuest_selected = "false"
            $(datastatus).text('Falso')
            $(datastatus).removeClass('true')
            $(datastatus).addClass('false')
        }
    })
});