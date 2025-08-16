<?php

namespace App\Services;


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ParseUrlAction
{
    public function execute(string $url): ?string
    {
        $client = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            ],
        ]);

        try {
            $response = $client->get($url);
            $html = $response->getBody()->getContents();
        } catch (\Exception $e) {
            return null;
        }

        $crawler = new Crawler($html);

        try {
            $schema = $crawler->filter('head script[type="application/ld+json"]')->first()->text();
            $info = json_decode($schema, true);

            return $info['offers']['price'] . ' ' . $info['offers']['priceCurrency'];
        } catch (\Exception $e) {
            return null;
        }
    }
}
