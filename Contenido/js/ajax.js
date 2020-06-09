function loadDoc(tcontenido)
    {
        element.title = 'encender';
        var xhttp = getXMLHttpRequest();

        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                var query =this.responseText;
                alert(query)

            }
        };

        xhttp.open("POST", "../mostrarContenido.php", true);
        // Dado que consultarBD.php puede estar en un servidor puedes usar:
        // xhttp.open("POST", "http://localhost/consultarBD.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("contenido="+tcontenido);
    }

function getXMLHttpRequest()
{
    alert("a");
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