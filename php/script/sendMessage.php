<?php
    require("..\connexion.php");

    // $sql = "INSERT INTO MESSAGE (message, vu, id_expediteur, id_recepteur, supprimer) VALUES ('salut bro',false,3, 1, 'non')";
    
    // var_dump($dbh->exec($sql));
    try {
            session_start();
            if ( isSet ($_SESSION['username'] ) ) {
                $username = $_SESSION['username'];
                $sql1 = "SELECT id,login FROM user WHERE login='$username'";
                $r = $dbh->query($sql1);
                $re = $r->fetchAll(PDO::FETCH_ASSOC);
                $userid = $re[0]['id'];

                if(isSet($_POST['message']) and isSet($_POST['recepteur'])){
                    $recepteur = $_POST['recepteur'];
                $sql = "INSERT INTO MESSAGE (message, vu, date_message, id_expediteur, id_recepteur) VALUES ($message,false,'$userid', 2)";
                if($dbh->exec($sql) === FALSE){
                    echo "COMPTE DEJA UTILISE";
                    exit();
                }
                echo "INSCRIPTION AVEC SUCCES";
            }
            // $sql = "SELECT * FROM user";
            // $sth = $dbh->query($sql);
            // $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        } catch (PDOException $e) {
            print "Erreur ! : " . $e->getMessage() . "<br/>";
            die();
    }
    require("..\deconnexion.php");
?>