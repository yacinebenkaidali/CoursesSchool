<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 16-Jan-19
 * Time: 21:50
 */
if ($_REQUEST) {
    $conn =mysqli_connect("localhost", "root", "", "projettdw")or die("EERRRRRRRRRR");
    error_reporting(E_ALL && ~E_NOTICE);
    $nom =$_POST["usernameadd"];
    $password=$_POST["pwdadd"];
    $role=$_POST["role"];
    $sql ="INSERT INTO `user` ( `username`, `password`, `role`, `state`) VALUES (?,?,?,'bloquer')";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss",$nom,$password,$role);
        $stmt->execute();
        header('Location: ../View/Gestion.php?page_name=GestionUser');
        $stmt->close();
        $conn->close();
    }else {
        echo "ERRoR";
    }
};