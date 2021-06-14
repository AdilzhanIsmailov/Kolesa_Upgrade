<?php

class checkMainPageQuickViewCest
{
    /**
     * Открытие модального окна с товаром блузка - проверка наличия текста Blouse
     */
    public function SearchTextInModal(AcceptanceTester $I)
    {
        $mainColumnsOnPageCSS = '#columns';
        $mainColumnsOnPageXPATH = '//div[@id="columns"]';
        $secondProductImgCSS = 'ul#homefeatured > li:nth-child(2) img';
        $secondProductImgXPATH = '//img[@title="Blouse"]';
        $quickViewButtonCSS = '.hovered:nth-child(2) .quick-view'; 
        $quickViewButtonXPATH = '//ul[@id="homefeatured"]/li[2]//a[@class="quick-view"]';
        $modalWindowCSS = '.fancybox-iframe';
        $modalWindowXPATH = '//iframe[@id="fancybox-frame1621937012725"]';

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
