<?php


class LoginFacebookCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function verifyBasicElementsOnHomePage(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\HomeSteps($scenario);
        $I->navigateToHomePage();
        $I->seeBasicElementsOnHomePage();
    }

    public function verifyUserLogin(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\HomeSteps($scenario);
        $I->wantTo('ensure that user can able to Login using facebook connect');
        $I->navigateToHomePage();
        $I->wait(2);
        $I->click(\HomePage::$signIn);
        $I->waitForElementVisible(\HomePage::$modalContent);
        $I->click(\HomePage::$facebookConnect);
        $I->wait(5);
        $I->see("The domain of this URL isn't included in the app's domains");
    }
}
