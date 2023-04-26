<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return ['' => ['ThemeController', 'index',],
    'themes' => ['ThemeController', 'show', ['id','b50','idq','aid']],
    'quiz/result' => ['ResultController', 'result',],
    'quiz/jocker' => ['JockerController', 'jocker',],
    'add' => ['HomeController', 'add',],
    'add/theme' => ['ThemeController', 'add',],
    'add/question' => ['QuestionController', 'add',],
    'login' => ['UserController', 'login',],
    'logout' => ['UserController', 'logout',],
];
