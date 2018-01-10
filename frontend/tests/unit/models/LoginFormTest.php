<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/01/2018
 * Time: 17:46
 */

namespace frontend\tests\unit\models;


use common\fixtures\UserFixture;
use common\models\LoginForm;
use Yii;

class LoginFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    /**
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }

    public function testLoginNoUser()
    {
        $model = new LoginForm([
            'username' => '',
            'password' => '',
        ]);

        expect('Erro no login', $model->login())->false();
        expect('user deve ser um guest', Yii::$app->user->isGuest)->true();
    }

    public function testLoginWrongPassword()
    {
        $model = new LoginForm([
            'username' => 'soutester',
            'password' => 'Errado',
        ]);

        expect('login error', $model->login())->false();
        expect('password incorreto', $model->errors)->hasKey('password');
        expect('user deve ser guest', Yii::$app->user->isGuest)->true();
    }

    public function testLoginCorrect()
    {
        $model = new LoginForm([
            'username' => 'soutester',
            'password' => 'testar',
        ]);

        expect('Login funciona', $model->login())->true();
        expect('user deve estar autenticado e não ser guest', Yii::$app->user->isGuest)->false();
    }
}