$(document).ready(function () {
    $("#wilaya").click(function () {
       w3.sortHTML("#myTabel",".item",'td:nth-child(5)');
    });
    $("#nom").click(function () {
        w3.sortHTML("#myTabel",".item",'td:nth-child(2)');
    });
    $("#commune").click(function () {
        w3.sortHTML("#myTabel",".item",'td:nth-child(6)');
    });

    $("#filterInput").on("keyup", function() {
        console.log('nannaz');
        var value = $(this).val().toLowerCase();
        $("#tableBody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
