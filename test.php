<?php

$quiz = [
    1 => [
        'name' => 'Musique',
        'questions' => [
            1 => [
                'title' => 'Question',
                'answers' => [
                    1 => 'Answer 1',
                    2 => 'Answer 2',
                    3 => 'Answer 3',
                    4 => 'Answer 4',
                ]
            ]
        ]
    ]
];

var_dump($quiz[1]['questions'][1]['answers']);
