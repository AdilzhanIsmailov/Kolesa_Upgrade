<?php
namespace Step\Acceptance;

use Page\mainPage;

class mainSteps extends \AcceptanceTester
{
    /**
     * Генерация данных через Faker, разделение user-ов по canBeKilledBySnap, и добавление в БД
     */
    public function createAndCheckUser(){
        $I = $this;
        $faker = $I->getFaker();
        $data = [];

        for ($i = 0; $i <= 9; $i++) {
            $data[] = [
                "job" => $faker->company,
                "superhero" => $faker->boolean(),
                "skill" => "CodeceptionAutomationMASTER",
                "email" => $faker->email,
                "name" => $faker->firstName,
                "DOB" => $faker->date("Y-m-d"),
                "avatar" => $faker->imageUrl(),
                "canBeKilledBySnap" => $faker->boolean(),
                "created_at" => $faker->date("Y-m-d"),
                "owner" => "Leka777kz",
            ];
 
            if($data[$i]['canBeKilledBySnap']) {
                $this->mustBeDeleted[] = $data[$i];
            }
            $this->mustStay[] = $data[$i];
            //$this->totalDataCount = $this->mustBeDeleted . $this->mustStay;
            // добавляем в БД
            $I->haveInCollection('people', $data[$i]);
            // проверяем что запись села в БД
            $I->seeInCollection('people', $data[$i]);
        }
        $this->numData = $I->seeNumElementsInCollection('people', 10, ['owner' => 'Leka777kz']);
        $this->dataCount = count($data);
        $this->dataSnapCount = count($this->mustBeDeleted);
        $this->dataNonSnapCount = count($this->mustStay);
        $this->sum = $this->dataCount - $this->dataSnapCount;
        $this->sumNon = $this->dataNonSnapCount - $this->dataSnapCount;
    }
    /**
     * Проверка на соответствие кол-ва пользователей в count на странице с кол-вом созданных юзеров в data
     */
    public function checkNumbersOfUsers(){
        $I = $this;
        $I->amGoingTo('Проверяю что кол-во в count совпадает с кол-вом созданных user в БД');
        $I->amOnPage(mainPage::$URL);
        $I->reloadPage();
        $I->waitForElementVisible(mainPage::$cardSelector);
        $totalCount = preg_replace('/[Count: ]/', '', $I->grabTextFrom(mainPage::$count));
        $I->assertEquals($totalCount, $this->dataCount, 'сколько в дате столько и в totalCount');
    }
    /**
     * Нажатие на Snap кнопку
     */
    public function clickSnapButton(){
        $I = $this;
        $I->amGoingTo('Click SNAP -> check that users is correctly deleted');
        $I->waitForElementClickable(mainPage::$button);
        $I->click(mainPage::$button);
        $I->reloadPage();
        $I->waitForElementVisible(mainPage::$cardSelector);
    }
    /**
     * Подтверждение что кол-во юзеров в count после нажатия на snap совпадает с кол-вом user_ов которые с значением false
     * (т.е. те которые не должны были удалится)
     */
    public function assertFalseTrueSnap(){
        $I = $this;
        $totalCountAfterSnap = preg_replace('/[Count: ]/', '', $I->grabTextFrom(mainPage::$count));
        $I->assertEquals($totalCountAfterSnap, $this->sum, 'должно быть одинаковое число =)');
        $I->assertEquals($totalCountAfterSnap, $this->sumNon, 'Столько сейчас пользователей у которых false');
    }
    /**
     * Проверка БД на отсутствие данных пользователей которые имели canBeKilledBySnap -> true
     */
    public function checkDataBaseIsClearFromTrueUsers(){
        $I = $this;
        $I->dontSeeInCollection('people', $this->mustBeDeleted);
    }

}