<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 11-Jan-19
 * Time: 10:39
 */
if (isset($_GET) && !empty($_GET['page_name'])) $page_name = $_GET['page_name']; else header("Location:./index.php");
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
    <?php require("Logo.php"); ?>
    <div>
        <?php require("Carousel.php"); ?>
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
                        >Wilaya
                        </th>
                        <th scope="col" id="commune">Commune</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Telephone</th>
                        <?php if (session_status() != PHP_SESSION_NONE) {
                            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                                echo "<th scope=\"col\">Suppression</th>";
                                $role = 'admin';
                            } else echo "";
                        } ?>
                        <?php if (session_status() != PHP_SESSION_NONE) {
                            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                                echo "<th scope=\"col\">Moodification</th>";
                                $role = 'admin';
                            } else echo "";
                        } ?>
                    </tr>
                    </thead>
                    <tbody id="tableBody">
                    <?php
                    $i = 0;
                    $table = null;
                    $row = $datasrc->findformation($page_name, "nom_formation", $role);
                    while ($i < sizeof($row)) {
                        $formation = new  Formation($row[$i][0], $row[$i][1], $row[$i][2], $row[$i][3], $row[$i][4], $row[$i][5], $row[$i][6], $row[$i][9]);
                        $table .= "<tr class=\"item\">";
                                if (strcmp($row[$i][8] ,'bloquer')) $table .= "<td>{$formation->getNom()}</td>"; else $table .= "<td><a  href=\"../../ProjetWEB/View/index.php\">{$formation->getNom()}</a></td>";
                        $table .= "
                        <td>{$formation->getCategorie()}</td>
                        <td>{$formation->getDomaine()}</td>
                        <td>{$formation->getWilaya()}</td>
                        <td>{$formation->getCommune()}</td>
                        <td>{$formation->getAdresse()}</td>
                        <td>{$formation->getTéléphones()}</td>";
                            if ($role == 'admin') $table .= "<td><a class='btn btn-danger' href='../Controller/Delete.php?id=" . $formation->getIdFormation() . "&page_name=" . $page_name . "'>Supprimer</a></td>";
                            if ($role == 'admin') $table .= "<td><a class='btn btn-info' href='../View/Catagorie.php?id=" . $formation->getIdFormation() . "&page_name=" . $page_name . "&nom_up=" . $formation->getNom() . "&wilaya_up=" . $formation->getWilaya() . "&comm_up=" . $formation->getCommune() . "&dom=" . $formation->getDomaine() . "&adr=" . $formation->getAdresse() . "&tel=" . $formation->getTéléphones() . "'>Modifie</a></td>";
                            $table .= '</tr>';
                            $i++;
                        }
                    echo $table;
                    ?>
                    </tbody>
                </table>
                <input class="form-control" id="filterInput" placeholder="Recherche">
                <hr>
                <div class="col-md-2">


                </div>
                <form>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="addNom">Nom de l'école</label>
                            <input type="text" class="form-control " id="addNom" required
                                   value="<?php if (!empty($_GET['nom_up'])) echo $_GET['nom_up']; ?>">
                            <span style="display: none;" id="span_update"><?php echo $_GET['id'] ?></span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="addWilaya">Wilaya</label>
                            <input type="text" class="form-control" id="addWilaya" required
                                   value="<?php if (!empty($_GET['wilaya_up'])) echo $_GET['wilaya_up']; ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="addCommune">Commune</label>
                            <input type="text" class="form-control" id="addCommune" required
                                   value="<?php if (!empty($_GET['comm_up'])) echo $_GET['comm_up']; ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="addDomaine">Domaine</label>
                            <input type="text" class="form-control" id="addDomaine" required
                                   value="<?php if (!empty($_GET['dom'])) echo $_GET['dom']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="addAdr">Address</label>
                            <input type="text" class="form-control" id="addAdr" required
                                   value="<?php if (!empty($_GET['adr'])) echo $_GET['adr']; ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="addTel">Telephone</label>
                            <input type="text" class="form-control" id="addTel" required
                                   value="<?php if (!empty($_GET['tel'])) echo $_GET['tel']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Categorie</label>
                            </div>
                            <select class="custom-select" id="categories">
                                <option disabled>Choisir</option>
                                <option value="6">universitaire</option>
                                <option value="5">professionnelles</option>
                                <option value="4">secondaires</option>
                                <option value="3">moyennes</option>
                                <option value="2">primaires</option>
                                <option value="1">maternelles</option>
                            </select>
                        </div>
                    </div>
                    <?php if (session_status() != PHP_SESSION_NONE) {
                        if (isset($_SESSION) && $_SESSION['role'] == 'admin') {
                            echo "<button class=\"btn btn-primary\" type=\"button\" id=\"addFormation\">Ajouter</button> <button class=\"btn btn-primary\" type=\"button\" id=\"UpdateFormation\">Modifie</button>";
                        }
                    } ?>
                </form>
            </div>

        </div>

    </div>
    <?php require("Footer.php"); ?>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../Controller/w3.js"></script>
<script src="../Controller/script.js"></script>
</body>

</html>
