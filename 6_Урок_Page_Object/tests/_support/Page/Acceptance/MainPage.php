<?php
namespace Page\Acceptance;

/**
 * Страница для авторизации
 */
class MainPage
{
    /**
     * Урл страницы авторизации
     */
    public static $URL = '';

    /**
     * Селектор раздела 'DRESSES'
     */
    public static $buttonDress = '#block_top_menu > ul > li:nth-child(2)';

    /**
     * Селектор поля ввода пароля
     */
    public static $buttonSummerDresses = '#block_top_menu > ul > li:nth-child(2) > ul > li:nth-child(3)';

    /**
     * Селектор активной кнопки GRID
     */
    public static $buttonGrid = '#grid';

    /**
     * Селектор активной кнопки LIST
     */
    public static $buttonList = '#list';

    /**
     * Селектор - проверка расположения продуктов на сайте в виде таблицы
     */
    public static $resultViewGrid = '#center_column > ul.grid';

    /**
     * Селектор - проверка расположения продуктов на сайте в виде списка
     */
    public static $resultViewlist = '#center_column > ul.list';

    

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


}
