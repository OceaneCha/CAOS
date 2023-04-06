<?php

namespace App\Controller;

use App\Model\ThemeManager;

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
}
