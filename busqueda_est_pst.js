$(document).ready(function(){
    $(document).on("keyup","#cedula_est",function(event){
        event.preventDefault();
        $cedula = $("#cedula_est").val();
        $data = "?cedula_est="+$cedula;

        $.ajax({
            type:"GET",
            url:"BusquedaEstPst.php"+$data,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            success: function(result){
                $("#table_est").html(result);
            },error: function(){

            }
        })

    })
})

$(document).ready(function(){
    $(document).on("keyup","#cedula_pst",function(event){
        event.preventDefault();
        $cedula = $("#cedula_pst").val();

        $data = "?cedula_pst="+$cedula;

        $.ajax({
            type:"GET",
            url:"BusquedaEstPst.php"+$data,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            success: function(result){
                $("#table_est").html(result);
            },error: function(){

            }
        })

    })
})

$(document).ready(function(){
    $(document).on("keyup","#curriculum",function(event){
        event.preventDefault();
        $cedula = $("#curriculum").val();

        $data = "?cedula_cur="+$cedula;

        $.ajax({
            type:"GET",
            url:"BusquedaEstPst.php"+$data,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            success: function(result){
                $("#table_est").html(result);
            },error: function(){

            }
        })

    })
})


$(document).ready(function(){
    $(document).on("keyup","#cedula_pst_on",function(event){
        event.preventDefault();
        $cedula = $("#cedula_pst_on").val();

        $data = "?cedula_pst_on="+$cedula;

        $.ajax({
            type:"GET",
            url:"BusquedaEstPst.php"+$data,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            success: function(result){
                $("#table_est").html(result);
            },error: function(){

            }
        })

    })
})


$(document).ready(function(){
    $(document).on("keyup","#documentver",function(event){
        event.preventDefault();
        $cedula = $("#documentver").val();

        $data = "?documentver="+$cedula;

        $.ajax({
            type:"GET",
            url:"BusquedaEstPst.php"+$data,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            success: function(result){
                $("#table_est").html(result);
            },error: function(){

            }
        })

    })
})