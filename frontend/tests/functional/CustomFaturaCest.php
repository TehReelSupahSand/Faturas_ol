<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class CustomFaturaCest
{
    protected $formId = '#form-customfatura';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('customfatura/create');
    }

    public function createfaturaWithEmptyFields(FunctionalTester $I)
    {
        $I->see('Create Customfatura', 'h1');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Número cannot be blank.');
        $I->seeValidationError('Data cannot be blank.');
        $I->seeValidationError('NIF da Empresa cannot be blank.');
        $I->seeValidationError('Nome da Empresa cannot be blank.');
        $I->seeValidationError('Morada da Empresa cannot be blank.');

    }

    public function createfaturaWithWrongDate(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
            'Customfatura[numero]'  => '21',
            'Customfatura[data]'     => '5/10/2013',
            'Customfatura[nif_empresa]'  => '505212474',
            'Customfatura[nome_empresa]'  => 'Empresa Teste Funcional',
            'Customfatura[morada_empresa]'  => 'Rua do Teste Funcional nº2 Porto',
        ]
        );
        $I->dontSee('Número cannot be blank.', '.help-block');
        $I->dontSee('NIF da Empresa cannot be blank.', '.help-block');
        $I->dontSee('Nome da Empresa cannot be blank.', '.help-block');
        $I->dontSee('Morada da Empresa cannot be blank.', '.help-block');
        $I->see('The format of Data is invalid.', '.help-block');
    }

    public function createfaturaSuccessfully(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'Customfatura[numero]'  => '21',
                'Customfatura[data]'     => '13/10/5',
                'Customfatura[nif_empresa]'  => '505212474',
                'Customfatura[nome_empresa]'  => 'Empresa Teste Funcional',
                'Customfatura[morada_empresa]'  => 'Rua do Teste Funcional nº2 Porto',
            ]
        );

        $I->see('Fatura Customizada | 21', 'h1');
    }
}
