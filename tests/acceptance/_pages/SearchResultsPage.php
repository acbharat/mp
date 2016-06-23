<?php

class SearchResultsPage
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

    public static $searchField = ".input-field";
    public static $searchResultsHeader = "/html/body/div[2]/h1";
    public static $searchInputField = "/html/body/div[1]/form/div[1]/input[1]";
    public static $searchIcon = "form.quick-search";
    public static $sortingField = "/html/body/div[2]/section/div/div[1]";
    public static $categoryFilters = ".category-filters";
    public static $refineProduct = ".group";
    public static $refineProductByColor = "/html/body/div[2]/section/aside/div/div[2]/div[1]/div";
    public static $refineProductBySize = "/html/body/div[2]/section/aside/div/div[2]/div[2]";
    public static $refineProductByRating = "/html/body/div[2]/section/aside/div/div[2]/div[3]";
    public static $loadMore = "/html/body/div[2]/section/div/a";
    public static $searchDropDownValue = "body > div:nth-child(1) > form > div.dropdown > div > a:nth-child(1)";
    public static $listingCount = ".row product-collection";




    public static function route($param)

    {
        return static::$URL.$param;
    }


}