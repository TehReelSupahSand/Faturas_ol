<?php
namespace backend\tests\acceptance;

use backend\tests\AcceptanceTester;
use yii\helpers\Url;

class LoginCest
{
    public function checkLogin(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login');

        $I->fillField('username', 'admin');
        $I->fillField('password', 'administrator');
        $I->click('Login');

        $I->see('Congratulations');
    }
}
