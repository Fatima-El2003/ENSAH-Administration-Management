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
} ?>
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
        <li><a href="adminacceuil.php" class="active"><i class="fa fa-home"></i>acceuil</a></li>
        <li><a href="creationfiliere.php"><i class="fa fa-user"></i>Création d’une filière</a></li>
        <li><a href="affectationcoordonnateur.php"><i class="fa fa-comments"></i>Affectation d’un coordonnateur à une
            filière</a></li>
        <li><a href="deschefdepartement"><i class="fa fa-list"></i>Désignation d’un chef de département</a></li>
        <li><a href="ajouterprof.php"><i class="fa fa-briefcase"></i>Création du compte professeur</a></li>
      </ul>
    </div>
  </aside>
  <section class="main-content">
    <div class="form-container">
      <form method="POST" action="add_professor.php">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" placeholder="saisir le nom" />

        <label for="prenom">prenom:</label>
        <input type="text" id="prenom" name="prenom" placeholder="saisir le prenom" />

        <label for="specialite">specialite:</label>
        <input type="text" id="specialite" name="specialite" placeholder="saisir la specialite " />

        <label for="departement">Departement:</label>
        <select id="departement" name="departement">
          <option value="DMI">DMI</option>
          <option value="DCE">DCE</option>
        </select>
        <label for="mot_passe">mot de passe:</label>
        <input type="text" id="mot_passe" name="mot_passe" placeholder="saisir le mot de passe" />
        <input type="submit" class="submit-btn" value="Submit" />
      </form>
    </div>
  </section>
</body>

</html>