$(document).ready(function () {
    $("#export").click(function () {
        $("#datatable").excelexportjs({
            containerid: "datatable", 
            datatype: 'table'
            });
        });

    $(".btn.btn-danger").on('click', function(){
    	if(confirm("Desea eliminar el elemento?")){
    		return true;
    	}else{
    		return false;
    	}

    });

    setTimeout(function(){
    	$(".alerta").addClass('fadeOut').fadeOut('2000');
    	console.log("entro");
    }, 2000)


});