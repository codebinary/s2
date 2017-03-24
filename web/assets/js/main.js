$(document).ready(function () {
    $("#export").click(function () {
        $("#datatable").excelexportjs({
            containerid: "datatable", 
            datatype: 'table'
            });
        });
    });