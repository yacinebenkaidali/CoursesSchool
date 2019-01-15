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
        var value = $(this).val().toLowerCase();
        $("#tableBody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $("#sumbit_comments").click(function () {
        var user_id =document.getElementById("user_id_comment").innerText;
        var user_comment =document.getElementById("commentinput");
        let ecoleSelect = document.getElementById("Type_Ecole_comment");
        let ecole = ecoleSelect.options[ecoleSelect.selectedIndex].value;

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
                        'user_comment': user_comment.value,
                        'id_ecole':ecole
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


    $("#addFormation").click(function () {
        let nom =document.getElementById("addNom");
        let wilaya =document.getElementById("addWilaya");
        let commune =document.getElementById("addCommune");
        let Adr =document.getElementById("addAdr");
        let Tel =document.getElementById("addTel");
        let domaine =document.getElementById("addDomaine");
        let Categorie = document.getElementById("categories");
        let CategorieSelected = Categorie.options[Categorie.selectedIndex].value;

        if(nom.length == 0) {
            alert('vous devez insérer les infos necessaires');
        }else {
            $.ajax(
                {
                    url: '../Controller/insertFormation.php',
                    type: 'POST',
                    data: {
                        'nom': nom.value,
                        'wilaya': wilaya.value,
                        'commune':commune.value,
                        'domaine':domaine.value,
                        'Adr':Adr.value,
                        'Tel':Tel.value,
                        'cat':CategorieSelected
                    },
                    success: function (data) {
                        console.log(data);
                        //window.location.replace("../View/index.php");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
        }
    });

    $("#UpdateFormation").click(function () {
        let nom =document.getElementById("addNom");
        let wilaya =document.getElementById("addWilaya");
        let commune =document.getElementById("addCommune");
        let Adr =document.getElementById("addAdr");
        let Tel =document.getElementById("addTel");
        let domaine =document.getElementById("addDomaine");
        let id =document.getElementById("span_update");
        let Categorie = document.getElementById("categories");
        let CategorieSelected = Categorie.options[Categorie.selectedIndex].value;

        if(nom.length == 0) {
            alert('vous devez insérer les infos necessaires');
        }else {
            $.ajax(
                {
                    url: '../Controller/Update.php',
                    type: 'POST',
                    data: {
                        'nom': nom.value,
                        'wilaya': wilaya.value,
                        'commune':commune.value,
                        'domaine':domaine.value,
                        'Adr':Adr.value,
                        'Tel':Tel.value,
                        'id':id.innerText,
                        'cat':CategorieSelected
                    },
                    success: function (data) {
                        console.log(data);
                        //window.location.replace("../View/index.php");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
        }
    });

    $("#tableBody > tr").click(function () {
        location.replace('../../ProjetWEB/View/index.php');
    });
    $("#comparer").click(function () {
            let select1 =document.getElementById('Ecole1');
            let option1 =select1.options[select1.selectedIndex].value;
            let select2 =document.getElementById('Ecole2');
            let option2=select2.options[select2.selectedIndex].value;


            getTableForSelect(option1,"#tBody1");
            getCommentsForSelect(option1,"#comment_section1");
            getTableForSelect(option2,"#tBody2");
            getCommentsForSelect(option2,"#comment_section2");
    });

    function  getTableForSelect( id,tableid) {
        $.ajax(
            {
                url: '../Controller/getTableCompare.php',
                type: 'POST',
                data: {
                    'id': id
                },
                success: function (data) {
                    $(tableid).html('').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
    }


    function  getCommentsForSelect(id,divid) {
        $.ajax(
            {
                url: '../Controller/getComments.php',
                type: 'POST',
                data: {
                    'id': id
                },
                success: function (data) {
                    console.log(data);
                    $(divid).html('').append(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("boo");
                    console.log(textStatus, errorThrown);
                }
            });
    }


});
