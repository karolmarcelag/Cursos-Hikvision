var global_nombre = new Array(); /* ejemplo variable global */
var tabla_cursos

$(document).ready(function()
{    
    /*$("#buscar").keypress(function(e){
        if(e.which == 13) 
        {     
            cargar_registros(global);
        }
    });*/
    $("#guardar").click(function(e)
    {
        guardar_registro()
    })
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

function guardar_registro()
{
    $("#guardar").prop({"disabled":true})
    if(validar() == true)
    {
        $.post("../panel/funciones/guardar_registro.php",
        {
            fecha: $("#fecha").val(),
            hora: $("#hora").val(),
            tipo_capacitacion: $("#tipo_capacitacion").val(),
            sucursal: $("#sucursal").val(),
            tipo_cliente: $("#tipo_cliente").val(),
            publicar: $("#publicar").val(),
            instructor: $("#instructor").val()
        },
        function(respuesta)
        {
            switch(parseInt(respuesta))
            {
                case 1:
                    {
                        alert("Registro agregado correctamente")
                        limpiar()
                    }
                    break
                default:
                    {
                        alert("Ocurrió un error, por favor contacta al administrador\n\nError: " + respuesta)
                    }
                    break
            }
            console.log("Fecha: "+$("#fecha").val())
            console.log("Hora: "+$("#hora").val())
            console.log(respuesta)
            $("#guardar").prop({"disabled":false})
        })
    }
    else
    {
        alert("Por favor complete correctamente los campos en color rojo")
    }
}

function validar()
{
    var input_fecha = ["fecha"]
    var input_hora = ["hora"]
    var input_texto = ["tipo_capacitacion", "sucursal", "tipo_cliente", "publicar", "instructor"]
    var acumulado = 0

    for(x=0; x<input_fecha.length; x++)
    {
        var id = "#" + input_fecha[x]
            if($(id).val() == "")
            {
                acumulado++
                $(id).css({"border":"solid 1px red"})
            }
            else
            {
                $(id).css({"border":"solid 1px #a9a9a9"})
            }
    }

    for(x=0; x<input_hora.length; x++)
    {
        var id = "#" + input_hora[x]
            if($(id).val() == "")
            {
                acumulado++
                $(id).css({"border":"solid 1px red"})
            }
            else
            {
                $(id).css({"border":"solid 1px #a9a9a9"})
            }
    }

    for(x=0; x<input_texto.length; x++)
    {
        var id = "#" + input_texto[x]
            if($(id).val() == 0)
            {
                acumulado++
                $(id).css({"border":"solid 1px red"})
            }
            else
            {
                $(id).css({"border":"solid 1px #a9a9a9"})
            }
    }

    if(acumulado > 0)
    {
        return false
    }
    else
    {
        return true
    }
}

function limpiar()
{
    $("#fecha").val("")
    $("#hora").val("")
    $("#tipo_capacitacion").val("")
    $("#titulo").val("")
    $("#region").val("")
    $("#sucursal").val("")
    $("#aforo").val("")
    $("#tipo_cliente").val("")
    $("#publicar").val("")
    $("#instructor").val("")
    $("#correo").val("")
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
    mostrar_registros()
}

function mostrar_registros()
{
    $.post("../panel/funciones/mostrar_registros.php",
    {
    },
    function(respuesta)
    {
        switch(parseInt(respuesta))
        {
            case -1:
                {
                    $("#tabla").html("<div style='width:100%; margin-top:15px; '><b>Aún no hay registros</b></div>")
                }
                break
            default:
                {
                    var tabla = JSON.parse(respuesta)
                    tabla_cursos = tabla
                    console.log(respuesta)
                    console.log(tabla)

                    var codigo = ""+
                    "<table style='margin-top:15px; width:100%;'>"+
                        "<tr>"+
                            "<td>id</td>"+
                            "<td><b>Fecha<b></td>"+
                            "<td><b>Hora<b></td>"+
                            "<td>Instructor</td>"+
                            "<td><b>Tipo de Capacitación<b></td>"+
                            "<td>Tipo de Cliente</td>"+
                            "<td><b>Sucursal<b></td>"+
                            "<td>Publicar?</td>"+
                        "</tr>"
                    for(x=0; x<tabla.length; x++)
                    {
                        var tipo_capacitacion = ""
                        switch(parseInt(tabla[x]["Tipo de Capacitación"]))
                        {
                            case 1:
                                {
                                    tipo_capacitacion = "HCSA-CCTV"
                                }
                                break
                            case 2:
                                {
                                    tipo_capacitacion = "HCSA-Alarm"
                                }
                                break
                            case 3:
                                {
                                    tipo_capacitacion = "HCSA-Access Control"
                                }
                                break
                            case 4:
                                {
                                    tipo_capacitacion = "HCSA-Video Intercom"
                                }
                                break
                            case 5:
                                {
                                    tipo_capacitacion = "HCSA-Cloud"
                                }
                                break
                            case 6:
                                {
                                    tipo_capacitacion = "HCSA-VMS"
                                }
                                break
                            case 7:
                                {
                                    tipo_capacitacion = "HCSP-VMS"
                                }
                                break
                            case 8:
                                {
                                    tipo_capacitacion = "Videovigilancia"
                                }
                                break
                            case 9:
                                {
                                    tipo_capacitacion = "Control de Acceso"
                                }
                                break
                            case 10:
                                {
                                    tipo_capacitacion = "Alarmas"
                                }
                                break
                            case 11:
                                {
                                    tipo_capacitacion = "Intercom"
                                }
                                break
                            case 12:
                                {
                                    tipo_capacitacion = "Cloud"
                                }
                                break
                            case 13:
                                {
                                    tipo_capacitacion = "Hikcentral"
                                }
                                break
                        }

                        codigo+=
                        "<tr>"+
                            "<td>" + tabla[x]["id"] + "</td>"+
                            "<td>" + tabla[x]["fecha"] + "</td>"+
                            "<td>" + tabla[x]["hora"] + "</td>"+
                            "<td>" + tabla[x]["instructor"] + "</td>"+
                            "<td>" + tabla[x]["tipo_capacitacion"] + "</td>"+
                            "<td>" + tabla[x]["tipo_cliente"] + "</td>"+
                            "<td>" + tabla[x]["sucursal"] + "</td>"+
                            "<td>" + tabla[x]["publicar"] + "</td>"+
                        "</tr>"
                    }
                    codigo+=
                    "</table>"

                    $("#tabla").html(codigo)
                }
                break
        }
    })
}