<?php

namespace App\Model;

use PDO;
//use App\Model\QuestionManager;

class AnswerManager extends AbstractManager
{
    public const TABLE = 'answer';

    public function getAnswers(int $qid)
    {
        $queryAnswer = "SELECT * FROM " . self::TABLE . " WHERE question_id = :qid";
        $statement = $this->pdo->prepare($queryAnswer);
        $statement->bindValue(':qid', $qid, PDO::PARAM_INT);
        $statement->execute();
        $answers = $statement->fetchAll(PDO::FETCH_OBJ);
        return $answers;
    }

<<<<<<< HEAD
}
=======
}
>>>>>>> d84d4ae9164715c9ab18af85cb080a31c9ba8ad0
