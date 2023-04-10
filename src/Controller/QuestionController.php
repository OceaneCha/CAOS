<?php

namespace App\Controller;

use App\Model\QuestionManager;
use App\Model\ThemeManager;

class QuestionController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        $questionManager = new QuestionManager();
        $questions = $questionManager->selectAll();

        return $this->twig->render('Question/index.html.twig', ['questions' => $questions]);
    }

    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
            //TODO: call service->validate
            $question = [];
            $question['theme_id'] = $_POST['theme_id'];
            $question['title'] = $_POST['name'];
            $question['answers'] = [];
            $question['answers'][1] = $_POST['answer1'];
            $question['answers'][2] = $_POST['answer2'];
            $question['answers'][3] = $_POST['answer3'];
            $question['answers'][4] = $_POST['answer4'];
            $question['correctAnswer'] = $_POST['correct'];
            // call manager->add
            $questionManager = new QuestionManager();
            $questionManager->add($question);
        }
        $theme = new ThemeManager();
        $themes = $theme->selectAll();
        return $this->twig->render('Question/add.html.twig', ['themes' => $themes]);
    }
}
