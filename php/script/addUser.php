<?php
    require("..\connexion.php");
    try {
            if ( isSet ($_POST [ 'username'] ) ) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sql = "INSERT INTO user (login, password) VALUES ('$username', '$password')";
                if($dbh->exec($sql) === FALSE){
                    echo "COMPTE DEJA UTILISE";
                    exit();
                }
                echo "INSCRIPTION AVEC SUCCES";
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