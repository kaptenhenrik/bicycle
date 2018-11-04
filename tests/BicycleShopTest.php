<?php


use PHPUnit\Framework\TestCase;

final class BicycleShopTest extends TestCase
{

    /**
     * Unit Test
     */
    function testCanCreateAShop()
    {
        $shop = new \App\Models\Shop('name', 'vicinity');
        $this->assertInstanceOf(\App\Models\Shop::class, $shop);
    }

    /**
     * Feature Test
     */
    public function testBicycleIndex()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => env('HOST_NAME'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);
        curl_exec($curl);
        $error = curl_error($curl);
        if ($error) {
            $this->fail($error);
        }
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->assertEquals(200, $httpStatus);

        curl_close($curl);
    }

}