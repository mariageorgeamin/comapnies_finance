<?php

namespace App\Domain\Company\Service\Nasdaq;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NasdaqService implements NasdaqServiceInterface
{
    public function  __construct(){}

    public function getOverview(array $parameters) :array
    {
        $symbol = $parameters['symbol'];

        // Standard API rate limit is 25 requests per day.
//         $url = config('services.alphavantage.url')."?function=OVERVIEW&symbol={$symbol}&apikey=". config('services.alphavantage.key');

        $url = config('services.alphavantage.url')."?function=OVERVIEW&symbol={$symbol}&apikey="."demo";

        //This cache is cleared daily by a cron job to get any new info
        return Cache::get('overview', function () use ($url) {
            return $this->getData($url);
        });
    }

    public function getStockData(array $parameters) :array
    {
        $symbol = $parameters['symbol'];

        // Standard API rate limit is 25 requests per day.
//         $url = config('services.alphavantage.url')."?function=TIME_SERIES_DAILY&symbol={$symbol}&apikey=". config('services.alphavantage.key');

        $url = config('services.alphavantage.url')."?function=TIME_SERIES_DAILY&symbol={$symbol}&apikey="."demo";

        //This cache is cleared daily by a cron job to get the new date stock data
        return Cache::get('stock-data', function () use ($url) {
            return $this->getData($url);
        });
    }

    public function getData(string $url) :array
    {
        $response = Http::get($url);
        if($response->clientError())
            Log::error(__CLASS__.' '.__FUNCTION__." ClientException", ['response' => ['status' => 400 , 'data' => $response]]);
        if($response->serverError())
            Log::error(__CLASS__.' '.__FUNCTION__." ServerException", ['response' => ['status' => 500 , 'data' => $response]]);
        if(array_key_exists('Information',$response->json()))
            Log::error(__CLASS__.' '.__FUNCTION__." ServerException", ['response' => ['status' => 500 , 'data' => $response->json()]]);
        return [
            'data' => $response->json(),
            'status' => $response->status()
        ];
    }



}
