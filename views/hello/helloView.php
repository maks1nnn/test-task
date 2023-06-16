<?php

namespace views\hello;

class HelloView
{
    private $username;
    private $jsHandlerFile;

    public function __construct($username, $jsHandlerFile)
    {
        $this->username = $username;
        $this->jsHandlerFile = $jsHandlerFile;
    }

    public function generateHTML()
    {
        $html = "<html>
        <head>
            <title>Greetings</title>
        </head>
        <body>
            <p>Hello $this->username</p>
            <button onclick=\"logout()\">Выйти</button>
            <script src=\"$this->jsHandlerFile\"></script>
        </body>
        </html>";

        return $html;
    }
        
    
    
}


