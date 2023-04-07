<?php 

namespace App\Controller;

use App\Model\QuestionManager;



class QuizController extends AbstractController
{

    public function index(): string
    {
        $questionManager = new QuestionManager();
        $questions = $questionManager->showQuestions(1);
        //var_dump($questions);

        return $this->twig->render('Quiz/index.html.twig', ['questions' => $questions]);
    }
    

}

