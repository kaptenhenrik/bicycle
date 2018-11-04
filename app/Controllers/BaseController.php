<?php


namespace App\Controllers;

class BaseController
{
    public function respond($data, $type = 'json')
    {
        if ($type == 'json') {
            header('Content-type: application/json');
            return json_encode($data);
        }
        return $data;
    }

}