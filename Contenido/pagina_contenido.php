
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Enviar imagen por AJAX</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="js/ajax.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link type="text/css" href="/css/style.css">
    <style>
        #logo{
            /* Rectangle 20 */
            position: absolute;
            width: 173px;
            height: 46px;
            left: 0px;
            top: 0px;
            background: url(f547f88f-56a7-42b6-be5a-e63ad732d82d_200x200.png);
        }

        body{
            background:#070707;
        }

        h1{
            color:white;
            text-alingn: center;
        }
        #IdatosPerfil{
            color:navajowhite;
            float: right;
            width: 100%;
            height: 100%;
            padding-right: 0px;
        }
        #BdatosPefil{
            color:navajowhite;
            float: right;
            width: 60px;
            height: 60px;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        .dropdown{
            float: right;
            width: 60px;
            height: 60px;
        }
        #lista_dropdown{
            background-color: #464343;
            color:#FFFFFF;
        }
        .dropdown-menu>li>a:hover {
            color: #FFFFFF;
            text-decoration: none;
            background-color:#070707;
        }
        .dropdown-menu>li>a
        {
            color: #FFFFFF;
        }
        #boton_peliculas,#boton_programas{
            background:none;
            border: none;
            width: 100%;
            height: 100%;
            padding-right: 0px;
            color: #FFFFFF;
            cursor: pointer;
            align-content: center;
            margin-left: 25px;
            margin-top: 15%;
            font-weight: bold;
        }
        .image {
            opacity: 1;
            display: block;
            width: 100%;
            height:270px;
            transition: .5s ease;
            backface-visibility: hidden;
        }
        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 80%;
            left: 50%;
            width:100%;
            height:40%;
            margin-top:8%;
            background-color:#252424;;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }
        .row{
            position: relative;
            width: 100%;
        }
        .nombrecont{
            color:#FFFFFF;
        }
        #boton_logo{
            background: none;
            border: none;
        }
    </style>
    <script>
        function loadDoc1(tcontenido)
        {
            var xhttp = getXMLHttpRequest();

            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    var query =this.responseText;
                    var query = eval('('+this.responseText+')');
                    var peliculasPerfil=document.getElementById("contenido").style.display="none";
                    document.getElementById("contenidoBuscar").style.display="block";

                    var contenido="";
                    $(function () {
                        for (i = 0; i < query.length; i++) {
                            contenido+=`<div class='col col-md-3'><div class="row" onmouseover="mostrar(this);" onmouseout="noMostrar(this);"><img src="${query[i]['imagen']}" style="width: 100%;" alt="chuek" class="image" ><div class="middle"  ><div class="nombrecont"> <p>${query[i]['nombre']}</p><p>duración: ${query[i]['duracion']}</p> <p>Clasificación: ${query[i]['clasificacion']}</p></div></div></div><br><br></div>`;
                        }
                        /*var contenido= `<div class='col col-md-3'>${query[0]['nombre']}</div>`;*/
                       $('#rowContenido').html(contenido);
                    });
                }
            };

            xhttp.open("POST", "mostrarContenido.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("contenido="+tcontenido);
        }
        function loadDoc2(tcontenido)
        {
            var xhttp = getXMLHttpRequest();

            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    var query =this.responseText;
                    var query = eval('('+this.responseText+')');
                    var peliculasPerfil=document.getElementById("contenido").style.display="none";
                    document.getElementById("contenidoBuscar").style.display="block";
                    var contenido="";
                    $(function () {
                        for (i = 0; i < query.length; i++) {
                            contenido+=`<div class='col col-md-3'><div class="row" onmouseover="mostrar(this);" onmouseout="noMostrar(this);"><img src="${query[i]['imagen']}" style="width: 100%;" alt="chuek" class="image" ><div class="middle"  ><div class="nombrecont"> <p>${query[i]['nombre']}</p><p>Temporadas: ${query[i]['temporadas']}</p> <p>Género: ${query[i]['genero']}</p></div></div></div><br><br></div>`;
                        }
                        $('#rowContenido').html(contenido);
                    });
                }

            };

            xhttp.open("POST", "mostrarContenido.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("contenido="+tcontenido);
        }

        function getXMLHttpRequest()
        {
            var objetoAjax;

            try{
                objetoAjax = new XMLHttpRequest();
            }catch(err1){
                try{
                    //
                    objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
                }catch(err2){
                    try{
                        // IE5 y IE6
                        objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch(err3){
                        objetoAjax = false;
                    }
                }
            }
            return objetoAjax;
        }
        function  mostrar(x) {
                x.lastChild.style.opacity=.8;
            return false;
        }
        function  noMostrar(x) {
            x.lastChild.style.opacity=0;
            return false;
        }
        function principal() {
            document.getElementById("contenido").style.display="block";
            document.getElementById("contenidoBuscar").style.display="none";
        }
    </script>
</head>
<body>
<!------HOOOOOOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA----->
<!------HOOOOOOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA----->
<!------AQUÍ PUEDES CONECTAR LA PAGINA DE LA ELECCION DEL PERFIL----->
  <?php

  /*      $NombrePerfil=$_GET['nombre'];*/
            $nombrePerfil="Alejandro";
            include_once ("../conexionBD.php");
              if ($result = $db->query("select usuario.nombre, usuario.ididioma, usuario.idclasificacion,usuario.foto, idioma.idioma, clasificacion.clasificacion 
from usuario inner join idioma on  usuario.ididioma= idioma.ididioma
inner join clasificacion on usuario.idclasificacion=clasificacion.idclasificacion WHERE usuario.nombre = '$nombrePerfil'") ){
                  $row = $result->fetch_array(MYSQLI_ASSOC);
                  if (isset($row)) {
                      $idioma=$row['idioma'];
                      $clasificacion=$row['clasificacion'];
                      $foto=$row['foto'];
                  }
              }
    ?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-logo" href="#" id="boton_logo" onclick="principal()">
                <img src="logo.png" >
            </button>
        </div>
        <ul class="nav navbar-nav" style="margin-left: 50px;">
            <li>
                <button type="submit" onclick="loadDoc1('peliculas')" id="boton_peliculas">Películas</button>
            </li>
            <li>
                <button type="submit" onclick="loadDoc2('programas')" id="boton_programas">Programas</button>
            </li>

        </ul>

        <div class="dropdown">
            <button type="button" class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown" id="BdatosPefil" style="float:right;">
                <?php echo '<img src="../Crear_perfil/'.$foto.'"id="IdatosPerfil">'?>
            </button>
            <br>
            <ul class="dropdown-menu  dropdown-menu-right" role="menu" id="lista_dropdown">
                <?php
                echo '<li><a>'.$nombrePerfil.'</a></li>';
                echo '<li><a>'.$idioma.'</a></li>';
                echo '<li><a>'.$clasificacion.'</a></li>';
                ?>
                <hr>
                <li><a href="../Config_perfil/pagina_configurar_perfil.php?nombre=Flor">Editar perfil</a></li>
                <li><a href="#">Salir</a></li>
            </ul>
        </div>




    </div>
</nav>

    <div class="container" id="contenido">
        <div class="row">
            <h1>peliculas</h1>
        </div>
        <div id="peliculas_buscar">

        </div>
        <div class="row" id="contenidoPeliculas">

            <div class="col col-md-3">
                peliculas
            </div>
            <div class="col col-md-3">
                peliculas
            </div>
            <div class="col col-md-3">
                peliculas
            </div>
            <div class="col col-md-3">
                peliculas
            </div>
            <div class="col col-md-3">
                peliculas
            </div>


        </div>
        <div class="row">
            <h1>programas</h1>
        </div>
        <div class="row" id="contenidoProgramas"> <!--- este row va a ser de programas-->
            <div class="col col-md-3">
                Programas
            </div>
            <div class="col col-md-3">
                Programas
            </div>
            <div class="col col-md-3">
                Programas
            </div>
            <div class="col col-md-3">
                Programas
            </div>
            <div class="col col-md-3">
                Programas
            </div>
        </div>
        <div class="row">
            <h1>sugerencias</h1>
        </div>
        <div class="row"> <!--- este row va a ser de sugerencias-->
            <div class="col col-md-3">
                Programas
            </div>
            <div class="col col-md-3">
                Programas
            </div>
            <div class="col col-md-3">
                Programas
            </div>
            <div class="col col-md-3">
                Programas
            </div>
            <div class="col col-md-3">
                Programas
            </div>
        </div>
    </div>
    <div class="container" id="contenidoBuscar">
        <br>
        <div class="row" id="rowContenido" >

        </div>
    </div>

<div id="footer">

</div>

</body>
</html>
