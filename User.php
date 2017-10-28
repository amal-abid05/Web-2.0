<?php


class User
{
    private $_id;
    private $_username;
    private $_firstname;
    private $_lastname;
    private $_email;
    private $_password;
    private $_address;
    private $_image; //avatar

    private $_courses = array();

    /**
     * User constructor.
     * @param $_id
     * @param $_username
     * @param $_firstname
     * @param $_lastname
     * @param $_email
     * @param $_password
     * @param $_address
     * @param $_image
     * @param array $_courses
     */
    public function __construct($_id, $_username, $_firstname, $_lastname, $_email, $_password, $_address, $_image)
    {
        $this->_id = $_id;
        $this->_username = $_username;
        $this->_firstname = $_firstname;
        $this->_lastname = $_lastname;
        $this->_email = $_email;
        $this->_password = $_password;
        $this->_address = $_address;
        $this->_image = $_image;
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
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->_firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->_lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->_lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->_address = $address;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->_image = $image;
    }

    /**
     * @return array
     */
    public function getCourses()
    {
        return $this->_courses;
    }

    /**
     * @param array $courses
     */
    public function setCourses($courses)
    {
        $this->_courses = $courses;
    }



}