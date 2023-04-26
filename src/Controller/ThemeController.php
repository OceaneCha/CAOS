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

        //TODO: save $_SESSION['id'] into $user_id
        // destroy / restart session
        // initialize $_SESSION['id'] with $user_id

        $userID = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : null;
        session_destroy();
        session_start();
        if ($userID) {
            $_SESSION['user_id'] = $userID;
        }

        $themeManager = new ThemeManager();
        $themes = $themeManager->selectAll();

        return $this->twig->render('Theme/index.html.twig', ['themes' => $themes]);
    }
    /**
     * Show informations for a specific item
     */
    public function show(int $id, bool $b50 = false, int $idq50 = 0): string
    {
        //echo $id;
        $_SESSION['themeId'] = $id;
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($id);

        // Si la variable de session des questions / réponses n'est pas initialisée :
        if (!isset($_SESSION['questions'])) {
            // on affiche question reponses et bouton jocker 5050 avec random
            $questionManager = new QuestionManager();
            $questions = $questionManager->showQuestions($id, $b50, $idq50);
            $_SESSION['questions'] = $questions;
        } else {
            // on affiche question reponses et pas de bouton jocker 5050 et pas de random
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
