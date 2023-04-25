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
        session_destroy();
        session_start();
        // Unset session stuff
        /*
        if (isset($_SESSION['themeId'])) {
            unset($_SESSION['themeId']);
        }
        if (isset($_SESSION['questions'])) {
            unset($_SESSION['questions']);
        }
        */
        $themeManager = new ThemeManager();
        $themes = $themeManager->selectAll();

        return $this->twig->render('Theme/index.html.twig', ['themes' => $themes]);
    }
    /**
     * Show informations for a specific item
     */
    public function show(int $id, bool $b50 = false, int $idq = 0, int $aid = null): string
    {
        //echo $id;
        
        $_SESSION['themeId'] = $id;
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($id);
var_dump($b50);

        if ($b50 == true) {
            $_SESSION['useJocker50'] = true;
        }
        $questionManager = new QuestionManager();
        $questionManager->setQuestions($id, $b50, $idq, $aid);
        
        
        $twigArgs = [
            'theme' => $theme,
            // 'questions' => $questions,
            'b50' => $b50,

        ];
        $this->twig->addGlobal('session', $_SESSION);
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
