<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = array_map('trim', $_POST);
            // TODO: validations, send $errors to view
            $userManager = new UserManager();
            if (filter_var($credentials['login'], FILTER_VALIDATE_EMAIL)) {
                $user = $userManager->selectOneByEmail($credentials['login']);
            } else {
                $user = $userManager->selectOneByUsername($credentials['login']);
            }

            if ($user && password_verify($credentials['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /');
                exit();
            } else {
                $errors[] = "Password invalid.";
            }
        }

        return $this->twig->render('Theme/index.html.twig', ['errors' => $errors]);
    }

    public function logout()
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
            header('Location: /');
            exit();
        }
    }

    public function register(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = $_POST;
            $userManager = new UserManager();

            if ($userManager->insert($credentials)) {
                return $this->login();
            }
        }
        return $this->twig->render('User/register.html.twig');
    }
}
