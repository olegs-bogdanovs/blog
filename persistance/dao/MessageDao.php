<?php
require_once(__DIR__ . '/../model/Message.php');
require_once('Connection.php');



class MessageDao extends Connection
{
    private $table = "messages";

    public function createMessage($user_id, $subject_id, $message)
    {
        $sql = "INSERT INTO $this->table (subject_id, user_id, message) VALUES ($subject_id, $user_id, \"$message\")";
        parent::query($sql);
    }

    public function getMessagesBySubjectId($subject_id)
    {
        $subjects = array();
        $result = parent::query('SELECT * FROM ' . $this->table . ' WHERE subject_id=' . $subject_id);
        while ($record = $result->fetch_object()) {
            array_push(
                $subjects,
                new Message(
                    $record->id,
                    $record->user_id,
                    $record->subject_id,
                    $record->message
                )
            );
        }
        return $subjects;
    }

}