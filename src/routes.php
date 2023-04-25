<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return ['items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    '' => ['ThemeController', 'index',],
    'themes' => ['ThemeController', 'show', ['id','b50','idq50']],
    'quiz/result' => ['ResultController', 'result',],
    'quiz/jocker' => ['JockerController', 'jocker',],
    'add' => ['HomeController', 'add',],
    'add/theme' => ['ThemeController', 'add',],
    'add/question' => ['QuestionController', 'add',],
];
