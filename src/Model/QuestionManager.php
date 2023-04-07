<?php

namespace App\Model;

use App\Model\AnswerManager;
use PDO;

class QuestionManager extends AbstractManager
{
    public const TABLE = 'question';

    private int $id = 0;

    public function showQuestions(int $id)
    {
        $query = "SELECT q.id as qid ,q.title ,t.id as tid FROM question q RIGHT JOIN theme t ON t.id = q.theme_id WHERE q.theme_id =$id";
        $statement = $this->pdo->query($query);
       // $statement ->execute();
        
       
        $questions= $statement->fetchAll(PDO::FETCH_OBJ);
        //var_dump($questions);

        foreach($questions as $question) {
            echo "<div>$question->title.' '.$question->qid </div>";
           
            $queryAnswer = "SELECT * FROM answer WHERE question_id = $question->qid";
            $statement = $this->pdo->query($queryAnswer);
            // $statement ->execute();
             
            
             $answers= $statement->fetchAll(PDO::FETCH_OBJ);
             foreach($answers as $answer){
                echo "<div>$answer->title.' '.$answer->id </div>";
             }

             echo"<hr>";

        }
     // return $questions;
        
    }

    // fetch the right Answer instance
    public function getCorrectAnswer()
    {
        $query = "SELECT id FROM answer WHERE question_id=" . $this->id . " AND isCorrect=1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

   


}
