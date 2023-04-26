<?php

namespace App\Model;

use App\Model\AnswerManager;
use PDO;

class QuestionManager extends AbstractManager
{
    public const TABLE = 'question';
    //showQuestions recupere id du theme
    
    public function setQuestions(int $id, bool $b50, int $idq50, ?int $choosenAnswerId = null): void
    {
        if (empty($_SESSION['questions'])) {
            $query = "SELECT * FROM " . self::TABLE . " WHERE theme_id = :id
            ORDER BY RAND() LIMIT 10";
            $statement = $this->pdo->prepare($query);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $_SESSION['questions'] = $statement->fetchAll(PDO::FETCH_OBJ);
        }

        $answerManager = new AnswerManager();
        foreach ($_SESSION['questions'] as $key => $question) {
            $_SESSION['question-' . $question->id . '-answers'] =
            $answerManager->getAnswers($question->id, $b50, $idq50);

            foreach ($_SESSION['question-' . $question->id . '-answers'] as $answer) {
                if ($answer->id == $choosenAnswerId) {
                    $answer->aChoosen = true;
                    if (!isset($_SESSION['question-' . $question->id])) {
                        $_SESSION['question-' . $question->id] = $choosenAnswerId;
                        $_SESSION['page']++;
                    }
                }
            }

            $_SESSION['questions'][$key]->answers = $_SESSION['question-' . $question->id . '-answers'];
        }
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
