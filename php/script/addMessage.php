<?php
    require("..\connexion.php");

    try {
            session_start();
            if (isSet ($_SESSION[ 'username'] ) && isSet ($_POST ['recepteur'] ) ) {
                $message = addslashes($_POST['message']);
                $username = $_SESSION['username'];
                $sql1 = "SELECT id,login FROM user WHERE login='$username'";
                $r = $dbh->query($sql1);
                $re = $r->fetchAll(PDO::FETCH_ASSOC);
                $expediteur = (Integer) $re[0]['id'];
                
                $recepteur = (Integer) $_POST['recepteur'];
                
                $sql = "INSERT INTO MESSAGE (message, vu, id_expediteur, id_recepteur, supprimer) VALUES ('$message',false,$expediteur,$recepteur, 'non')";
                
                if($dbh->exec($sql)){
                    echo "true";
                }else{
                    echo "false";
                }
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