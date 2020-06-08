<?php
//для отладки приложения
function dd($object) {
    echo '<pre>';
    var_dump($object);
    echo '</pre>';
}

function getData($jsonFile) {
    $file = file_get_contents($jsonFile);
    return json_decode($file,TRUE);
}

function setData($jsonFile, $data) {
    file_put_contents($jsonFile,json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    return true;
}

/**
 * @return string
 * Для подключения файла с данными, можно пустой но обязательная конструкия
 * { "users" : [] }
 */
function getFile() {
    return 'users.json';
}
