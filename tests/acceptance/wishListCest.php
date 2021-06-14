<?php

use Page\Acceptance\loginPage;
use Page\Acceptance\mainPage;
use Page\Acceptance\accountPage;
/**
 * Класс для работы с WishList (Избранное)
 */
class wishListCest{
    /**
     * Метод BEFORE - ЛОГИН НА СТРАНИЦЕ
     */
    public function _before(acceptanceTester $I){
        $loginPage = new loginPage($I);
        $loginPage->goToLoginPage()
                  ->fillEmail()
                  ->fillPassword()
                  ->clickSubmitButton();
    }
    /**
     * Проверка кол-ва товаров в WishList
     */
    public function checkItemInWishList(\Step\Acceptance\shoppingSteps $I){
        $I->amOnPage(mainPage::$mainPageUrl);
        $I->addProductsToWishList();
        $I->checkTotalProductInWishList();
    }

    /**
     * Метот AFTER - ЧИСТКА ЛОГОВ И ЛОГАУТ
     */
    public function _after(acceptanceTester $I){
        $accountPage = new accountPage($I);
        $accountPage->goToAccountPage()
                    ->clickDeleteButton();
        $I->acceptPopup();
        $accountPage->waitNotVisibleDeleteButton()
                    ->logoutFromSite()
                    ->checkYouAreNotLogin();
    }
}