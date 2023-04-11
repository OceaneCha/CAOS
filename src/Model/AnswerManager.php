<?php

namespace App\Model;

use PDO;
use App\Model\QuestionManager;

class AnswerManager extends AbstractManager
{
    public const TABLE = 'answer';


    public function getAnswers(int $qid)
    {
        $queryAnswer = "SELECT * FROM answer WHERE question_id = $qid";
            $statement = $this->pdo->query($queryAnswer);
            $answers = $statement->fetchAll(PDO::FETCH_OBJ);

        foreach ($answers as $answer) {
                echo"$answer->title . ' ' . $answer->id ";
        }
        return $answers ;
    }
}
