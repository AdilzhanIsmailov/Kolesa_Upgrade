<?php
namespace Step\Acceptance;

use Page\Acceptance\mainPage;
use Page\Acceptance\accountPage;

class shoppingSteps extends \AcceptanceTester
{
    /**
     * Важный параметр, от кол-ва PRODUCTS_NUMBER зависит кол-во добавленных товаров, и ожидаемый assert 
     */
    public const PRODUCTS_NUMBER = 2;
    /**
     * Добавление товаров в WishList в цикле - сколько будет в PRODUCT_NUMBER столько товаров и будет добавлено
     */
    public function addProductsToWishList(){
        $I = $this;
        for($i = 1; $i<= self::PRODUCTS_NUMBER; $i++) {
            $I->moveMouseOver(sprintf(mainPage::$dressImg, $i));
            $I->waitForElementVisible(sprintf(mainPage::$dressQuickViewBtn, $i));
            $I->click(sprintf(mainPage::$dressQuickViewBtn, $i));
            $I->waitForElementVisible(mainPage::$modalWindowIFrame);
            $I->switchToIFrame(mainPage::$modalWindowIFrame);
            $I->click(mainPage::$wishListButton);
            $I->waitForElementVisible(mainPage::$wishListExitButton);
            $I->click(mainPage::$wishListExitButton);
            $I->switchToFrame();
            $I->click(mainPage::$iFrameExitButton);
        }
    }
    /**
    * Сравнение кол-ва товаров в личном кабинете
    */
    public function checkTotalProductInWishList(){
        $I = $this;
        $I->reloadPage();
        $I->click(mainPage::$accountButton);
        $I->waitForElementVisible(accountPage::$myWishListButtonLink);
        $I->click(accountPage::$myWishListButtonLink);
        $totalSum = $I->grabTextFrom(accountPage::$totalSumQty);
        $I->assertEquals($totalSum, sprintf(self::PRODUCTS_NUMBER),
         'Cколько задано товаров в PRODUCTS_NUMBER, столько и было добавлено =)');
        }
    }
