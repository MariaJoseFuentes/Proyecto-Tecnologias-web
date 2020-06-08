<?php
    include_once ("../conexionBD.php");
    if(isset($_REQUEST['nombre'])) {
        $nombre = $NOMBRE = $_REQUEST['nombre'];

        if (!empty($nombre)) {
            if ($result = $db->query("SELECT * FROM usuario WHERE nombre = '$nombre'")) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if (isset($row)) {
                    echo "Ya existe un perfil con este nombre";
                }
            }
        }
    }else{
        $ruta_carpeta="fotos_perfil/";
        $nombre_archivo= "imagen".date("dHis").".".pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
        $ruta_guardar_archivo_dest= "../Config_perfil/fotos_perfil/".$nombre_archivo;

        $ruta_guardar_archivo=$ruta_carpeta.$nombre_archivo;

        if(move_uploaded_file($_FILES["imagen"]["tmp_name"],$ruta_guardar_archivo))
        {
            echo $ruta_guardar_archivo;
        }else{
            echo "No se pudo cargar";
        }
        copy($ruta_guardar_archivo, $ruta_guardar_archivo_dest);
    }
    if(isset($_POST['guardar']))
    {
        $nombreU=$_POST['nombre'];
        $idioma=$_POST['idioma'];
        $clasificacion=$_POST['clasificacion'];
        $foto=$_POST['foto'];
        if(empty($foto))
        {
            $foto="fotos_perfil/avatar2.jpg";
        }
        if (!empty($nombreU)) {
            if ($result = $db->query("INSERT INTO usuario(nombre,foto,ididioma,idclasificacion) values('$nombreU','$foto','$idioma','$clasificacion')")) {
                header("Location:pagina_crear_perfil.php");
            }else{
                echo  mysqli_error($db);
                header("Location:pagina_crear_perfil.php");
            }

        }
    }


?>