<?php
include_once ("../conexionBD.php");
if(isset($_REQUEST['contenido']))
    {
        $contenido = $contenido = $_REQUEST['contenido'];
        if($contenido== "peliculas")
        {
            $sql=$db->query("SELECT pelicula.nombre,pelicula.duracion, pelicula.idclasificacion, pelicula.imagen, clasificacion.clasificacion FROM pelicula inner join clasificacion on pelicula.idclasificacion=clasificacion.idclasificacion");
            if($sql) {
                $json = array();
                while($row = mysqli_fetch_array($sql)) {
                    $json[] = array(
                        'nombre' => $row['nombre'],
                        'duracion' => $row['duracion'],
                        'clasificacion' => $row['clasificacion'],
                        'imagen' => $row['imagen']
                    );
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
                }
            }else{
                $sql=$db->query("SELECT * FROM programa");
                if($sql) {
                    $json = array();
                    while($row = mysqli_fetch_array($sql)) {
                        $json[] = array(
                            'nombre' => $row['nombre'],
                            'temporadas' => $row['temporadas'],
                            'genero' => $row['genero'],
                            'imagen' => $row['imagen']
                        );
                    }
                    $jsonstring = json_encode($json);
                    echo $jsonstring;
                }
            }
        }




?>