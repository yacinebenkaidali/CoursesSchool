<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 15-Jan-19
 * Time: 16:19
 */
if ($_REQUEST) {
    $IDS =$_POST['id'];
    $conn = mysqli_connect("localhost", "root", "", "projettdw") or die("EERRRRRRRRRR");
    error_reporting(E_ALL && ~E_NOTICE);
    $sql = "SELECT nom_type_formation,ht,tt,volume_horaire FROM `type_formation` inner join ecoles on ecoles.id_formation=type_formation.id_formation
where ecoles.id_formation={$IDS};";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("database query failed");
    }
    $row = mysqli_fetch_all($result);
    $i = 0;

    $table = null;
    while ($i < sizeof($row)) {
        $table .= "<tr class=\"item\">
                        <td>{$row[$i][0]}</td>
                        <td>{$row[$i][1]}</td>
                        <td>{$row[$i][2]}</td>
                        <td>{$row[$i][3]}</td>";
        $table .= '</tr>';
        $i++;
    }
    echo utf8_encode($table);
}