<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elegir perfil</title>

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
                    var perfil=document.getElementById("perfil").style.display="none";

                    var contenido="";
                    $(function () {
                        for (i = 0; i < query.length; i++) {
                            contenido+=`<div class = "row"><div class="col-md-4"><div class="card" style="width: 20rem; color: white;" id="card"><button type="submit"><img class="card-img-top" id="foto" src="${query[i]['foto']}"></button><div class="card-body"><p class="card-text" id="texto">${query[i]['nombre']}</p></div></div></div></div>`;
                        }
                        
                       $('#rowContenido').html(contenido);
                    });
                }
            };

            xhttp.open("POST", "perfil.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("perfil="+tcontenido);
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
    </script>
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
        <script>
        loadDoc1('usuarios');
        </script>
    </div>
</div>


</body>
</html>