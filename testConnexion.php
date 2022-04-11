
    <?php 

    include 'connexionBDD.php';
    echo($users);
    session_start();

    if (isset($_POST['identifiant'], $_POST['mdp'])){
        $mdp = md5($_POST['mdp']);
        $identifiant = strtolower($_POST['identifiant']);
        $userStatement = $db->prepare("SELECT * FROM salarie");
        $userStatement->execute();
        $users = $userStatement->fetchAll(); 
        foreach ($users as $user){
            if ($mdp == $user['mdpSalarie'] && $identifiant == $user['nomSalarie'] ){
                if($user['statutSalarie'] == 1){
                    $_SESSION['id'] = 'Directeur';
                    $_SESSION['idSal'] = $user['idSalarie'];
                }
                elseif($user['statutSalarie'] == 2){
                    $_SESSION['id'] = 'Responsable';
                    $_SESSION['idSal'] = $user['idSalarie'];
                }
                elseif($user['statutSalarie'] == 3){
                    $_SESSION['id'] = 'Comptable';
                    $_SESSION['idSal'] = $user['idSalarie'];
                }
                elseif($user['statutSalarie'] == 4){
                    $_SESSION['id'] = 'Journaliste';
                    $_SESSION['idSal'] = $user['idSalarie'];
                }

            }
        }
        header('Location:acceuil.php');  
        }
        
?>

    