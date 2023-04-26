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
    public function show(int $id, bool $b50 = false, int $idq = 0, int $aid = null): string
    {
        //echo $id;
        
        $_SESSION['themeId'] = $id;
        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($id);

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
