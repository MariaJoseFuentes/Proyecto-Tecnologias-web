<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>OnWatch-Elegir perfil</title>

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
        <?php
            include_once ("../conexionBD.php");
           if ($result = $db->query("SELECT nombre,foto FROM usuario") ){
            echo '<div class = "row">';
               while($row = mysqli_fetch_array($result)){ 
                
                    echo '<div class = "col-md-4">';
                        echo '<div class="card" style="width: 20rem; color: white;" id="card">';
                        echo '<a href="http://localhost/Proyecto-Tecnologias-web/Contenido/pagina_contenido.php?nombre='. $row['nombre'] .'" method ="get"> ';
                            echo'<button type="submit" >';
                                echo'<img class="card-img-top" id="foto" src="../Crear_perfil/'. $row['foto'] .'">';
                            echo'</button>';
                            echo'<div class="card-body">';
                                echo'<p class="card-text" id="texto">'. $row['nombre'] .'</p>';
                            echo'</div>';
                        echo '</a>';
                        echo'</div>';
                    echo'</div>';
                }
            echo '</div>';
        }
        ?>
    </div>
</div>
</body>
</html>