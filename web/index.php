<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () use ($app) {
    return $app->sendFile('index.html');
});

$app->post('/', function () {
    // todo check answer an write to session
});

$app->get('/questions/{id}', function ($id) {
    // todo return question by id
});

$app->run();
