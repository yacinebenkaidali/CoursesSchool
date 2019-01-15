<?php
require("../Controller/Datasrc.php");
require("../Controller/Sessions.php");
$datasrc = new DataSrc('projettdw');
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
    <?php require ("Logo.php"); ?>
    <div>
        <?php require ("./Carousel.php"); ?>
        <div class="row" id="menu-desc">
            <div class="col-md-2 w-15">
                <nav class=" float-left">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">New Vision</a>
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
                            <?php $location="./CommentsPage.php"; if (isset($_SESSION['username'])) echo '<a class="nav-link " href='.$location.' ">Commenter</a>';else echo '<a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Commenter</a>'; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./Comparaison.php">Comparaison</a>
                        </li>
                        <?php
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
                            echo " <li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"./Gestion.php?page_name=GestionUser\">Gerer Les utilisateur</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"./Gestion.php?page_name=GestionSite\">Gerer Les Sites</a>
                            </li>";
                        ?>
                        <li class="nav-item">
                            <a class="nav-link " href="./Catagorie.php?page_name=A propos">A propos</a>
                        </li>
                    </ul>
                </nav>
                <?php require ("login.php");?>
            </div>
            <div class="col-md-9">
                <?php require ("SchoolsInfo.php");?>
            </div>
        </div>
    </div>
    <?php require ("Footer.php");?>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../Controller/script.js"></script>
</body>

</html>