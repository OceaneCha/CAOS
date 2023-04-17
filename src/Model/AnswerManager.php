<?php

namespace App\Model;

use PDO;
//use App\Model\QuestionManager;

class AnswerManager extends AbstractManager
{
    public const TABLE = 'answer';

    public function getAnswers(int $qid)
    {
        $queryAnswer = "SELECT * FROM " . self::TABLE . " WHERE question_id = :qid ORDER BY RAND()";
        $statement = $this->pdo->prepare($queryAnswer);
        $statement->bindValue(':qid', $qid, PDO::PARAM_INT);
        $statement->execute();
        $answers = $statement->fetchAll(PDO::FETCH_OBJ);
        return $answers;
    }

}
