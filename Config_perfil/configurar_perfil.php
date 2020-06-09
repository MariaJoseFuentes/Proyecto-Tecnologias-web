<?php
    include_once ("../conexionBD.php");
    if(isset($_REQUEST['nombre'])) {
        if(!isset($_POST['nactual']))
        {
            $nombre = $NOMBRE = $_REQUEST['nombre'];

            if (!empty($nombre)) {
                if ($result = $db->query("SELECT * FROM usuario WHERE nombre = '$nombre'")) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    if (isset($row)) {
                        echo "Ya existe un perfil con este nombre";
                    }
                }
            }
        }

    }else{
        $ruta_carpeta="fotos_perfil/";
        $nombre_archivo= "imagen".date("dHis").".".pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
        $ruta_guardar_archivo=$ruta_carpeta.$nombre_archivo;
        $ruta_guardar_archivo_dest= "../Crear_perfil/fotos_perfil/".$nombre_archivo;
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
        $nperfil=$_POST['nactual'];
        echo $nperfil;
        if (!empty($nombreU)) {
            if ($result = $db->query("update usuario set nombre='$nombreU',foto='$foto' ,ididioma=$idioma,idclasificacion=$clasificacion where nombre='$nombreU'")) {
                header("Location:http://localhost/Proyecto-Tecnologias-web/Contenido/pagina_contenido.php?nombre=$nombreU");
            }else{
                echo  mysqli_error($db);
            }

        }
    }


?>