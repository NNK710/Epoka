<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="./style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

    <title>Ajout Mission</title>
</head>
<body>
    <?php include 'connexionBDD.php'; include 'function.php'; include 'navbar.php'?>

    <form>
        <div class="mb-3 ms-3">
            <label for="exampleInputPassword1" class="form-label">Date Début</label>            
            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
        </div>
        <div class="mb-3 ms-3">
            <label for="exampleInputPassword1" class="form-label">Date Fin</label>            
            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
        </div>
        <div class="mb-3 ms-3">
            <label for="exampleInputEmail1" class="form-label">Salarié</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Selectionner un salarié</option>
                <?php 
                    $salarieStatement = $db->prepare("SELECT * FROM salarie");
                    $salarieStatement->execute();
                    $salaries = $salarieStatement->fetchAll();
                    foreach ($salaries as $salarie) {
                        echo( "<option>".$salarie['prenomSalarie'].' '.$salarie['nomSalarie']."</option>");
                    }
                ?>
            </select>
        </div>
        <div class="mb-3 ms-3">
            <label for="exampleInputPassword1" class="form-label">Validé ?</label>            
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        </div>
        <div class="mb-3 ms-3">
            <label for="exampleInputPassword1" class="form-label">Payé ?</label>            
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        </div>
        <div class="mb-3 ms-3">
            <select name="gender" id="gender" class="select2" data-placeholder="Select Gender">
                <option></option>
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3 ms-3">Valider</button>
    </form>
    
    <?php 
        $strJsonFileContents = file_get_contents("./data/commune.json");
        $array = json_decode($strJsonFileContents, true);
        var_dump($array); 
    ?>

    <script>
        communes = JSON.stringify("./data/commune.json")
        var select = document.getElementById('gender');
        function inner() {
            for (let index = 0; index < 5; index++) {
                document.getElementById('gender').innerHTML = select.innerHTML+"<option value='0'>"+communes[index]['Nom_commune']+"</option>"
            }
            // select.innerHTML = "<option value='0'></option>"
            // select.innerHTML = select.innerHTML + "<option value='0'>Femalee</option>"
        }
        console.log(communes);
        
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
</body>
</html>