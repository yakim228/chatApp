<?php
    define('USER','root');
    define('PWD','');
    define('SERVEUR','users');
    define('BD','gestion_user');
    $dbh = new PDO('mysql:host=localhost;dbname=chat_bd', USER, PWD);
?>