<?php
    require("..\connexion.php");
    session_start();

    try {
        if(isset($_SESSION['username']) && isset($_GET['recent'])){
            
            $username = $_SESSION['username'];
            $sql1 = "SELECT id,login FROM user WHERE login='$username'";
            $r = $dbh->query($sql1);
            $re = $r->fetchAll(PDO::FETCH_ASSOC);
            $expediteur = $re[0]['id'];
            $recentMessage = $_GET['recent'];
            $sql = "SELECT * FROM Message WHERE date_message > :recentMessage order by date_message asc";
            
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(':recentMessage'=>$recentMessage));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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