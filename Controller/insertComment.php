<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 13-Jan-19
 * Time: 20:41
 */

if ($_REQUEST)
{
    $conn =mysqli_connect("localhost", "root", "", "projettdw");
    error_reporting(E_ALL && ~E_NOTICE);
    $user_id =$_POST["user_id"];
    $user_comment=$_POST["user_comment"];
    $id_ecole=$_POST["id_ecole"];

    $stmt = $conn->prepare("INSERT INTO comments (`id_user`,`comment`,`comment_date`,`id_formation`) VALUES (?,?,CURDATE(),?)");
    $stmt->bind_param("iss", $user_id, $user_comment,$id_ecole);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}