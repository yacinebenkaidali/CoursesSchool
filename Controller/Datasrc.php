<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 09-Dec-18
 * Time: 18:24
 */
require('../Model/Formation.php');
require ('../Model/User.php');
require ('../Model/Comments.php');
class DataSrc
{
    private $connection;
     private $ids =null;

    function __construct($database_name)
    {
        $this->connection = new mysqli('localhost', 'root', '', $database_name) or die('error');
        mysqli_set_charset($this->connection,"utf8");
    }


    function findformation($categorie,$order,$role)
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
               $formation =new  Formation($row[$i][0],$row[$i][1],$row[$i][2],$row[$i][3],$row[$i][4],$row[$i][5],$row[$i][6],$row[$i][7]);
               $table.= "<tr class=\"item\"   >
                        <td>{$formation->getNom()}</td>
                        <td>{$formation->getCategorie()}</td>
                        <td>{$formation->getDomaine()}</td>
                        <td>{$formation->getWilaya()}</td>
                        <td>{$formation->getCommune()}</td>
                        <td>{$formation->getAdresse()}</td>
                        <td>{$formation->getTéléphones()}</td>";
                   if ($role=='admin') $table .="<td><a class='btn btn-danger' href='../Controller/Delete.php?id=" . $formation->getIdFormation() . "&page_name=" . $categorie . "'>Supprimer</a></td>";
                   if ($role=='admin') $table .="<td><a class='btn btn-info' href='../View/Catagorie.php?id=" . $formation->getIdFormation() . "&page_name=" . $categorie . "&nom_up=" . $formation->getNom() ."&wilaya_up=" . $formation->getWilaya()   . "&comm_up=" . $formation->getCommune()   ."&dom=" . $formation->getDomaine()   ."&adr=" . $formation->getAdresse()   ."&tel=" . $formation->getTéléphones()   ."'>Modifie</a></td>";
               $table.='</tr>';
               $i++;
           }
           echo $table;
        }
    function findComments($user)
    {
        $query = "SELECT id_comment,id_user,comment FROM `comments` WHERE comments.id_user='$user' ORDER BY comment_date ASC";

        $result = mysqli_query($this->connection, $query);
        $row =null;
        if ($result != null) {
            $row =mysqli_fetch_all($result);
        }
        //var_dump($row);
        $i=0 ;$card=null;
        while ($i<sizeof($row)) {
            $comment =new  Comments($row[$i][0],$row[$i][1],$row[$i][2]);
            $card.= "<div class=\"card\" style=\"width: 18rem;\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$comment->getIdComment()}</h5>
                            <p class=\"card-text\">{$comment->getComment()}</p>
                        </div>
                    </div>";
            $i++;
        }
        echo $card;
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
            $user = new User($row["id_user"], $row["username"], $row["password"],$row["role"]);
            $_SESSION["admin_id"] = $user->getIdUser();
            $_SESSION["username"] = $user->getUsername();
            $_SESSION["role"]=$user->getRole();
//            if ($user->getRole()=='admin') $location ="../View/index.php" ;else
             $location = "../View/CommentsPage.php";
            header("Location: {$location}");
            exit;
        }
    }
    function getEcole() {

        $sql = "select id_info,formation_name   from centreformation ;";

        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            die("database query failed");
        }
        $row =mysqli_fetch_all($result);

        $i =0 ;$table= null;
        while ($i<sizeof($row)) {
            $table .="<option value=\"{$row[$i][0]}\">{$row[$i][1]}</option>";
            $this->ids [$i]=$row[$i][0];
            $i++;
        }
        echo $table;
        var_dump($result);
        return $this->ids;

    }
    function getTypeFormation($IDS) {
        $sql = "SELECT nom_type_formation,ht,tt,volume_horaire FROM `type_formation` INNER join centreformation on centreformation.id_info = type_formation.id_info WHERE centreformation.id_info = ".$IDS.";";

        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            die("database query failed");
        }
        $row =mysqli_fetch_all($result);$i=0;$table =null;
        while ($i<sizeof($row)) {
            //$formation =new  Formation($row[$i][0],$row[$i][1],$row[$i][2],$row[$i][3],$row[$i][4],$row[$i][5],$row[$i][6],$row[$i][7]);
            $table.= "<tr class=\"item\">
                        <td>{$row[$i][0]}</td>
                        <td>{$row[$i][1]}</td>
                        <td>{$row[$i][2]}</td>
                        <td>{$row[$i][3]}</td>";
            $table.='</tr>';
            $i++;
        }
        echo $table;
    }



}
