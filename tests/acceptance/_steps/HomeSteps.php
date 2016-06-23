<?php

namespace AcceptanceTester;


class HomeSteps extends \AcceptanceTester

{

    public function navigateToHomePage()
    {
        $I = $this;
        $I->amOnPage(\HomePage::$URL);
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
    public function seeBasicElementsOnHomePage()
    {
        $I = $this;
        $I->seeElement(\HomePage::$signIn);
        $I->seeElement(\HomePage::$localeChanger);
        $I->seeElement(\HomePage::$findStoreLink);
        $I->seeElement(\HomePage::$logo);
        $I->seeElement(\HomePage::$myBag);
        $I->seeElement(\HomePage::$categoryNavigation);
        $I->seeElement(\HomePage::$search);
    }



}