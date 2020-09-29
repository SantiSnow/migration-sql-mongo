<?php

$host="localhost";
$usuario="root";
$pass="";
$db="laravel";

$conexion = new mysqli($host, $usuario, $pass, $db);

$conexion->set_charset("utf8");

//buscamos errores
if($conexion->connect_error){
    die("Error en la conexion" . $conexion->connect_errno);
}

$sentenciaSql = "SELECT * FROM articulos ORDER BY ID DESC";

try{
    $consulta = $conexion->query($sentenciaSql);
    if($consulta == null){
        echo "La base de datos se encuentra vacia o no existe:";
    }
    else{
        while($i = $consulta->fetch_assoc()) {

            $bulk = new MongoDB\Driver\BulkWrite;

            $articulo = [
                "ID" => $i['ID'], 
                "CODIGO" => $i['CODIGO'], 
                "Titulo" => $i['NOMBREARTICULO'], 
                "URL" => $i['URL'], 
                "Descripcion" => $i['DESCRIPCION'], 
                "Foto" => $i['FOTO'], 
                "Tags" => $i['TAGS'], 
                "Fecha" => $i['FECHA'], 
                "Contenido" => $i['CONTENIDO'], 
                "created_at" => $i['created_at']
            ];
            $bulk->insert($articulo);
            $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $resultado = $mng->executeBulkWrite('migrations.Articulos', $bulk);
            echo "Articulo insertado.";
            
            
        }
    }
    
}
catch(Exception $e){
    echo "<p>Ocurrio un error inesperado. Informe del error: " . $e . "</p>";
}
finally{
    $conexion->close();
}