<?php

namespace App\Model;

use App\Model\AnswerManager;
use PDO;

class QuestionManager extends AbstractManager
{
    public const TABLE = 'question';

    public function showQuestions(int $id)
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE theme_id = :id
        ORDER BY RAND()";//pour shuffle les questions et les réponses
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $questions = $statement->fetchAll(PDO::FETCH_OBJ);

        $answerManager = new AnswerManager();
        foreach ($questions as $question) {
            $question->answers = $answerManager->getAnswers($question->id);
        }

        return $questions;
    }
}
