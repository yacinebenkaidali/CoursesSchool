<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 16-Jan-19
 * Time: 21:49
 */
if ($_REQUEST)
{
    $conn =mysqli_connect("localhost", "root", "", "projettdw");
    error_reporting(E_ALL && ~E_NOTICE);
    $usernameadd =$_POST["usernameadd"];
    $role =$_POST["role"];
    $id =$_POST["id"];
    $pwdadd=$_POST["pwdadd"];

    $stmt = $conn->prepare("UPDATE user SET username=?,password= ? ,role = ? WHERE id_user = ?;");
    $stmt->bind_param("sssi", $usernameadd, $pwdadd,$role,$id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}