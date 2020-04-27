<?php
    require("..\connexion.php");
    session_start();

    try {
        if(isset($_SESSION['username'])){
            
            $username = $_SESSION['username'];
            $sql1 = "SELECT id,login FROM user WHERE login='$username'";
            $r = $dbh->query($sql1);
            $re = $r->fetchAll(PDO::FETCH_ASSOC);
            $expediteur = $re[0]['id'];
            $sql = "SELECT * FROM Message order by date_message asc";
            // $sql = "SELECT * FROM Message WHERE id_expediteur='$expediteur' OR id_recepteur='$expediteur'  AND id_expediteur='$recepteur' OR id_recepteur='$recepteur'";
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            $jsonResult = json_encode(array($result, $expediteur));
            echo $jsonResult;
            exit(0);
        }
        echo "null";
    } catch (PDOException $e) {
        print "Erreur ! : " . $e->getMessage() . "<br/>";
        die();
    }
    require("..\deconnexion.php");
?>