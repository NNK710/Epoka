<?php
    function ifZeroPaye($a,$b){
        if($a == 0 && ($_SESSION['id'] == 'Directeur' || $_SESSION['id'] == 'Comptable')){
            return "<form action='updateVP.php' method='POST'><button name='btnP' value=$b type='submit'> A Payer</button></form>";
        }
        elseif ($a == 0){
            return('A Payer');
        }
        elseif ($a == 1){
            return('Payée');
        }
        else{
            return('Valeur incorrecte');
        }

    }

    function ifZeroValide($a,$b){
        if($a == 0 && ($_SESSION['id'] == 'Directeur' || $_SESSION['id'] == 'Responsable')){
            return "<form action='updateVP.php' method='POST'><button name='btnV' value=$b type='submit'> A Valider</button></form>";
        }
        elseif ($a == 0){
            return('A Vaider');
        }
        elseif ($a == 1){
            return('Validée');
        }
        else{
            return('Valeur incorrecte');
        }
    }

    function returnToLogin(){
        header('Location:http://localhost/Epoka?fail=1');
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