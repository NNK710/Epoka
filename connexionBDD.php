<?php
    try
        {
            $db = new PDO('mysql:host=localhost;dbname=epoka;charset=utf8', 'root', '');
            return $db;
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        $userStatement = $db->prepare("SELECT * FROM salarie");
        $userStatement->execute();
        $users = $userStatement->fetchAll();
?>