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
        1: "1.	Se declara la sentencia aEntero, indicándole que va a recibir una lista de Integer y devolver un Integer",
        2: "2.	Se declara el primer patrón indicando cuando la lista solo tenga un elemento, devolviendo el elemento correspondiente de esa lista",
        3: "3.	Se declara el segundo patrón, en este se define las variables d y m que representan los dos primeros elementos de una lista, y xs que representa el resto de elementos que tenga la lista, esto se iguala al llamado recursivo hacía la misma función, en esta se multiplica el primer elemento por 10 y se le suma el segundo elemento de la lista para concatenarlos, al llamado recursivo se le pasa xs que representa el resto de la lista",
        'line_actual': 1,
        'total_lines': 3
    },

    'ejercicio2': {
        1: "1. Se declara la sentencia de la función aLista, indicándole que va a recibir un Integer y devolver una lista de Integer",
        2: "2. Se declara el primer patrón (el patrón de parada), diciendo que cuando el número sea cero, entonces devolver una lista vacía []",
        3: "3. Se declara el segundo patrón, en este se saca el modulo del valor de x entre 10 y se agrega a la lista, luego se hace el llamado recursivo a la función mandándole como parámetro la división entera de x entre 10",
        4: "4. Salto de línea",
        5: "5. Ahora se declara la sentencia de una función llamada reverseList, esta recibirá una lista de Integer y devolver otra lista de Integer, el objetivo de esta función es voltear el orden de una lista, es decir si la lista recibida es [1,2,3] esta función retornara [3,2,1]",
        6: "6. Se declara el primer patrón (el patrón de parada), diciendo que cuando la lista este vacía entonces retorne la lista vacía",
        7: "7. Se declara el segundo patrón, este recibe una lista con elementos, y hace el llamado recursivo pasando como parámetros el resto de la lista xs y le concatena con el operador ++ el primer elemento de la lista",
        8: "8. Salto de línea",
        9: "9. Ahora se declara sentencia de la función invtrans, esta función recibirá un Integer y devolverá una lista de Integer, esta función es la que va hacer el llamado conjunto de las dos anteriores",
        10: "10. Se define que la función recibe el número en x, utilizando la palabra do se indica que se va a realizar un bloque de código",
        11: "11. Utilizando let se declara una variable la cual se llama x_ y se iguala a lo que retorne la función aLista pasándole x como parámetro. NOTA: recordar que aLista retorna una lista de Integer",
        12: "12. Por último, se hace el llamado a la función reverseList pasándole como parámetro el valor de la variable x_",
        'line_actual': 1,
        'total_lines': 12
    },

    'ejercicio3': {
        1: "1. Se declara la sentencia de la función esMultiploDe, recibiendo como parámetro dos Integer y como resultado devuelve un Booleano",
        2: "2. Se define que la función esMultipliDe recibe dos valores a y b, y retorna el resultado de comparar si el módulo de a entre b es igual a 0, de ser así, esta retornara un True, de lo contrario un False",
        3: "3. Salto de línea",
        4: "4. Ahora de declara la sentencia de la función esBisiesto, esta recibe un Integer y retorna un Bool",
        5: "5. Por último, se define que la función esBisiesto recibe un valor x, y esta devolverá verdadero si el valor de x es múltiplo de 4 y adicional a eso múltiplo de 100 y de 400   ",
        'line_actual': 1,
        'total_lines': 5
    },
    'ejercicio4': {
        1: "1. Se declara la sentencia de la función aLaDerechaDe, especificando que va a recibir dos valores Integer como parámetros y retornara otro Integer",
        2: "2. Se define que la función aLaDerechaDe recibe dos valores x and y, y esta retorna los números concatenados, para hacerlo solo se necesita multiplica el primer número por 10 y sumarle es segundo número (realice la prueba con cualquier número y se dará cuenta que es un método efectivo)",
        'line_actual': 1,
        'total_lines': 2
    },

    'ejercicio5': {
        1: "1. Se declara la sentencia de la función multiNums, se especifica que recibe dos Integer y retorna otro Integer",
        2: "2. Se define la función multiNums la cual recibe dos valores, x and y",
        3: "3. Luego se define la función a trozos, donde el primer trozo especifica si y es menor o igual a cero, de ser así esta retornara un cero",
        4: "4. El otro torzo se define para cualquier otro caso, se utiliza la palabra reservada do, para especificar que se va a realizar un bloque de código",
        5: "5. Se declara una variable utilizando let, la cual se llamará newy y se iguala a el valor de y – 1",
        6: "6. Por último, se suma el valor de x con el llamado a la función recursivamente pasándole como parámetros el mismo valor de x, pero ahora la nueva variable de y disminuida que sería newy",
        'line_actual': 1,
        'total_lines': 6
    },
    'ejercicio6': {
        1: "1. Se declara la sentencia de la función llamada funprueba, la cual recibe un Integer y devuelve otro Integer",
        2: "2. Se define la función funprueba, esta recibe un parámetro n y retorna la multiplicación de n entre 2",
        3: "3. Salto de línea",
        4: "4. Se declara la sentencia de la función llamada funprueb2, la cual recibe un Integer y devuelve otro Integer",
        5: "5. Se define la función funprueba2, esta recibe un parámetro n y retorna la multiplicación de n entre 3",
        6: "6. Salto de línea",
        7: "7. Se declara la sentencia de la función llamada funprueba3, la cual recibe un Integer y devuelve otro Integer",
        8: "8. Se define la función funprueba3, esta recibe un parámetro n y retorna la multiplicación de n entre 4",
        9: "9. NOTA: estas funciones son declaradas para poder mostrar el ejemplo del operador que recibe una lista de funciones",
        10: "10. Se declara el operador |>, se especifica que recibe una lista de funciones (funciones las cuales reciben un Integer y retornan otro Integer, como las que se acaban de declarar) y un número Integer, y retorna una lista de Integer",
        11: "11. Se declara el primer patrón, este especifica que cuando la lista de funciones este vacía, sin importar el valor de x, esta va a retornar []",
        12: "12. Se declara el segundo patrón, y este especifica que recibe una lista con elementos (f : fs) donde f es el primer elemento de la lista (cada elemento de esa lista es una función), y recibe un valor x. Este patrón hará el llamado de la función f, pasándole como parámetro el valor x, y lo añadirá a una lista. Notese que después de hacer el llamado a la función f, entre paréntesis () se vuelve hacer el llamado al operador |> (de esta manera es como se devolverá una lista de elementos Integer, recordar que cada función f x devuelve un Integer)",
        13: "13. Salto de línea",
        14: "14. Se declara la sentencia de la función implement, donde se especifica que esta recibe un Integer y retorna una lista de Integer. NOTA: esta función es la que permite hacer el llamado al operador creado, pasándole una lista de funciones y un valor n",
        15: "15. Se define la función implement, la cual esta recibe un parámetro n, y hace el llamado al operador |> utilizando una lista de funciones (funciones que se declararon anteriormente) y el parámetro n",
        'line_actual': 1,
        'total_lines': 15
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
            val = val.toString()
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
        if((id_resultado == 4 || id_resultado == 5) && validation[0]){ //Validar si estan en los ejercicios 4 o 5 (que requieren dos datos)
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