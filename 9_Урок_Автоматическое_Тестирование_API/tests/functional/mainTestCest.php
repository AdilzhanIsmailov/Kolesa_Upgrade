<?php

/**
 *  Класс для работы с созданием/изменением/удалением пользователя
 */
class mainTestCest
{
   /**
    *  Создание юзера с помощью faker-а
    */
    public function _before(\step\Functional\createUpdateDelete $I)
    {
        $I->createUser();
    }

    // Изменение и удаление данных пользователя
    public function putAndDeleteUser(\step\Functional\createUpdateDelete $I)
    {
        $I->updateAndDeleteUser();
    }

    /**
     * Проверка на отсутствия обязательного ключа owner после delete
     */
    public function _after(\step\Functional\createUpdateDelete $I){
        $I->sendGet('people?owner=Leka777kz');
        $I->dontSeeResponseContainsJson(['owner' => 'Leka777kz']);
    }
}
