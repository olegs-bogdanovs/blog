<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 18.23.12
 * Time: 15:56
 */

class Message
{
    private $id;
    private $user_id;
    private $subject_id;
    private $message;

    /**
     * Message constructor.
     * @param $id
     * @param $user_id
     * @param $subject_id
     * @param $message
     */
    public function __construct($id, $user_id, $subject_id, $message)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->subject_id = $subject_id;
        $this->message = $message;
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getSubjectId()
    {
        return $this->subject_id;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }




}