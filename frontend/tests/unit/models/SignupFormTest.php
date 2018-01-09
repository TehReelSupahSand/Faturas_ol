<?php
namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\SignupForm;

class SignupFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    public function testCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'testes_unitarios',
            'email' => '123456@testeunitario.com',
            'password' => '123456',
            'confirmar_password' => '123456',
            'nome' => 'Sou um teste unitario',
            'nif' => '124578639',


        ]);

        $user = $model->signup();

        expect($user)->isInstanceOf('frontend\models\Cliente');

        expect($user->username)->equals('testes_unitarios');
        expect($user->email)->equals('123456@testeunitario.com');
        expect($user->validatePassword('123456'))->true();
    }

    public function testNotCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'teste2',
            'email' => '123456@mail.com',
            'password' => '1236',
            'confirmar_password' => '1236',
            'nome' => 'Sou um teste',
            'nif' => '12457863',


        ]);

        expect_not($model->signup());
        expect_that($model->getErrors('username'));
        expect_that($model->getErrors('email'));
        expect_that($model->getErrors('password'));
        expect_that($model->getErrors('confirmar_password'));

        expect($model->getFirstError('username'))
            ->equals('Este Username já está em utilização');
        expect($model->getFirstError('email'))
            ->equals('Este E-mail já foi utilizado');
        expect($model->getFirstError('password'))
        ->equals('Password should contain at least 6 characters.');
        expect($model->getFirstError('confirmar_password'))
            ->equals('Password Repeat should contain at least 6 characters.');
        /*expect($model->getFirstError('confirmar_password'))
        ->equals('Password inserida diferente');*/
        expect($model->getFirstError('nif'))
        ->equals('Nif should contain at least 9 characters.');
    }
}
