<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="Script/script.js"></script>
    <style>
        .box {
            border: 1px solid #ccc;
            height: 50px;
        }
    </style>
    <script>
        // Fonction de gestionnaire d'événements pour le glisser-déposer
        function allowDrop(event) {
            event.preventDefault();
        }

        function drag(event) {
            event.dataTransfer.setData("text", event.target.id);
        }

        function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("text");
    var element = document.getElementById(data);
    event.target.value = element.innerText;
}


    </script>
    <title>Modification de l'emploi</title>
</head>

<body>
    <!--header-->
    <header>
        <div class="container padd">
            <div class="search">
                <input type="text" name="search" placeholder="Chercher par mot clé">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
            </div>
            <div class="user-box">
                <img src="R.png" alt="">
                <span>UserName</span>
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-regular fa-envelope m-left"></i>
            </div>
        </div>
    </header>
    <!--Aside-->
    <aside>
        <div class="aside">
            <div class="logo">
                <img src="" alt="">
            </div>
            <ul class="nav">
                <li><a href="index.html" class="active"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#Emploi.html"><i class="fa fa-user"></i>Creer Emploi</a></li>
                <li><a href="Task1 .html"><i class="fa fa-list"></i>Affecter Professeur</a></li>
                <li><a href="#portfolio"><i class="fa fa-briefcase"></i>Valider Notes</a></li>
                <li><a href="#contact"><i class="fa fa-comments"></i>Modifier Descriptif</a></li>
            </ul>
        </div>
    </aside>
    <section class="main-content">
        <h2 id="title">Modofication d'Emploi</h2>
        <div class="filiere padding table">
            <ul>
                <li><a href="#GI1-S1">GI1-S1</a></li>
                <li><a href="#GI1-S2">GI1-S2</a></li>
                <li><a href="GI2-S1">GI2-S1</a></li>
                <li><a href="GI2-S2">GI2-S2</a></li>
                <li><a href="">GI3-S1</a></li>
                <li><a href="">GI3-S2</a
                </li>
            </ul>
        </div>
        <div class="" id="GI1-S1">
            <?php
$pdo = new PDO('mysql:host=localhost;dbname=website','root','');
$sqlState = $pdo->prepare('SELECT * FROM module');
$sqlState->execute();

$modules = $sqlState->fetchAll(PDO::FETCH_ASSOC); ?>
<div style="margin: 50px;"></div>

<table class="table">
        <thead>
            <tr>
                <th>liste de modules </th>
               
           
            <?php 
                foreach($modules as $value){
                    ?>
                        
                            <td><p draggable="true" ondragstart="drag(event)" id="<?php echo $value['nom_module'] ?>"><?php echo $value['nom_module'] ?></p> </td>  
                       
                    <?php
                }
            ?> </tr>
        </thead>
    </table>
        
    </div>

    <?php
$pdo = new PDO('mysql:host=localhost;dbname=website', 'root', '');

if (isset($_POST['adr'])) {
    $elements = $_POST['adr'];

    foreach ($elements as $jour => $heures) {
        foreach ($heures as $heure => $element) {
            if (!empty($element)) {
                $sqlState = $pdo->prepare('INSERT INTO emploi (semestre, id_filiere, id_module, id_utilisateur, jour, heure)
                    SELECT m.semestre, m.id_filiere, m.id_module, m.id_utilisateur, :jour, :heure
                    FROM module m
                    WHERE m.nom_module = :element');
                $sqlState->bindParam(':element', $element);
                $sqlState->bindParam(':jour', $jour);
                $sqlState->bindParam(':heure', $heure);
                $sqlState->execute();
            }
        }
    }

   // echo "Les éléments ont été insérés avec succès dans la table emploi.";
} else {
    //echo "Aucun élément n'a été spécifié.";
}

?>

<div style="margin: 50px;"></div>
<form action="chatemploi.php" method="POST">
    <table class="table">
        <tr>
            <th>Jours</th>
            <?php
            $jours = array("lundi", "mardi", "mercredi", "jeudi", "vendredi");
            $heures = array("8.30", "10.30", "14.30", "16.30");
            foreach ($heures as $heure) {
                echo "<th>$heure</th>";
            }
            ?>
        </tr>
        <?php
        foreach ($jours as $jour) {
            echo "<tr>";
            echo "<td class='box'>$jour</td>";
            foreach ($heures as $heure) {
                echo '<td class="box">';
                echo '<input type="text" id="input1" ondrop="drop(event)" ondragover="allowDrop(event)" name="adr[' . $jour . '][' . $heure . ']">';
                echo '</td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
    <input type="submit" value="Save" class="save-btn">
</form>

</section>

</body>
</html>