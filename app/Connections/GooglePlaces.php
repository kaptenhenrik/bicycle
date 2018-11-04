<?php


namespace App\Connections;


class GooglePlaces extends BaseConnection
{

    /**
     * @var
     */
    private $pageToken;
    /**
     * @var
     */
    private $keyword;
    /**
     * @var
     */
    private $radius;
    /**
     * @var
     */
    private $location;

    /**
     * GooglePlaces constructor.
     */
    public function __construct()
    {
        $this->setURL(env('GOOGLE_PLACES_URL'));
        $this->setKeyword('cykelbutik');
        $this->setGetMethod();
    }

    /**
     * @param $keyword
     */
    private function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * @return mixed
     */
    public function fetch()
    {
        $this->setGetVariables([
            'radius' => $this->radius,
            'keyword' => $this->keyword,
            'location' => $this->location,
            'pagetoken' => $this->pageToken,
            'key' => env('GOOGLE_PLACES_KEY')
        ]);
        return parent::fetch();
    }

    /**
     * @param $radius
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    /**
     * @param $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }

}
