<?php

namespace App\Controller;

use App\Model\QuestionManager;
use App\Model\ResultManager;
use App\Model\ThemeManager;
use Exception;

class ResultController extends ThemeController
{
    public function result()
    {

        $score = 0;

        // Récupération des réponses correctes
        $resultManager = new ResultManager();
        $correctAnswers = $resultManager->getCorrectAnswers();

        // Récupération des questions, réponses et du thème
        //à faire => rendre le tout dynamique
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($_SESSION['themeId']);
        $questions = $_SESSION['questions'];

        // Comparaison des réponses données avec les bonnes réponses
        foreach ($correctAnswers as $correctAnswer) {
            $questionId = $correctAnswer['question_id'];
            $answerId = $correctAnswer['answer_id'];
            if (isset($_SESSION['question-' . $questionId]) && $_SESSION['question-' . $questionId] == $answerId) {
                $score++;
            } else {
                //throw new Exception('non non non , faut répondre');
                //header("Location : Quiz/index.html.twig");
            }
        }
        $this->twig->addGlobal('session', $_SESSION);
        return $this->twig->render('Quiz/result.html.twig', [
            'score' => $score,
            'questions' => $questions,
            'correctAnswers' => $correctAnswers,
            'theme' => $theme,
        ]);
    }
}
