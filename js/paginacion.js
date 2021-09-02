$(document).ready(function(){
    $('.page-footer').hide();
})
var inicio = 0;
var d = 1;
$(document).ready(function() {
    var data = "?pagination=true";
    $.ajax({
        type: "GET",
        url: "../../controller/ClassProductosC.php" + data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(result) {
            $("#pagination").html(result);
        },
        error: function() {
            console.log("error al paginar");
        }
    })
})

$(document).ready(function() {
    var final = parseInt(inicio) + 5;
    var data = "?getProductDelete=true&inicio=" + inicio + "&final=" + final;
    $.ajax({
        type: "GET",
        url: "../../controller/ClassProductosC.php" + data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(result) {
            $("#body-table").html(result);
        },
        error: function() {
            console.log("error al paginar");
        }
    })
})

function getProduct() {
    var final = 5;
    var data = "?getProductDelete=true&inicio=" + inicio + "&final=" + final;
    $.ajax({
        type: "GET",
        url: "../../controller/ClassProductosC.php" + data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(result) {
            $("#body-table").html(result);
            $("li").removeClass("active");
            $("#" + d).addClass("active");
            document.append("<? php include '../../footer.html';?>");
        },
        error: function() {
            console.log("error al paginar");
        }
    })
}

