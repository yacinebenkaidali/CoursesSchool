<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 15-Jan-19
 * Time: 17:58
 */
if (isset($_REQUEST)) {
    $id = $_GET['id'];
    $state = $_GET['state'];
    $conn = mysqli_connect("localhost", "root", "", 'projettdw');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $stmt =$conn->prepare("UPDATE `user` SET `state` = ? WHERE `user`.`id_user` = ?;");
    $stmt->bind_param('si',$state,$id);
    $stmt->execute();
    header('Location: ../View/Gestion.php?page_name='.$_GET['page_name']);
    $stmt->close();
    $conn->close();
}