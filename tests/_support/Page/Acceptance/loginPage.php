<?php
namespace Page\Acceptance;

class loginPage
{
    /**
     * Захордкоженные данные для логина
     */
    public const USERNAME_GOOD = 'adil.mids@gmail.com';

    /**
     * Захордкоженные данные для пароля
     */
    public const PASSWORD_GOOD = 'Adilzhan';

    /**
     * Урл для логина на сайте
     */
    public static $loginPageUrl = '?controller=authentication&back=my-account';

    /**
     * Локатор поля ввода email (логина)
     */
    public static $emailFill = '#email';

    /**
     * Локатор поля ввода пароля
     */
    public static $passwordFill = '#passwd';

    /**
     * Локатор кнопки войти - Submit
     */
    public static $submintBtn = '#SubmitLogin';

    /**
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

    /**
     * Переход на страницу логина
     */
    public function goToLoginPage()
    {
        $this->acceptanceTester->amonPage(self::$loginPageUrl);

        return $this;
    }
    
     /**
     * Заполняет поле ввода логина
     */
    public function fillEmail()
    {
        $this->acceptanceTester->fillField(self::$emailFill, self::USERNAME_GOOD);

        return $this;
    }

     /**
     * Заполняет поле ввода пароля
     */
    public function fillPassword()
    {
        $this->acceptanceTester->fillField(self::$passwordFill, self::PASSWORD_GOOD);

        return $this;
    }

     /**
     * Нажатие на кнопку submit - войти в аккаунт
     */
    public function clickSubmitButton()
    {
        $this->acceptanceTester->click(self::$submintBtn);

        return $this;
    }

}
