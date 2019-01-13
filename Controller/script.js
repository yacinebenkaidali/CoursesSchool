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

    $("#sumbit_comments").click(function () {
        var user_id =document.getElementById("user_id_comment").innerText;
        var user_comment =document.getElementById("commentinput");

        if(user_comment.length == 0) {
            alert('vous devez insérer un commentaire pour l\'ajouter');
        }else {
            console.log(user_id + user_comment.value);
            $.ajax(
                {
                    url: '../Controller/insertComment.php',
                    type: 'POST',
                    data: {
                        'user_id': user_id,
                        'user_comment': user_comment.value
                    },
                    success: function () {
                        window.location.replace("../View/CommentsPage.php");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
        }
    });
});
