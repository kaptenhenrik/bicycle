<?php


namespace App;

class Request
{

    /**
     * @var
     */
    private $request;

    /**
     * Request constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getURL()
    {
        return "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return parse_url($this->request['REQUEST_URI'])['path'];
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->request['REQUEST_METHOD'];
    }

    /**
     * @param null $string
     * @return mixed
     */
    public function getQueryString($string = null)
    {
        return $string ? array_get($string, $_GET) : $this->request['QUERY_STRING'];
    }
}