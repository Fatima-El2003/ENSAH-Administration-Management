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

// Prepare the SQL query to fetch the modules taught by the current user
$requete = $connexion->prepare("SELECT * FROM module WHERE id_utilisateur = $id_utilisateur ");

// Prepare the statement

$requete->execute();
$resultat = $requete->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulter modules</title>
    <link rel="stylesheet" href="style.css">
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
                <img src="images/pic-2.png" alt="">
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
                    <li><a href="profacceuil.php" class="active"><i class="fa fa-home"></i>acceuil</a></li>
                    <li><a href="consultermoduleprof.php"><i class="fa fa-user"></i>Consulter mes modules</a></li>
                    <li><a href="prof-consulter-emploi.php"><i class="fa fa-comments"></i>Consulter mon Emploi</a></li>
</ul>
        </div>
    </aside>

    <section class="main-content">
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th>id_module</th>
                        <th>id_filiere</th>
                        <th>nom_module</th>
                        <th>specialite</th>
                        <th>semestre</th>
                        <th>id_departement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$resultat) {
                        echo "Lecture impossible";
                    } else {
                        foreach ($resultat as $ligne) {
                            echo "<tr>";
                            echo "<td>" . $ligne['id_module'] . "</td>";
                            echo "<td>" . $ligne['id_filiere'] . "</td>";
                            echo "<td>" . $ligne['nom_module'] . "</td>";
                            echo "<td>" . $ligne['specialite_module'] . "</td>";
                            echo "<td>" . $ligne['semestre'] . "</td>";
                            echo "<td>" . $ligne['id_departement'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>