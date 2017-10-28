<?php


class Comment
{
    private $_id;
    private $_commentText;
    private $_postTime;

    //ManyToOne //jointure JoinColumn(name="user_id")// la cle entrangere
    private $_user;

    //ManyToOne //jointure JoinColumn(name="course_id")// la cle entrangere
    private $_course;

    /**
     * Comment constructor.
     * @param $_id
     * @param $_commentText
     * @param $_postTime
     * @param $_user
     * @param $_course
     */
    public function __construct($_id, $_commentText, $_postTime, $_user, $_course)
    {
        $this->_id = $_id;
        $this->_commentText = $_commentText;
        $this->_postTime = $_postTime;
        $this->_user = $_user;
        $this->_course = $_course;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getCommentText()
    {
        return $this->_commentText;
    }

    /**
     * @param mixed $commentText
     */
    public function setCommentText($commentText)
    {
        $this->_commentText = $commentText;
    }

    /**
     * @return mixed
     */
    public function getPostTime()
    {
        return $this->_postTime;
    }

    /**
     * @param mixed $postTime
     */
    public function setPostTime($postTime)
    {
        $this->_postTime = $postTime;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->_user = $user;
    }

    /**
     * @return mixed
     */
    public function getCourse()
    {
        return $this->_course;
    }

    /**
     * @param mixed $course
     */
    public function setCourse($course)
    {
        $this->_course = $course;
    }



}


?>