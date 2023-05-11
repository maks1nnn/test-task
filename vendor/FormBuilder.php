<?php
namespace vendor;




class FormBuilder {
    private $fields = array();
    private $path;

    public function __construct($path) {
        $this->path = $path;
    }

    

   /* public function addField($type, $name, $label, $required=false) {
        $this->fields[] = array(
            'type' => $type,
            'name' => $name,
            'label' => $label,
            'required' => $required
        );
    }*/
    public function addField($name, $type, $label, $value = '', $link = '',$required=false) {
        $this->fields[] = array(
          'name' => $name,
          'type' => $type,
          'label' => $label,
          'value' => $value,
          'link' => $link,
          'required' => $required 
        );
      }

      public function buildForm() {
        $form = '<form method="post" action="' . $this->path .'">';
    
        foreach ($this->fields as $field) {
          $form .= '<div>';
          $form .= '<label for="' . $field['name'] . '">' . $field['label'] . '</label>';
    
          if ($field['type'] == 'text') {
            $form .= '<input type="text" id="' . $field['name'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '">';
          } else if ($field['type'] == 'email') {
            $form .= '<input type="email" id="' . $field['name'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '">';
          } else if ($field['type'] == 'link') {
            $form .= '<a href="' . $field['link'] . '">' . $field['value'] . '</a>';
          }
    
          $form .= '</div>';
        }
    
        $form .= '<input type="submit" value="Submit">';
        $form .= '</form>';
    
        return $form;
      }
}


$path = '';
$formBuilder = new FormBuilder($path);

$formBuilder->addField('name', 'text', 'Name:');
$formBuilder->addField('email', 'email', 'Email:');
$formBuilder->addField('link', 'link', 'Website', 'My Website', 'https://example.com');
$form = $formBuilder->buildForm();
echo $form;
