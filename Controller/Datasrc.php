<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 09-Dec-18
 * Time: 18:24
 */
require('../Model/Formation.php');
require ('../Model/User.php');
class DataSrc
{
    private $connection;

    function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'projettdw') or die('error');
        mysqli_set_charset($this->connection,"utf8");
    }


    function findformation($categorie,$order)
    {


        if ($categorie=='universitaires,professionnelles') {
            $univ ='universitaires';
            $prof ='professionnelles';
            $query ="SELECT * FROM `formation` WHERE formation.Categorie='$univ' ||formation.Categorie='$prof' ORDER BY {$order} ASC";
        }else $query = "SELECT * FROM `formation` WHERE formation.Categorie='$categorie'";


        $result = mysqli_query($this->connection, $query);
        $row =null;
        if ($result != null) {
            $row =mysqli_fetch_all($result);
        }
           $i=0 ;$table=null;
           while ($i<sizeof($row)) {
               $categorie =new  Formation($row[$i][0],$row[$i][1],$row[$i][2],$row[$i][3],$row[$i][4],$row[$i][5],$row[$i][6],$row[$i][7]);
               $table.= "<tr class=\"item\"   >
                        <td  scope=\"row\">{$categorie->getIdFormation()}</td>
                        <td>{$categorie->getNom()}</td>
                        <td>{$categorie->getCategorie()}</td>
                        <td>{$categorie->getDomaine()}</td>
                        <td>{$categorie->getWilaya()}</td>
                        <td>{$categorie->getCommune()}</td>
                        <td>{$categorie->getWilaya()}</td>
                        <td>{$categorie->getTéléphones()}</td>
                        </tr>";
               $i++;
           }
           echo $table;
        }

    function findUser($uname, $psw)
    {
        $query = "SELECT * FROM `user` WHERE `username` = '$uname' and `password` = '$psw'";
        $result = mysqli_query($this->connection, $query);
        if ($result != null) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "<h1>Requete</h1>";
        }
        $user = null;
        if ($row) {
            $user = new User($row["id_user"], $row["username"], $row["password"]);
            $_SESSION["admin_id"] = $user->getIdUser();
            $_SESSION["username"] = $user->getUsername();
            $location = "../View/Comments.php";
            header("Location: {$location}");
            exit;
        } else {
            echo "<h1>Vous n'etes pas inscrit</h1>";
        }
    }



}
