<?php

namespace App\Model;

use App\Model\AnswerManager;

class QuestionManager extends AbstractManager
{
    public const TABLE = 'question';

    private int $id = 0;

    /**************************/
    /* fetch the right answer */
    /* TODO: Review this      */
    /**************************/
    
    public function getCorrectAnswer()
    {
        $query = "SELECT id FROM answer WHERE question_id=" . $this->id . " AND isCorrect=1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**************************/
    /* Add a new question     */
    /* + its answers          */
    /**************************/
    public function add(array $form): void
    {
        // New question add query
        $query = "INSERT INTO " . self::TABLE . " (title, theme_id) VALUES (:title, :theme_id)";
        $stmt = $this->pdo->prepare($query);

        // Bind values
        $stmt->bindValue(':title', $form['title']);
        $stmt->bindValue(':theme_id', $form['theme_id'], \PDO::PARAM_INT);

        // Initialize questionID to link with the answers
        $questionID = 0;
        try {
            $stmt->execute();
            $questionID = $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        // Loop through the answers and add them with the newly created question's ID
        foreach ($form['answers'] as $id => $answer) {
            $isCorrect = 0;
            // this compares the array key of the current iteration
            // with the radio value of the form
            // to get the correct answer
            if ($id == $form['correctAnswer']) {
                $isCorrect = 1;
            }
            $answerManager = new AnswerManager();
            $answerManager->add($answer, $questionID, $isCorrect);
        }
    }
}
