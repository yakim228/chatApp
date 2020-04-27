$("#enregister").toggleClass("afficher");
$("#login").toggleClass("afficher");
$("#update-box").css("display", "none");
$("#connexion-message").css("display", "none");
$("#seConnecter").click(function (){
    $("#formNewCompte").toggleClass("afficher");
    $(this).toggleClass("afficher");
    $("#enregister").toggleClass("afficher");
    $("#login").toggleClass("afficher");
});

$("#enregister").click(function (){
    $("#login").toggleClass("afficher");
    $(this).toggleClass("afficher");
    $("#seConnecter").toggleClass("afficher");
    $("#formNewCompte").toggleClass("afficher");
});