<?php

return [
    'hello' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],
    '' => [
        'controller' => 'account',
        'action' => 'login'
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'ajax/validate' => [
        'controller' => 'ajax',
        'action' => 'handle',
    ],
    'ajax/logout' => [
        'controller' => 'ajax',
        'action' => 'logout',
    ],

];