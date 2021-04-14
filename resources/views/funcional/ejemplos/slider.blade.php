<aside class="bg-light">
    <h4 class="color-blue">Ejemplos</h4>
    <ul>
        @if ($dad_page == 'funciones-orden-superior' || $dad_page == 'definicion-tipos' || $dad_page == 'clases')
        <li><a href="#" data-name="ejemplo1" class="item">Ejemplo 1</a></li>
        <li><a href="#" data-name="ejemplo2" class="item">Ejemplo 2</a></li>
        <li><a href="#" data-name="ejemplo3" class="item">Ejemplo 3</a></li>
        <li><a href="#" data-name="ejemplo4" class="item">Ejemplo 4</a></li>
        @else 
        <li><a href="#" data-name="ejemplo1" class="item">Ejemplo 1</a></li>
        <li><a href="#" data-name="ejemplo2" class="item">Ejemplo 2</a></li>
        <li><a href="#" data-name="ejemplo3" class="item">Ejemplo 3</a></li>
        <li><a href="#" data-name="ejemplo4" class="item">Ejemplo 4</a></li>
        <li><a href="#" data-name="ejemplo5" class="item">Ejemplo 5</a></li>
        <li><a href="#" data-name="ejemplo6" class="item">Ejemplo 6</a></li>
        @endif
    </ul>
</aside>
