<?php 

namespace App\Controller;

use App\Model\ResultManager;

class ResultController extends ThemeController
{

    public function result()
    {   
       // session_start();
       //recup des reponses en POST
        $questions = $_POST;
        var_dump($_POST);
        $score = 0;
    
        // Récupération des réponses correctes
        $resultManager = new ResultManager();
        $correctAnswers = $resultManager->getCorrectAnswers();

        // Comparaison des réponses données avec les bonnes réponses
        foreach ($correctAnswers as $correctAnswer) {
            $questionId = $correctAnswer['question_id'];
            $answerId = $correctAnswer['answer_id'];
            if (isset($questions[$questionId]) && $questions[$questionId] == $answerId) {
                $score++;
            }
        }
        //trouver comment retirer le $_post submit du calcul du résultat
        //var_dump($questions[0]);

        return $this->twig->render('Quiz/result.html.twig', [
            'score' => $score,
            'questions' => $questions,
            'correctAnswers' => $correctAnswers,
        ]);
    }
}
