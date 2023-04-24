<?php

namespace App\Controller;

use App\Model\ThemeManager;
use App\Model\QuestionManager;
use App\Model\AnswerManager;

class ThemeController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        // Unset session stuff
        if (isset($_SESSION['themeId'])) {
            unset($_SESSION['themeId']);
        }
        if (isset($_SESSION['questions'])) {
            unset($_SESSION['questions']);
        }
        $themeManager = new ThemeManager();
        $themes = $themeManager->selectAll();

        return $this->twig->render('Theme/index.html.twig', ['themes' => $themes]);
    }
    /**
     * Show informations for a specific item
     */
    public function show(int $id, bool $b50, int $idq50): string
    {
        //echo $id;
        $_SESSION['themeId'] = $id;
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($id);

        if (!isset($_SESSION['questions'])) {
            // on affiche question reponses et bouton jocker 5050 avec random
            $questionManager = new QuestionManager();
            $questions = $questionManager->showQuestions($id, $b50, $idq50);
            $_SESSION['questions'] = shuffle($questions);
        } else {
            // on affiche question reponses et bouton jocker 5050 et pas de random
            $questions = $_SESSION['questions'];
            $questionManager = new QuestionManager();
            $questions = $questionManager->showQuestions($id, $b50, $idq50);
        }
        //var_dump($_SESSION['questions']);
        //die;
      

        $answerManager = new AnswerManager();
        $answers = $answerManager->getAnswers($id, $b50, $idq50);
        
       // $_SESSION['answers'] = $answers;
        //var_dump($_SESSION['answers']);
        //die();

        $twigArgs = [
            'theme' => $theme,
            'questions' => $questions,
            'answers' => $answers,
            'b50' => $b50,

        ];

        return $this->twig->render('Quiz/index.html.twig', $twigArgs);
    }

    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // call manager->add
        }
        return $this->twig->render('Theme/add.html.twig');
    }
}
