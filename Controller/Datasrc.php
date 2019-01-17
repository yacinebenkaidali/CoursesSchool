<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 09-Dec-18
 * Time: 18:24
 */
require('../Model/Formation.php');
require('../Model/User.php');
require('../Model/Comments.php');

class DataSrc
{
    private $connection;
    private $ids = null;

    function __construct($database_name)
    {
        $this->connection = new mysqli('localhost', 'root', '', $database_name) or die('error');
        mysqli_set_charset($this->connection, "utf8");
    }


    function findformation($categorie, $order, $role)
    {

        if ($categorie == 'universitaires,professionnelles') {
            $univ = '6';
            $prof = '5';
            $query = "SELECT ecoles.*,categorie FROM `ecoles` inner join categories ON ecoles.id_categorie=categories.id_categorie WHERE ecoles.id_categorie='$univ' ||ecoles.id_categorie='$prof' ORDER BY {$order} ASC";
        } else $query = "SELECT ecoles.*,categorie FROM `ecoles`  inner join categories ON ecoles.id_categorie=categories.id_categorie WHERE categories.categorie='$categorie'";

        $result = mysqli_query($this->connection, $query);
        $row = null;
        if ($result != null) {
            $row = mysqli_fetch_all($result);
        }
        return $row;
    }

    function findComments($user)
    {
        $query = "SELECT id_comment,id_user,comment FROM `comments` WHERE comments.id_user='$user' ORDER BY comment_date ASC";

        $result = mysqli_query($this->connection, $query);
        $row = null;
        if ($result != null) {
            $row = mysqli_fetch_all($result);
        }
        return $row;
    }

    function findUser($uname, $psw)
    {
        $subscribed='subscribed';
        $stmt=$this->connection->prepare("SELECT username,password,role,state FROM `user` WHERE `username` = ? and `password` = ?;");
        $stmt->bind_param("ss",$uname,$psw);
        $stmt->execute();
        $username='username';
        $id='id_user';
        $role='role';
        $password='password';
        $state='state';
        $stmt->bind_result($username,$password,$role,$state);
        $row =$stmt->fetch();
        $user = null;
        if ($row) {
            $user = new User($id, $username, $password, $role,$state);
            $_SESSION["admin_id"] = $user->getIdUser();
            $_SESSION["username"] = $user->getUsername();
            $_SESSION["role"] = $user->getRole();
            $_SESSION["state"] = $user->getState();

            $location = "../View/CommentsPage.php";
            header("Location: {$location}");
        }else {
            session_unset();
        };
    }


    function getEcole()
    {
        $sql = "select id_formation,state,nom_formation from ecoles ;";
        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            die("database query failed");
        }
        $row = mysqli_fetch_all($result);

        $i = 0;
        $table = null;
        while ($i < sizeof($row)) {
            $table .= "<option value=\"{$row[$i][0]}\">{$row[$i][2]}</option>";
            $this->ids [$i] = $row[$i][0];
            $i++;
        }
        echo $table;
        return $row;
    }

    function getAlluser($page_name)
    {
        $sql = "SELECT * FROM `user`";
        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            die("database query failed");
        }

        $row = mysqli_fetch_all($result);
        return $row;
    }


}
