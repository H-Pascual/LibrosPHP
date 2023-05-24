<?php 
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $tema = $_POST["tema"];
    $precio = $_POST["precio"];

    if(!empty($titulo) && !empty($autor) && !empty($tema) && !empty($precio))
    {
        header("Location:alta_libros.php?mensajeOk=correcto");

        $fichero = 'libros/libros.txt';
        if(file_exists($fichero)){
            $datos =$titulo . ';' . $autor . ';' . $tema . ';' . $precio;
            file_put_contents($fichero, $datos . PHP_EOL, FILE_APPEND);
        }
    } else{
        if(empty($titulo)){
            header("Location:alta_libros.php?mensajeError=titulo");
        } else if(empty($autor)){
            header("Location:alta_libros.php?mensajeError=autor");
        } else if(empty($tema)){
            header("Location:alta_libros.php?mensajeError=tema");
        } else if(empty($precio)){
            header("Location:alta_libros.php?mensajeError=precio");
        }
    }
?>