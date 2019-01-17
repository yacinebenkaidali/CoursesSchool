<?php
require("../Controller/Datasrc.php");
require("../Controller/Sessions.php");
$datasrc = new DataSrc('projettdw');
$session =null;$sub=null;
$session = new Sessions();

$session->CreateSession($datasrc, "uname", "psw");

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
    <?php require ("Logo.php");

    ?>
    <div>
        <?php require ("./Carousel.php"); ?>
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
                        <?php require ("links.php");
                        ?>
                    </ul>
                </nav>

                <?php require ("login.php");?>
            </div>
            <div class="col-md-9">
            <?php if (isset($_SESSION["username"])) {require ('SchoolsInfo.php');}else require ("notSubscribed.php");?>
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