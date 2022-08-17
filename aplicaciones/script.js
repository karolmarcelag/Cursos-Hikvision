function titulo(numero)
{
    var arreglo = 
    [
        {"titulo":null}, //0
        {"titulo":"Estatus y Tiempos"}, //1
        {"titulo":"Reportes de No Conformidad"}, //2
        {"titulo":"Solicitudes de Calidad (inspección, revisión, etc.)"}, //3
        {"titulo":"Enlace a Intercom"}, //4
        {"titulo":"KAPOK, SIM, CEIBAII, Epcom Cloud"}, //5
        {"titulo":"Webinars"}, //6
        {"titulo":"Registro de Viajes"}, //7
        {"titulo":"Comedor SYSCOM"}, //8
        {"titulo":"Soporte (Helpdesk)"}, //9
        {"titulo":"Usuarios y Permisos"}, //10
        {"titulo":"Cambiar Contraseña"}, //11
        {"titulo":"Cerrar Sesión"}, //12
        {"titulo":"Control de Paneles y Zonas"}, //13
        {"titulo":"Control de Artículos"}, //14
        {"titulo":"Reparaciones Hikvision / Epcom"}, //15
        {"titulo":"Control de Vuelos SYSCOM"}, //16
        {"titulo":"Cursos En Línea"}, //17
        {"titulo":"Encuestas 3CX"}, //18
        {"titulo":"Restablecimiento por XML"}, //19
        {"titulo":"Servicios M2M"}, //20
        {"titulo":"Cursos Presenciales"}, //21
        {"titulo":"Ordenes de Trabajo de Tarjetas HID"}, //22
        {"titulo":"Experiencia al Cliente"}, //23
        {"titulo":"Cursos Hikvision"} //24
    ];

    $("#titulo_h").html(arreglo[numero]["titulo"]);
}

function clean()
{
    $("#titulo_h").html("");
}
