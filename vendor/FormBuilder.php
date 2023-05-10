<?php
namespace vendor;




class FormBuilder {
    private $fields = array();
    private $path;

    public function __construct($path) {
        $this->path = $path;
    }

    

    public function addField($type, $name, $label, $required=false) {
        $this->fields[] = array(
            'type' => $type,
            'name' => $name,
            'label' => $label,
            'required' => $required
        );
    }

    public function buildForm() {
        $form = '<form action = ' . $this->path .'form method="Post">';
        foreach ($this->fields as $field) {
            $label = '<label for="' . $field['name'] . '">' . $field['label'] . ($field['required'] ? ' *' : '') . '</label>';
            switch ($field['type']) {
                case 'text':
                    $input = '<input type="text" id="' . $field['name'] . '" name="' . $field['name'] . '" />';
                    break;
                case 'email':
                    $input = '<input type="email" id="' . $field['name'] . '" name="' . $field['name'] . '" />';
                    break;
                case 'password':
                    $input = '<input type="password" id="' . $field['name'] . '" name="' . $field['name'] . '" />';
                    break;
                case 'textarea':
                    $input = '<textarea id="' . $field['name'] . '" name="' . $field['name'] . '"></textarea>';
                    break;
                case 'submit':
                    $input = '<input type="submit" name="' . $field['name'] . '" value="' . $field['label'] . '" />';
                    break;
                default:
                    $input = '';
                    break;
            }
            $form .= $label . $input . '<br />';
        }
        $form .= '</form>';
        return $form;
    }
}


$path = 
$formBuilder = new FormBuilder($path);
$formBuilder->addField('text', 'name', 'Имя', true);
$formBuilder->addField('email', 'email', 'Email', true);
$formBuilder->addField('password', 'password', 'Пароль', true);
$formBuilder->addField('textarea', 'message', 'Сообщение', false);
$formBuilder->addField('submit', 'submit', 'Отправить');
$formHtml = $formBuilder->buildForm();
echo $formHtml;