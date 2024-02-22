<?php
session_start();

require("config.php");
$conn = new mysqli($serverName, $userName, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si l'utilisateur est connecté en tant que chef de département
if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: login.php'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

$id_utilisateur = $_SESSION['id_utilisateur'];


// Récupérer l'ID du département du chef de département connecté
$stmt = $conn->prepare("SELECT id_departement FROM utilisateur WHERE id_utilisateur = ?");
$stmt->bind_param("i", $id_utilisateur);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_departement = $row['id_departement'];
}

// Récupérer la liste des modules du département avec les noms des professeurs enseignant
$stmt = $conn->prepare("SELECT m.nom_module, u.nom_utilisateur
                        FROM module m
                        LEFT JOIN utilisateur u ON m.id_utilisateur = u.id_utilisateur
                        WHERE m.id_departement = ?");
$stmt->bind_param("i", $id_departement);
$stmt->execute();
$result = $stmt->get_result();


$stmt_professeurs = $conn->prepare("SELECT nom_utilisateur FROM utilisateur WHERE role='prof'");
$stmt_professeurs->execute();
$result_professeurs = $stmt_professeurs->get_result();



if (isset($_POST["submit"])) {
    $moduleID = $_POST["module"];
    $professeur = $_POST["professeur"];

    // Récupérer l'ID de l'utilisateur/professeur
    $stmt = $conn->prepare("SELECT id_utilisateur FROM utilisateur WHERE nom_utilisateur = ?");
    $stmt->bind_param("s", $professeur);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_utilisateur = $row['id_utilisateur'];

        // Mettre à jour la table des modules avec l'ID de l'utilisateur/professeur
        $stmt_update = $conn->prepare("UPDATE module SET id_utilisateur = ? WHERE id_module = ?");
        $stmt_update->bind_param("ii", $id_utilisateur, $moduleID);
        $stmt_update->execute();

        if ($stmt_update->affected_rows > 0) {
            echo "Le professeur a été ajouté avec succès au module.";
        } else {
            echo "Une erreur s'est produite lors de l'ajout du professeur au module.";
        }
    } else {
        echo "Le professeur sélectionné n'existe pas.";
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
    <script src="Script/script.js"></script>
    <title>Etat d'Enseignement</title>
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
            <section class="main-content prof-content">
                    <h2 id="title">Consulter Etat d'Enseignement</h2>
                    <?php if ($result->num_rows > 0) { ?>
                    <table class="table">
            
                        <tr>
                            <th>Nom du module</th>
                            <th>Professeur enseignant</th>
                        </tr>
                    
                    
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['nom_module']; ?></td>
                                <td><?php echo $row['nom_utilisateur']; ?></td>
                            </tr>
                        <?php } ?>
            
        </table>
    <?php } else { ?>
        <p>Aucun module trouvé pour ce département.</p>
    <?php } ?>
    <h2 id="title" class="prof">Affecter professeur au module</h2>
    <div class="padding">
    

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <label for="module">Module :</label>
        <select name="module" id="module">
            <?php
            $stmt = $conn->prepare("SELECT id_module, nom_module FROM module WHERE id_departement = ?");
            $stmt->bind_param("i", $id_departement);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id_module'] . "'>" . $row['nom_module'] . "</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <label for="professeur">Nom du professeur :</label>
        <input list="professeurs" name="professeur" id="professeur" required>
        <datalist id="professeurs">
            <?php
            while ($row_professeur = $result_professeurs->fetch_assoc()) {
                echo "<option value='" . $row_professeur['nom_utilisateur'] . "'>";
            }
            ?>
        </datalist>

        </div>
        <br>
  <input type="Submit" name="submit" value="Save" class="save-btn">
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
                <li><a href="chefdepartementacceuil.php" class="active"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="chef.php"><i class="fa fa-home"></i>Consulter Modules</a></li>
                <li><a href="consultprof.php"><i class="fa fa-user"></i>Consulter Professeurs</a></li>
                <li><a href="Affecterprof.php"><i class="fa fa-comments"></i>Consulter Etat d'Enseignement</a></li>             
            </ul>
        </div>
    </aside>
    </div>
</body>
</html>