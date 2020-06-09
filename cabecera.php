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

    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">		
            <a class="navbar-logo" href="#">
                <img src="modificado.png" >
            </a>
		</div>
			<ul class="nav navbar-nav">
				<li>
					<a href="?menu=registrar">Películas</a>
				</li>
				<li>
					<a href="?menu=mostrar">Programas</a>
				</li>
			</ul>
	</div>
</nav>

<div class = "container">
<h1>¿Quién está viendo ahora?</h1>
</div>

<div id="footer">
      <div class="container">
         <p class="text-muted credit">FOOTER</p>
     </div>
 </div>

</body>
</html>