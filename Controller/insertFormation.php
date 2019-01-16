<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 14-Jan-19
 * Time: 00:58
 */
if ($_REQUEST) {
    $conn =mysqli_connect("localhost", "root", "", "projettdw")or die("EERRRRRRRRRR");
    error_reporting(E_ALL && ~E_NOTICE);
    $nom =$_POST["nom"];
    $wilaya=$_POST["wilaya"];
    $commune=$_POST["commune"];
    $adr=$_POST["Adr"];
    $domaine=$_POST["domaine"];
    $tel=$_POST["Tel"];
    $cat=$_POST["cat"];

    $sql ="INSERT INTO `ecoles` (`nom_formation`, `id_categorie`, `domaine`, `wilaya`, `commune`, `adresse`, `telephones`) VALUES ( ?, ?, ?,?,?,?,?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss",$nom,$cat,$domaine,$wilaya,$commune,$adr,$tel);
        $stmt->execute();
    }else {
       echo "ERRoR";
    }
}else  echo "nothing in post variable";