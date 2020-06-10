<?php
$host = 'localhost:33065';
$basededatos = 'streaming';
$usuario = 'root';
$contraseña = '1506';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

$grid="";
$query="SELECT * FROM pelicula";
$sql = "SELECT * FROM programa";

if(isset($_POST['peliculas'])){
    $q=$conexion->real_escape_string($_POST['peliculas']);
    $query="SELECT * FROM pelicula WHERE
        idpelicula LIKE '%".$q."%' OR
        nombre LIKE '%".$q."%'";

    $sql="SELECT * FROM programa WHERE
    idprograma LIKE '%".$q."%' OR
    nombre LIKE '%".$q."%'";
}

$result=$conexion->query($query);
$result2=$conexion->query($sql);

if($result->num_rows > 0 || $result2->num_rows > 0){
    echo'<div class="container">';
    echo'<div class="row" id="contenidoPeliculas">';
    echo'<div class="row"><h2>Peliculas</h2></div>';
    while($row= $result->fetch_assoc()){
        echo'<div class="col col-md-3">';
            echo'<div class="row" onmouseover="mostrar(this);" onmouseout="noMostrar(this);">';
                echo'<img src="'.$row['imagen'].'" style="width: 100%;" class="image" >';
                echo'<div class="middle"  ><div class="nombrecont">';
                        echo'  <p>'.$row['nombre'].'</p><p>Duracion: '.$row['duracion'].'</p>';
                        echo' <p>Género: '.$row['genero'].'</p>';
                    echo'</div>';
                echo'</div>';
            echo'</div>';
            echo'<br><br>';
        echo'</div>';
    }
    echo'</div>';
    echo'</div>';
    //Para los programas:
    echo'<div class="container">';
    echo'<div class="row" id="contenidoProgramas">';
    echo'<div class="row"><h2>Programas</h2></div>';
    while($row2= $result2->fetch_assoc()){
        echo'<div class="col col-md-3">';
            echo'<div class="row" onmouseover="mostrar(this);" onmouseout="noMostrar(this);">';
                echo'<img src="'.$row2['imagen'].'" style="width: 100%;" class="image" >';
                echo'<div class="middle"  ><div class="nombrecont">';
                        echo'  <p>'.$row2['nombre'].'</p><p>Temporadas: '.$row2['temporadas'].'</p>';
                        echo' <p>Género: '.$row2['genero'].'</p>';
                    echo'</div>';
                echo'</div>';
            echo'</div>';
            echo'<br><br>';
        echo'</div>';
    }
    echo'</div>';
    echo'</div>';
}else{
    $grid="No se encontraron resultados";
}
echo $grid;
?>