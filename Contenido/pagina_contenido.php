
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
            background:#161515;
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
    </style>
    <script>
        function loadDoc(tcontenido)
        {
            var xhttp = getXMLHttpRequest();

            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    /*var query =this.responseText;*/
                    var query = eval('('+this.responseText+')');
                }
            };

            xhttp.open("POST", "mostrarContenido.php", true);
            // Dado que consultarBD.php puede estar en un servidor puedes usar:
            // xhttp.open("POST", "http://localhost/consultarBD.php", true);
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
    </script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-logo" href="#">
                <img src="logo.png" >
            </a>
        </div>
        <ul class="nav navbar-nav" style="margin-left: 50px;">
            <li>
                <button type="submit" onclick="loadDoc('peliculas')">Películas</button>
                <!--<a href="" name="peliculas" id="peliculas" name="peliculas" id="peliculas" onmouseup="loadDoc('peliculas')">Películas</a>--->
            </li>
            <li>
                <a href="mostrarContenido.php?contenido=programas" >Programas</a>
            </li>
            <!--<li>
                <a href="" id="BdatosPefil" style="pading left 0;"><img src="../avatar.jpg" id="IdatosPerfil"></a>
            </li>-->

        </ul>

        <div class="dropdown">
            <button type="button" class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown" id="BdatosPefil" style="float:right;">
                <img src="../avatar.jpg" id="IdatosPerfil">
            </button>
            <br>
            <ul class="dropdown-menu  dropdown-menu-right" role="menu" id="lista_dropdown">
                <li><a href="#">Ver perfil</a></li>
                <li><a href="#">Editar perfil</a></li>
                <li><a href="#">Salir</a></li>
            </ul>
        </div>




    </div>
</nav>

    <div class="container">
        <div class="row">
            <h1>peliculas</h1>
        </div>
        <div class="row" id="contenidoPeliculas"> <!--- este row va a ser de peliculas-->

            <!--- aqui en lugar de tener varios divs los vas a generar con php;
                recuerda que el grid es de 12 asi que si tus columnas son de md-3  solo caben 4 pelis y ya las demas se van para abajo
                tons ponle el numerito que quieras y ya con php va a generar las imagenes que esten en la bd
                pd: te amooooo-->

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
        <div class="row"> <!--- este row va a ser de programas-->
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

<div id="footer">

</div>

</body>
</html>
