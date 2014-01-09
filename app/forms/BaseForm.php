<?php

namespace Forms;


use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Submit,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength,
    Phalcon\Validation\Validator\Identical,
    Phalcon\Validation\Validator\Email;

class BaseForm extends Form
{
    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error('<label for="name" generated="true" class="error">' . $message . '</label>');
            }
        }
    }

    public function csrf() {
        //CSRF
        $csrf = new Hidden('csrf');

        $csrf->addValidators(array(
            new Identical(array(
                'value' => $this->security->getSessionToken(),
                'message' => 'CSRF validation failed'
            ))
        ));

        return $csrf;
    }
}