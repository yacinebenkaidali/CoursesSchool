<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 15-Jan-19
 * Time: 20:40
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
    <?php require("Logo.php"); ?>
    <div>
        <?php require("./Carousel.php"); ?>
        <div class="row" id="menu-desc">
            <div class="col-md-2 w-15">
                <nav class=" float-left">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item ">
                            <a class="nav-link" href="./index.php">New Vision</a>
                        </li>
                        <?php require("Links.php"); ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-8">
                <div>
                    <h1 class="lead" id="mainHeading"><?php echo $page_name; ?></h1>
                </div>
                <div class="row">
                    <?php
                    if ($page_name == 'GestionUser') {
                        echo "<table class=\"table\">
                        <thead>
                        <tr>
                            <th scope=\"col\">Nom</th>
                            <th scope=\"col\">Role</th>
                            <th scope=\"col\">Etat</th>
                            <th scope=\"col\">bloquer</th>
                            <th scope=\"col\">Authoriser</th>
                            <th scope=\"col\">Supprimer</th>
                            <th scope=\"col\">modifie</th>
                        </tr>
                        </thead>
                        <tbody>";
                        $row = $datasrc->getAlluser($page_name);
                        $i = 0;
                        $userDisplay = null;
                        while ($i < sizeof($row)) {
                            $user = new user($row[$i][0], $row[$i][1], $row[$i][2], $row[$i][3], $row[$i][4]);
                            $userDisplay .= "<tr>
                            <td scope=\"row\">{$row[$i][1]}</td>
                            <td>{$row[$i][3]}</td>
                            <td>{$row[$i][4]}</td>
                            <td><a class=\"btn btn-danger\" href='../Controller/Block.php?id=" . $user->getIdUser() . "&page_name=" . $page_name . "&state=bloquer&from=user'>Bloquer</a></td>
                            <td><a class=\"btn btn-info\" href='../Controller/Block.php?id=" . $user->getIdUser() . "&page_name=" . $page_name . "&state=authoriser&from=user'>Authoriser</a></td>
                            <td><a class=\"btn btn-info\" href='../Controller/DeleteUser.php?id=" . $user->getIdUser() . "&page_name=" . $page_name . "'>Supprimer</a></td>
                            <td><a class=\"btn btn-info\" href='../View/Gestion.php?id=" . $user->getIdUser() . "&page_name=" . $page_name . "&name_user=" . $user->getUsername() ."&pwd_user=" . $user->getPassword(). "'>Modifie</a></td>
                        </tr>";
                            $i++;
                        }
                        echo $userDisplay;
                        echo "</tbody> </table>";
                    } else {
                        echo "<table class=\"table\">
                        <thead>
                        <tr>
                            <th scope=\"col\">Nom</th>
                            <th scope=\"col\">Etat</th>
                            <th scope=\"col\">bloquer</th>
                            <th scope=\"col\">Authoriser</th>
                        </tr>
                        </thead>
                        <tbody>";
                        $row = $datasrc->getEcole();
                        $i = 0;
                        $table = null;
                        while ($i < sizeof($row)) {
                            $table .= "<tr>
                            <td scope=\"row\">{$row[$i][2]}</td>
                            <td scope=\"row\">{$row[$i][1]}</td>
                            <td><a class=\"btn btn-danger\" href='../Controller/Block.php?id=" . $row[$i][0] . "&page_name=" . $page_name . "&state=bloquer&from=site'>Bloquer</a></td>
                            <td><a class=\"btn btn-info\" href='../Controller/Block.php?id=" . $row[$i][0] . "&page_name=" . $page_name . "&state=authoriser&from=site'>Authoriser</a></td>
                        </tr>";
                            $i++;
                        }
                        echo $table;
                        echo "</tbody> </table>";
                    }
                    ?>
                </div>
                <div class="row ">
                    <form>
                        <div class="form-group">
                            <label for="usernameadd">le nom d'utilisateur</label>
                            <input type="text" value="<?php if (isset($_GET['name_user']) )echo $_GET['name_user']; ?>" class="form-control" id="usernameadd">
                            <span style="display: none" id="update_id" ><?php  if (isset($_GET['id'])) echo isset($_GET['id']); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="pwdadd">Password</label>
                            <input type="text" value="<?php if (isset($_GET['pwd_user']) )echo $_GET['pwd_user']; ?>" class="form-control" id="pwdadd">
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="roleadd">Role</label>
                                <select class="custom-select" id="roleadd">
                                    <option disabled>Choisir</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <button type="button"  class="btn btn-primary" id="addUser">Ajouter</button>
                        <button type="button"  class="btn btn-primary" id="updateUser">Modifie</button>
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

