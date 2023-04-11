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

    public function add(array $form): void
    {
        $query = "INSERT INTO " . self::TABLE . " (title, theme_id) VALUES (:title, :theme_id)";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':title', $form['title']);
        $stmt->bindValue(':theme_id', $form['theme_id'], \PDO::PARAM_INT);

        $questionID = 0;
        try {
            $stmt->execute();
            $questionID = $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        foreach ($form['answers'] as $id => $answer) {
            $isCorrect = 0;
            if ($id == $form['correctAnswer']) {
                $isCorrect = 1;
            }
            $answerManager = new AnswerManager();
            $answerManager->add($answer, $questionID, $isCorrect);
        }
    }
}
