<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class SignupCest
{
    protected $formId = '#form-signup';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/signup');
    }

    public function signupWithEmptyFields(FunctionalTester $I)
    {
        $I->see('Signup', 'h1');
        $I->see('Preencha os campos seguintes para efetuar o registo:');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Insira o seu Nome');
        $I->seeValidationError('Username obrigatório');
        $I->seeValidationError('Password obrigatória');
        $I->seeValidationError('Por favor introduza novamente a Password');
        $I->seeValidationError('NIF obrigatório');
        $I->seeValidationError('E-mail obrigatório');

    }

    public function signupWithWrongEmail(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
            'SignupForm[username]'  => 'teste_funcional',
            'SignupForm[email]'     => 'ttttt',
            'SignupForm[nome]'  => 'teste_funcional',
            'SignupForm[password]'  => 'teste_funcional_password',
            'SignupForm[password_repeat]'  => 'teste_funcional_password',
            'SignupForm[nif]'  => '123456789',
        ]
        );
        $I->dontSee('Insira o seu Nome', '.help-block');
        $I->dontSee('Username obrigatório', '.help-block');
        $I->dontSee('Password obrigatória', '.help-block');
        $I->dontSee('Por favor introduza novamente a Password', '.help-block');
        $I->dontSee('NIF obrigatório', '.help-block');
        $I->dontSee('E-mail obrigatório', '.help-block');
        $I->see('Email is not a valid email address.', '.help-block');
    }

    public function signupSuccessfully(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'SignupForm[username]'  => 'teste_funcional',
                'SignupForm[email]'     => 'ttttt@tttt.tt',
                'SignupForm[nome]'  => 'teste_funcional',
                'SignupForm[password]'  => 'teste_funcional_password',
                'SignupForm[password_repeat]'  => 'teste_funcional_password',
                'SignupForm[nif]'  => '123456789',
            ]
        );

        $I->seeRecord('common\models\User', [
            'username' => 'teste_funcional',
        ]);

        $I->see('Logout (teste_funcional)', 'form button[type=submit]');
    }
}
