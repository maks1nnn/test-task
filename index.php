<?php


require __DIR__ . '/vendor/JsonDb.php';
require __DIR__ . '/helpers/printDebugs.php';
use vendor\JsonDb;

$db = new JsonDb(__DIR__ . '\dataBase\user.json');
//PR($db);
// создание нового элемента
$data = array(
    "users" => array(
        array(
            "name" => "John",
            "age" => 30,
            "city" => "New York"
        )));
$db->insert($data);
$item1 = array('name' => 'tim', 'age' => 1);
$db->insert($item1);
$item2 = array('name' => 'dan', 'age' => 11);
$db->insert($item2);

$last = $db->getAll();
PR($last);
//PR($db);
// чтение данных элемента
$data = $db->getId(0);

echo $data['users'][0]['name'] . ' is ' . $data['users'][0]['age'] . ' years old';

// обновление данных элемента
$item = array('name' => 'Jane', 'age' => 28);
$db->update(0, $item);

// удаление элемента
$db->delete(0);

$data = array(
    "users" => array(
        array(
            "name" => "John",
            "age" => 30,
            "city" => "New York"
        )));