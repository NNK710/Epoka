<?php 
    session_start();
    include 'function.php';
    if (!isset($_SESSION['id'])){
        returnToLogin();
    }
    else{
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="./style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <title>Liste des Missions</title>
</head>
<body>
    <?php include 'connexionBDD.php'; include 'navbar.php'?>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID Mission</th>
        <th scope="col">Date Début</th>
        <th scope="col">Date Fin</th>
        <th scope="col">Validé ?</th>
        <th scope="col">Payé ?</th>
        <th scope="col">Commune</th>
        <th scope="col">Salarié</th>
        <th scope="col">Responsable</th>
        </tr>
    </thead>
    <?php 
        $missionStatement = $db->prepare("SELECT * FROM mission");
        $missionStatement->execute();
        $missions = $missionStatement->fetchAll();
        foreach ($missions as $mission) {
            if($_SESSION['id'] == 'Comptable' || $_SESSION['id'] == 'Directeur' || $mission['salarieMission'] == $_SESSION['idSal'] || $mission['responsableMission'] == $_SESSION['idSal']){
                echo( "
                    <tbody>
                        <tr>
                        <th scope='row'>".$mission['idMission']. "</th>
                        <th scope='row'>".$mission['debutMission']. "</th>
                        <th scope='row'>".$mission['finMission']. "</th>
                        <th scope='row'>".ifZeroValide($mission['estValiderMission'],$mission['idMission'],$mission['responsableMission'])."</th>
                        <td scope='row'>".ifZeroPaye($mission['estPayerMission'],$mission['idMission']). "</td>
                        <th scope='row'>".idCommuneToString($mission['communeMission']). "</th>
                        <th scope='row'>".idSalarieToString($mission['salarieMission']). "</th>
                        <th scope='row'>".idSalarieToString($mission['responsableMission']). "</th>
                        </tr>
                    </tbody>
                ");
            }
        }
    ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

<?php
    }
?>