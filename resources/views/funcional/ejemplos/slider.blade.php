<aside class="bg-light">
    <h4 class="color-blue">Ejemplos</h4>
    <ul>
        <li><a href="#" data-name="ejemplo1" class="item">Ejemplo 1</a></li>
        <li><a href="#" data-name="ejemplo2" class="item">Ejemplo 2</a></li>
        <li><a href="#" data-name="ejemplo3" class="item">Ejemplo 3</a></li>
        <li><a href="#" data-name="ejemplo4" class="item">Ejemplo 4</a></li>
        <li><a href="#" data-name="ejemplo5" class="item">Ejemplo 5</a></li>
        <li><a href="#" data-name="ejemplo6" class="item">Ejemplo 6</a></li>
    </ul>
</aside>

@section('scripts')
                        <script>
                            //When start script
                            const id = {!! $identity !!}
                            $(".item").each(function(index) {
                                var v = $(this).attr('data-name')
                                v1 = parseInt(v[v.length - 1])
                                if(v1 == id){
                                    $(this).addClass('active')
                                    $('#'+v).toggle('explode')
                                }
                            });

                            //Changed of item
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

                            $(".probar").each(function(index) {
                                var id = $(this).attr('data-btnIdentity')
                                $(this).on('click', (e) => {
                                    e.preventDefault()
                                    var id_form = "#form"+id
                                    $(id_form).addClass('form-inline')
                                    $(this).toggle('explode')
                                })
                            });

                            var cal = (state,val) => {
                                switch(state){
                                    case 1:{
                                        return val * 2
                                        break
                                    }
                                    case 2:{
                                        break
                                    }
                                    case 3:{
                                        break
                                    }
                                    case 4:{
                                        break
                                    }
                                    case 5:{
                                        break
                                    }
                                    case 6:{
                                        break
                                    }
                                }
                            }

                            $(".formulario").each(function(index) {
                                $(this).submit((e) => {
                                    e.preventDefault()
                                    var id_resultado = parseInt($(this).attr('data-form')),
                                        input = '#input'+id_resultado,
                                        explain = '#explain'+id_resultado,
                                        resultp = '#resultp'+id_resultado
                                        id_resultado_content = '#resultado'+id_resultado,
                                        dato = parseInt($(input).val())

                                    var validation = !isNaN(dato) ? true : false

                                    if(validation){
                                        $(id_resultado_content).toggle('explode')
                                        $(resultp).text(cal(id_resultado,dato)) //Set value to resultp id
                                        $(explain).toggle('explode')
                                        $(this).toggle('explode')
                                    }else{
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Dato incorrecto!!',
                                            text: 'Por favor ingrese un numero',
                                        })
                                    }
                                })
                            });
                        </script>
@endsection
