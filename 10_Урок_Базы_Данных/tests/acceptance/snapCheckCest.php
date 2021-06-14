<?php
/**
 * Класс для проверки кнопки Snap и ее результатов
 */
class snapCheckCest
{
    /**
     * Генерация данных и insert в БД, + check
     */
    public function _before(\Step\Acceptance\mainSteps $I)
    {
        $I->createAndCheckUser();
    }
    /**
     * Проверка, снап-удаление юзеров, провекра после удаления, проверка БД
     */
    public function snapAndFullCheck(\Step\Acceptance\mainSteps $I){
        $I->checkNumbersOfUsers();
        $I->clickSnapButton();
        $I->assertFalseTrueSnap();
        $I->checkDataBaseIsClearFromTrueUsers();
    }
}
