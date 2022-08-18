var global_nombre = new Array(); /* ejemplo variable global */

$(document).ready(function()
{    
    $("#buscar").keypress(function(e){
        if(e.which == 13) 
        {     
            cargar_registros(global);
        }
    });
});

function cargar_region()
{
    $.post("../panel/funciones/cargar_region.php",
    {

    },
    function(result)
    {
        console.log(result)
        tabla = JSON.parse(result);
        tabla_cargar_region = tabla;

        $('#region').append($('<option>',
            {
                value: 0,
                text: "Seleccione una opción.."
            }));

        //region
        for(var x=0; x<tabla["region"].length; x++)
        {
            $('#region').append($('<option>',
            {
                value: tabla["region"][x]["id"],
                text: tabla["region"][x]["nombre"]
            }));
        }

    });
}

function campos_capacitacion()
{
    $.post("../panel/funciones/campos_capacitacion.php",
    {
        tipo_capacitacion:$("#tipo_capacitacion").val()
    },
    function(result)
    {
        console.log(result)
        tabla = JSON.parse(result);
        tabla_campos_capacitacion = tabla;

        $("#titulo").empty()

        $('#titulo').append($('<option>',
            {
                value: 0,
                text: "Seleccione una opción.."
            }));

        //titulo capacitacion
        for(var x=0; x<tabla["capacitacion"].length; x++)
        {
            $('#titulo').append($('<option>',
            {
                value: tabla["capacitacion"][x]["id"],
                text: tabla["capacitacion"][x]["titulo"]
            }));
        }

    });
}

function campos_sucursal_instructor()
{
    $.post("../panel/funciones/campos_sucursal_instructor.php",
    {
        region:$("#region").val()
    },
    function(result)
    {
        console.log(result)
        tabla = JSON.parse(result);
        console.table(tabla)
        tabla_campos_sucursal_instructor = tabla;

        $("#sucursal").empty()
        $("#instructor").empty()
        $("#aforo").val("")
        $("#correo").val("")

        $('#sucursal').append($('<option>',
            {
                value: 0,
                text: "Seleccione una opción.."
            }));
        $('#instructor').append($('<option>',
            {
                value: 0,
                text: "Seleccione una opción.."
            }));

        //sucursal
        for(var x=0; x<tabla["sucursal"].length; x++)
        {
            $('#sucursal').append($('<option>',
            {
                value: tabla["sucursal"][x]["id"],
                text: tabla["sucursal"][x]["nombre"]
            }));
        }
        //instructor
        for(var x=0; x<tabla["instructor"].length; x++)
        {
            $('#instructor').append($('<option>',
            {
                value: tabla["instructor"][x]["id"],
                text: tabla["instructor"][x]["nombre"] +" "+ tabla["instructor"][x]["apellido"]
            }));
        }

    });
}

function campo_aforo()
{
    $.post("../panel/funciones/campo_aforo.php",
    {
        sucursal:$("#sucursal").val()
    },
    function(result)
    {
        console.log(result)
        tabla = JSON.parse(result);
        tabla_campo_aforo = tabla;
        
        $("#aforo").val(tabla["sucursal"][0]["aforo"])

    });
}

function campo_correo()
{
    $.post("../panel/funciones/campo_correo.php",
    {
        instructor:$("#instructor").val()
    },
    function(result)
    {
        console.log(result)
        tabla = JSON.parse(result);
        tabla_campo_correo = tabla;

        $("#correo").val(tabla["instructor"][0]["correo"])

    });
}

function abrir_formulario()
{
    $("#boton_agregar").css({"display":"none"})
    $("#formulario").css({"display":"block"})
    $("#formulario").show(500)
}

function cerrar_formulario()
{
    $("#boton_agregar").css({"display":"block"})
    $("#boton_agregar").show(500)
    $("#formulario").css({"display":"none"})
}