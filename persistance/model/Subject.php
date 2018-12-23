<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 18.23.12
 * Time: 14:54
 */

class Subject
{
    private $id;
    private $subject_name;
    private $user_id;

    /**
     * Subject constructor.
     * @param $id
     * @param $subject_name
     * @param $user_id
     */
    public function __construct($id, $subject_name, $user_id)
    {
        $this->id = $id;
        $this->subject_name = $subject_name;
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSubjectName()
    {
        return $this->subject_name;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }




}