<?php
// Replace with your database connection code
$server = "localhost";
$login = "root";
$pass = "";
$maxValue = 0;
try {

    $connexion = new PDO("mysql:host=$server;dbname=website", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT MAX(id_utilisateur) AS max_value FROM utilisateur";
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);


    $maxValue = $result['max_value'];
    $maxValue++;

} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $connexion = new PDO("mysql:host=$server;dbname=website", $login, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nom_utilisateur = $_POST['nom'];
        $prenom_utilisateur = $_POST['prenom'];
        $specialite = $_POST['specialite'];
        $id_departement = $_POST['departement'];
        $mot_passe = $_POST['mot_passe'];

        $requete = $connexion->prepare("INSERT INTO utilisateur (id_utilisateur, mot_passe, nom_utilisateur, prenom_utilisateur, role, specialite, id_departement) VALUES ( :id, :mot_passe, :nom_utilisateur, :prenom_utilisateur, 'prof', :specialite, :id_departement)");




        $requete->bindParam(':id', $maxValue);
        $requete->bindParam(':mot_passe', $mot_passe);
        $requete->bindParam(':nom_utilisateur', $nom_utilisateur);
        $requete->bindParam(':prenom_utilisateur', $prenom_utilisateur);
        $requete->bindParam(':specialite', $specialite);
        $requete->bindParam(':id_departement', $id_departement);
        $requete->execute();

        echo "Professor added successfully.";
    } catch (PDOException $e) {
        echo 'echec de la connexion : ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Professor</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!--header-->
    <header>
        <div class="container padd">
            <div class="search">
                <input type="text" name="search" placeholder="Chercher par mot clé" />
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
            </div>
            <div class="user-box">
                <img src="images/pic-2.png" alt="" />
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
                <img src="" alt="" />
            </div>
            <ul class="nav">
                    <li><a href="index.html" class="active"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="creationfiliere.php"><i class="fa fa-user"></i>Création d’une filière</a></li>
                    <li><a href="affectationcoordonnateur.php"><i class="fa fa-comments"></i>Affectation d’un coordonnateur à une filière</a></li>
                    <li><a href="deschefdepartement"><i class="fa fa-list"></i>Désignation d’un chef de département</a></li>
                    <li><a href="cajouterprof.php"><i class="fa fa-briefcase"></i>Création du compte professeur</a></li>
                </ul>
        </div>
    </aside>
    <section class="main-content">
        <div class="form-container">
            <?php if (!empty($message)): ?>
                <p>
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>