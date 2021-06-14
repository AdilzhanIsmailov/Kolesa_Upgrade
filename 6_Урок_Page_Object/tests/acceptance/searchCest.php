<?php

use Page\Acceptance\MainPage;

/**Класс для проверки поиска*/
class searchCest
{
    /**
     * Проверяет смену раскладки отображения товаров на странице результатов поиска
     */
    public function checkSearchResultPosition(AcceptanceTester $I)
    {
        $I->amOnPage(MainPage::$URL);
        $I->moveMouseOver(MainPage::$buttonDress);
        $I->click(MainPage::$buttonSummerDresses);
        $I->waitForElement(MainPage::$buttonGrid, 3);
        $I->seeElement(MainPage::$resultViewGrid);
        $I->click(MainPage::$buttonList);
        $I->dontSeeElement(MainPage::$resultViewGrid);
        $I->seeElement(MainPage::$resultViewlist);
    }
}