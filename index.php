<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="./style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        if(isset($_GET['fail'])){ $fail = $_GET['fail'];} 
        if(isset($_SESSION['id'])){
            session_destroy();
            echo('destroy');
        };
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width: 18rem;height:19rem;">
            <div class="card-body">
                <h5 class="card-title">Connexion</h5>
                <form action="testConnexion.php" method="POST">
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                        <?php if(isset($fail)){ if($fail == 1){echo("<input style='border-color:red;' type='string' class='form-control' name='identifiant' id='exampleInputEmail1'>");}} else{ echo("<input type='string' class='form-control' name='identifiant' id='exampleInputEmail1'>"); };  ?>
                        
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <?php if(isset($fail)){ if($fail == 1){echo("<input style='border-color:red;' type='password' class='form-control' name='mdp' id='exampleInputPassword1'>");}}else{echo("<input type='password' class='form-control' name='mdp' id='exampleInputPassword1'>");}  ?>
                        
                    </div>
                    <div style="color:red" class='mb-2'>
                    <?php
                        if(isset($fail)){
                            if($fail == 1) { echo('Identifant ou Mdp incorrecte'); };
                        } 
                    ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>