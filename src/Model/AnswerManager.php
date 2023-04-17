<?php

namespace App\Model;

use PDO;

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

    /**************************/
    /* Add a new answer       */
    /**************************/
    public function add(string $answer, int $questionID, int $isCorrect = 0): void
    {
        $query = "INSERT INTO " . AnswerManager::TABLE . " (title, question_id, isCorrect)
                VALUES (:title, :question_id, :isCorrect)";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':title', $answer);
        $stmt->bindValue(':question_id', $questionID, \PDO::PARAM_INT);
        // Even though isCorrect functions as a bool, we pass it as an int for the db
        $stmt->bindValue(':isCorrect', $isCorrect, \PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
