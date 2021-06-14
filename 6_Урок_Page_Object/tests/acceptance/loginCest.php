<?php

use Page\Acceptance\LoginPage;

/**Класс для проверки авторизации */
class loginCest
{
    /**
     * Проверяет ошибку в авторизации (locked_out_user)
     */
    public function checkErrorLogin(AcceptanceTester $I)
    {
     $loginPage = new LoginPage($I);

     $I->amOnPage(loginPage::$URL);
     $loginPage->fillUsernameField()
               ->fillPasswordField()
               ->clickSubmit();
     $I->seeElement(loginPage::$loginError);
     $loginPage->closeErrorBlock();
     $I->dontSeeElement(loginPage::$loginError);
    }
}