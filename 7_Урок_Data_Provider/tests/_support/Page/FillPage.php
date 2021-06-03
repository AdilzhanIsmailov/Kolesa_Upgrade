<?php
namespace Page;

/**
 * PageObject для страницы формы
 */
class FillPage
{

    /**
     * Локатор поля имени
     */
    public static $firstName = "#firstName";

    /**
     * Локатор поля Фамилии
     */
    public static $lastName = "#lastName";

    /**
     * Локатор поля Email
     */
    public static $email = "#input_38";

    /**
     * Локатор поля номера телефона
     */
    public static $phoneNumber = "#phoneNumber";

    /**
     * Локатор поля Фамилии
     */
    public static $adress = "#address";

    /**
     * Локатор поля города
     */
    public static $city = "#city";

    /**
     * Локатор поля региона
     */
    public static $region = "#state";

    /**
     * Локатор поля почтового индекса
     */
    public static $postal = "#postal";

    /**
     * Локатор кнопки регистрации
     */
    public static $registerButton = "#input_36";

    /**
     * Локатор CARD RADIO BUTTON
     */
    public static $cardRadioButton = "#input_32_paymentType_credit";

    /**
     * Локатор CARD FIRST NAME
     */
    public static $cardFirstName = "#input_32_cc_firstName";

    /**
     * Локатор CARD LAST NAME
     */
    public static $cardLastName = "#input_32_cc_lastName";

    /**
     * Локатор CARD NUMBER
     */
    public static $cardNumber = "#input_32_cc_number";

    /**
     * Локатор CARD CVV
     */
    public static $cardSecurityCode = "#input_32_cc_ccv";

    /**
     * Локатор CARD EXPIRATION MONTH
     */
    public static $cardMonth= "#input_32_cc_exp_month";

    /**
     * Локатор CARD EXPIRATION MONTH EXAMPLE
     */
    public static $cardMonthExample= "#input_32_cc_exp_month > option:nth-child(8)";

    /**
     * Локатор CARD EXPIRATION YEAR
     */
    public static $cardYear = "#input_32_cc_exp_year";

    /**
     * Локатор CARD EXPIRATION YEAR EXAMPLE
     */
    public static $cardYearExample = "#input_32_cc_exp_year > option:nth-child(4)";

    /**
     * Локатор billing adress
     */
    public static $billingAdress = "#input_32_addr_line1";

    /**
     * Локатор billing city
     */
    public static $billingCity = "#input_32_city";

    /**
     * Локатор billing region
     */
    public static $billingRegion = "#input_32_state";

    /**
     * Локатор billing postcode
     */
    public static $billingPostal = "#input_32_postal";

    /**
     * Локатор billing country
     */
    public static $billingCountry = "#input_32_country";

    /**
     * Локатор billing country example
     */
    public static $billingCountryExample = "#input_32_country > option:nth-child(102)";


    /*
     * Обьект тестера
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;
    /**
     * Метод - конструктор
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    /*
     * Заполняет поле ввода имени
     */
   // public function fillFirstName()
   // {
     //   $this->acceptanceTester->fillField(self::$firstName, fillFieldcest->getFaker()->firstName);

     //   return $this;
    //}
    
    
    
}
