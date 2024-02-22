<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="Script/script.js"></script>
    <title>Consulter emploi</title>
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
                    <li><a href="profacceuil.php" class="active"><i class="fa fa-home"></i>acceuil</a></li>
                    <li><a href="consultermoduleprof.php"><i class="fa fa-user"></i>Consulter mes modules</a></li>
                    <li><a href="prof-consulter-emploi.php"><i class="fa fa-comments"></i>Consulter mon Emploi</a></li>
</ul>
        </div>
    </aside>
    <section class="main-content">
        <h2 id="title">Consulter emploi</h2>

        <?php
        $server = "localhost";
        $login = "root";
        $pass = "";

        try {
            $connexion = new PDO("mysql:host=$server;dbname=website", $login, $pass);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $requete = $connexion->prepare("SELECT e.*, m.nom_module 
                                           FROM emploi e 
                                           JOIN module m ON e.id_module = m.id_module 
                                           ");
            $requete->execute();
            $resultat = $requete->fetchAll();

            if (!$resultat) {
                echo "Lecture impossible";
            } else {
                echo '<table class="table">';
                echo '<thead>';
                echo "<tr>
                        <th>Module</th>
                        <th>Jours</th>
                        <th>Heures</th>
                    </tr>";
                echo '</thead>';
                echo "<tbody>";

                foreach ($resultat as $ligne) {
                    echo "<tr>";
                    echo "<td>" . $ligne['nom_module'] . "</td>";
                    echo "<td>" . $ligne['jour'] . "</td>";
                    echo "<td>" . $ligne['heure'] . "</td>";

                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            }
        } catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
        }
        ?>
        
    </section>
</body>

</html>
