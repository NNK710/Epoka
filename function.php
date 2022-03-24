<?php 
    function ifZero($a){
        if($a == 0){
            return("Non");
        }
        elseif ($a == 1){
            return('Oui');
        }
        else{
            return('Valeur incorrecte');
        }

    }

    function returnToLogin(){
        header('Location:http://172.16.50.133/Epoka?fail=1');
    }

    function idCommuneToString($a){
        include 'connexionBDD.php';

        $communeStatement = $db->prepare("SELECT * FROM commune WHERE idCommune = $a");
        $communeStatement->execute();
        $communes = $communeStatement->fetchAll();

        foreach ($communes as $commune) {
            return($commune['nomCommune']);
        }
    }

    function idSalarieToString($a){
        include 'connexionBDD.php';

        $salarieStatement = $db->prepare("SELECT * FROM salarie WHERE idSalarie = $a");
        $salarieStatement->execute();
        $salaries = $salarieStatement->fetchAll();

        foreach ($salaries as $salarie) {
            return($salarie['prenomSalarie'].' '.$salarie['nomSalarie']);
        }
    }
?>