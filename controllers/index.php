<?php

use router\Router;
require  '../helpers/printDebugs.php';
require  '../helpers/Autoloader.php';

echo 'priyvet' . '<br>';
$currentUrl = $_SERVER['REQUEST_URI'];
echo $currentUrl;

$router = new Router();

// Добавляем маршруты
$router->addRoute('/start', 'controllers\EnterController', 'exec');
$router->addRoute('/registr', 'controllers\RegistrController', 'userRegistration');
$router->addRoute('/hello', 'controllers\helloController', 'exec');
PR($router);

// Получаем текущий URL
$currentUrl = $_SERVER['REQUEST_URI'];

// Обрабатываем запрос
$router->handleRequest($currentUrl);



/*require  '../helpers/printDebugs.php';
require  '../helpers/Autoloader.php';



use models\EnterModel;



$newUser = new EnterModel( '../dataBase/user.json');
PR($newUser);
$data['login'] = 'pokemon';
$data['password'] = 'qwe123R';
        
        $item = array(
            'login' => $data['login'],
            'password' => $data['password']
        );
		PR($item);
		echo  '<br>';
       $newUser->checkUser($item);
        PR($newUser);
		echo  '<br>';

        $response = $newUser->getResponse();
        if (empty($response['errors'])) {
            $response['success'] = true;
        }
PR($response);
echo '<br>';
        //if (empty($response['errors'])) {
       //     $response['success'] = true;
       // }


       


/*

$dir = __DIR__ . '/dataBase';
        $json_db = new NjsonDb( $dir, $json_encode_opt = JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        $json_db->insert( 'useres.json', 
	[ 
		'name' => 'Thomas', 
		'state' => 'Nigeria', 
		'age' => 22 
	]
);
$json_db->insert( 'useres.json', 
	[ 
		'name' => 'Tom', 
		'state' => 'gtgt', 
		'age' => 11 
	]
);
$json_db->insert( 'useres.json', 
	[ 
		'name' => 'Thomas', 
		'state' => 'Nigeria', 
		'ago' => 22 
	]
);
*/
