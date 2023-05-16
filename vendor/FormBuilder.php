<?php

namespace vendor;




class FormBuilder
{
  private $fields = array();
  private $path;

  public function __construct($path)
  {
    $this->path = $path;
  }

  public function addField($name, $type, $label, $value = '', $link = '', $placeholder = '', $required = false, $pattern = '')
  {
    $this->fields[] = array(
      'name' => $name,
      'type' => $type,
      'label' => $label,
      'value' => $value,
      'link' => $link,
      'placeholder' => $placeholder,
      'required' => $required,
      'pattern' => $pattern
    );
  }

  public function buildForm()
  {
    $form = '<form method="post" action="' . $this->path . '">';

    foreach ($this->fields as $field) {
      $form .= '<div>';
      $form .= '<label for="' . $field['name'] . '">' . $field['label'] . '</label>';

      if ($field['type'] == 'text') {
        $form .= '<input type="text" id="' . $field['name'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '"';
        if (!empty($field['placeholder'])) {
          $form .= ' placeholder="' . $field['placeholder'] . '"';
        }
        if ($field['required']) {
          $form .= ' required';
        }
        if (!empty($field['pattern'])) {
          $form .= ' pattern="' . $field['pattern'] . '"';
        }
        $form .= '>';
      } else if ($field['type'] == 'email') {
        $form .= '<input type="email" id="' . $field['name'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '"';
        if (!empty($field['placeholder'])) {
          $form .= ' placeholder="' . $field['placeholder'] . '"';
        }
        if ($field['required']) {
          $form .= ' required';
        }
        if (!empty($field['pattern'])) {
          $form .= ' pattern="' . $field['pattern'] . '"';
        }
        $form .= '>';
      } else if ($field['type'] == 'link') {
        $form .= '<a href="' . $field['link'] . '">' . $field['value'] . '</a>';
      }else if ($field['type'] == 'password') {
        $form .= '<input type="password" id="' . $field['name'] . '" name="' . $field['name'] . '" value=""';
        if (!empty($field['placeholder'])) {
          $form .= ' placeholder="' . $field['placeholder'] . '"';
        }
        if ($field['required']) {
          $form .= ' required';
        }
        if (!empty($field['pattern'])) {
          $form .= ' pattern="' . $field['pattern'] . '"';
        }
        $form .= '>';
        
      }

      $form .= '</div>';
    }

    $form .= '<input type="submit" value="Submit">';
    $form .= '</form>';

    return $form;
  }
}



$path = 'http://testmanao.loc/controllers/registrController.php';
$formBuilder = new FormBuilder($path);

$formBuilder->addField('login', 'text', 'Login:', '', '', 'Enter your login', true, '[A-Za-z]{6,20}');
$formBuilder->addField('name', 'text', 'Name:', '', '', 'Enter your name', true, '[A-Za-z]{2,23}');
$formBuilder->addField('email', 'email', 'Email:', '', '', 'Enter your email', true, '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}');
$formBuilder->addField('password', 'password', 'Password:', '', '', 'Enter your password', true);
$formBuilder->addField('repeatPassword', 'password', 'Repeat password:', '', '', 'Repeat your password', true);
$form = $formBuilder->buildForm();
echo $form;


//  <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Пожалуйста, введите действительный адрес электронной почты" />


