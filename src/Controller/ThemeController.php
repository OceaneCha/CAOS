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
<<<<<<< HEAD

        $questionManager = new QuestionManager();
        $questions = $questionManager->showQuestions($id);

        $answersManager = new AnswerManager();
        $answers = $answersManager->getAnswers($id);

        $twigArgs = ['theme' => $theme, 'questions' => $questions, 'answers' => $answers];
=======
        
        $questionManager = new QuestionManager();
        $questions = $questionManager->showQuestions($id);
        
        $answerManager = new AnswerManager();
        $answers = $answerManager->getAnswers($id);
        
        $twigArgs = [
            'theme' => $theme,
            'questions' => $questions,
             'answers' => $answers
        ];
>>>>>>> d84d4ae9164715c9ab18af85cb080a31c9ba8ad0
        
        return $this->twig->render('Quiz/index.html.twig', $twigArgs);
    }
}
