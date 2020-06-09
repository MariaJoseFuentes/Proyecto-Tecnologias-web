<?php
include_once ("../conexionBD.php");
if(isset($_REQUEST['contenido']))
    {
        $contenido = $contenido = $_REQUEST['contenido'];
        if($contenido== "peliculas")
        {
            $sql=$db->query("SELECT * FROM pelicula where nombre='Shrek'");
            if($sql) {
                /*while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
                    $data = array();
                     Se rellena el arreglo con la información
                    foreach ( $row as $key => $value ) {
                        $data[$key] = $value;
                    }
                    $data[$key] = $value;
                    echo json_encode($data);*/
                    $row = $sql->fetch_array(MYSQLI_ASSOC);
                    $data = array();
                    foreach ( $row as $key => $value ) {
                        $data[$key] = $value;
                    }
                    echo json_encode($data);
                }
            }
        }




?>