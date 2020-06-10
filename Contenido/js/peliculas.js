$(obtener_registros());

function obtener_registros(peliculas){
    $.ajax({
        url:'consultaPeliculas.php',
        type:'POST',
        dataType:'html',
        data: { peliculas:peliculas },
    })

    .done(function(resultado){
        $("#grid_peliculas").html(resultado);
    })
}

$(document).on('keyup','#busqueda',function(){
    var valorBusqueda=$(this).val();
    if(valorBusqueda!=""){
        obtener_registros(valorBusqueda);
    }else{
        obtener_registros();
    }
});