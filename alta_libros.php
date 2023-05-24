<?php include 'includes/cabecera.inc';

    if(isset($_GET['mensajeError'])){
        $error = $_GET['mensajeError'];
    } else if(isset($_GET['mensajeOk'])){
        $error = $_GET['mensajeOk'];
    } else{
        $error = null;
    }

    function ComprobarDato($nombre, $error){
        if($error == $nombre) {
            if($error != 'correcto'){
                echo'<p class="mensaje-error">Debes indicar un '. $nombre .' para el libro.</p>';
            } else{
                echo'<p class="mensaje-ok">El alta del libro se ha realizado correctamente.</p>';
            }
        }
    }
?>
    <div class="formulario">
    <form action="guardar_libro.php" method="post">
        <fieldset>
            <legend class="h2-yellow">Formulario de alta</legend>
                <?php ComprobarDato('correcto', $error); ?>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del libro</label>
                <?php ComprobarDato('titulo', $error); ?>
                <input class="form-control form-control-sm" type="text" id="titulo" name="titulo">
            </div>

            <div class="mb-3 form-group">
                <label for="autor" class="form-label">Nombre del autor/a </label>
                <?php ComprobarDato('autor', $error); ?>
                <select class="form-control form-control-sm" id="autor" name="autor">
                    <option value="">- Seleccione una opción - </option>  
                    <option value="Virginia Woolf">Virginia Woolf</option>  
                    <option value="Miguel de Cervantes">Miguel de Cervante</option>
                    <option value="Frank Kafka">Frank Kafka</option>
                    <option value="Jane Austen">Jane Austen</option>
                </select>                    
            </div>

            <div class="mb-3 form-group">
                <label for="tema" class="form-label">Temática </label>
                <?php ComprobarDato('tema', $error); ?>
                <select class="form-control form-control-sm" id="tema" name="tema">
                    <option value="">- Seleccione una opción - </option>  
                    <option value="Aventuras">Aventuras</option>
                    <option value="Misterio">Misterio</option>
                    <option value="Policiaca">Policiaca</option>
                    <option value="Ensayo">Ensayo</option>
                </select>                    
            </div>

            <div class="mb-3 form-group">
                <label for="precio" class="form-label">Precio:</label>
                <?php ComprobarDato('precio', $error); ?>
                <input class="form-control form-control-sm" type= "number" id="precio" name="precio" min="0" max="1000" placeholder="€" step=".01">
            </div>
            <br>
            <div class="btn-container">
                <input class="form-control btn-yellow" type="reset" value="Borrar">
                <input class="form-control btn-yellow" type="submit" name="submit" value="Guardar libro">
            </div>
        </fieldset>
    </form>
    </div>
<?php include 'includes/footer.inc'; ?>