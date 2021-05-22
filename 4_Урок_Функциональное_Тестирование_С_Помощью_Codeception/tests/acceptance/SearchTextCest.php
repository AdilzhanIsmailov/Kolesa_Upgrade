<?php

class SearchTextCest
{
    /**
     * Открытие модального окна с товаром блузка - проверка наличия текста Blouse
     */
    public function SearchTextInModal(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->waitForElementVisible('#columns');
        $I->see('Blouse', 'h5');
        $I->moveMouseOver('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.product_img_link > img');
        $I->click('.hovered:nth-child(2) .quick-view');
        $I->waitForElementVisible('#index > div.fancybox-overlay.fancybox-overlay-fixed > div');
        /**Switch To Iframe */
        $I->switchToIFrame(".fancybox-iframe");
        $I->see('Blouse', 'h1');
        /**Тут я решил вытащить "Blouse" в консоль */
        codecept_debug($I->grabTextFrom('h1'));
    }
}
