<?php

class checkSuccessfulSearchByTextCest
{
    /**
     * Подсчет товаров на странице при поиске: Printed dress (P.S.: смотрите консоль)
     */
    public function CheckNumbersOfProductContainer(FunctionalTester $I)
    {
        $searchFormFieldCSS = '#search_query_top';
        $searchFormFieldXPATH = '//input[@id="search_query_top"]';
        $searchButtonCSS = '.button-search';
        $searchButtonXPATH = '//button[@name="submit_search"]';
        $searchResultProductListCSS = '.product-container';
        $searchResultProductListXPATH = '//ul[@class="product_list grid row"]/li';
        

        $I->amOnPage('');
        $I->fillField('#search_query_top', 'Printed dress');
        $I->click('#searchbox > button');
        $I->seeNumberOfElements('.product-container', 5);
        codecept_debug('Только что была проведена проверка количества товаров на странице при поиске - Printed dress');
    }
}