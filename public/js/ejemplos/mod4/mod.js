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
        1: "1.	Se declara la sentencia esPar la cual se indica que va a recibir un Integer y devolver un Bool",
        2: "2.	Luego se declara la función con notación lamda, la cual va de volver un Verdadero siempre que el modulo del valor x recibido por la función entre 2 sea igual a cero, de lo contrario devolverá Falso",
        3: "3.	Salto de línea",
        4: "4.	Ahora se declara la sentencia sumaNum la cual se indica que recibe un Integer y retornar otro Integer",
        5: "5.	Por último, se declara la función en notación lamda, la cual se valida utilizando un if si el parámetro x es par o impar, dado el caso que sea par entonces al parámetro x se le suma un 2, de lo contrario se le suma un 1. Para validar si el número x es par o no, se hace el llamado a la función definida anteriormente llamada esPar pasándole como parámetro el x",
        'line_actual': 1,
        'total_lines': 5
    },
    'ejercicio2': {
        1: "1.	Se declara la sentencia maneraInversa la cual recibe 3 tipos Integer y retorna otro Integer",
        2: "2.	Luego se declara la función en notación lamda, la cual recibe los parámetros x y z, después multiplica z por 100, la variable y por 10 para después sumarse todas respectivamente z*100 + y * 10 + x",
        'line_actual': 1,
        'total_lines': 2
    },
    'ejercicio3': {
        1: "1.	Se declara la sentencia sumNum la cual recibe un Integer y retorna otro Integer",
        2: "2.	Luego se declara la función sumNum, utilizando la sesión del operador suma, se aumenta el número que recibe la función en 1. NOTA: nótese que se esta usando la parcialización en esta función.",
        3: "3.	Salto de línea",
        4: "4.	Después, se declara la sentencia de la función serieNums, la cual recibe dos tipos Integer y retorna un String",
        5: "5.	Se declara el primer patrón, donde se especifica que cuando el segundo argumento sea 0, la función retornara un string vacío “ “",
        6: "6.	Se declara el segundo patrón, el cual recibe los parámetros a y n. Luego va a concatenar el valor que retorna la función sumNum la cual se le pasa el parámetro a con el llamado recursivo a la misma función serieNums, ahora pasándole dos parámetros (a + 1) y (n -1)",
        'line_actual': 1,
        'total_lines': 6
    },
    'ejercicio4': {
        1: "1.	Se declara la sentencia exponente la cual recibe un Float y retorna otro Float",
        2: "2.	Luego se define la función exponente, la cual utilizando una sesión del operador elevado (**) retorna el valor ingresado como parámetro elevado al cuadrado. NOTA: nótese que se está usando la parcialización en esta función.",
        3: "3.	Salto línea",
        4: "4.	Se declara la sentencia dosVeces la cual se le especifica que va a recibir una función (Float -> Float), como la de exponente, y un parámetro Float, y retornara otro valor tipo Float",
        5: "5.	Se define la función dosVeces la cual recibe como parámetro una función f y un Float x, esta retornara el llamado dos veces de la función f, con el parámetro x",
        6: "6.	Salto de línea",
        7: "7.	Ahora se declara la sentencia de la función calcularExpo, la cual recibe un valor tipo Float y retorna otro tipo Float",
        8: "8.	Se define la función calcularExpo que recibe un parámetro n, en la cual se hace el llamado a la función dosVeces pasándole como parámetros la función exponente y el parámetro n ingresado al llamar la función",
        'line_actual': 1,
        'total_lines': 8
    }
}

// Modificar
var cal = (state, val) => {
    switch (state) {
        case 1: {
            return val[0] * val[1]
            break
        }
        case 2: {
            msg = ""
            switch(val){
                case 1:{
                    msg = "calle 1"
                    break
                }
                case 2:{
                    msg = "Carrera 1"
                    break
                }
                case 3:{
                    msg = "NA"
                    break
                }
                case 4:{
                    msg = "1"
                    break
                }
                default:{
                    msg = "No hay accion determinada"
                    break
                }
            }
            return msg
            break
        }
        case 3: {
            return "Bienvenido "+ val[0] + " su edad es: " + val[1] + " y su identificación es: "+ val[2]
            break
        }
        case 4: {
            msg = val.length > 0 ? "Lista con elementos" : "Lista Vacia"
            return msg
            break
        }
    }
}


// Modificar
var validation_ = (state, val) => {
    if (state == 1) {
        var dato_ = parseInt(val)
        return !isNaN(dato_) ? true : false
    } else { return val != "" ? true : false }
}


let setValuesResults = (lista,id_resultado, lista_nums) => {
    $(lista[0]).toggle('explode')
    $(lista[1]).text(cal(id_resultado, lista_nums)) //Set value to resultp id
    $(lista[2]).toggle('explode')
    $(lista[3]).toggle('explode')
    return []
}



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

        validation = id_resultado == 1 ? validation_(id_resultado, dato) : validation_(item3_, dato)

        if(id_resultado == 4){
            let first_letter = dato[0],
                last_letter = dato[dato.length - 1],
                pass_last_letter = dato[dato.length - 2]

            if (first_letter == '[' && last_letter == ']' && pass_last_letter != ',') {
                for (let i = 1; i < dato.length - 1; i++) {
                    const element = dato[i];
                    a_.push(element)
                }
                validation = true
            } else {
                validation = false
            }
        }


        switch (id_resultado) {
            case 3: {
                if (item3_ == 0) {
                    msg = 'Por favor ingrese un nombre'
                }
                break
            }
            case 4:{
                msg = 'Por favor ingrese una lista'
                break
            }
            default: {
                msg = 'Por favor ingrese un numero'
                break
            }
        }

        if (id_resultado == 1 && validation) {
            lista_nums.push(parseInt(dato))
            $('#form1')[0].reset()
            if (lista_nums.length == 2) {
                $(this).toggle('explode')
                lista_nums = setValuesResults([id_resultado_content,resultp,explain,ejemplocuadro],id_resultado, lista_nums)
            } else {
                let nm_ = lista_nums.length
                $(input).attr('placeholder', 'Ingrese numero ' + (nm_ + 1))
            }
        } else if (id_resultado == 3 && validation) {
            item3_ == 0 ? lista_nums.push(dato) : lista_nums.push(parseInt(dato))
            $('#form3')[0].reset()
            if (lista_nums.length == 3) {
                $(this).toggle('explode')
                lista_nums = setValuesResults([id_resultado_content,resultp,explain,ejemplocuadro],id_resultado, lista_nums)
            } else {
                let nm_ = lista_nums.length
                nm_ == 1 ? $(input).attr('placeholder', 'Ingrese edad') : $(input).attr('placeholder', 'Ingrese identificacion')
            }
        } else {
            if (validation) {
                $(id_resultado_content).toggle('explode')
                if(id_resultado == 4){
                    $(resultp).text(cal(id_resultado, a_)) //Set value to resultp id
                }else{
                    $(resultp).text(cal(id_resultado, parseInt(dato))) //Set value to resultp id
                }
                $(explain).toggle('explode')
                $(this).toggle('explode')
                $(ejemplocuadro).toggle('explode')
            } else {
                msg_error(msg)
            }
        }
    })
});