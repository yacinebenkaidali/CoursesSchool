<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 13-Jan-19
 * Time: 23:23
 */
if ($_SESSION['role']='admin') {
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", 'projettdw');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$stmt =$conn->prepare("DELETE FROM formation WHERE id_formation = ?");
$stmt->bind_param('i',$id);
$stmt->execute();
header('Location: ../View/Catagorie.php?page_name='.$_GET['page_name']);
$stmt->close();
$conn->close();
}