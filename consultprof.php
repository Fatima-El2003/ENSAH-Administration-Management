<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulter prof</title>
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
                <li><a href="chefdepartementacceuil.php" class="active"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="chef.php"><i class="fa fa-home"></i>Consulter Modules</a></li>
                <li><a href="consultprof.php"><i class="fa fa-user"></i>Consulter Professeurs</a></li>
                <li><a href="Affecterprof.php"><i class="fa fa-comments"></i>Consulter Etat d'Enseignement</a></li>
                
            </ul>
        </div>
    </aside>

    <section class="main-content">
        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th>id_Professeur</th>
                        <th>Nom Professeur</th>
                        <th>Prenom Professeur</th>
                        <th>Role</th>
                        <th>Specialité</th>
                        <th>Departement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Replace with your database connection code
                    $server = "localhost";
                    $login = "root";
                    $pass = "";

                    try {
                        $connexion = new PDO("mysql:host=$server;dbname=website", $login, $pass);
                        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $requete = $connexion->prepare("SELECT * FROM utilisateur WHERE role='prof' and id_departement='DMI' ORDER BY specialite");
                        $requete->execute();
                        $resultat = $requete->fetchAll();

                        if (!$resultat) {
                            echo "Lecture impossible";
                        } else {
                            foreach ($resultat as $ligne) {
                                echo "<tr>";
                                echo "<td>" . $ligne['id_utilisateur'] . "</td>";
                                echo "<td>" . $ligne['nom_utilisateur'] . "</td>";
                                echo "<td>" . $ligne['prenom_utilisateur'] . "</td>";
                                echo "<td>" . $ligne['role'] . "</td>";
                                echo "<td>" . $ligne['specialite'] . "</td>";
                                echo "<td>" . $ligne['id_departement'] . "</td>";
                                echo "</tr>";
                            }
                        }
                    } catch (PDOException $e) {
                        echo 'Échec de la connexion : ' . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>