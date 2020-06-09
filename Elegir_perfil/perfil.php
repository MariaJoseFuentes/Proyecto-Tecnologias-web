<?php
include_once ("../conexionBD.php");
if(isset($_REQUEST['perfil']))
    {
        $perfil = $perfil = $_REQUEST['perfil'];
        if($perfil== "usuarios")
        {
            $sql=$db->query("SELECT nombre,foto FROM usuario");
            if($sql) {
                $json = array();
                while($row = mysqli_fetch_array($sql)) {
                    $json[] = array(
                        'nombre' => $row['nombre'],
                        'foto' => $row['foto']
                    );
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
                }
            }
        }


?>