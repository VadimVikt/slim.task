<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

/**
 * GET /users - Получение списка пользователей
 * GET /users/{id} - Получение пользователя по id
 * POST /users - Добавление пользователя
 * PUT /users/{id}/edit - Редактирование данных пользователя Заменен на post
 * DELETE /users/{id}/del - Удаление пользователя по id Замнен на post
 */

require 'vendor/autoload.php';
include 'src/helpers.php';
include 'src/nav.php';

$app = AppFactory::create();

$app->get('/', function () {
    $title = 'Тестовая задача - Пользователи (Просмотр списка, добавление, измнеение, удаление)';
    include 'src/main.php';

});

$app->get('/users', function () {
    $title = 'Все пользователи';
    $users = getData(getFile());
    if ($users) {
        include_once 'src/allusers.php';
    } else {
        include 'src/error.php';
    }
});

$app->get('/add', function () {
    include_once 'src/add_user.php';
});

$app->get('/users/{id}/edit', function ($request, $response) use ($app) {
    $id = $request->getAttribute('id');
    $taskList = getData(getFile());
    if ($taskList) {
        foreach ($taskList['users'] as $user) {
            if ($id == $user['id']) {
                $oldUser['id'] = $user['id'];
                $oldUser['name'] = $user['name'];
                $oldUser['email'] = $user['email'];
                $oldUser['age'] = $user['age'];
                break;
            }
        }
        include_once 'src/edit_user.php';
    } else {
        include_once 'src/error.php';
    }
});

$app->post('/users/', function ($request, $response, $args) use ($app) {

    $param = $request->getParsedBody(); //Получение данных формы
    $taskList = getData(getFile());
    if ($taskList) {
        //Вычисление следующего ID имитация автоинкремента БД
        $lastUserId = end($taskList['users']);
        $newUserId = ++$lastUserId['id'];
        $param['id'] = $newUserId;
        // Представить новую переменную как элемент массива, в формате 'ключ'=>'имя переменной'
        $taskList['users'][] = [
            'id' => $param['id'],
            'name' => $param['name'],
            'email' => $param['email'],
            'age' => $param['age']
        ];
        $saveFile = setData(getFile(), $taskList);
        unset($taskList);
        include 'src/success.php';
    } else {
        include 'src/error.php';
    }
});

$app->post('/users/{id}', function ($request) {
    $param = $request->getParsedBody();
    $taskList = getData(getFile());
    if ($taskList) {
        foreach ($taskList['users'] as $key => $user) {
            if ($user['id'] == $param['id']) {
                $taskList['users'][$key]['name'] = $param['name'];
                $taskList['users'][$key]['email'] = $param['email'];
                $taskList['users'][$key]['age'] = $param['age'];
                break;
            }
        }
        $updateFile = setData(getFile(), $taskList);
        unset($taskList);
        include_once('src/success.php');
    } else {
        include 'src/error.php';
    }
});

$app->post('/users/{id}/del', function ($request) {
    $param = $request->getParsedBody('id'); //Получение данных формы
    $taskList = getData(getFile());
    if ($taskList) {
        foreach ($taskList['users'] as $key => $user) {
            if ($param['id'] == $user['id']) {
                unset($taskList['users'][$key]);
                break;
            }
        }
        $delete = setData(getFile(), $taskList);
        unset($taskList);
        include_once('src/success.php');
    } else {
        include 'src/error.php';
    }

});

$app->run();

