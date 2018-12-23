<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 18.24.11
 * Time: 14:48
 */
require_once(__DIR__ . '/../model/Subject.php');
require_once('Connection.php');


class SubjectDao extends Connection
{
    private $table = "subjects";

    public function createSubject($user_id, $subject_name)
    {
        $sql = "INSERT INTO $this->table (subject_name, user_id) VALUES ('$subject_name', '$user_id')";
        parent::query($sql);
    }

    public function getAll()
    {
        $subjects = array();
        $result = parent::query('SELECT * FROM ' . $this->table);
        while ($record = $result->fetch_object()) {
            array_push(
                $subjects,
                new Subject(
                    $record->id,
                    $record->subject_name,
                    $record->user_id
                )
            );
        }
        return $subjects;
    }

    public function getSubjectById($subject_id)
    {
        $sql = "SELECT * FROM $this->table WHERE id=$subject_id";
        $result = parent::query($sql);
        if ($result->num_rows === 0) {
            return null;
        }
        if ($record = $result->fetch_object())
            return new Subject(
        $record->id,
        $record->subject_name,
        $record->user_id
    );
    }

}