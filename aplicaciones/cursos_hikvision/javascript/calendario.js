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
        tabla_campos_sucursal_instructor = tabla;

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

function ejemplo_seleccionar(_dato)
{
    $.post("funciones/buscar_nombre.php", 
    {
        dato: _dato,
        sw: 1
    }, 
    function(result)
    {
        if(parseInt(result) != -1)
        {            
            var tabla = JSON.parse(result);
            global_nombre = tabla;

            var tabla_nombres = ""+
            "<div style='width:40%;'  class='opciones'>";
                for(var x=0; x<tabla.length; x++)
                {
                    tabla_nombres +=
                    "<div class='resultados' onclick='mostrar_nom(" + x + ")'>" + tabla[x]["nombres"] + " " + tabla[x]["apellidos"] + "</div>";
                }
                tabla_nombres +=
            "</div>";
        }
        else
        {   
            $("#tabla_nombres").html("");
        }
    });
}

function ejemplo_modificar_insertar(_id)
{
    $.post("funciones/modificar_registros.php", 
    {
        id: _id,
        fecha: $("#fecha_calendario"+_id).val(),     
        hora: $("#hora_curso"+_id).val(),
        tipo_capacitacion: $("#cap"+_id).val(),
        division: $("#div"+_id).val(),
        titulo_capacitacion: $("#titulo_capacitacion"+_id).val()
    }, 
    function(resultado)
    {
        if(parseInt(resultado) == 1)
        {
            mensaje("Registro modificado correctamente.","#4caf50","#fff");    
            cargar_registros();        
        }
        else
        {
            alert("Ocurrió un problema, por favor contacte al administrador.\n\nError:" + resultado)
        };                
    });
}

function ejemplo_eliminar(_id)
{
    if (confirm("¿Realmente desea eliminar este registro?") == true) 
    {
        $.post("funciones/eliminar_registro.php", 
        {
            id_cursos: _id,        
        }, 
        function(resultado)
        {        
            if(parseInt(resultado) == 1)
            {
                mensaje("Registro eliminado correctamente.","#4caf50","#fff");        
                cargar_registros();    
            }
            else
            {
                alert("Ocurrió un problema, por favor contacte al administrador.\n\nError:" + resultado)
            };                
        });
    }
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