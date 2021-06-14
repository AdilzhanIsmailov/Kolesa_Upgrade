<?php
namespace Page\Acceptance;

class mainPage
{
    /**
     * Локатор урла главной страницы
     */
    public static $mainPageUrl = '';

    /**
     * Локатор картинки внутри ЛЮБОЙ карточки с товаром на главной странице
     */
    public static $dressImg = 'ul#homefeatured > li:nth-child(%u) img';

    /**
     * Локатор кнопки QUICKVIEW ЛЮБОЙ карточки с товаром на главной странцие
     */
    public static $dressQuickViewBtn = 'ul#homefeatured > li:nth-child(%u) .quick-view';

    /**
     * Локатор IFRAME - модального окна
     */
    public static $modalWindowIFrame = '.fancybox-iframe';

    /**
     * Локатор кнопки добавления товара в WishList - избранное
     */
    public static $wishListButton = '#wishlist_button';

    /**
     * Локатор кнопки закрытия окна с успешным добавлением продукта в WishList
     */
    public static $wishListExitButton = 'div.fancybox-skin > .fancybox-item.fancybox-close';

    /**
     * Локатор кнопки закрытия окна iFrame
     */
    public static $iFrameExitButton = 'div.fancybox-skin > .fancybox-item';

    /**
     * Локатор кнопки перехода в аккаунт
     */
    public static $accountButton = '.account';


}
