<?php
$connection = new mysqli('localhost', 'root', '', 'tdw') or die('error');
$sortType = $_REQUEST['sorttype'];
$categorie = $_REQUEST['categorie'];


if ($categorie == 'universitaires,professionnelles') {
    $univ = 'universitaires';
    $prof = 'professionnelles';
    $query = "SELECT * FROM `formation` WHERE formation.Categorie='$univ' ||formation.Categorie='$prof' ORDER BY {$order} ASC";
} else $query = "SELECT * FROM `formation` WHERE formation.Categorie='$categorie' ORDER BY {$order} ASC";

$result = mysqli_query(connection, $query);
$row = null;
if ($result != null) {
    $row = mysqli_fetch_all($result);
}
$i = 0;
$table = null;
while ($i < sizeof($row)) {
    $categorie = new  Formation($row[$i][0], $row[$i][1], $row[$i][2], $row[$i][3], $row[$i][4], $row[$i][5], $row[$i][6], $row[$i][7]);
    $table .= "<tr>
                        <th scope=\"row\">{$categorie->getIdFormation()}</th>
                        <td>{$categorie->getNom()}</td>
                        <td>{$categorie->getCategorie()}</td>
                        <td>{$categorie->getDomaine()}</td>
                        <td>{$categorie->getWilaya()}</td>
                        <td>{$categorie->getCommune()}</td>
                        <td>{$categorie->getWilaya()}</td>
                        <td>{$categorie->getTéléphones()}</td>
                        </tr>";
    $i++;
}
echo json_encode($row);
mysqli_close($connection);
