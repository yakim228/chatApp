<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Index</title>
        <link rel="stylesheet" href="..\resource\boostrap\css\bootstrap.min.css"/>
        <link rel="stylesheet" href="..\resource\icons\css\all.css"/>
        <link rel="stylesheet" href="..\resource\index.css"/>
    </head>
    <body style="overflow-x: hidden;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <!-- ICON -->
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">CHAT EN TOUTE SECURITE<span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="btn btn-warning" id="seConnecter">SE CONNECTER</a>
                </li>
                <li>
                    <a class="btn btn-warning" id="enregister">CREER UN COMPTE</a>
                </li>
              </ul>
              <i class="far fa-user"></i>
            </div>
        </nav>
        <center>
            <form class="col-md-4" id="formNewCompte" action="javascript:void(0);" method="post">
            <div id="update-box" class="col-md-12 alert alert-success"><br></div>
                <h2>CREER VOTRE COMPTE ICI</h2>
                <div class="col-md-12">
                    <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Non d'utilisateur">
                    <br>
                    <input class="form-control form-control-lg" id="password1" name="password" type="text" placeholder="Votre mot de passe">
                    <br>
                    <input class="form-control form-control-lg" id="password1Conf" name="pwd_conf" type="text" placeholder="confirmer le mot de passe">
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-2">
                        <input id="sbt-form1" type="submit" class="btn btn-success" value="J'ai fini"/>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-2">
                            <input type="reset" class="btn btn-danger" value="J'annule"/>
                    </div>
                </div>
            </form>
            <br>
            <form class="col-md-4" action="javascript:void(0);" method="post" id="login">
                <h2>CONNECTEZ VOUS ICI</h2>
                <div id="connexion-message" class="col-md-12 alert alert-danger"><br></div>
                <div class="col-md-12">
                    <input class="form-control form-control-lg" id="username-connexion"  type="text" placeholder="username">
                    <br>
                    <input class="form-control form-control-lg" id="password-connexion" type="text" placeholder="password">
                    <br>
                </div>
                <input type="submit" id="connexionbtn" class="btn btn-success" value="Je me connecte"/>
            </form>
        </center>

    </body>
    <script src="..\resource\js\jquery\dist\jquery.js"></script>
    <script src="..\resource\js\js_module.js"></script>
    <script src="..\resource\js\ajax_post.js"></script>
</html>
    