<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () use ($app) {
    return $app->sendFile('index.html');
});

$app->post('/answer', function () {
    // todo check answer an write to session
});

$questions = [
    "Запилить сайтик на WordPress'e, который будет уметь печь пирожки.",
    "Интернет магазинчик с возможностью принждения к покупке посетителей.",
];

$answers = [
    [
        "За полчасика где-то",
        "День-два, не больше",
        "Около двух месяцев, в зависимости от начинки пирожков",
    ],
    [
        "За часа три",
        "День-два, не больше",
        "Около года, также необходимо нанять титушек",
    ],
];

$app->get('/questions/{id}', function ($id) use ($app, $questions, $answers) {
    return $app->json([
        "question" => $questions[$id],
        "answers"  => $answers[$id],
    ]);
});

$app->run();
