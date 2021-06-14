<?php

class checkSuccessfulSearchByTextCest
{
    /**
     * Подсчет товаров на странице при поиске: Printed dress (P.S.: смотрите консоль)
     */
    public function CheckNumbersOfProductContainer(FunctionalTester $I)
    {
        $I->amOnPage('');
        $I->fillField('#search_query_top', 'Printed dress');
        $I->click('#searchbox > button');
        $I->seeNumberOfElements('.product-container', 5);
        codecept_debug('Только что была проведена проверка количества товаров на странице при поиске - Printed dress');
    }
}