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
                        <?php require ("links.php");
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-8">
                <div><h1 class="lead">la page des commentaires </h1></div>
                <h1> <?php echo $_SESSION["username"];?></h1><span style="display: none" id="user_id_comment"> <?php if (!empty($_SESSION["admin_id"])) echo $_SESSION["admin_id"];?></span>
                <div class="row">
                    <?php
                    $i = 0;$card=null;
                    $row =$datasrc->findComments($_SESSION["admin_id"]);
                    while ($i < sizeof($row)) {
                        $comment = new  Comments($row[$i][0], $row[$i][1], $row[$i][2]);
                        $card .= "<div class=\"card\" style=\"width: 18rem;\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$comment->getIdComment()}</h5>
                            <p class=\"card-text\">{$comment->getComment()}</p>
                        </div>
                    </div>";
                        $i++;
                    }
                    echo $card;
                    ?>
                </div>
                <hr>
                <div class="row m-3" >
                    <form method="post" class="w-75">
                        <label for="commentinput" >Entrer votre commentraire</label>
                        <input type="text" class="form-control" id="commentinput">
                        <select class="custom-select " id="Type_Ecole_comment">
                            <option disabled>Choisir</option>
                            <?php $datasrc2=new DataSrc('tdw');
                            $datasrc->getEcole(); ?>
                        </select>
                        <?php $_SESSION['state']; if (strcmp($_SESSION['state'],'bloquer')!=0) echo "<button type=\"button\" class=\"btn btn-outline-success\" id=\"sumbit_comments\">Enregistrer</button>"; else echo "<h3>Vous etes bloquer</h3>" ?>
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
