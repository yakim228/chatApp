<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Chat App</title>
        <link rel="stylesheet" href="resource\boostrap\css\bootstrap.min.css"/>
        <link rel="stylesheet" href="resource\icons\css\all.css"/>

        <link rel="stylesheet" href="resource\index.css"/>
    </head>
    <body style="overflow-x: hidden;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <!-- ICON -->
            <a class="navbar-brand" href="#"><i class="fas fa-align-justify"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarColor01">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Discussion<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onClick="if(confirm('Voulez Vous deconnexion ?')) deconnexion();" href="#">Deconnexion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Chercher un Ami</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">A propos</a>
                </li>
              </ul>
              <?php
                session_start();
                if(isset($_SESSION['username'])){
                    echo $_SESSION['username'];
                }else{
                    echo "guest";
                }
              ?>
              &nbsp;<i class="far fa-user"></i>
            </div>
          </nav>
        
        <div class="row">
            <div class="col-md-3 nav-side" style="background-color: white;">
                <form>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control form-control-search" placeholder="CHERCHER UN CONTACT">
                        </div>
                    </div>
                </form>
                <!-- =============CODE 3=============== -->
                <div class="row list-group-contact">
                    <ul class="list-group list-group-item-w" id="contacts">
                        <!-- <li class="list-group-item align-items-center">
                            <i class="fas fa-user-circle"></i>Cras justo odiomj
                            <span class="badge badge-primary badge-pill">14</span>
                        </li> -->
                    </ul>
                </div>
            </div>
            <!-- DISCUSSION -->
            
            <div class="col-md-9 message" id="messages" style="background-color: thistle; padding-top:10px;">
                
            </div>
        </div>
    </body>
    <script src="resource\js\jquery\dist\jquery.js"></script>
    <script src="resource\js\fonctions.js"></script>
    <script src="resource\js\loads.js"></script>
    <script src="resource\icons\js\all.js"></script>
    <script src="resource\js\ajax_post.js"></script>
</html>