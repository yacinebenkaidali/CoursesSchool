<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 14-Jan-19
 * Time: 09:05
 */
if ($_REQUEST)
{
    $conn =mysqli_connect("localhost", "root", "", "projettdw");
    error_reporting(E_ALL && ~E_NOTICE);
    $nom =$_POST["nom"];
    $wilaya=$_POST["wilaya"];
    $commune=$_POST["commune"];
    $adr=$_POST["Adr"];
    $domaine=$_POST["domaine"];
    $tel=$_POST["Tel"];
    $id=$_POST["id"];
    $cat=$_POST["cat"];

    $stmt = $conn->prepare("UPDATE ecoles SET nom_formation=?,domaine= ? ,wilaya = ?,commune = ?,adresse = ?,telephones = ?,id_categorie = ? WHERE id_formation = ?;");
    $stmt->bind_param("sssssssi", $nom, $domaine,$wilaya,$commune,$adr,$tel,$cat,$id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}