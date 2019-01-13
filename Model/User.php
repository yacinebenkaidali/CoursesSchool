<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 13-Jan-19
 * Time: 18:34
 */

class user
{
    private $id_user ;
    private $username;
    private $password;

    /**
     * user constructor.
     * @param $username
     * @param $password
     */
    public function __construct($id_user, $username, $password)
    {
        $this->id_user =$id_user;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}