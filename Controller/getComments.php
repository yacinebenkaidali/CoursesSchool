<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 15-Jan-19
 * Time: 20:57
 */
require ("../Model/Comments.php");
if ($_REQUEST) {
    $IDS =$_POST['id'];

    $conn = mysqli_connect("localhost", "root", "", "projettdw") or die("EERRRRRRRRRR");
    error_reporting(E_ALL && ~E_NOTICE);
    $query = "SELECT id_comment,id_user,comment FROM `comments` WHERE comments.id_formation={$IDS} ORDER BY comment_date ASC";
    $result = mysqli_query($conn, $query);
    $row = null;
    if ($result != null) {
        $row = mysqli_fetch_all($result);
    }
    $i = 0;
    $card = null;
    while ($i < sizeof($row)) {
        $comment = new  Comments(utf8_encode($row[$i][0]), utf8_encode($row[$i][1]), utf8_encode($row[$i][2]));
        $card .= "<div class=\"card\" style=\"width: 12rem;\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$comment->getIdComment()}</h5>
                            <p class=\"card-text\">{$comment->getComment()}</p>
                        </div>
                    </div>";
        $i++;
    }
    echo $card;
}