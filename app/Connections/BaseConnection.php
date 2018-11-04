<?php


namespace App\Connections;

abstract class BaseConnection
{
    /**
     * @var
     */
    private $getVariables;
    /**
     * @var
     */
    private $URL;
    /**
     * @var
     */
    private $method;

    /**
     * @param $URL
     */
    protected function setURL($URL)
    {
        $this->URL = $URL;
    }

    /**
     *
     */
    protected function setPostMethod()
    {
        $this->method = 'POST';
    }

    /**
     *
     */
    protected function setGetMethod()
    {
        $this->method = 'GET';
    }

    /**
     * @param array $variables
     */
    protected function setGetVariables(array $variables)
    {
        $getVariables = array_map(function ($key, $value) {
            return "$key=$value";
        }, array_keys($variables), $variables);

        $this->getVariables = implode('&', $getVariables);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    protected function fetch()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "$this->URL?$this->getVariables",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            throw new \Exception($error);
        }
        return json_decode($response);
    }
}