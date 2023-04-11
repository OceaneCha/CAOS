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
        $themeManager = new ThemeManager();
        $themes = $themeManager->selectAll();

        return $this->twig->render('Theme/index.html.twig', ['themes' => $themes]);
    }

       /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($id);
        $questionManager = new QuestionManager();
        $questions = $questionManager->showQuestions($id);
       // $answersManager = new AnswerManager();
       // $answers = $answersManager->getAnswers();

        $twigArgs = ['theme' => $theme, 'questions' => $questions];
        return $this->twig->render('Quiz/index.html.twig', $twigArgs);
    }
}
