<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () use ($app) {
    return $app->sendFile('index.html');
});

$app->post('/answer', function () use ($app) {
    $answers = require_once '../data/answers.php';

//    todo maybe we really need twig here
//    return $app->sendFile('results.html');
});

$app->get('/questions/{id}', function ($id) use ($app) {
    $questions = require_once '../data/questions.php';
    $answers = require_once '../data/answers.php';

    return $app->json([
        "question" => $questions[$id],
        "answers"  => $answers[$id],
    ]);
});

$app->run();
