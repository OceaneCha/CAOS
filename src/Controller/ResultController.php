<?php

namespace App\Controller;

use App\Model\QuestionManager;
use App\Model\ResultManager;
use App\Model\ThemeManager;

class ResultController extends ThemeController
{

    public function result()
    {
        $reponses = $_POST;
        $score = 0;

        // Récupération des réponses correctes
        $resultManager = new ResultManager();
        $correctAnswers = $resultManager->getCorrectAnswers();

        // Récupération des questions, réponses et du thème
        //à faire => rendre le tout dynamique
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById(1);
        $questionManager = new QuestionManager();
        $questions = $questionManager->showQuestions(1);

        // Comparaison des réponses données avec les bonnes réponses
        foreach ($correctAnswers as $correctAnswer) {
            $questionId = $correctAnswer['question_id'];
            $answerId = $correctAnswer['answer_id'];
            if (isset($reponses[$questionId]) && $reponses[$questionId] == $answerId) 
            {
                $score++;
            }
        }

        return $this->twig->render('Quiz/result.html.twig', [
            'score' => $score,
            'questions' => $questions,
            'reponses' => $reponses,
            'correctAnswers' => $correctAnswers,
            'theme' => $theme,
        ]);
    }
}
