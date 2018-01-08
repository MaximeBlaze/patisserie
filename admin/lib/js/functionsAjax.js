$(document).ready(function(){
    $("span[id]").click(function () {
        var valeur1 = $.trim($(this).text());
        //s'il fallait tester si on utilise edge :
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }
        var ident = $(this).attr("id");
        var str = $(this).attr("name");
        var tab = str.split("-");
        var table = tab[0];
        var name = tab[1];

        $(this).blur(function () {	
            $(this).removeClass("borderInput");
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2)
            {
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
                if(table==='COMMANDE')
                {
                    var retour = $.ajax({
                            type: 'GET',
                            data: parametre,
                            dataType: "text",
                            url: "admin/lib/php/ajax/AjaxUpdateCommande.php",
                            success: function (data) {
                                console.log("success");
                            }
                        });
                }
                else if (table==='UTILISATEUR')
                {
                    var retour = $.ajax({
                            type: 'GET',
                            data: parametre,
                            dataType: "text",
                            url: "admin/lib/php/ajax/AjaxUpdateUtilisateur.php",
                            success: function (data) {
                                console.log("success");
                            }
                        });
                }
                else if (table==='VAISSEAU')
                {
                    var retour = $.ajax({
                            type: 'GET',
                            data: parametre,
                            dataType: "text",
                            url: "admin/lib/php/ajax/AjaxUpdateVaisseaux.php",
                            success: function (data) {
                                console.log("success");
                            }
                        });
                }
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    //alert("Echec retour: " + textStatus + "\nerrorThrown: " + errorThrown);
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            };
        });
    });
});
