<?php
include_once ("../conexionBD.php");
if(isset($_REQUEST['contenido']))
    {
        $contenido = $contenido = $_REQUEST['contenido'];
        if($contenido== "peliculas")
        {
            $sql=$db->query("SELECT * FROM pelicula");
            if($sql) {
                $json = array();
                while($row = mysqli_fetch_array($sql)) {
                    $json[] = array(
                        'nombre' => $row['nombre'],
                        'duracion' => $row['duracion']
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
                            'nombre' => $row['nombre']
                        );
                    }
                    $jsonstring = json_encode($json);
                    echo $jsonstring;
                }
            }
        }




?>