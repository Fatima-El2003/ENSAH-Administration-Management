<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['id_utilisateur'])) {
    // Redirect the user to the login page or display an error message
    header('Location: loginp.php');
    exit();
}

// Get the current user's id_utilisateur from the session
$id_utilisateur = $_SESSION['id_utilisateur'];

echo ($id_utilisateur);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="Script/script.js"></script>
    <title>Ensah Website</title>
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
                <h2 id="title">Manage Your Tasks</h2>
                <div class="content">

                    <div class="row">
                        <a href="affecterprof.php">
                            <i class="fa fa-home"></i><br>
                            <h3>Affecter professeur</h3>


                        </a>


                    </div>
                    <div class="row">
                        <a href="chatemploi.php">
                            <i class="fa fa-home"></i><br>
                            <h3>definir emploi</h3>


                        </a>


                    </div>

                    <div class="row">
                        <a href="consulter_emploi_cord.php">
                            <i class="fa fa-home"></i><br>
                            <h3>Modifier emploi </h3>


                        </a>


                    </div>

                    <div class="row">
                        <a href="consultermoduleprof.php">
                            <i class="fa fa-home"></i><br>
                            <h3>consulter mes module</h3>


                        </a>


                    </div>
                    <div class="row">
                        <a href="prof-consulter-emploi.php">
                            <i class="fa fa-home"></i><br>
                            <h3>consulter mon emploi</h3>


                        </a>


                    </div>

                </div>
            </section>
        </div>
        <!--Aside-->
        <aside>
            <div class="aside">
                <div class="logo">
                    <img src="" alt="">
                </div>
                <ul class="nav">
                    <li><a href="cheffiliereacceuil.php" class="active"><i class="fa fa-home"></i>acceuil</a></li>
                    <li><a href="Consulter Etat d'enseignement.php"><i class="fa fa-user"></i>Affecter professeur</a></li>
                    <li><a href="chatemploi.php"><i class="fa fa-comments"></i>definir emploi</a></li>
                    <li><a href="prof_consulter_emploi.php"><i class="fa fa-list"></i>consulter emploi</a></li>
                    <li><a href="consultermoduleprof.php"><i class="fa fa-briefcase"></i> consulter mes module</a></li>
                    <li><a href="consultermoduleprof.php"><i class="fa fa-comments"></i>consulter mon emploi</a></li>
                </ul>
            </div>
        </aside>
    </div>
</body>

</html>