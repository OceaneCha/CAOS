<?php

namespace App\Model;

use App\Model\AnswerManager;
use PDO;

class QuestionManager extends AbstractManager
{
    public const TABLE = 'question';
    //showQuestions recupere id du theme
    public function showQuestions(int $id, bool $b50, int $idq50)
    {
        // En mode zéro joker, on récupère l'ensemble des réponses et on trie au hasard
        if (!$b50) {
            $query = "SELECT * FROM " . self::TABLE . " WHERE theme_id = :id";
            //ORDER BY RAND()";//pour shuffle les questions et les réponses
            $statement = $this->pdo->prepare($query);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $questions = $statement->fetchAll(PDO::FETCH_OBJ);
            shuffle($questions);
        } else {
            // En mode joker, on récupère les réponses dans la vartiable de session et on récupère les réponses filtrées avec joker
            $questions = $_SESSION['questions'];
        }

        $answerManager = new AnswerManager();
        foreach ($questions as $question) {
            $question->answers = $answerManager->getAnswers($question->id, $b50, $idq50);
        }
        //var_dump($questions);
        return $questions;
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
