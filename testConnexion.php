
    <?php 

    include 'connexionBDD.php';
    echo($users);
    session_start();

    if (isset($_POST['identifiant'], $_POST['mdp'])){
        $mdp = $_POST['mdp'];
        $identifiant = strtolower($_POST['identifiant']);
        foreach ($users as $user){
            if ($mdp === $user['mdpSalarie'] && $identifiant === $user['nomSalarie']){
                $_SESSION['id'] = true;
            }
        }
        header('Location:acceuil.php');  
        }
        
?>

    