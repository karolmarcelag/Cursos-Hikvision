var global_nombre = new Array(); /* ejemplo variable global */
var tabla_cursos
var id_curso

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

function cargar_region(tipo)
{
    switch(parseInt(tipo))
    {
        case 1:
            {
                mostrar_registros()
            }
            break
        case 2:
            {
                mostrar_registros_pendientes()
            }
            break
        case 3:
            {
                cargar_eventos()
            }
            break
    }
    $.post("../panel/funciones/cargar_region.php",
    {

    },
    function(result)
    {
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

function cargar_eventos(_fecha)
{
    var today = new Date()
    var _fecha_vista = ""

    if(_fecha == null && fecha_evento == null)
    {
        _fecha_vista = today
    }
    if(_fecha == null && fecha_evento != null)
    {
        _fecha_vista = fecha_evento
    }
    if(_fecha != null && fecha_evento == null)
    {
        _fecha_vista = _fecha
    }
    if(_fecha != null && fecha_evento != null)
    {
        _fecha_vista = _fecha
    }
    console.log(_fecha_vista)

    /*if(_fecha == null)
    {
        _fecha_vista = today
    }
    
    if(fecha_evento != null && fecha_evento != "")
    {
        _fecha_vista = fecha_evento
    }*/

    $.post("../panel/funciones/cargar_eventos.php",
    {
        filtro: $("#buscar").val()
    },
    function(result)
    {
        $("#calendar").html("")
        var tabla = JSON.parse(result);
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, 
        {
            initialView: 'dayGridMonth',
            initialDate: _fecha_vista,
            headerToolbar: 
            {
                left: 'prev,next today',
                right: 'title',
            },
            events: tabla
        })
    
        calendar.render()
    })
}

function campos_capacitacion()
{
    $.post("../panel/funciones/campos_capacitacion.php",
    {
        tipo_capacitacion:$("#tipo_capacitacion").val()
    },
    function(result)
    {
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
        tabla = JSON.parse(result);
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
        tabla = JSON.parse(result);
        tabla_campo_correo = tabla;

        $("#correo").val(tabla["instructor"][0]["correo"])

    });
}

function guardar_registro()
{
    console.log($('select[name="sucursal"] option:selected').text())
    if(validar() == true)
    {
        $("#guardar").prop({"disabled":true})
        $.post("../panel/funciones/guardar_registro.php",
        {
            fecha: $("#fecha").val(),
            hora: $("#hora").val(),
            titulo: $("#titulo").val(),
            sucursal: $("#sucursal").val(),
            nombre_sucursal: $("#sucursal").html(),
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
                        cargar_eventos($("#fecha").val())
                        limpiar()
                    }
                    break
                case 2:
                    {
                        alert("Esta fecha ya está ocupada")
                    }
                    break
                case 3:
                    {
                        alert("Sala ocupada por curso presencial de SYSCOM")
                    }
                    break
                default:
                    {
                        alert("Ocurrió un error, por favor contacta al administrador\n\nError: " + respuesta)
                    }
                    break
            }
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
    var input_texto = ["tipo_capacitacion", "titulo", "region", "sucursal", "tipo_cliente", "publicar", "instructor"]
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
    id_curso = ""
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
    $("#formulario").css({"display":"block"})
    $("#formulario").show(500)
}

function cerrar_formulario()
{
    $("#formulario").css({"display":"none"})
}

function cerrar_formulario_lectura()
{
    $("#formulario_lectura").css({"display":"none"})
}

function mostrar_registros()
{
    $.post("../panel/funciones/mostrar_registros.php",
    {
        filtro: $("#buscar").val()
    },
    function(respuesta)
    {
        $("#buscar").val("")

        switch(parseInt(respuesta))
        {
            case -1:
                {
                    $("#tabla").html("<div style='width:100%; margin-top:15px; text-align:center'><b><br>Aún no hay registros</div>")
                }
                break
            default:
                {
                    var tabla = JSON.parse(respuesta);
                    tabla_cursos = tabla

                    var codigo = ""+
                    "<div class='cuadro1' style='margin-top:33px'>"+
                        "<table style='width:90%; margin:auto; border-spacing:0;'>"+
                            "<thead style='position:sticky; top:0; background-color: #FFF'>"+
                                "<tr>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Fecha<b></td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Hora<b></td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Instructor</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Correo</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Título de Capacitación<b></td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Tipo de Capacitación<b></td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Tipo de Cliente</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Sucursal<b></td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Publicar en SYSCOM.MX?</td>"+
                                "</tr>"+
                            "</thead>"
                        a = 1
                        for(x=0; x<tabla.length; x++)
                        {
                            var tipo_capacitacion = ""
                            switch(parseInt(tabla[x]["tipo_capacitacion"]))
                            {
                                case 1:
                                    {
                                        tipo_capacitacion = "Plática Comercial"
                                    }
                                    break
                                case 2:
                                    {
                                        tipo_capacitacion = "Certificación"
                                    }
                                    break
                            }
                            var tipo_cliente = ""
                            switch(parseInt(tabla[x]["tipo_cliente"]))
                            {
                                case 1:
                                    {
                                        tipo_cliente = "Clientes en General"
                                    }
                                    break
                                case 2:
                                    {
                                        tipo_cliente = "DPP"
                                    }
                                    break
                            }
                            var publicar = ""
                            switch(parseInt(tabla[x]["publicar"]))
                            {
                                case 1:
                                    {
                                        publicar = "Si"
                                    }
                                    break
                                case 2:
                                    {
                                        publicar = "No"
                                    }
                                    break
                            }

                                codigo+=
                            "<tbod>"+
                                "<tr class='color"+ a +"'>"+
                                    "<td style='padding:3.5px; width:9%; text-align:center'>" + tabla[x]["fecha"] + "</td>"+
                                    "<td style='padding:3.5px; width:7%; text-align:center'>" + tabla[x]["hora"] + "</td>"+
                                    "<td style='padding:3.5px; width:11%; text-align:center'>" + tabla[x]["nombre"] + " " + tabla[x]["apellido"] + "</td>"+
                                    "<td style='padding:3.5px; width:17%; text-align:center'>" + tabla[x]["correo"] + "</td>"+
                                    "<td style='padding:3.5px; width:10%; text-align:center'>" + tabla[x]["titulo_capacitacion"] + "</td>"+
                                    "<td style='padding:3.5px; width:10%; text-align:center'>" + tipo_capacitacion + "</td>"+
                                    "<td style='padding:3.5px; width: 13%; text-align:center'>" + tipo_cliente + "</td>"+
                                    "<td style='padding:3.5px; width:10%; text-align:center'>" + tabla[x]["sucursal"] + "</td>"+
                                    "<td style='padding:3.5px; width:10%; text-align:center'>" + publicar + "</td>"+
                                "</tr>"+
                            "</tbod>"
                            if(a==1)
                            {
                                a = 2
                            }
                            else
                            {
                                a = 1
                            }
                        }
                        codigo+=
                        "</table>"+
                    "</div>"

                    $("#tabla").html(codigo)
                }
                break
        }
    })
}

function mostrar_registros_pendientes()
{
    $.post("../panel/funciones/mostrar_registros_pendientes.php",
    {
        filtro:$("#buscar").val()
    },
    function(respuesta)
    {
        $("#buscar").val("")

        switch(parseInt(respuesta))
        {
            case -1:
                {
                    $("#tabla").html("<div style='width:100%; margin-top:15px; text-align:center'><b><br>Aún no hay registros</div>")
                }
                break
            default:
                {
                    var tabla = JSON.parse(respuesta)
                    tabla_cursos = tabla

                    var codigo = ""+
                    "<div class='cuadro1' style='margin-top:33px'>"+
                        "<table style='width:90%; margin:auto; border-spacing:0;'>"+
                            "<thead style='position:sticky; top:0; background-color:#FFF; z-index:1'>"+
                                "<tr>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Fecha</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Hora</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Instructor</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Correo</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Título de Capacitación</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Tipo de Capacitación</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Tipo de Cliente</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Sucursal</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b>Publicar en SYSCOM.MX?</td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b></td>"+
                                    "<td style='padding:3px; text-align:center; font-size:13px'><b></td>"+
                                "</tr>"+
                            "</thead>"
                        a = 1
                        for(x=0; x<tabla.length; x++)
                        {
                            var tipo_capacitacion = ""
                            switch(parseInt(tabla[x]["tipo_capacitacion"]))
                            {
                                case 1:
                                    {
                                        tipo_capacitacion = "Plática Comercial"
                                    }
                                    break
                                case 2:
                                    {
                                        tipo_capacitacion = "Certificación"
                                    }
                                    break
                            }
                            var tipo_cliente = ""
                            switch(parseInt(tabla[x]["tipo_cliente"]))
                            {
                                case 1:
                                    {
                                        tipo_cliente = "Clientes en General"
                                    }
                                    break
                                case 2:
                                    {
                                        tipo_cliente = "DPP"
                                    }
                                    break
                            }
                            var publicar = ""
                            switch(parseInt(tabla[x]["publicar"]))
                            {
                                case 1:
                                    {
                                        publicar = "Si"
                                    }
                                    break
                                case 2:
                                    {
                                        publicar = "No"
                                    }
                                    break
                            }

                                codigo+=
                            "<tbod>"+
                                "<tr id='fila"+ x +"' class='color"+ a +"'>"+
                                    "<td style='padding:3.5px; width:8%; text-align:center'>" + tabla[x]["fecha"] + "</td>"+
                                    "<td style='padding:3.5px; width:6%; text-align:center'>" + tabla[x]["hora"] + "</td>"+
                                    "<td style='padding:3.5px; width:12%; text-align:center'>" + tabla[x]["nombre"] + " " + tabla[x]["apellido"] + "</td>"+
                                    "<td style='padding:3.5px; width:15%; text-align:center'>" + tabla[x]["correo"] + "</td>"+
                                    "<td style='padding:3.5px; width:10%; text-align:center'>" + tabla[x]["titulo_capacitacion"] + "</td>"+
                                    "<td style='padding:3.5px; width:11%; text-align:center'>" + tipo_capacitacion + "</td>"+
                                    "<td style='padding:3.5px; width:13%; text-align:center'>" + tipo_cliente + "</td>"+
                                    "<td style='padding:3.5px; width:10%; text-align:center'>" + tabla[x]["sucursal"] + "</td>"+
                                    "<td style='padding:3.5px; width:7%; text-align:center'>" + publicar + "</td>"+
                                    "<td style='padding:3.5px; width:4%; text-align:center' class='eliminar'>" + "<button id='boton_eliminar' class='input_boton' style='min-width:61px; position:relative; cursor:hand; height:22px; background-color:#707070; border-color:#707070' onclick='eliminar_registro("+ x +")'>Eliminar</button>" + "</td>"+
                                    "<td style='padding:3.5px; width:4%; text-align:center' class='registrado'>" + "<button id='boton_registrado' class='input_boton' style='min-width:61px; position:relative; cursor:hand; height:22px; background-color:#707070; border-color:#707070' onclick='registro_listo("+ x +")'>Listo</button>" + "</td>"+
                                "</tr>"+
                            "</tbod>"
                            if(a==1)
                            {
                                a = 2
                            }
                            else
                            {
                                a = 1
                            }
                        }
                        codigo+=
                        "</table>"+
                    "</div>"

                    $("#tabla").html(codigo)
                }
                break
        }
    })
}

function ocultar()
{
    $("#mensaje1").css({"display":"none"})
}

function eliminar_registro(_id)
{
    var id_curso = tabla_cursos[_id]["id"]
    var titulo_capacitacion = tabla_cursos[_id]["titulo_capacitacion"]
    var fecha = tabla_cursos[_id]["fecha"]

    if(confirm("¿Realmente desea eliminar el curso " + titulo_capacitacion + " del día " + fecha + "?") == true)
    {
        $.post("../panel/funciones/eliminar_registro.php",
        {
            id: id_curso
        },
        function(respuesta)
        {
            switch(parseInt(respuesta))
            {
                case 1:
                    {
                        $("#mensaje1").css({"display":"block"})
                        $("#mensaje1").html("Curso eliminado correctamente")
                        setTimeout(ocultar, 2250)
                        mostrar_registros_pendientes()
                    }
                    break
                default:
                {
                    alert("Ocurrió un error, por favor contacte al administrador.\n\nError: " + respuesta)
                }
                break
            }
        })
    }
}

function registro_listo(_id)
{
    var id_curso = tabla_cursos[_id]["id"]
    var titulo_capacitacion = tabla_cursos[_id]["titulo_capacitacion"]
    var fecha = tabla_cursos[_id]["fecha"]

    if(confirm("¿Realmente desea actualizar el curso " + titulo_capacitacion + " del día " + fecha + "?") == true)
    {
        $.post("../panel/funciones/registro_listo.php",
        {
            id: id_curso
        },
        function(respuesta)
        {
            console.log(respuesta)
            switch(parseInt(respuesta))
            {
                case 1:
                    {
                        $("#mensaje1").css({"display":"block"})
                        $("#mensaje1").html("Curso actualizado correctamente")
                        setTimeout(ocultar, 2250)
                        mostrar_registros_pendientes()
                    }
                    break
                default:
                {
                    alert("Ocurrió un error, por favor contacte al administrador.\n\nError: " + respuesta)
                }
                break
            }
        })
    }
}