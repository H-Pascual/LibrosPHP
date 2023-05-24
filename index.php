<?php include 'includes/cabecera.inc'; 
//Como extra he ordenado los libros por titulo y he añadido el footer.inc
$autor = '';
$tema = '';

if(isset($_POST['buscar_por_autor']) && isset($_POST['buscar_por_tema'])){
    $autor = $_POST['buscar_por_autor'];
    $tema = $_POST['buscar_por_tema'];
}

$cantidadResultados = 0;
$fichero = 'libros/libros.txt';

if(file_exists($fichero))
{
    $datos = file_get_contents($fichero);
    $texto = explode("\n", $datos);
    $libros = array();
    $lineas = array();
        foreach($texto as $lineas)
        {   
            if($lineas != '') {
            $datos = explode(";", $lineas);
                if(ComprobarBusqueda($datos[1], $datos[2], $autor, $tema)){
                    $cantidadResultados++;
                    $libro = array(
                        'titulo' => $datos[0],
                        'autor' => $datos[1],
                        'tema' => $datos[2],
                        'precio' => $datos[3]
                    );
                    $libros[] = $libro;
                }
            }
        }
}

usort($libros, 'cmp');

function cmp($a, $b){
    return strcmp($a['titulo'], $b['titulo']);
}

function ComprobarBusqueda($autorDato, $temaDato, $autor, $tema){
    $buscar = false;
    if($autor == '' && $tema == ''){
        $buscar = true;
    } 
    else if($autor == $autorDato && $tema == $temaDato){
            $buscar = true;
    }
    return $buscar;
}

?>
    <h2 class="h2-nombre">
        <center>Buscador creado por Héctor Pascual Marín</center>
    </h2>

    <div id="busqueda">

        <h2 class="h2-yellow">Buscador de libros</h2>
        <div>
            Selecciona los criterios de búsqueda en el formulario para filtrar los libros 
        </div>
        <br>
        <form action="" method="post">
            <label class="form-label" for="buscar_por_autor"> Por autor/a: </label>   
            <select class="form-label" id="buscar_por_autor" name="buscar_por_autor">
                <option value="Virginia Woolf">Virginia Woolf</option>  
                <option value="Miguel de Cervantes">Miguel de Cervante</option>
                <option value="Frank Kafka">Frank Kafka</option>
                <option value="Jane Austen">Jane Austen</option>           
            </select>
            Por temática: 
            <select name="buscar_por_tema">
                <option value="Aventuras">Aventuras</option>
                <option value="Misterio">Misterio</option>
                <option value="Policiaca">Policiaca</option>
                <option value="Ensayo">Ensayo</option>
            </select>    
            <input class="btn-yellow" type="submit" name="submit" value="Buscar" >               
        </form>
        <br>
    </div>

    <br><br><br>

    <div class="results-container">
        <?php 

                echo '<h5>
                    <center>Resultado: '. $cantidadResultados .' libros obtenidos</center>
                    </h5>';

                foreach($libros as $libro)
                    echo '
                        <div class="libro">
                        <div class="titulo-libro">
                            '.$libro['titulo'].'
                        </div> 
                        <div>
                            Precio: '.$libro['precio'].'€
                        </div>
                    </div>';
        ?>
        </div>       
    </div>
<?php include 'includes/footer.inc'; ?>