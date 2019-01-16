<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 16-Jan-19
 * Time: 21:19
 */
if ($_SESSION['role']='admin') {
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", 'projettdw');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $stmt =$conn->prepare("DELETE FROM user WHERE id_user = ?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    header('Location: ../View/Gestion.php?page_name='.$_GET['page_name']);
    $stmt->close();
    $conn->close();
}