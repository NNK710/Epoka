<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'connexionBDD.php';
        if(isset($_POST['btnP'])){
            $idMission = $_POST['btnP'];
            $sql = "UPDATE mission 
            SET estPayerMission = 1
            WHERE idMission = $idMission";
        }
        elseif(isset($_POST['btnV'])){
            $idMission = $_POST['btnV'];
            $sql = "UPDATE mission 
            SET estValiderMission = 1
            WHERE idMission = $idMission";
        }

        
        

        $db->exec($sql);
        header('Location:listMission.php');
    ?>
</body>
</html>