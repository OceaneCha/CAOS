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
    public function show(int $id): string
    {
        $_SESSION['themeId'] = $id;
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($id);

        $questionManager = new QuestionManager();
        $questions = $questionManager->showQuestions($id);
        $_SESSION['questions'] = $questions;

        $answerManager = new AnswerManager();
        $answers = $answerManager->getAnswers($id);

        $twigArgs = [
            'theme' => $theme,
            'questions' => $questions,
             'answers' => $answers
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
