<?php

namespace App\Model;

use PDO;

class ResultManager extends AbstractManager
{
    public const TABLE = 'result';

    public function getCorrectAnswers()
    {
        $result = "SELECT q.id AS question_id, a.id AS answer_id 
                   FROM answer a 
                   JOIN question q ON a.question_id = q.id 
                   WHERE a.isCorrect = 1";
        $statement = $this->pdo->prepare($result);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
