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

    /**************************/
    /* Add a new question     */
    /* + its answers          */
    /**************************/
    public function add(array $form): void
    {
        // New question add query
        $query = "INSERT INTO " . self::TABLE . " (title, theme_id, clue) VALUES (:title, :theme_id, :clue)";
        $stmt = $this->pdo->prepare($query);

        // Bind values
        $stmt->bindValue(':title', $form['title']);
        $stmt->bindValue(':theme_id', $form['theme_id'], \PDO::PARAM_INT);
        $stmt->bindValue(':clue', $form['clue']);

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
