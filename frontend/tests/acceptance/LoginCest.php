<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class LoginCest
{
    public function checkLogin(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('site/login'));

        $I->fillField('username', 'soutester');
        $I->fillField('password', 'testar');
        $I->click('Login');

        $I->see('Faturas | Gervásio de Oliveira Seco');
    }
}
