<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 14-Jan-19
 * Time: 09:34
 */

require("../Controller/Datasrc.php");
require("../Controller/Sessions.php");
$datasrc = new DataSrc('tdw');
$session = new Sessions();
$session->CreateSession($datasrc, "uname", "psw");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-w
                idth, initial-scale=1.0">
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
                        <li class="nav-item ">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Log in</a>
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
                            <a class="nav-link " href="./Catagorie.php?page_name=
Secondaires">Secondaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./Catagorie.php?page_name=universitaires,professionnelles">formation
                                professionnelle et
                                universitaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#" data-toggle="modal" data-target="#myModal">Commenter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./Catagorie.php?page_name=A propos">A propos</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="Type_Ecole">Choisir le type d'école</label>
                            </div>
                            <select class="custom-select" id="Type_Ecole">
                                <option disabled>Choisir</option>
                                <option value="universitaire">universitaire</option>
                                <option value="professionnelles">professionnelles</option>
                                <option value="secondaires">secondaires</option>
                                <option value="moyennes">moyennes</option>
                                <option value="primaires">primaires</option>
                                <option value="maternelles">maternelles</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="Ecole1">Choisir le 1er Ecole</label>
                            </div>
                            <select class="custom-select" id="Ecole1" name="Ecole1">
                                <option disabled>--Selectionner une Ecole--</option>
                                <?php $ids = $datasrc->getEcole();  ?>
                            </select>
                            <span style="display: none" > <?php echo $ids[0]; ?></span>
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="Ecole2">Choisir le 2eme Ecole</label>
                            </div>
                            <select class="custom-select" id="Ecole2" name="Ecole2">
                                <option  disabled>--Selectionner une Ecole--</option>
                                <?php $datasrc->getEcole(); ?>
                            </select>
                            <span style="display: none" > <?php echo $ids[1]; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <table width="400px" border="1 " id="tab" class="table table-striped table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Formation</th>
                                    <th scope="col">Volume Horaire</th>
                                    <th scope="col">HT</th>
                                    <th scope="col" id="ttc">TTC</th>
                                </tr>
                                </thead>
                                <tbody id="tBody">
                                    <?php if (isset($_GET['id2'])) { $datasrc->getTypeFormation($_GET['id2']);} ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table width="400px" border="1 " id="tab" class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Formation</th>
                                        <th scope="col">Volume Horaire</th>
                                        <th scope="col">HT</th>
                                        <th scope="col" id="ttc">TTC</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    <?php if (isset($_GET['id1'])) {$datasrc->getTypeFormation($_GET['id1']);}?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo "<a class=\"btn btn-success\" href='./Comparaison.php?id1=" . $ids[0]. "&id2=" . $ids[1] . "'>Comparer</a> "?>
                    </div>
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
                                <li><a href=""></a></li>
                                <li><a href="./Catagorie.php?page_name=Maternelle">Maternelle</a></li>
                                <li><a href="./Catagorie.php?page_name=Primaire">primaire</a></li>
                                <li><a href="./Catagorie.php?page_name=Moyen">Moyen</a></li>
                                <li><a href="./Catagorie.php?page_name=Secondaire">secondaire</a></li>
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
                        <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a
                                    href="#"><i
                                        class="icon ion-social-twitter"></i></a><a href="#"><i
                                        class="icon ion-social-snapchat"></i></a><a
                                    href="#"><i class="icon ion-social-instagram"></i></a></div>
                    </div>
                    <p class="copyright">Yacine BENKAIDALI &copy; 2019</p>
                </div>
            </footer>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Controller/script.js"></script>
</body>

</html>