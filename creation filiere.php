<?php
require("config.php");
if(isset($_POST["submit"])) {
    $nom_filiere = $_POST["nom_filiere"];
    $id_filiere = $_POST["id_filiere"];
    $departement = isset($_POST["departement_filiere"]) ? $_POST["departement_filiere"] : "";
    $chef_departement = $_POST["utilisateur_filiere"];
    $descriptif = $_FILES["descriptif_filiere"];
    $modules=$_POST["modules"];//le module est un tableau de module 
    $codes=$_POST["codes"];//tableau des codes
    $departement_modules=$_POST['nomDepartement'];//tableau des departement
    $semestres=$_POST["semestres"];
    $specialities = $_POST["specialities"];
    if($descriptif["error"]==0){
        $descriptif_content=file_get_contents($descriptif["tmp_name"]);
 

        $mysqli= new mysqli($serverName,$userName,$password,$db);//la connexion par instanciation de la classe mysqli
        if($mysqli->connect_error){
            die('Connection failed:'.$mysqli->connect_error);
        }
        $id_utilisateur_query = "SELECT id_utilisateur FROM `utilisateur` WHERE nom_utilisateur = ?";
        $prepared_id_query = $mysqli->prepare($id_utilisateur_query);
        $prepared_id_query->bind_param("s", $chef_departement);
        $prepared_id_query->execute();
        $prepared_id_query->bind_result($id_utilisateur);//pour retourner le resultat en utilisant les requetes preparées on utlise bind-result
        $prepared_id_query->fetch();
        $prepared_id_query->close();
        echo "chef_departement: " . $chef_departement . "<br>";
        echo "id_utilisateur: " . $id_utilisateur . "<br>";
        

        
        if($id_utilisateur!==NULL){
            $query = "INSERT INTO `filiere2` (id_filiere,nom_filiere, descriptif,id_utilisateur) VALUES (?,?,?,?)";
            $prepared_query=$mysqli->prepare($query);
            $prepared_query->bind_param("sssi",$id_filiere,$nom_filiere,$descriptif_content,$id_utilisateur);
            $resultat=$prepared_query->execute();

        if(!$resultat){
            die('Query error'.$mysqli->error);
        }

        $prepared_query->close();
    }else{
        die('invalid user');
    }

    foreach($modules as $index => $module){
        $code=$codes[$index];
        $departement_module=$departement_modules[$index];
        $semestre = $semestres[$index];
        $specialitie = $specialities[$index];
        $modules_query = "INSERT INTO `module` (id_module,nom_module, specialite_module, semestre, id_departement) VALUES (?,?,?,?,?)";
        $modules_prepared_query = $mysqli->prepare($modules_query);
        $modules_prepared_query->bind_param("ssisi", $code, $module, $specialitie, $semestre, $departement_module);
        $modules_result = $modules_prepared_query->execute();
    }

}

   else{
        echo "File Uploading error:".$descriptif["error"];
    }
}

?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="script/script.js"></script>
    <title>Création Filière</title>
</head>
<body>
    <div class="container-main">
        <div class="page-content">
    <!--header-->
            <header>     
                <div class="container padd">
                    <div class="search">
                        <input type="text" name="search" placeholder="Chercher par mot clé">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    </div>
                    <div class="user-box">
                        <img src="images/pic-2.png" alt="">               
                            <span>UserName</span>
                            <i class="fa-solid fa-chevron-down"></i>
                            <i class="fa-regular fa-envelope m-left"></i>
                        
                    </div>
                </div>
            </header>
    
    <!--content-->
            <section class="main-content">
                    <h2 id="title">Créer Filière</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="padding ajout-module" method="POST" enctype="multipart/form-data">
                        <label >Nom du Filière:</label>
                        <input type="text" name="nom_filiere">
                        <label >Identifiant du Filière:</label>
                        <input type="text" name="id_filiere">
                        <label>Descriptif  du Filière:</label>
                        <input type="file" name="descriptif_filiere" accept="application/pdf">
                        <label>Departemet du Filière:</label>
                        <select name="departement_filiere" id="departement_filiere">
                            <option value="DMI">DEPARTEMENT MATH INFO</option>
                            <option value="DCE">DEPARTEMENT CIVIL ENERGITIQUES</option>
                        </select>
                        <label>Chef Departemet du Filière:</label>
                        <input type="text" name="utilisateur_filiere">

                        <label  >Nombre de modules :</label>
                        <input type="number" id="numModules" name="numModules" min="1" max="10">
                        <button type="button" onclick="generateModuleFields()">Générer les champs</button>
                        <div id="moduleContainer">

                        </div>

                        <input type="submit" name="submit" value="submit">
                    </form>                
                </section>
        </div>
    <!--Aside-->
    <aside>
        <div class="aside">
            <div class="logo">
                <img src="" alt="">
            </div>
            <ul class="nav">
                    <li><a href="index.html" class="active"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="creation filiere.php"><i class="fa fa-user"></i>Création d’une filière</a></li>
                    <li><a href="affectationcoordonnateur.php"><i class="fa fa-comments"></i>Affectation d’un coordonnateur à une filière</a></li>
                    <li><a href="deschefdepartement"><i class="fa fa-list"></i>Désignation d’un chef de département</a></li>
                    <li><a href="ajouterprof.php"><i class="fa fa-briefcase"></i>Création du compte professeur</a></li>
                </ul>
        </div>
    </aside>
    </div>
</body>
</html>