<?php


class ApiCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * tests contains:
     * - Every response should return 200 OK.
     * - First node should have more than 10 categories on children_data node.;
     * - Every node should have an "id";
     * - Every node should have a "name";
     */

    public function verifyCategoriesApiEndpoint(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester\ApiSteps($scenario);
        $data = $I->getNameAndIdFromEachNode();
        $I->verifyResponseHasValidObjects($data);
    }
}
