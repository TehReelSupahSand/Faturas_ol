<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class CriarEmpresaCest
{
    protected $formId = '#form-empresa';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('empresa/create');
    }

    public function createempresaWithEmptyFields(FunctionalTester $I)
    {
        $I->see('Create Empresa', 'h1');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Nome cannot be blank.');
        $I->seeValidationError('Nif cannot be blank.');
        $I->seeValidationError('Morada cannot be blank.');

    }

    public function createempresaSuccessfully(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'Empresa[nome]'  => 'teste funcional',
                'Empresa[nif]'     => '505505505',
                'Empresa[morada]'  => 'Rua Teste Funcional, nº2, Leiria',
            ]
        );

        $I->see('Update', 'btn btn-primary');
    }
}
