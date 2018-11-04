<?php

namespace App\Controllers;

use App\Connections\GooglePlaces;
use App\Models\Shop;
use App\Request;

class BicycleShopController extends BaseController
{
    /**
     * @var Request
     */
    private $request;

    /**
     * BicycleShopController constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $googlePlaces = new GooglePlaces();
        $googlePlaces->setPageToken($this->request->getQueryString('page_token'));
        $googlePlaces->setRadius($this->request->getQueryString('radius') ?? '2000');
        $googlePlaces->setLocation($this->request->getQueryString('location') ?? '59.3323565,18.0623562');

        $response = $googlePlaces->fetch();

        $shops = array_map(function ($item) {
            return ((new Shop($item->name, $item->vicinity))->ApiTransformer());
        }, $response->results);

        return $this->respond([
            'next_page_token' => isset($response->next_page_token) ? $response->next_page_token : null,
            'shops' => $shops
        ], 'json');
    }

}