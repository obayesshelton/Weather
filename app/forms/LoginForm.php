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

class LoginForm extends BaseForm
{
    public function initialize()
    {
        //Email
        $email = new Text('email', array(
            'placeholder'  => 'john.smith@example.com',
            'name'         => 'email',
            'autocomplete' => 'off',
            'onfocus'      => "this.placeholder=''"
        ));

        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'The e-mail is required'
            ))
        ),
            new Email(array(
                'message' => 'The e-mail is invalid'
            ))
        );

        $email->setLabel('Email');

        $this->add($email);

        //Password
        $password = new Password('password', array(
            'name'         => 'password',
            'placeholder'  => 'please enter your password',
            'autocomplete' => 'off',
            'onfocus'      => "this.placeholder=''"
        ));

        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'The password is required'
            ))
        ),
            new StringLength(array(
                'min'            => 12,
                'messageMinimum' => 'Password should be 12 characters'
            ))
        );

        $password->setLabel('Password');

        $this->add($password);

        $this->add(parent::csrf());

        $this->add(new Submit('signin'));
    }
}