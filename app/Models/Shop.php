<?php

namespace App\Models;


class Shop
{
    private $name;
    private $vicinity;

    /**
     * Shop constructor.
     * @param $name
     * @param $vicinity
     */
    public function __construct($name, $vicinity)
    {
        $this->name = $name;
        $this->vicinity = $vicinity;
    }

    /**
     * @return array
     */
    public function ApiTransformer()
    {
        return [
            'name' => $this->getName(),
            'address' => $this->getVicinity()
        ];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getVicinity()
    {
        return $this->vicinity;
    }

}