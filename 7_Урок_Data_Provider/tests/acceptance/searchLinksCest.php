<?php

namespace Tests\Acceptance;

use Codeception\Example;
use Page\LinksMainPage;

/**
 * Рандомное открытие 2ух элеменов в заголовке и проверка URL
 * @group test
 */
class searchLinksCest
{
    /**
     * Поиск и нажатие элементов на странцие + проверка на соответствие данных посредством PATTERN DATA_PROVIDER
     * @group test
     * @param Example $data
     * @dataProvider getDataForSearchLinks
     */
    public function searchLinksByTextInClass(\AcceptanceTester $I, Example $data)
    {
        $I->amOnPage('');
        $I->waitForElementClickable(linksMainPage::$topLink);
        $I->click(sprintf(linksMainPage::$mainSearchLinks, $data['LinkNumber']));
        $I->seeInTitle($data['headerText']);
        $I->seeInCurrentUrl($data['url']);
    }
    
    protected function getDataForSearchLinks() {

        $justMassive = [
            ['LinkNumber' => '2', 'headerText' => 'Разработка', 'url' => 'develop'],
            ['LinkNumber' => '3', 'headerText' => 'Администрирование', 'url' => 'admin'],
            ['LinkNumber' => '4', 'headerText' => 'Дизайн', 'url' => 'design'],
            ['LinkNumber' => '5', 'headerText' => 'Менеджмент', 'url' => 'management'],
            ['LinkNumber' => '6', 'headerText' => 'Маркетинг', 'url' => 'marketing'],
            ['LinkNumber' => '7', 'headerText' => 'Научпоп', 'url' => 'popsci']
        ];

        shuffle($justMassive);
        $newAr = array_slice($justMassive, 0, 2);
        
        return $newAr; 
    }
}
