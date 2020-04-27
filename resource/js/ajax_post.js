// enregister un utilisateur
$("#sbt-form1").click(function (){
    $.post('script/addUser.php',
        {username: $("#username").val(), password: $("#password1").val()}, //data to be posted
        function(data){
            $("#update-box").css("display", "inline-block");
            $('#update-box').html(data);
        }
    );
    }
);
//authentification

$("#connexionbtn").click(function (){
    
    $.post('script/authUser.php',
        {username_connexion: $("#username-connexion").val(), password_connexion: $("#password-connexion").val()}, //data to be posted
        function(data){
            if(data==false){
                $("#connexion-message").css("display", "inline-block");
                $('#connexion-message').html("Mot de Passe ou Nom d'utilisateur est incorrect");
            }else{
                ["#seConnecter","#enregister","#formNewCompte","#login"].forEach(element => {
                    $(element).css("display", "none");
                });
                if(confirm("Voulez vous continuer ?")){
                    document.location = "../index.php";
                }
                alert(data);
            }
            // $('#update-box').html(data);
        }
    );
    }
);