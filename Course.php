<?php


class Course
{

    private $_id;
    private $_title;
    private $_plevel;
    private $_field;
    //private $_languages;
    private $_shortDescription;
    private $_fullDescription;
    private $_path;
    private $_duration;
    //private $_chapters;
    //private $_authors;
    //private $_users;
    private $_rating;
    private $_image; //thumbnail

    /**
     * Course constructor.
     * @param $_id
     * @param $_title
     * @param $_level
     * @param $_field
     * @param $_shortDescription
     * @param $_fullDescription
     * @param $_path
     * @param $_duration
     * @param $_rating
     * @param $_image
     */
    public function __construct($_id, $_title, $_plevel, $_field, $_shortDescription, $_fullDescription, $_path, $_duration, $_rating, $_image)
    {
        $this->_id = $_id;
        $this->_title = $_title;
        $this->_plevel = $_plevel;
        $this->_field = $_field;
        $this->_shortDescription = $_shortDescription;
        $this->_fullDescription = $_fullDescription;
        $this->_path = $_path;
        $this->_duration = $_duration;
        $this->_rating = $_rating;
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
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @return mixed
     */
    public function getPlevel()
    {
        return $this->_plevel;
    }

    /**
     * @param mixed $level
     */
    public function setPlevel($plevel)
    {
        $this->_plevel = $plevel;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->_field;
    }

    /**
     * @param mixed $field
     */
    public function setField($field)
    {
        $this->_field = $field;
    }

    /**
     * @return mixed
     */
    public function getShortDescription()
    {
        return $this->_shortDescription;
    }

    /**
     * @param mixed $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->_shortDescription = $shortDescription;
    }

    /**
     * @return mixed
     */
    public function getFullDescription()
    {
        return $this->_fullDescription;
    }

    /**
     * @param mixed $fullDescription
     */
    public function setFullDescription($fullDescription)
    {
        $this->_fullDescription = $fullDescription;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->_path = $path;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->_duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->_duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->_rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->_rating = $rating;
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



}