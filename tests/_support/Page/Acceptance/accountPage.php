<?php
namespace Page\Acceptance;

class accountPage
{
    /**
     * Локатор кнопки перехода к станице с избранными товарами
     */
    public static $myWishListButtonLink = '#center_column > div > div:nth-child(2) > ul > li > a';

    /**
     * Урл WishList для _after
     */
    public static $wishListURL = '?fc=module&module=blockwishlist&controller=mywishlist';

    /**
     * Локатор числа - кол-ва добавленных товаров в WishList - избранное
     */
    public static $totalSumQty = 'td.bold.align_center';

    /**
     * Локатор кнопки удаления товаров в списке WishList
     */
    public static $deleteItemsInWishList = '.icon-remove';

    /**
     * Локатор кнопки логаут для выхода с сайта
     */
    public static $logoutButton = '.logout:nth-child(1)';

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
     * Переход на страницу аккаунта
     */
    public function goToAccountPage()
    {
        $this->acceptanceTester->amonPage(self::$wishListURL);

        return $this;
    }

    /**
     * Нажатие на кнопку удаления товаров из WishList
     */
    public function clickDeleteButton()
    {
        $this->acceptanceTester->click(self::$deleteItemsInWishList);

        return $this;
    }

    /**
     * Дождаться пока кнопка удаления товаров из WishList не будет видна
     */
    public function waitNotVisibleDeleteButton()
    {
        $this->acceptanceTester->waitForElementNotVisible(self::$deleteItemsInWishList);

        return $this;
    }

    /**
     * Выйти из аккаута на сайте - нажатие кнопки logout
     */
    public function logoutFromSite()
    {
        $this->acceptanceTester->click(self::$logoutButton);

        return $this;
    }

    /**
     * Удостоверится что кнопка не logout недоступна - Double CHECK - P.S.: мы же тестировщики
     */
    public function checkYouAreNotLogin()
    {
        $this->acceptanceTester->waitForElementNotVisible(self::$logoutButton);

        return $this;
    }

}
