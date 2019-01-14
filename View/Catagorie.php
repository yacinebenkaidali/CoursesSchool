<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 11-Jan-19
 * Time: 10:39
 */
$page_name = $_GET['page_name'];
require("../Controller/Datasrc.php");
$datasrc = new DataSrc('projettdw');
session_start();
$role =null;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDW</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Card-Group1-Shadow.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<div id="bordered-container">
    <div style="width:80%;height:10vh;margin-left:auto;margin-right:auto;text-align:center;"><img class="d-inline-block"
                                                                                                  src="../assets/img/logo.png"
                                                                                                  alt="logo"
                                                                                                  style="text-align:center;height:61px;">
    </div>
    <div>
        <div class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000" id="carousel-1"
             style="margin-left:auto;margin-right:auto;width:80%;height:100%;">
            <div class="carousel-inner" role="listbox" style="height:20%;">
                <div class="carousel-item"><img width="500px" height="350px" class="w-100 d-block"
                                                src="../assets/img/image1.jpg"
                                                alt="Slide Image"></div>
                <div class="carousel-item"><img width="500px" height="350px" class="w-100 d-block"
                                                src="../assets/img/image2.png"
                                                alt="Slide Image"></div>
                <div class="carousel-item active"><img width="500px" height="350px" class="w-100 d-block"
                                                       src="../assets/img/image3.png"
                                                       alt="Slide Image"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span
                            class="carousel-control-prev-icon"></span><span
                            class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1"
                                                                  role="button"
                                                                  data-slide="next"><span
                            class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
            </ol>
        </div>
        <div class="row" id="menu-desc">
            <div class="col-md-2 w-15">
                <nav class=" float-left">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item ">
                            <a class="nav-link" href="./index.php">New Vision</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Catagorie.php?page_name=Maternelles">Maternelle</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Catagorie.php?page_name=Primaires">Primaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./Catagorie.php?page_name=Moyennes">Moyen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./Catagorie.php?page_name=Secondaires">Secondaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./Catagorie.php?page_name=universitaires,professionnelles">formation
                                professionnelle et
                                universitaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./Catagorie.php?page_name=A propos">A propos</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-8">
                <div>
                    <h1 class="lead" id="mainHeading"><?php
                        if ($page_name == 'universitaires,professionnelles') echo 'Formations professionnelles et universitaires'; else echo $page_name; ?></h1>
                </div>
                <table class="table table-striped table-dark" id="myTabel">
                    <thead>
                    <tr>
                        <th scope="col" id="nom">Nom</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Domaine</th>
                        <th scope="col" id="wilaya"
                        ">Wilaya</th>
                        <th scope="col" id="commune">Commune</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Telephone</th>
                        <?php if (session_status() != PHP_SESSION_NONE) { if(isset($_SESSION['role']) && $_SESSION['role']=='admin') {echo "<th scope=\"col\">Suppression</th>" ; $role='admin';}else echo "";}?>
                        <?php if (session_status() != PHP_SESSION_NONE) { if(isset($_SESSION['role']) && $_SESSION['role']=='admin') {echo "<th scope=\"col\">Moodification</th>" ; $role='admin';}else echo "";}?>
                    </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php $datasrc->findformation($page_name, "nom_formation",$role) ?>
                    </tbody>
                </table>
                <input class="form-control" id="filterInput" placeholder="Recherche" >
                <hr>
                <div class="col-md-2">


                </div>
                <form>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="addNom">Nom de l'école</label>
                            <input type="text" class="form-control " id="addNom"   required value="<?php if (!empty($_GET['nom_up'])) echo $_GET['nom_up'];?>">
                            <span style="display: none;" id="span_update"><?php echo $_GET['id']?></span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="addWilaya">Wilaya</label>
                            <input type="text" class="form-control" id="addWilaya"  required value="<?php if (!empty($_GET['wilaya_up'])) echo $_GET['wilaya_up'];?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="addCommune">Commune</label>
                            <input type="text" class="form-control" id="addCommune"   required value="<?php if (!empty($_GET['comm_up'])) echo $_GET['comm_up'];?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="addDomaine">Domaine</label>
                            <input type="text" class="form-control" id="addDomaine"   required value="<?php if (!empty($_GET['dom'])) echo $_GET['dom'];?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="addAdr">Address</label>
                            <input type="text" class="form-control" id="addAdr"   required value="<?php if (!empty($_GET['adr'])) echo $_GET['adr'];?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="addTel">Telephone</label>
                            <input type="text" class="form-control" id="addTel"   required value="<?php if (!empty($_GET['tel'])) echo $_GET['tel'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Categorie</label>
                            </div>
                            <select class="custom-select" id="categories">
                                <option disabled>Choisir</option>
                                <option value="universitaire">universitaire</option>
                                <option value="professionnelles">professionnelles</option>
                                <option value="secondaires">secondaires</option>
                                <option value="moyennes">moyennes</option>
                                <option value="primaires">primaires</option>
                                <option value="maternelles">maternelles</option>
                            </select>
                        </div>
                    </div>
                    <?php if (session_status() != PHP_SESSION_NONE){ if(isset($_SESSION) && $_SESSION['role']=='admin') {echo "<button class=\"btn btn-primary\" type=\"button\" id=\"addFormation\">Ajouter</button> <button class=\"btn btn-primary\" type=\"button\" id=\"UpdateFormation\">Modifie</button>"; } }?>
                </form>
            </div>

        </div>

    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">New Vision</a></li>
                            <li><a href="./Catagorie.php?page_name=Maternelle">Maternelle</a></li>
                            <li><a href="./Catagorie.php?page_name=Primaire">Primaire</a></li>
                            <li><a href="./Catagorie.php?page_name=Moyen">Moyen</a></li>
                            <li><a href="./Catagorie.php?page_name=Secondaire">Secondaire</a></li>
                            <li><a href="./Catagorie.php?page_name=formation professionnelle et universitaire">formation
                                    professionnelle et universitaire</a></li>
                            <li><a href="./Catagorie.php?page_name=A propos">A propos</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Centre Foramtion</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut
                            vehicula
                            rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar
                            dictum
                            vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i
                                    class="icon ion-social-twitter"></i></a><a href="#"><i
                                    class="icon ion-social-snapchat"></i></a><a
                                href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Yacine BENKAIDALI © 2019</p>
            </div>
        </footer>
    </div>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../Controller/w3.js"></script>
<script src="../Controller/script.js"></script>
</body>

</html>
