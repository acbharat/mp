<?php
namespace AcceptanceTester;

class ProductDetailsSteps extends \AcceptanceTester

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
        $I->fillField(\SearchResultsPage::$searchInputField, $value);
        $I->canSeeInField(\SearchResultsPage::$searchInputField, $value);
        $I->wait(5);
        $I->click(\SearchResultsPage::$searchDropDownValue);
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
    public function seeBasicElementsOnProductDetailsPage()
    {
        $I = $this;
        $I->seeElement(\ProductDetailsPage::$breadcrumb);
        $I->seeElement(\ProductDetailsPage::$productImages);
        $I->seeElement(\ProductDetailsPage::$productThumbnails);
        $I->seeElement(\ProductDetailsPage::$productInformation);
        $I->seeElement(\ProductDetailsPage::$productPrice);
        $I->seeElement(\ProductDetailsPage::$productRatingAndID);
        $I->seeElement(\ProductDetailsPage::$productInfo);
        $I->seeElement(\ProductDetailsPage::$productInfoDetailsTab);
        $I->seeElement(\ProductDetailsPage::$productInfoDeliveryTab);
    }

    /**
     * Check thumbnails for product with more images
     *
     */
    public function seeThumbnailsWithProductMoreThanOneImage()
    {
        $I = $this;
        $I->seeElement(\ProductDetailsPage::$productThumbnails);
        $I->click(\ProductDetailsPage::$productThumbnails);
    }

    /**
     * Check Image change when user clicks thumbnails
     *
     */
    public function seeImageChangesUponClickingThumbnails()
    {
        $I = $this;
        $I->seeElement(\ProductDetailsPage::$productThumbnails);
        $I->click(\ProductDetailsPage::$productThumbnails);

        $current = $I->grabAttributeFrom('.thumbnail-container figure.active a', 'href');
        $I->click('.thumbnail-container figure:nth-child(2) a');
        $new = $I->grabAttributeFrom('.thumbnail-container figure:nth-child(2) a', 'href');

        $this->assertNotEquals($current, $new);
    }

    /**
     * Check user can able to see login popup
     *
     */

    public function seeLoginPopupAppearsWhenFavoritesButtonClicked()
    {
        $I = $this;
        $I->seeElement(\ProductDetailsPage::$favorites);
        $I->click(\ProductDetailsPage::$favorites);
        $I->waitForElementVisible(\HomePage::$modalContent);
        $I->see('Sign in');
    }

}