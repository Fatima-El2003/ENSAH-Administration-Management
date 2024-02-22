<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
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
                    <h2 id="title">Manager Votre Taches</h2>
                    <div class="content">
                        
                            <div class="row">
                                <a href="chef.php">
                                <i class="fa fa-home"></i><br>
                                <h3>Consulter Modules</h3>
                               
                                </a>
                            </div>         
                        
                        <div class="row">
                            <a href="consultprof.php">
                            <i class="fa fa-user"></i><br>
                            <h3>Consulter Professeurs</h3>
                           
                            </a>
                        </div>
                        <div class="row">
                        <a href="Affecterprof.php">
                            <i class="fa fa-briefcase"></i><br>
                            <h3>Consulter Etat d'Enseignement</h3>
                            
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