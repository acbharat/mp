<?php


class SearchResultsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function verifyBasicElementsOnSearchResultsPage(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\SearchResultsSteps($scenario);
        $I->navigateToHomePage();
        $I->wantTo("ensure that user can able to basic elements on search results page");
        $I->searchForProduct("red");
        $I->seeBasicElementsOnSearchResultsPage();
    }

    public function seeNoOfProductListingsOnSearchResultsPage(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\SearchResultsSteps($scenario);
        $I->navigateToHomePage();
        $I->wantTo("ensure that user can able to see no of product listings");
        $I->searchForProduct("red");
        $I->verifyNoOfListings();
    }

    public function searchWithKeywordNoItemsWithThisKeyword(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\SearchResultsSteps($scenario);
        $I->navigateToHomePage();
        $I->wantTo("ensure that user can able to see any listings if he search with no items with this keyword");
        $I->searchForProductWithKeyword("madaya");
        $I->dontSeeElement('a.product-item');
    }

}
