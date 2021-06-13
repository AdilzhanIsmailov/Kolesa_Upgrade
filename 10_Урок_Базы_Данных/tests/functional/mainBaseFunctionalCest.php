<?php

use Helper\BaseHelper;

class mainBaseFunctionalCest
{
    public const USERS_NUMBER = 2;


    public function _before(FunctionalTester $I)
    {
        $faker = $I->getFaker();

        $this->data = [
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

        $I->haveInCollection('people', $this->data);
    }


    // // public function generateData(FunctionalTester $I) {
    // //     $faker = $I->getFaker();

    // //     $this->data = [
    // //         "job" => $faker->company,
    // //         "superhero" => $faker->boolean(),
    // //         "skill" => "CodeceptionAutomationMASTER",
    // //         "email" => $faker->email,
    // //         "name" => $faker->firstName,
    // //         "DOB" => $faker->date("Y-m-d"),
    // //         "avatar" => $faker->imageUrl(),
    // //         "canBeKilledBySnap" => $faker->boolean(),
    // //         "created_at" => $faker->date("Y-m-d"),
    // //         "owner" => "Leka777kz",
    // //     ];
    // }
    /**
     *  Создание пользователей
     */
    public function tryToTest(FunctionalTester $I)
    {
        for($i = 1; $i<= self::USERS_NUMBER; $i++) {
            $I->sendPost('/human', $this->data);
            $I->seeResponseCodeIsSuccessful();
            $I->seeResponseContainsJson(['status' => 'ok']);
            $I->seeInCollection('people', $this->data);
        }
    }
}
