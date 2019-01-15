<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 15-Jan-19
 * Time: 19:54
 */
$page_name = $_GET['page_name'];
require("../Controller/Datasrc.php");
$datasrc = new DataSrc('projettdw');
session_start();
$role = null;
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
    <?php require ("Logo.php"); ?>
    <div>
        <?php require("./Carousel.php"); ?>
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
                    <h1 class="lead" id="mainHeading"><?php echo $page_name; ?></h1>
                </div>
                <div class="row">
                    <ul class="list-group">

                    </ul>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Role</th>
                            <th scope="col">Etat</th>
                            <th scope="col">bloquer</th>
                            <th scope="col">Authoriser</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $datasrc->getAlluser($page_name); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php require ("Footer.php") ; ?>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Controller/w3.js"></script>
    <script src="../Controller/script.js"></script>
</body>

</html>

