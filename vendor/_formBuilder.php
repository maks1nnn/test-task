<?php

namespace vendor;




class FormBuilder
{
  private $fields = [];
  private $links =[];
  private $jsHandlerFile;
  private $formId;
  private $cssFile;
  

  

  public function __construct($jsHandlerFile, $formId, $cssFile)
  {
    $this->jsHandlerFile = $jsHandlerFile;
    $this->formId = $formId;
    $this->cssFile = $cssFile;
  }

  public function addField( $type, $id, $name,$value, $placeholder, $errorId,)
  {
    $this->fields[] = array(      
      'type' => $type,
      'id' => $id,      
      'name' => $name,     
      'placeholder' => $placeholder,     
      'errorId' => $errorId,
      'value' => $value
  
    );
  }

  public function addLink($href, $text)
    {
        $this->links[] = [
            'href' => $href,
            'text' => $text
        ];
    }

  public function buildForm()
    {
        $form = '<form id="' . $this->formId . '">';
        foreach ($this->fields as $field) {
            $form .= '<div>';
            $form .= '<label for="' . $field['id'] . '">' . ucfirst($field['name']) . ':</label>';
            $form .= '<input type="' . $field['type'] . '" id="' . $field['id'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '" placeholder="' . $field['placeholder'] . '" data-error="' . $field['errorId'] . '">';
            $form .= '<div id="' . $field['errorId'] . '" class="error-message"></div>';
            $form .= '</div>';
        }

        if (!empty($this->links)) {
            $form .= '<div>';
            foreach ($this->links as $link) {
                $form .= '<a href="' . $link['href'] . '">' . $link['text'] . '</a>';
            }
            $form .= '</div>';
        }

        $form .= '<input type="submit" value="Submit">';
        $form .= '</form>';
        $form .= '<script src="' . $this->jsHandlerFile . '"></script>';
        $form .= '<link rel="stylesheet" href="' . $this->cssFile . '">';
    
        return $form;
    }
}

 

  