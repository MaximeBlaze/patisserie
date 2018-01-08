$(document).ready(function () {
    
    
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");
    
    
    $("#inscri_form").validate({  
        rules: {
            nom: "required",
            prenom: "required",
            login: "required",
            mdp: "required",
            mdp2: {
                equalTo: "#mdp"
            },
            cpt: {
                required: true,
                regex: /^(BE)[0-9]{2}\-[0-9]{4}\-[0-9]{4}\-[0-9]{4}$/
            },
            adr: "required",
            submitHandler: function (form) {
                form.submit();
            }
        }
    });
    
    $("#tabnouvuser").validate({  
        rules: {
            nom: "required",
            prenom: "required",
            login: "required",
            mdp: "required",
            cpt: {
                required: true,
                regex: /^(BE)[0-9]{2}\-[0-9]{4}\-[0-9]{4}\-[0-9]{4}$/
            },
            adr: "required",
            submitHandler: function (form) {
                form.submit();
            }
        }
    });
    
    $.extend($.validator.messages, {
        required: "Veuillez renseigner ce champ.",
        email: "Veuillez renseigner un email valide.",
        url: "Url non conforme.",
        date: "Date non valide.",
        number: "Veuillez n'entrer que des chiffres.",
        digits: "Veuillez n'entrer que des chiffres.",
        equalTo: "Les champs ne concordent pas.",
        maxlength: $.validator.format("Entrez au maximum {0} caract&egrave;res."),
        minlength: $.validator.format("Entrez au minimum {0} caract&egrave;res."),
        rangelength: $.validator.format("Votre entrée doit compter entre {0} et {1} caract&egrave;res."),
        range: $.validator.format("Entrez un nombre entre {0} et {1}."),
        max: $.validator.format("Entrez un nombre inférieur ou égal à {0}."),
        min: $.validator.format("Entrz un nombre de minimum {0}."),
        regex: "Format non conforme"
    });
});

