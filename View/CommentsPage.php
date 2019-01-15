<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 11-Jan-19
 * Time: 10:39
 */
require("../Controller/Datasrc.php");
$datasrc = new DataSrc('projettdw');
session_start();
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
        <?php  require ("./Carousel.php");?>
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
                <div><h1 class="lead">la page des commentaires </h1></div>
                <h1> <?php echo $_SESSION["username"];?></h1><span style="display: none" id="user_id_comment"> <?php if (!empty($_SESSION["admin_id"])) echo $_SESSION["admin_id"];?></span>
                <div class="row">
                    <?php $datasrc->findComments($_SESSION["admin_id"])?>
                </div>
                <hr>
                <div class="row m-3" >
                    <form method="post" class="w-75">
                        <label for="commentinput" >Entrer votre commentraire</label>
                        <input type="text" class="form-control" id="commentinput">
                        <?php  if ($_SESSION['state']!='blocked') echo "<button type=\"button\" class=\"btn btn-outline-success\" id=\"sumbit_comments\">Enregistrer</button>"; else echo "<h3>Vous etes bloquer</h3>" ?>

                    </form>
                </div>
            </div>
        </div>
        <?php require ("Footer.php");?>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Controller/w3.js"></script>
    <script src="../Controller/script.js"></script>
</body>

</html>
