<?php

namespace vendor;




class FormBuilder
{
  private $fields = array();
  private $jsHandlerFile;
  private $formId;
  private $cssFile;
  private $errors = [];

  public function __construct( $jsHandlerFile, $formId, $cssFile)
  {
    $this->jsHandlerFile = $jsHandlerFile;
    $this->formId = $formId;
    $this->cssFile = $cssFile;
    
  }

  public function addField($name, $type, $label, $value = '', $link = '', $placeholder = '', $required = false, $pattern = '', $password='', $email='' )
  {
    $this->fields[] = array(
      'name' => $name,
      'type' => $type,
      'label' => $label,
      'value' => $value,
      'link' => $link,
      'placeholder' => $placeholder,
      'required' => $required,
      'pattern' => $pattern,
      'password' =>$password,
      'email' =>$email
    );
  }

  public function buildForm()
  {
    $form = '<form id="' . $this->formId . '">';

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
        $form .= ' data-error="error-' . $field['name'] . '"';
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
        $form .= ' data-error="error-' . $field['email'] . '"';
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
        $form .= ' data-error="error-' . $field['password'] . '"';
        $form .= '>';
        
      }
      if (isset($this->errors[$field['name']])) {
        $form .= '<div class="error" id="error-' . $field['name'] . '">';
        foreach ($this->errors[$field['name']] as $error) {
          $form .= '<span>' . $error . '</span>';
        }
        $form .= '</div>';
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




