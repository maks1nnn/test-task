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
        $html = "<html>";
        $html .= "<head>";
        $html .= "<title>Greetings</title>";
        $html .= "</head>";
        $html .= "<body>";
        $html .= "<p>Hello " . $this->username . "</p>";
        $html .= "<button onclick=\"logout()\">Выйти</button>";
        $html .= '<script src="' . $this->jsHandlerFile . '"></script>';
        $html .= "</body>";
        $html .= "</html>";

        return $html;
    }
        
    
    
}


