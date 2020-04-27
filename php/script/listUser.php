<?php
    require("..\connexion.php");
    session_start();

    try {    
        $login = $_SESSION['username'];
        $sql = "SELECT * FROM user where NOT login='$login'";
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        $jsonResult = json_encode($result);
        echo $jsonResult;
    } catch (PDOException $e) {
        print "Erreur ! : " . $e->getMessage() . "<br/>";
        die();
    }

    require("..\deconnexion.php");
?>