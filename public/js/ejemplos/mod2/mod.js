let page = '{!! $dad_page !!}'
var lista_nums = []

var msg_error = (msg) => {
    Swal.fire({
        icon: 'error',
        title: 'Dato incorrecto!!',
        text: msg
    })
}

var pasoapaso = {
    'ejercicio1': {
        1: "1 Se declara la sentencia dobleNumero en forma de función, indicándole que recibe un valor y retorna otro valor",
        2: "2 Se inicializa la sentencia dobleNumero, se le indica que recibe un parámetro x y esta función retornara el valor de multiplicar x * 2",
        'line_actual': 1,
        'total_lines': 2
    },
    'ejercicio2': {
        1: "1 Se declara la sentencia dobleNumero la cual se indica que recibirá un valor entero y se retornará otro valor entero",
        2: "2 Se inicializa la sentencia dobleNumero, se le indica que recibe un parámetro x y esta función retornara el valor de multiplicar x * 2",
        3: "3 Se crea una sesión la cual se llamara ex (NOTA: la expresión IO() se le indica a la sesión para declarar que se van a usar acciones de entrada y salida para poder pedir datos al usuario)",
        4: "4 La sentencia creada se iguala a un bloque de instrucciones (NOTA: la expresión do, sirve para indicar que se va hacer un bloque que contendrá múltiples acciones I/O)",
        5: "5 Se utiliza la función putStrLn para imprimir pon pantalla un mensaje, en este caso el mensaje es: “Ingrese número”",
        6: "6 La función getLine es una función de entrada, por lo que permite que un usuario ingrese un dato, al utilizar el <- se le asigna el valor ingresado por el usuario a una variable llamada line1",
        7: "7 Cada dato que ingrese el usuario utilizando la función getLine, es tomado como un dato de tipo string, por lo que para convertirlo a entero se utiliza la función read seguido de la variable que almacena el dato ingresado, en este caso line1 y luego se le indica con :: Int que se quiere convertir a un tipo de dato entero, el valor convertido será almacenado en una variable llamada num",
        8: "8 Ahora se hace el llamado a la función dobleNumero pasándole como parámetro la variable num (Recordar que esta función retorna el número pasado como parámetro multiplicado por 2), el resultado retornado se almacenara en la variable doble",
        9: "9 Luego se realiza la suma entre los valores almacenados en las variables doble (recordar que el valor de esta variable fue lo que retorno la función dobleNumero) y num (recordar que el valor de esta variable es el dato ingresado por el usuario), esta operación es almacenada en una variable llamada suma",
        10: "10 Por ultimo se imprime un mensaje con el resultado de la suma (NOTA: se utiliza la función print puesto que esta imprime cualquier tipo de valor ya sea string, entero o cualquier otro sin embargo, para concatenar el mensaje y el valor de la suma es necesario usar la función show que permite convertir a string un entero, en este caso el entero de la variable suma)",
        'line_actual': 1,
        'total_lines': 10
    },
    'ejercicio3': {
        1: "1 Se crea una sesión llamada ex2 (Similar a la del ejemplo anterior) y se le indica que va a usar acciones de entrada y salida",
        2: "2 La sentencia creada se iguala a un bloque de instrucciones",
        3: "3 Se utiliza la función putStrLn para imprimir pon pantalla un mensaje, en este caso el mensaje es: “Ingrese número”",
        4: "4 Se utiliza la función getLine para pedirle un número al usuario, este dato se almacena en la variable num",
        5: "5 Se convierte el dato a entero utilizando la función read",
        6: "6 Se utiliza la función sum indicándole que se quiere sumar todos los números comprendidos entre 1 y el número ingresado por el usuario, el resultado de esa suma, es almacenado en la variable suma",
        7: "7 Se imprime el mensaje del total de la suma, utilizando la función show se convierte la variable suma en string para poder concatenarla con el mensaje",
        'line_actual': 1,
        'total_lines': 7
    },
    'ejercicio4': {
        1: "Esta es la línea 1 de la explicación paso a paso",
        2: "Esta es la línea 2 de la explicación paso a paso",
        3: "Esta es la línea 3 de la explicación paso a paso",
        4: "Esta es la línea 4 de la explicación paso a paso",
        5: "Esta es la línea 5 de la explicación paso a paso",
        6: "Esta es la línea 6 de la explicación paso a paso",
        7: "Esta es la línea 7 de la explicación paso a paso",
        8: "Esta es la línea 8 de la explicación paso a paso",
        9: "Esta es la línea 9 de la explicación paso a paso",
        10: "Esta es la línea 10 de la explicación paso a paso",
        11: "Esta es la línea 11 de la explicación paso a paso",
        12: "Esta es la línea 12 de la explicación paso a paso",
        13: "Esta es la línea 13 de la explicación paso a paso",
        'line_actual': 1,
        'total_lines': 13
    },
    'ejercicio5': {
        1: "Esta es la línea 1 de la explicación paso a paso",
        2: "Esta es la línea 2 de la explicación paso a paso",
        3: "Esta es la línea 3 de la explicación paso a paso",
        4: "Esta es la línea 4 de la explicación paso a paso",
        5: "Esta es la línea 5 de la explicación paso a paso",
        6: "Esta es la línea 6 de la explicación paso a paso",
        7: "Esta es la línea 7 de la explicación paso a paso",
        8: "Esta es la línea 8 de la explicación paso a paso",
        9: "Esta es la línea 9 de la explicación paso a paso",
        10: "Esta es la línea 10 de la explicación paso a paso",
        11: "Esta es la línea 11 de la explicación paso a paso",
        12: "Esta es la línea 12 de la explicación paso a paso",
        13: "Esta es la línea 13 de la explicación paso a paso",
        14: "Esta es la línea 14 de la explicación paso a paso",
        15: "Esta es la línea 15 de la explicación paso a paso",
        16: "Esta es la línea 16 de la explicación paso a paso",
        17: "Esta es la línea 17 de la explicación paso a paso",
        'line_actual': 1,
        'total_lines': 17
    },
    'ejercicio6': {
        1: "Esta es la línea 1 de la explicación paso a paso",
        2: "Esta es la línea 2 de la explicación paso a paso",
        3: "Esta es la línea 3 de la explicación paso a paso",
        4: "Esta es la línea 4 de la explicación paso a paso",
        5: "Esta es la línea 5 de la explicación paso a paso",
        6: "Esta es la línea 6 de la explicación paso a paso",
        7: "Esta es la línea 7 de la explicación paso a paso",
        8: "Esta es la línea 8 de la explicación paso a paso",
        9: "Esta es la línea 9 de la explicación paso a paso",
        10: "Esta es la línea 10 de la explicación paso a paso",
        11: "Esta es la línea 11 de la explicación paso a paso",
        12: "Esta es la línea 12 de la explicación paso a paso",
        13: "Esta es la línea 13 de la explicación paso a paso",
        14: "Esta es la línea 14 de la explicación paso a paso",
        15: "Esta es la línea 15 de la explicación paso a paso",
        16: "Esta es la línea 16 de la explicación paso a paso",
        17: "Esta es la línea 17 de la explicación paso a paso",
        18: "Esta es la línea 18 de la explicación paso a paso",
        19: "Esta es la línea 19 de la explicación paso a paso",
        'line_actual': 1,
        'total_lines': 19
    }
}

