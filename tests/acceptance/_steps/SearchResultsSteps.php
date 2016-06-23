<?php

namespace AcceptanceTester;

class SearchResultsSteps extends \AcceptanceTester
{

    public function navigateToHomePage()
    {
        $I = $this;
        $I->amOnPage(\HomePage::$URL);
    }

    public function searchForProduct($value)
    {
        $I = $this;
        $I->seeElement(\SearchResultsPage::$searchField);
        $I->submitForm('form.quick-search', ['q' => $value]);
        $I->waitForElementVisible(\SearchResultsPage::$searchField);
    }

    /**
     * Check if details are displayed on the search results page.
     * Details:.
     * - search section;
     * - Sort by;
     * - Category filters;
     * - Refine by Category;
     * - Refine by product;
     * - Load more;
     */
    public function seeBasicElementsOnSearchResultsPage()
    {
        $I = $this;
        $I->seeElement(\SearchResultsPage::$searchField);
        $I->seeElement(\SearchResultsPage::$searchIcon);
        $I->seeElement(\SearchResultsPage::$sortingField);
        $I->seeElement(\SearchResultsPage::$categoryFilters);
        $I->seeElement(\SearchResultsPage::$refineProduct);
        $I->seeElement(\SearchResultsPage::$refineProductByColor);
        $I->seeElement(\SearchResultsPage::$refineProductBySize);
        $I->seeElement(\SearchResultsPage::$refineProductByRating);
        $I->seeElement(\SearchResultsPage::$loadMore);
    }

    /**
     * Check is list count displayed after search
     *
     */
    public function verifyNoOfListings()
    {
        $I = $this;
        $I->seeNumberOfElements('a.product-item', 12);
        $I->click(\SearchResultsPage::$loadMore);
        $I->waitForElementNotVisible('a.load-more');
        $I->seeNumberOfElements('a.product-item', 20);
    }

    /**
     * Check is list count displayed after search
     *
     */
    public function searchForProductWithKeyword($value)
    {
        $I = $this;
        $I->seeElement(\SearchResultsPage::$searchField);
        $I->submitForm('form.quick-search', ['q' => $value]);
        $I->waitForElementVisible(\SearchResultsPage::$searchField);
    }
    /**
     * Click on the search Icon button
     *
     */
    public function noItemsWithThisKeyword($maddaya)
    {
        $I = $this;
        $I->seeElement(\SearchResultsPage::$searchInputField);
        $I->fillField(\SearchResultsPage::$searchInputField, $maddaya);
        $I->click(\SearchResultsPage::$searchIcon);
        $I->wait(2);
    }

}