<?php
class Sessions
{
    public function __construct()
    {
        session_start();
    }

    public function CreateSession($datasrc,$uname, $psw)
    {
        if (isset($_POST[$uname]) && (isset($_POST[$psw]))) {
            $datasrc->findUser($_POST["uname"], $_POST["psw"]);
            return true ;
        }
        return false;
    }
    public function CheckSession () {
        if ($_SESSION["username"]==null) {
            $location = "../View/index.php";
            header("Location: {$location}");
            exit;
        }else echo "Bonjour Monsieur " . $_SESSION["username"];
    }
}