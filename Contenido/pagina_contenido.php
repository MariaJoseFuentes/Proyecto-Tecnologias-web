
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>OnWatch</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="js/ajax.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"> 
    <link type="text/css" href="/css/style.css">
    <script src="js/peliculas.js"></script>
    
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

        h2{
            color:white;
            text-align: left;
            font-family: 'Poppins', sans-serif;
        }

        button{
            font-family: 'Poppins', sans-serif;
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
            margin-top: 15px;
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

        .adaptar{
            width: 100%;
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
                    document.getElementById("tituloContenido").innerHTML="Películas";

                    var contenido="";
                    $(function () {
                        for (i = 0; i < query.length; i++) {
                            contenido+=`<div class='col col-md-3'><div class="row" onmouseover="mostrar(this);" onmouseout="noMostrar(this);"><img src="${query[i]['imagen']}" style="width: 100%;" alt="chuek" class="image" ><div class="middle"  ><div class="nombrecont"> <p>${query[i]['nombre']}</p><p>duración: ${query[i]['duracion']}</p> <p>Clasificación: ${query[i]['clasificacion']}</p>${query[i]['imagen']}</div></div></div><br><br></div>`;
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
                    document.getElementById("tituloContenido").innerHTML="Programas";
                    var contenido="";
                    $(function () {
                        for (i = 0; i < query.length; i++) {
                            contenido+=`<div class='col col-md-3'><div class="row" onmouseover="mostrar(this);" onmouseout="noMostrar(this);"><img src="${query[i]['imagen']}" style="width: 100%;"  class="image" ><div class="middle"  ><div class="nombrecont"> <p>${query[i]['nombre']}</p><p>Temporadas: ${query[i]['temporadas']}</p> <p>Género: ${query[i]['genero']}</p></div></div></div><br><br></div>`;
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
  <?php
  $nombrePerfil=$_GET["nombre"];
            //$nombrePerfil="Alejandro";
            include_once ("../conexionBD.php");
              if ($result = $db->query("SELECT usuario.nombre, usuario.ididioma, usuario.idclasificacion,usuario.foto, idioma.idioma, clasificacion.clasificacion from usuario inner join idioma on  usuario.ididioma= idioma.ididioma inner join clasificacion on usuario.idclasificacion=clasificacion.idclasificacion WHERE usuario.nombre = '$nombrePerfil'") ){
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

          <form class="navbar-form navbar-left" role="search" style="margin-left:730px;">
              <div class="form-group" >
                  <input type="text" class="form-control" placeholder="Título" id="busqueda" name="busqueda">
              </div>
          </form>

          <div class="dropdown"  style="float:right;">
              <button type="button" class="btn btn-default dropdown-toggle"
                      data-toggle="dropdown" id="BdatosPefil">
                  <?php echo '<img src="../Crear_perfil/'.$foto.'"id="IdatosPerfil">'?>
              </button>
              <br>
              <ul class="dropdown-menu  dropdown-menu-right" role="menu" id="lista_dropdown">
                  <?php
                  echo '<li><a>'.$nombrePerfil.'</a></li>';
                  echo '<li><a>'.$idioma.'</a></li>';
                  echo '<li><a>'.$clasificacion.'</a></li>';

                  echo '<hr>';
                  echo '<li><a href="../Config_perfil/pagina_configurar_perfil.php?nombre='.$nombrePerfil.'">Editar perfil</a></li>';
                  ?>
                  <li><a href="../Elegir_perfil/perfiles.php">Salir</a></li>
              </ul>
          </div>
      </div>
  </nav>

<div class="container" id="contenido">
    <section id="slider" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="slider" data-slide-to="0" class="active"></li>
            <li data-target="slider" data-slide-to="1"></li>
            <li data-target="slider" data-slide-to="2"></li>
            <li data-target="slider" data-slide-to="3"></li>
            <li data-target="slider" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
              <div class="item active">
                <img src="streaming/club.jpg" class="adaptar">
              </div>
              <div class="item">
                <img src="streaming/howimet.png" class="adaptar">
              </div>
              <div class="item">
                <img src="streaming/dark.jpg" class="adaptar">
              </div>
              <div class="item">
                <img src="streaming/shrek.jpg" class="adaptar">
              </div>
              <div class="item">
                <img src="streaming/harrypotter.jpg" class="adaptar">
              </div>
        </div>
        <a href="slider" class="left carousel-control" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a href="slider" class="right carousel-control" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </section>
    <br>
    <section id="grid_peliculas"></section>
</div>

<!--- **** ¿AUN OCUPAS ESTA SECCION MAJITO :D ? **** --->

    <div class="container" id="contenidoBuscar">
        <br>
        <div class="row">
            <h2 id="tituloContenido"></h2>
        </div>
        <br>
        <div class="row" id="rowContenido" >

        </div>
    </div>

<div id="footer">

</div>

</body>
</html>
