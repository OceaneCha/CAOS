<?php 

namespace App\Controller;

use App\Model\ResultManager;

class ResultController extends ThemeController
{

    public function result()
    {   
       // session_start();
        $reponses = $_POST;
        $score = 0;
        var_dump($_POST);
    
        // Récupération des réponses correctes
        $resultManager = new ResultManager();
        $correctAnswers = $resultManager->getCorrectAnswers();

        // Comparaison des réponses données avec les bonnes réponses
        foreach ($correctAnswers as $correctAnswer) {
            $questionId = $correctAnswer['question_id'];
            $answerId = $correctAnswer['answer_id'];
            if (isset($reponses[$questionId]) && $reponses[$questionId] == $answerId) {
                $score++;
            }
        }         

        return $this->twig->render('Quiz/result.html.twig', [
            'score' => $score,
            'questions' => $reponses,
            'correctAnswers' => $correctAnswers,
        ]);
    }
}
