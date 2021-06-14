<?php
namespace Page\Acceptance;

/**
 * Страница для авторизации
 */
class LoginPage
{
    /**
     * Юзернейм для вызова ошибки - баг
     */
    public const USERNAME_BAD = 'locked_out_user';

    /**
     * Юзернейм для вызова ошибки - баг
     */
    public const USERNAME = 'standard_user';

    /**
     * Стандартный пароль для ввода
     */
    public const PASSWORD = 'secret_sauce';

    /**
     * Урл страницы авторизации
     */
    public static $URL = '';

    /**
     * Селектор поля ввода логина
     */
    public static $loginInput = '#user-name';

    /**
     * Селектор поля ввода пароля
     */
    public static $passwordInput = '#password';

    /**
     * Селектор кнопки авторизации
     */
    public static $loginButton = '#login-button';

    /**
     * Селектор блока с ошибкой (при неудачной авторизации)
     */
    public static $loginError = '#login_button_container > div > form > div.error-message-container.error';

    /**
     * Селектор кнопки закрытия ошибки
     */
    public static $closeErrorButton = '.error-button';

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
     * Заполняет поле ввода логина
     */
    public function fillUsernameField()
    {
        $this->acceptanceTester->fillField(self::$loginInput, self::USERNAME_BAD);

        return $this;
    }
    
    /**
     * Заполняет поле ввода пароля
     */
    public function fillPasswordField()
    {
        $this->acceptanceTester->fillField(self::$passwordInput, self::PASSWORD);
        
        return $this;
    }

    /**
     * Кликает на кнопку логина
     */
    public function clickSubmit()
    {
        $this->acceptanceTester->click(self::$loginButton);

        return $this;
    }
    
    
    /**
     * Закрытие блока с ошибкой при авторизации
     */
    public function closeErrorBlock()
    {
        $this->acceptanceTester->click(self::$closeErrorButton);

        return $this;
    }

   

}
