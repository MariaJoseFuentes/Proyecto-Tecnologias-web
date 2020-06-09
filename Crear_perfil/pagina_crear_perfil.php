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
    <script src="js/subirimagen.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <script type="text/javascript">
        function loadDoc()
        {
            var xhttp = getXMLHttpRequest();

            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    var query =this.responseText;
                    document.getElementById("alerta").innerHTML = query;
                    document.getElementById("alerta").style.color = "red";
                    var botonEnviar = document.getElementById('guardar');
                    if(query)
                    {
                        botonEnviar.disabled = true;
                    }
                    else{
                        botonEnviar.disabled = false;
                    }
                }
            };

            xhttp.open("POST", "enviar.php", true);
            // Dado que consultarBD.php puede estar en un servidor puedes usar:
            // xhttp.open("POST", "http://localhost/consultarBD.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("nombre="+document.forms[1]["nombre"].value+"&foto="+document.forms[1]["foto"].value+"&idioma="+document.forms[1]["idioma"].value+"&clasif="+document.forms[1]["clasificacion"].value);
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <img src="../logo.png" id="logo" width="190px"; height="50px"; style="padding-left:20px";>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!--<div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="pagina_crear_perfil.php">Crear perfil</a></li>
            </ul>-->
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container" Style="margin-top:70px;">

    <div class="row ">
        <div class="col col-md-6" Style="margin-top:90px;">
            <form action="enviar.php" method="post" role="form" enctype="multipart/form-data" id="frmSubirImagen" >
                <!--<legend >Cargar imagen</legend>-->
                <div class="circular--landscape">
                    <img src="https://image.freepik.com/vector-gratis/avatar-personaje-empresario-aislado_24877-60111.jpg" id="Efoto" value="">
                </div>
                <br>
                <div class="form-group">
                    <label for="imagen" id="selecci">Seleccionar imagen</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Input..." required>
                </div>
                <button type="submit" class="btn btn-light" id="ci">Cargar imagen</button>
            </form>
        </div>
        <div class="col col-md-6 mx-auto" Style="margin-top:140px;">
            <form action="enviar.php" method="post">
                <div class="form-group">
                    <label for="">Nombre: </label>
                    <input type="text" class="form-control"  name="nombre" id=nombre" placeholder="Nombre..." onchange="loadDoc()" required="required">
                    <p  id="alerta" name="alerta" value=""></p>
                    </br>
                    <label for="sel1">Idioma</label>
                    <select id="idioma" name="idioma" required="required">
                        <option value=""><p>Seleccione:</p></option>
                        <?php
                        require_once("../conexionBD.php");
                        $sql=$db->query("SELECT * FROM idioma");
                        if($sql)
                        {
                            while($row = $sql->fetch_array(MYSQLI_ASSOC))
                            {
                                echo "<option value=".$row['ididioma'].">".$row['idioma']."</option>";
                            }
                        }
                        ?>
                    </select>
                    </br>
                    <label>Clasificación</label>
                    <select id="clasificacion" name="clasificacion" required>
                        <option value="">Seleccione:</option>
                        <?php
                        require_once("../conexionBD.php");
                        $sql=$db->query("SELECT * FROM clasificacion");
                        if($sql)
                        {
                            while($row = $sql->fetch_array(MYSQLI_ASSOC))
                            {
                                echo "<option value=".$row['idclasificacion'].">".$row['clasificacion']."</option>";
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <input type="hidden" class="btn btn-light" id="nfoto"name="foto" value=""></input>
                    <input type="submit" class="btn btn-light" name="cancelar" value="cancelar" id="cancelar"></input>
                    <input type="submit" class="btn btn-light" name="guardar" value="Guardar" id="guardar">


                </div>
            </form>
        </div>
    </div>
</div>









</body>
</html>


