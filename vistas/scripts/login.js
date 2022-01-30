$("#frmAcceso").on('submit',function(e)
{
    e.preventDefault();
    loginf=$("#loginf").val();
    clavef=$("#clavef").val();

    $.post("../ajax/usuario?op=verificar",
        {"loginf":loginf,"clavef":clavef},
        function(data)
    {
        if (data!="null")
        {
            $(location).attr("href","inicio");
        }
        else
        {
            bootbox.alert("Usurio y/o Password incorrectos");
        }
    });
})