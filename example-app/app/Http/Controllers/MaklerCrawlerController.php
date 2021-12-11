<?php

namespace App\Http\Controllers;

use App\Services\MaklerCrawlerService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MaklerCrawlerController extends Controller
{
    public function index(MaklerCrawlerService $service): Factory|View|Application
    {

        $shortDescriptions = $service->getShortDescriptions();

        return view('short_articles', ['short_descriptions' => $shortDescriptions]);
    }

    public function fullDescriptions(Request $request, MaklerCrawlerService $service): Factory|View|Application
    {

        $fullDescriptions = $service->getFullDescriptions($reload);

        dd($fullDescriptions);

        return view('full_articles', ['full_descriptions' => $fullDescriptions]);
    }
}

