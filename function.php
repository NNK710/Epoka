<?php 
    function ifZeroPaye($a){
        if($a == 0){
            return "<form action='update.php' method='POST'><button type='submit'> A Payé</button></form>";
        }
        elseif ($a == 1){
            return('Payée');
        }
        else{
            return('Valeur incorrecte');
        }

    }

    function ifZeroValide($a){
        if($a == 0){
            return "<form action='update.php' method='POST'><button type='submit'> A Validé</button></form>";
        }
        elseif ($a == 1){
            return('Validée');
        }
        else{
            return('Valeur incorrecte');
        }

    }

    // function returnToLogin(){
    //     header('Location:http://localhost/Epoka?fail=1');
    // }

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