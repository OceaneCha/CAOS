<?php

namespace App\Model;

class AnswerManager extends AbstractManager
{
    public const TABLE = 'answer';

    public function add(string $answer, int $questionID, int $isCorrect = 0): void
    {
        $query = "INSERT INTO " . AnswerManager::TABLE . " (title, question_id, isCorrect)
                VALUES (:title, :question_id, :isCorrect)";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':title', $answer);
        $stmt->bindValue(':question_id', $questionID, \PDO::PARAM_INT);
        $stmt->bindValue(':isCorrect', $isCorrect, \PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
