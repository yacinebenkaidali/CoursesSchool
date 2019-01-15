<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 13-Jan-19
 * Time: 20:22
 */

class Comments
{
    private $id_comment;
    private $id_user;
    private $comment;
    private  $comment_date;

    /**
     * Comments constructor.
     * @param $id_comment
     * @param $id_user
     * @param $comment
     */
    public function __construct($id_comment,$id_user, $comment)
    {
        $this->id_comment=$id_comment;
        $this->id_user = $id_user;
        $this->comment = $comment;
    }

    public function __toString()
    {
       return $this->getComment();
    }


    /**
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->id_comment;
    }

    /**
     * @param mixed $id_comment
     */
    public function setIdComment($id_comment)
    {
        $this->id_comment = $id_comment;
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->comment_date;
    }

    /**
     * @param mixed $comment_date
     */
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }


}