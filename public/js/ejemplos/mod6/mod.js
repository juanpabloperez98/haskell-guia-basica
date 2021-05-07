var lista_nums = [],
    item3_ = 0,
    a_ = []


var msg_error = (msg) => {
    Swal.fire({
        icon: 'error',
        title: 'Dato incorrecto!!',
        text: msg
    })
}

var pasoapaso = {
    'ejercicio1': {
        1: "1.	Se crea la función mapSucesor, definiéndole que recibe una lista de Integer y retornara otra lista de Integer",
        2: "2.	Luego en la primera declaración de la función, se especifica que cuando se reciba una lista vacía, entonces retornara una lista vacía",
        3: "3.	Por ultimo se define la segunda declaración de la función, donde se especifica que cuando se recibe una lista NO VACÍA entonces el primer elemento de dicha lista se le suma 1, y se le concatena el llamado recursivo a la misma función con el resto de la lista.",
        'line_actual': 1,
        'total_lines': 3
    },
    'ejercicio2': {
        1: "1.	1.	Como la igualdad es la estructural y el orden es el predeterminado por la enumeración entonces solo basta con igualar el tipo de dato a los colores correspondientes especificando el deriving de las clases (Eq, Ord)",
        2: "2.	Luego se declara la función sumNum, utilizando la sesión del operador suma, se aumenta el número que recibe la función en 1. NOTA: nótese que se esta usando la parcialización en esta función.",
        3: "3.	Salto de línea",
        4: "4.	Después, se declara la sentencia de la función serieNums, la cual recibe dos tipos Integer y retorna un String",
        'line_actual': 1,
        'total_lines': 4
    },
    'ejercicio3': {
        1: "1.	Se declara la sentencia sumNum la cual recibe un Integer y retorna otro Integer",
        2: "2.	Luego se declara la función sumNum, utilizando la sesión del operador suma, se aumenta el número que recibe la función en 1. NOTA: nótese que se esta usando la parcialización en esta función.",
        3: "3.	Salto de línea",
        4: "4.	Después, se declara la sentencia de la función serieNums, la cual recibe dos tipos Integer y retorna un String",
        'line_actual': 1,
        'total_lines': 4
    },
    'ejercicio4': {
        1: "1.	Se declara la sentencia sumNum la cual recibe un Integer y retorna otro Integer",
        2: "2.	Luego se declara la función sumNum, utilizando la sesión del operador suma, se aumenta el número que recibe la función en 1. NOTA: nótese que se esta usando la parcialización en esta función.",
        3: "3.	Salto de línea",
        4: "4.	Después, se declara la sentencia de la función serieNums, la cual recibe dos tipos Integer y retorna un String",
        'line_actual': 1,
        'total_lines': 4
    }
}

// Modificar
var cal = (state, val) => {
    switch (state) {
        case 1: {
            let r = []
            val.forEach(element => {
                r.push(element += 1)
            });
            return r
        }
        case 2: {
            let r = []
            val.forEach(element => {
                if (element > 0) {
                    r.push(element)
                }
            });
            return r
        }
        case 3: {
            var num = val[val.length - 1]
            return num
        }
        case 4: {
            r = []
            for (let i = 0; i < val[1]; i++) {
                const element = val[0][i];
                r.push(element)
            }
            return r
        }
    }
}


// Modificar
var validation_ = (state, val, _last = 0) => {
    switch (state) {
        case 1: {
            let a_ = [],
                first_letter = val[0],
                last_letter = val[val.length - 1],
                pass_last_letter = parseInt(val[val.length - 2])
            if (first_letter == '[' && last_letter == ']' && !isNaN(pass_last_letter)) {
                for (let i = 1; i < val.length - 1; i++) {
                    if (val[i] == '-') {
                        element = parseInt(-1 * val[i + 1]);
                        i += 1
                    } else {
                        element = parseInt(val[i]);
                    }
                    if (!isNaN(element) || val[i] == ',') {
                        val[i] != ',' ? a_.push(element) : null
                    } else {
                        return [false]
                    }
                }
            } else {
                return [false]
            }
            return [true, a_]
        }
        case 2: {
            if (_last == 2) {
                val_ = parseInt(val)
                return [!isNaN(val), val]
            } else {
                let a_ = [],
                    first_letter = val[0],
                    last_letter = val[val.length - 1],
                    pass_last_letter = parseInt(val[val.length - 2])
                if (first_letter == '[' && last_letter == ']' && !isNaN(pass_last_letter)) {
                    for (let i = 1; i < val.length - 1; i++) {
                        if (val[i] == '-') {
                            element = parseInt(-1 * val[i + 1]);
                            i += 1
                        } else {
                            element = parseInt(val[i]);
                        }
                        if (!isNaN(element) || val[i] == ',') {
                            val[i] != ',' ? a_.push(element) : null
                        } else {
                            return [false]
                        }
                    }
                } else {
                    return [false]
                }
                return [true, a_]
            }
        }
        default: {
            return val != "" ? true : false
            break
        }
    }
}


let setValuesResults = (lista, id_resultado, lista_nums) => {
    $(lista[0]).toggle('explode')
    $(lista[1]).text(cal(id_resultado, lista_nums)) //Set value to resultp id
    $(lista[2]).toggle('explode')
    $(lista[3]).toggle('explode')
    return []
}

var num_ = 0
lista_ = []
// Modificar
$(".formulario").each(function (index) {
    $(this).submit((e) => {
        e.preventDefault()
        var id_resultado = parseInt($(this).attr('data-form')),
            input = '#input' + id_resultado,
            explain = '#explain' + id_resultado,
            resultp = '#resultp' + id_resultado,
            ejemplocuadro = '#ejemplocuadro' + id_resultado,
            id_resultado_content = '#resultado' + id_resultado,
            dato = $(input).val()
        msg = 'Por favor ingrese una lista'
        num_++
        id_resultado != 4 ? val = validation_(1, dato) : val = validation_(2, dato, num_)


        switch (id_resultado) {
            case 1:
            case 2:
                {
                    if (val[0]) {
                        $(id_resultado_content).toggle('explode')
                        $(resultp).text('[ ' + cal(id_resultado, val[1]) + ' ]') //Set value to resultp id
                        $(explain).toggle('explode')
                        $(this).toggle('explode')
                        $(ejemplocuadro).toggle('explode')
                    } else {
                        msg_error(msg)
                    }
                    break
                }
            case 3: {
                if (val[0]) {
                    $(id_resultado_content).toggle('explode')
                    $(resultp).text(cal(id_resultado, val[1])) //Set value to resultp id
                    $(explain).toggle('explode')
                    $(this).toggle('explode')
                    $(ejemplocuadro).toggle('explode')
                } else {
                    msg_error(msg)
                }
                break
            }
            case 4: {
                if (!val[0]) {
                    msg_error(msg)
                    num_--
                    console.log(num_)
                } else {
                    lista_.push(val[1])
                    $('#form4')[0].reset()
                    $('#input4').attr('placeholder','Ingrese número')
                }
                if (num_ == 2) {
                    $(id_resultado_content).toggle('explode')
                    $(resultp).text('[ ' + cal(id_resultado, lista_) + ' ]') //Set value to resultp id
                    $(explain).toggle('explode')
                    $(this).toggle('explode')
                    $(ejemplocuadro).toggle('explode')
                }
            }
        }
    })
});