var cal = (state, val) => {
    switch (state) {
        case 1: {
            let r = ''
            for (let i = 0; i < val.length; i++) {
                const element = val[i];
                r += element.toString() + ''
            }
            return r
            break
        }
        case 2: {
            var element = '['
            for (let i = 0; i < val.length; i++) {
                i != val.length - 1 ? element += val[i] + ',' : element += val[i] + ']'
            }
            return element
            break
        }
        case 3: {
            var v1 = val % 4,
                v2 = val % 100,
                v3 = val % 400
            if (v1 == 0 && v2 == 0 && v3 == 0) {
                return true
            }
            return false
            break
        }
        case 4:{
            var num = val[0],
                num2 = val[1]
            return result = num*10 + num2
            break
        }
        case 5:{
            var num = val[0],
                num2 = val[1]
            num2 *= num
            return num2
            break
        }
        case 6:{
            let r = '',
                v1 = val*2,
                v2 = val*3,
                v3 = val*4
            r = '['+v1+','+v2+','+v3+']'
            return r
            break
        }
    }
}

var validation_ = (state, val) => {
    switch (state) {
        case 1:
            let a_ = [],
                first_letter = val[0],
                last_letter = val[val.length - 1],
                pass_last_letter = parseInt(val[val.length - 2])
            if (first_letter == '[' && last_letter == ']' && !isNaN(pass_last_letter)) {
                for (let i = 1; i < val.length - 1; i++) {
                    const element = parseInt(val[i]);
                    if (!isNaN(element) || val[i] == ',') {
                        val[i] != ',' ? a_.push(element) : null
                    } else {
                        return [false]
                        break
                    }
                }
            } else {
                return [false]
            }
            return [true, a_]
            break;
        case 2:
        case 3:
        case 4:
        case 5:
        case 6:
            val_ = parseInt(val)
            return [!isNaN(val_), val_]
            break
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
            dato = $(input).val()

        id_resultado == 1 ? msg = 'Por favor ingrese una lista' : msg = 'Por favor ingrese un número'

        validation = validation_(id_resultado, dato)
        if(id_resultado == 4 || id_resultado == 5){ //Validar si estan en los ejercicios 4 o 5 (que requieren dos datos)
            lista_nums.push(parseInt(dato))
            id_resultado == 4 ? $('#form4')[0].reset() : $('#form5')[0].reset()  //Dependiendo el ejercicio se fomatea su formulario correspondiente
            if(lista_nums.length == 2){ //Valida si ya se han ingresado los dos números
                $(id_resultado_content).toggle('explode')
                $(resultp).text(cal(id_resultado, lista_nums)) //Set value to resultp id
                $(explain).toggle('explode')
                $(this).toggle('explode')
                $(ejemplocuadro).toggle('explode')
                lista_nums = []
            }else{
                $(input).attr('placeholder','Ingrese numero 2')
            }
        }else{
            if (validation[0]) {
                $(id_resultado_content).toggle('explode')
                $(resultp).text(cal(id_resultado, validation[1])) //Set value to resultp id
                $(explain).toggle('explode')
                $(this).toggle('explode')
                $(ejemplocuadro).toggle('explode')
            } else {
                msg_error(msg)   
            }
        }
        
    })
});