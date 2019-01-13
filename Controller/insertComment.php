<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 13-Jan-19
 * Time: 20:41
 */

    $conn =mysqli_connect("localhost", "root", "", "projettdw");
    error_reporting(E_ALL && ~E_NOTICE);
    $user_id =$_POST["user_id"];
    $user_comment=$_POST["user_comment"];

    $stmt = $conn->prepare("INSERT INTO comments (`id_user`,`comment`,`comment_date`) VALUES (?,?,CURDATE())");
    $stmt->bind_param("is", $user_id, $user_comment);
    $stmt->execute();
    $conn->close();