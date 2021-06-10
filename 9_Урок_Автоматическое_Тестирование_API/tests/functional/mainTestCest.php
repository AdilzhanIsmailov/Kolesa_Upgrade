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

    // Изменение данных пользователя (+ проверка nModified)
    public function putAndDeleteUser(\step\Functional\createUpdateDelete $I)
    {
        $I->updateUser();
    }

    /**
     * Удаление пользователя (+ проверка deletedCount)
     */
    public function _after(\step\Functional\createUpdateDelete $I){
        $I->deleteUser();
    }
}
