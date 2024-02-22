<?php
/*session_start();

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liste des modules</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <h1>Liste des modules du département</h1>

    <?php if ($result->num_rows > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Nom du module</th>
                    <th>Professeur enseignant</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nom_module']; ?></td>
                        <td><?php echo $row['nom_utilisateur']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Aucun module trouvé pour ce département.</p>
    <?php } ?>

    <h2>Ajouter un professeur à un module</h2>

    <form action="ajouter_professeur.php" method="post">
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
        <label for="professeur">Nom du professeur :</label>
        <input type="text" name="professeur" id="professeur" required>
        <br>
        <input type="submit" value="Ajouter">
    </form>

    <a href="logout.php">Se déconnecter</a>
</body>

</html>*/

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liste des modules</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <h1>Liste des modules du département</h1>

    <?php if ($result->num_rows > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Nom du module</th>
                    <th>Professeur enseignant</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nom_module']; ?></td>
                        <td><?php echo $row['nom_utilisateur']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Aucun module trouvé pour ce département.</p>
    <?php } ?>

    <h2>Ajouter un professeur à un module</h2>

    <form action="ajouter_professeur.php" method="post">
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
        <label for="professeur">Nom du professeur :</label>
        <input type="text" name="professeur" id="professeur" required>
        <br>
        <input type="submit" value="Ajouter">
    </form>

    <a href="logout.php">Se déconnecter</a>
</body>

</html>
