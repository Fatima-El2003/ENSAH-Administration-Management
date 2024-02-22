
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="Script/script.js"></script>
    <title>Affectation des Modules</title>
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
    <!--section-->
    <section class="main-content">
        <h2 id="title">Affectation Professeur</h2>
        <div class="filiere padding">
            <ul>
                <li><a href="">GI1-S1</a></li>
                <li><a href="">GI1-S2</a></li>
                <li><a href="">GI2-S1</a></li>
                <li><a href="">GI2-S2</a></li>
                <li><a href="">GI3-S1</a></li>
                <li><a href="">GI3-S2</a></li>
            </ul>
         
        </div>
        <table class="table padding">
            <tr>
                <th>Code Module</th>
                <th>Intitulé du Module</th>
                <th>Enseignant</th>
            </tr>
            <tr>
                <td>M12</td>
                <td>algorithmitique</td>
                <td>
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist>
                </td>
            </tr>
            <tr>
                <td>M13</td>
                <td>C++</td>
                <td>                   
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist></td>
            </tr>
            <tr>
                <td>M14</td>
                <td>Base de données</td>
                <td>
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist></td>
            </tr>
            <tr>
                <td>M15</td>
                <td>C</td>
                <td>    
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist></td>
            </tr>    
            <tr>        
                <td>M15</td>
                <td>Theorie de langage</td>
                <td>         
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist></td>
            </tr>
            <tr>        
                <td>M15</td>
                <td>Comptabilité</td>
                <td>         
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist></td>
            </tr>
            <tr>        
                <td>M15</td>
                <td>Management</td>
                <td>         
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist></td>
            </tr>
            <tr>        
                <td>M15</td>
                <td>Recherche Operationelle</td>
                <td>         
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist></td>
            </tr>
            <tr>        
                <td>M15</td>
                <td>Architecure</td>
                <td>         
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist></td>
            </tr>
            <tr>        
                <td>M15</td>
                <td>    Anglais</td>
                <td>         
                    <input list="professeur" name="profeseur" id="profeseur">
                    <datalist id="professeur">
                        <option value="Mr.Dadi"></option>
                        <option value="Mr.Eragragui"></option>
                        <option value="Mr.Bahri"></option>
                        <option value="Mr Idrissi"></option>
                    </datalist></td>
            </tr>
            
        </table>
            <input type="Submit" value="Save" class="save-btn">
    </div>
    
    </section>

    <!--Aside-->
    <aside>
        <div class="aside">
            <div class="logo">
                <img src="" alt="">
            </div>
            <ul class="nav">
                <li><a href="index.html" class="active"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="Emploi.html"><i class="fa fa-user"></i>Creer Emploi</a></li>
                <li><a href="Task1 .html"><i class="fa fa-list"></i>Affecter Professeur</a></li>
                <li><a href="#portfolio"><i class="fa fa-briefcase"></i>Valider Notes</a></li>
                <li><a href="#contact"><i class="fa fa-comments"></i>Modifier Descriptif</a></li>
            </ul>
        </div>
    </aside>
</body>
</html>