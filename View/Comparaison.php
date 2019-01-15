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
   <?php require ("Logo.php");?>
    <div>
        <?php require ("./Carousel.php" );?>
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
                                <tbody id="tBody1">
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
                                <tbody id="tBody2">
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-success" id="comparer">Comparer</button>
                    </div>
                </div>
            </div>
        </div>
        <?php require ("Footer.php"); ?>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Controller/script.js"></script>
</body>

</html>