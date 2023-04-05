<?php

namespace App\Model;

use App\Model\AnswerManager;

class QuestionManager extends AbstractManager
{
    public const TABLE = 'question';

    private int $id = 0;

    // fetch the right Answer instance
    public function getCorrectAnswer()
    {
        $query = "SELECT id FROM answer WHERE question_id=" . $this->id . " AND isCorrect=1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
}
