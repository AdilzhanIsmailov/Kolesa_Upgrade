<?php

namespace Tests\Acceptance;

use Page\FillPage;
use Faker\Factory;
use Helper\CustomFakerProvider;
use Helper\CustomCardNumberFaker;

/**
 * Класс для тестирования формы
 */
class fillFieldCest
{
    /**
     * Тест на проверку заполнения полей с помощью фейкера
     * @group test2
     */
    public function checkFillField(\AcceptanceTester $I)
    {
        $faker = Factory::create('kk_KZ');
        $faker->addProvider(new CustomFakerProvider($faker));
        $faker->addProvider(new CustomCardNumberFaker($faker));
        
        //$firstName = $faker->firstName;
        $firstName = $I->getFaker()->firstName;
        $lastName = $faker->lastName;
        $email = $faker->email;
        $phoneNumber = $faker->getPhoneKz;
        $adress = $faker->address;
        $city = $faker->city;
        $region = $faker->region;
        $postal = $faker->postcode;
        $cardFirstName = $faker->firstName;
        $cardLastName = $faker->lastName;
        $cardNumber = $faker->getCardNumber;
        $cardCvv = $faker->getCardCvv;
        $billingAdress = $faker->address;
        $billingCity = $faker->city;
        $billingRegion = $faker->region;
        $billingPostal = $faker->postcode;

        
        $I->amOnPage('');
        $I->fillField(FillPage::$firstName, $firstName);
        $I->fillField(FillPage::$lastName, $lastName);
        $I->fillField(FillPage::$email, $email);
        $I->fillField(FillPage::$phoneNumber, $phoneNumber);
        $I->fillField(FillPage::$adress, $adress);
        $I->fillField(FillPage::$city, $city);
        $I->fillField(FillPage::$region, $region);
        $I->fillField(FillPage::$postal, $postal);
        $I->click(FillPage::$cardRadioButton);

        $I->fillField(FillPage::$cardFirstName, $cardFirstName);
        $I->fillField(FillPage::$cardLastName, $cardLastName);
        $I->fillField(FillPage::$cardNumber, $cardNumber);
        $I->fillField(FillPage::$cardSecurityCode, $cardCvv);
        $I->click(FillPage::$cardMonth);
        $I->click(FillPage::$cardMonthExample);
        $I->click(FillPage::$cardYear);
        $I->click(FillPage::$cardYearExample);

        $I->fillfield(FillPage::$billingAdress, $billingAdress);
        $I->fillfield(FillPage::$billingCity, $billingCity);
        $I->fillfield(FillPage::$billingRegion, $billingRegion);
        $I->fillfield(FillPage::$billingPostal, $billingPostal);
        $I->click(FillPage::$billingCountry);
        $I->click(FillPage::$billingCountryExample);

        $I->wait(10);
        $I->click(FillPage::$registerButton);
        $I->waitForText('Good job');

    }
    
}