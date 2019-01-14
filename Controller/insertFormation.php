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
    echo $nom; echo $wilaya;echo $commune;echo $adr;echo $domaine;echo $tel ;echo $cat ;

    $sql ="INSERT INTO `Formation` (`nom_formation`, `Categorie`, `domaine`, `wilaya`, `commune`, `adresse`, `telephones`) VALUES ( ?, ?, ?,?,?,?,?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss",$nom,$cat,$domaine,$wilaya,$commune,$adr,$tel);
        $stmt->execute();
    }else {
       echo "ERRoR";
    }
//    mysqli_query($conn,"INSERT INTO Formation (nom_formation,Categorie,domaine,wilaya,commune,adresse,téléphones)  VALUES ({$nom},{$cat},{$domaine},{$wilaya},{$commune},{$adr},{$tel})");
//    mysqli_close($conn);
}else  echo "nothing in post variable";