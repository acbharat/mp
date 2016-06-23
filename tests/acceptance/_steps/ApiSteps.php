<?php

namespace AcceptanceTester;
use GuzzleHttp;


class ApiSteps extends \AcceptanceTester

{

    public function getNameAndIdFromEachNode()
    {
        $client = new GuzzleHttp\Client();
        $url = "http://apitest.mamasandpapas.ae/categories";
        $response = $client->get($url);
        $search_content = json_decode($response->getBody()->getContents(), true);
        return $search_content;
    }

    public function verifyResponseHasValidObjects()
    {
        $client = new GuzzleHttp\Client();
        $url = "http://apitest.mamasandpapas.ae/categories";
        $response = $client->get($url);
        $this->assertEquals(200, $response->getStatusCode());

        $search_content = json_decode($response->getBody()->getContents(), true);
        $this->assertGreaterThan(10, count($search_content['children_data']));

        foreach ($search_content['children_data'] as $node) {
            $this->assertArrayHasKey('id', $node);
            $this->assertArrayHasKey('name', $node);
        }

    }

}