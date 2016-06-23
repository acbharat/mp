<?php


class HomePage
{
    // include url of current page
    public static $URL = '';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */

    public static $signIn = ".login-button";
    public static $localeChanger = "#locale-changer";
    public static $findStoreLink = "#find-a-store";
    public static $logo = "#logo";
    public static $myBag1 = "#welcome-and-cart";
    public static $myBag = "/html/body/div[1]/header/span/div[1]/a[1]/span[1]";
    public static $categoryNavigation = "/html/body/div[1]/nav";
    public static $search = "/html/body/div[1]/form/div[1]";

    public static $modalContent = ".modal-content";
    public static $facebookConnect = "//*[@id='login-modal']/div/div/div/div[3]/div/span[3]/a";

    public static function route($param)
    {
        return static::$URL.$param;
    }


}
