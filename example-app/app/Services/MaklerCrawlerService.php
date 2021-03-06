<?php

namespace App\Services;

use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class MaklerCrawlerService
{
    const SITE_URL = 'https://makler.md/ru/furniture-and-interior';
    private ClientService $client;


    public function __construct(ClientService $clientService)
    {
        $this->client = $clientService;
    }


    public function getFullDescriptions()
    {
        $urls = $this->getPagesUrls();

        $fullDescriptionArticles = [];

        foreach ($urls as $url) {
            $data = $this->getSingleArticleData($url);

            if (empty($data)) {
                continue;
            }

            $fullDescriptionArticles[] = $data;
        }

        session(['full_descriptions' => $fullDescriptionArticles]);

        return $fullDescriptionArticles;
    }


    private function getPagesUrls()
    {
        $links = [];

        foreach ($this->getShortDescriptions() as $shortDescription) {
            if (empty($shortDescription['url'])) {
                continue;
            }

            $links[] = "https://makler.md{$shortDescription['url']}";
        }

        return $links;

    }

    public function getShortDescriptions(): array
    {
        $contentCrawler = $this->client->getUrlCrawler(self::SITE_URL);

        $results = [];

        $articles = $contentCrawler->filter('#mainAnList .ls-detail article');

        $articles->each(function (Crawler $article, $i) use (&$results) {
            $results[] = $this->articleContent($article);
        });


        return $results;
    }


    private function articleContent(Crawler $article): array
    {

        if (!$article->count()) {
            return [];
        }

        $content = [];

        $link = $article->filter('.ls-detail_antTitle a');
        $content['title'] = '';
        $content['url'] = '';
        $content['img'] = '';

        if ($link->count()) {
            $content['title'] = $link->text('');
            $content['url'] = $link->attr('href');
        }

        $image = $article->filter('.ls-detail_imgBlock img');

        if ($image->count()) {
            $content['img'] = str_replace('thumb/', 'original/', $image->attr('data-src'));
        }

        $content['description'] = Str::limit($article->filter('.subfir')->text(''), 120, '(...)');
        $content['price'] = $article->filter('.ls-detail_price')->text('');
        $content['city'] = $article->filter('.ls-detail_anData div')->text('');
        $content['phone'] = $article->filter('.ls-detail_anData .phone_icon')->text('');
        $content['datetime'] = $article->filter('.ls-detail_time')->text('');

        return $content;
    }

    private function getSingleArticleData($url)
    {
        $page = $this->client->getUrlCrawler($url);

        if (!$page->count()) {
            return [];
        }

        $content = [];

        $content['title'] = $page->filter("#anNameData")->text('???????? ????????????????');
        $itemTitleInfo = $page->filter(".item_title_info");

        if ($itemTitleInfo->filter('span')->eq(0)->count()) {
            $content['city'] = $itemTitleInfo->filter('span')->eq(0)->text('???????? ????????????');
        }

        if ($itemTitleInfo->filter('span')->eq(1)->count()) {
            $content['datetime'] = $itemTitleInfo->filter('span')->eq(1)->text('???????? ????????????');
        }

        if ($itemTitleInfo->filter('span')->eq(2)->count()) {
            $content['views'] = $itemTitleInfo->filter('span')->eq(2)->text('???????? ????????????');
        }

        $content['images'] = $this->getImages($page->filter("#anItemData .itmedia"));

        $content['description'] = $page->filter('.ittext')->text('');
        $content['email'] = $page->filter('.itemail li')->eq(1)->text('');
        $content['author_name'] = $page->filter('.item_sipmleUser')->text('');
        $content['phones'] = $this->getPhones($page->filter('#item_phones'));

        return $content;

    }

    private function getPhones($phones)
    {
        $numbers = [];
        $phones->filter('li span')->each(function ($span) use (&$numbers) {
            if ($span->closest('li')->count()) {
                $numbers[] = str_replace(' ', '', $span->closest('li')->text(''));
            }
        });

        return $numbers;
    }

    private function getImages(Crawler $images)
    {
        $result = [];

        $images->filter('a')->each(function ($img) use (&$result) {
            $result[] = $img->attr('href');
        });

        return $result;
    }


}