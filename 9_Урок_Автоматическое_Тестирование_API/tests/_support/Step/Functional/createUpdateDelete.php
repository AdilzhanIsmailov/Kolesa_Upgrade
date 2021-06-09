<?php
namespace Step\Functional;

class createUpdateDelete extends \FunctionalTester
{
    /**
     *  Создание пользователя = POST
     */
    public function createUser(){
        $I = $this;
        $userData = [
            'owner' => 'Leka777kz',
            'email' => $I->getFaker()->email,
            'name'  => $I->getFaker()->firstName,
            'job'   => $I->getFaker()->company
        ];
        $I->sendPost('human', $userData);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['status' => 'ok']);
    }
    /**
     * Изменение пользователя = PUT, Удаление пользователя = DELETE
     */
    public function updateAndDeleteUser(){
        $I = $this;
         // Грабом вытащили ответ, преобразовали через decode и вытащили только _id
         $response = $I->grabResponse();
         $b = json_decode($response, true);
         $id = $b['_id'];
         $urlToSend = 'human?_id=';
         $urlId = $urlToSend . $id;
        // Отправляем новые данные
         $I->sendPUT($urlId, ['name' => 'Adilzhan',
                              'email' => 'adil.mids@gmail.com',
                              'owner' => 'Leka777kz',
                              'job'   => 'KolesaUpgrade',
                          'superhero' => true,
                             'skill'  => 'AutomationCodeceptionSpecialist']);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['nModified' => '1']);
        $I->sendGet('people?owner=Leka777kz');
        // Удаляем пользователя
        $I->sendDelete($urlId);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['deletedCount' => '1']);
    }
}