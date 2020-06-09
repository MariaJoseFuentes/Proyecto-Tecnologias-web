$(document).ready(function () {
    var frm= $("#frmSubirImagen");
    var etqFoto= $("#Efoto");
    var btnEnviar=$("button[type=submit]");
    var nfoto=$("#nfoto");
    var textoSubir = btnEnviar.text();
    var textoSubiendo ="cargandoimagen";
    //selector de jquery
    //bin método para capturar eventos
    frm.bind("submit",function(){
        var frmData = new FormData;
        frmData.append("imagen",$("input[name=imagen]")[0].files[0]);

        $.ajax({
            //capturar atributo action
            url:frm.attr("action"),
            type: frm.attr("method"),
            data: frmData,
            processData: false,
            contentType:false,
            cache:false,
            beforeSend:function(data){
                btnEnviar.html(textoSubiendo);
                btnEnviar.attr("disabled",true);
            },
            success: function(data){
                btnEnviar.html(textoSubir);
                btnEnviar.attr("disabled",false);
                etqFoto.attr("src",data);
                nfoto.attr("value",data);
                nfoto.html(data);
            }
        });
        return false;
    });
});