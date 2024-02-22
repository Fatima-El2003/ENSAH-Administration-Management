<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['id_utilisateur'])) {
    // Redirect the user to the login page or display an error message
    header('Location: loginp.php');
    exit();
}

// Get the current user's id_utilisateur from the session
$id_utilisateur = $_SESSION['id_utilisateur'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="Script/script.js"></script>
    <title>consulter liste de modules par le chef de departement</title>
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
                <li><a href="chefdepartementacceuil.php" class="active"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="chef.php"><i class="fa fa-home"></i>Consulter Modules</a></li>
                <li><a href="consultprof.php"><i class="fa fa-user"></i>Consulter Professeurs</a></li>
                <li><a href="Affecterprof.php"><i class="fa fa-comments"></i>Consulter Etat d'Enseignement</a></li>
                
            </ul>
        </div>
    </aside>
    <section class="main-content">
        <h2 id="title">Conulter liste de modules</h2>
<?php
$server = "localhost";
$login = "root";
$pass = "";

try {
    $connexion = new PDO("mysql:host=$server;dbname=website", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $requete = $connexion->prepare("SELECT * FROM module WHERE id_departement IN(SELECT id_departement FROM utilisateur WHERE id_utilisateur=$id_utilisateur)");
    $requete->execute();
    $resultat = $requete->fetchAll();

    if (!$resultat) {
        echo "Lecture impossible";
    } else {
        echo '<table class="table">';
        echo '<thead>';
        echo "<tr>
                <th>Code</th>
                <th>Nom du module</th>
            </tr>";
        echo '</thead>';
        echo "<tbody>";

        foreach ($resultat as $ligne) {
            echo "<tr>";
            echo "<td>" . $ligne['id_module'] . "</td>";
            echo "<td>" . $ligne['nom_module'] . "</td>";
            echo "</tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
    }
} catch (PDOException $e) {
    echo 'Échec de la connexion : ' . $e->getMessage();
}
?>

        

</body>

</html>












</section>