<?php
/**
 * Created by PhpStorm.
 * User: LTC2018
 * Date: 4/19/2019
 * Time: 11:22 PM
 */


class User
{
    private $name;
    private $title;
    private $gender;
    private $intrests;

    public function __construct($name, $title, $gender, $intrests)
    {
        $this->name = $name;
        $this->title = $title;
        $this->gender = $gender;
        $this->intrests = $intrests;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setIntrests($intrests)
    {
        $this->intrests = $intrests;
    }

    public function getIntrests()
    {
        return $this->intrests;

    }

}