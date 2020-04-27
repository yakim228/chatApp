<?php
    require("..\connexion.php");
    session_start();

    try {
        if ( isSet ($_POST [ 'username_connexion'] ) ) {
            $username = $_POST['username_connexion'];
            $password = $_POST['password_connexion'];
            $sql = "SELECT login, password FROM user WHERE login='$username' AND password='$password'";
            if($dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC)!=NULL){

                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                require("..\layout\services.php");
                exit();
            }
            echo false;
        }
        // $sql = "SELECT * FROM user";
        // $sth = $dbh->query($sql);
        // $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur ! : " . $e->getMessage() . "<br/>";
        die();
    }

    require("..\deconnexion.php");
?>