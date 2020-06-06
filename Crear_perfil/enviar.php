<?php
    include_once ("conexionBD.php");
    if(isset($_REQUEST['nombre'])) {
        $nombre = $NOMBRE = $_REQUEST['nombre'];

        if (!empty($nombre)) {
            if ($result = $db->query("SELECT * FROM usuarios WHERE nombre = '$nombre'")) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if (isset($row)) {
                    echo "Ya existe un perfil con este nombre";
                }
            }
        }
    }else{
        $ruta_carpeta="fotos/";
        $nombre_archivo= "imagen".date("dHis").".".pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
        $ruta_guardar_archivo=$ruta_carpeta.$nombre_archivo;

        if(move_uploaded_file($_FILES["imagen"]["tmp_name"],$ruta_guardar_archivo))
        {
            echo $ruta_guardar_archivo;
        }else{
            echo "No se pudo cargar";
        }
    }
    if(isset($_POST['guardar']))
    {
        echo $nombreU=$_POST['nombre'];
        echo $idioma=$_POST['idioma'];
        echo $clasificacion=$_POST['clasificacion'];
        $foto=$_POST['foto'];
        if (!empty($nombreU)) {
            if ($result = $db->query("INSERT INTO usuarios(nombre,idioma,clasificacion,foto) values('$nombreU','$idioma','$clasificacion','$foto')")) {
                header("Location:pagina_crear_perfil.php");
            }else{
                echo  mysqli_error($db);
                header("Location:pagina_crear_perfil.php");
            }

        }
    }

?>