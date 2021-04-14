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
        1: "1.	Se define un tipo de dato Nat el cual se iguala a una condición | de dos funciones de la instancia Ord",
        2: "2.	Se declara una instancia de Ord del tipo de dato Nat donde se le especifica el where",
        3: "3.	Dentro de la instancia se iguala la condición de si función Cero es menor o igual a cualquier otro dato entonces se devolverá un True",
        4: "4.	Se define la segunda condición donde se especifica que si el llamado a la función Suc es menor o igual a Cero se devolverá un False",
        5: "5.	Por último, la última condición donde si Suc pasándole el parámetro n es menor a la función Suc pasándole el parámetro m, retornara la validación de n <= m",
        'line_actual': 1,
        'total_lines': 5
    },

    'ejercicio2': {
        1: "1.	1.	Como la igualdad es la estructural y el orden es el predeterminado por la enumeración entonces solo basta con igualar el tipo de dato a los colores correspondientes especificando el deriving de las clases (Eq, Ord)",
        'line_actual': 1,
        'total_lines': 1
    },
    'ejercicio3': {
        1: "1.	Se declara la sentencia sumNum la cual recibe un Integer y retorna otro Integer",
        2: "2.	Luego se declara la función sumNum, utilizando la sesión del operador suma, se aumenta el número que recibe la función en 1. NOTA: nótese que se esta usando la parcialización en esta función.",
        3: "3.	Salto de línea",
        4: "4.	Después, se declara la sentencia de la función serieNums, la cual recibe dos tipos Integer y retorna un String",
        5: "5.	Se declara el primer patrón, donde se especifica que cuando el segundo argumento sea 0, la función retornara un string vacío “ “",
        6: "6.	Se declara el segundo patrón, el cual recibe los parámetros a y n. Luego va a concatenar el valor que retorna la función sumNum la cual se le pasa el parámetro a con el llamado recursivo a la misma función serieNums, ahora pasándole dos parámetros (a + 1) y (n -1)",
        7: "7.	Se declara el segundo patrón, el cual recibe los parámetros a y n. Luego va a concatenar el valor que retorna la función sumNum la cual se le pasa el parámetro a con el llamado recursivo a la misma función serieNums, ahora pasándole dos parámetros (a + 1) y (n -1)",
        'line_actual': 1,
        'total_lines': 7
    },
    'ejercicio4': {
        1: "1.	Una mochila puede representarse mediante unalista de pares donde cada par consta del elemento en cuesti ́on junto con el n ́umero deveces que dicho elemento est ́a en la mochila",
        'line_actual': 1,
        'total_lines': 1
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