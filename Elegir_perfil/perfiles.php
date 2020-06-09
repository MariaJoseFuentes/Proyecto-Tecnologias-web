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
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet"> 

    <style>
        
        body {
            background:#161515;
        }

        h1{
            text-align:center;
            color:white;
            font-family: 'Comfortaa', cursive;
            font-style: normal;
            font-weight: bold;
            font-size: 40px;
            line-height: 45px;
        }

        #foto{
            width:  200px;
            height: 200px;
        }

        #texto{
            text-align:center;
            font-family: 'Comfortaa', cursive;
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
        }

        #card{
            text-align:center;
        }

    </style>
</head>

<body>
<nav>
	<div>
		<div>		
            <a class="navbar-logo" href="#">
                <img src="modificado.png" >
            </a>
		</div>
	</div>
</nav>

<div>
    <div class = "container">
    <h1>¿Quién está viendo ahora?</h1>
        <div class = "row">

            <div class = "col-3">
                <div class="card" style="width: 20rem; color: white;" id="card">
                <img class="card-img-top" id="foto" src="sully.jpg">
                <div class="card-body">
                <p class="card-text" id="texto">Santiago</p>
                </div>
            </div>

            <div class = "col-3">
                <div class="card" style="width: 20rem; color: white;" id="card">
                <img class="card-img-top" id="foto" src="sully.jpg">
                <div class="card-body">
                <p class="card-text" id="texto">Santiago</p>
                </div>
            </div>

            <div class = "col-3">
                <div class="card" style="width: 20rem; color: white;" id="card">
                <img class="card-img-top" id="foto" src="sully.jpg">
                <div class="card-body">
                <p class="card-text" id="texto">Santiago</p>
                </div>
            </div>

        </div>
    </div>
</div>


</body>
</html>