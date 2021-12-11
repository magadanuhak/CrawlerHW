<?php

namespace App\Services;


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ClientService
{

    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['verify_peer' => false, 'verify_host' => false]);
    }


    public function getUrlCrawler($url): Crawler
    {
        $html = $this->client->get($url)->getBody()->getContents();

        return new Crawler($html);
    }


}