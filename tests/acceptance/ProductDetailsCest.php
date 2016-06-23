<?php


class ProductDetailsCest

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
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * Check user can see basic elements on Product details page
     *
     */

    public function verifyBasicElementsOnProductDetailsPage(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\ProductDetailsSteps($scenario);
        $I->navigateToHomePage();
        $I->wantTo("ensure user can able to basic elements on Product Details page");
        $I->searchForProduct("red");
        $I->seeBasicElementsOnProductDetailsPage();
    }
    /**
     * Check user can able to see thumbnails
     *
     */
    public function verifyUserCanAbleToSeeThumbnails(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\ProductDetailsSteps($scenario);
        $I->navigateToHomePage();
        $I->wantTo("ensure user can able to see thumbnails if there's more than one image on Product Details page");
        $I->searchForProduct("red");
        $I->seeThumbnailsWithProductMoreThanOneImage();
        $I = new AcceptanceTester\ProductDetailsSteps($scenario);
        $I->navigateToHomePage();
        $I->wantTo("ensure user can able to see change in Image upon clicking thumbnails");
        $I->searchForProduct("red");
        $I->seeImageChangesUponClickingThumbnails();
    }

    /**
     * Check favorties upon login popup
     *
     */

    public function verifyLoginPopupByClickingFavoritesButton(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\ProductDetailsSteps($scenario);
        $I->navigateToHomePage();
        $I->wantTo("ensure user can able to see Login popup when Favorites clicked on Product Details page");
        $I->searchForProduct("red");
        $I->seeLoginPopupAppearsWhenFavoritesButtonClicked();
    }

    /**
     * Check user can able to decrease quantity
     *
     */
    public function seeUserIncreaseQuantity(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\ProductDetailsSteps($scenario);
        $I->navigateToHomePage();
        $I->wantTo("ensure user can able to increase product quantity Product Details page");
        $I->searchForProduct("red");

        $I->seeElement('input', ['name' => 'quantity', 'value' => '1']);
        for ($count = 2; $count <= 10; $count++) {
            $I->click(\ProductDetailsPage::$selectQuantityIncrease);
            $I->seeElement('input', ['name' => 'quantity', 'value' => $count]);
        }

        $I->click(\ProductDetailsPage::$selectQuantityIncrease);
        $I->seeElement('input', ['name' => 'quantity', 'value' => '10']);
    }

    /**
     * Check user can able to decrease quantity
     *
     */
    public function seeUserDecreaseQuantity(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\ProductDetailsSteps($scenario);
        $I->navigateToHomePage();
        $I->wantTo("ensure user can able to decrease quantity on Product Details page");
        $I->searchForProduct("red");

        for ($count = 2; $count <= 10; $count++) {
            $I->click(\ProductDetailsPage::$selectQuantityIncrease);
        }
        $I->seeElement('input', ['name' => 'quantity', 'value' => '10']);

        for ($count = 9; $count >= 1; $count--) {
            $I->click(\ProductDetailsPage::$selectQuantityDecrease);
            $I->seeElement('input', ['name' => 'quantity', 'value' => $count]);
        }

        $I->click(\ProductDetailsPage::$selectQuantityDecrease);
        $I->seeElement('input', ['name' => 'quantity', 'value' => '1']);
    }
}
