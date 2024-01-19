<?php

namespace Tests\Unit;

use App\Domain\Company\Service\Nasdaq\NasdaqService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class NasdaqServiceTest extends TestCase
{
    public function testGetDataHandlesClientError()
    {
        // Mocking Http facade
        $nasdaqService = new NasdaqService();

        // Mocking the Http::get method with a fake server error response
        Http::fake([
                config('services.alphavantage.url') => Http::response(null, 400),
        ]);
        $url = config('services.alphavantage.url')."?function=OVERVIEW&symbol=IBM&apikey="."demo";

        $result = $nasdaqService->getData($url);

        $this->assertEquals(['data' => null, 'status' => 400], $result);
    }

    public function testGetDataHandlesServerError()
    {
        // Mocking Http facade
        $nasdaqService = new NasdaqService();

        // Mocking the Http::get method with a fake server error response
        Http::fake([
                config('services.alphavantage.url') => Http::response(['error' => 'Server Error'], 500),
        ]);
        $url = config('services.alphavantage.url')."?function=OVERVIEW&symbol=IBM&apikey="."demo";

        $result = $nasdaqService->getData($url);
        $this->assertEquals(['data' => ['error' => 'Server Error'], 'status' => 500], $result);

    }

    public function testGetDataHandlesSuccessfulResponse()
    {
        $nasdaqService = new NasdaqService();
        // Arrange
        Http::fake([
            config('services.alphavantage.url') => Http::response(['response' => 'IBM'], 200),
        ]);

        // Act
        $url = config('services.alphavantage.url')."?function=OVERVIEW&symbol=IBM&apikey="."demo";

        $result = $nasdaqService->getData($url);

        // Assert
        $this->assertEquals(['data' => ['response' => 'APPL'], 'status' => 200], $result);

    }

    public function testGetOverviewSuccessfulResponse()
    {
         // Mocking Http facade
         Http::fake();

         // Mocking config values
         Config::set('services.alphavantage.url', 'https://www.alphavantage.co/stock/query');
         Config::set('services.alphavantage.key', 'demo');

         // Mocking NasdaqService and the getData method
         $nasdaqServiceMock = $this->getMockBuilder(NasdaqService::class)
             ->onlyMethods(['getData'])
             ->getMock();

         // Expecting the getData method to be called with the correct URL
         $nasdaqServiceMock->expects($this->once())
             ->method('getData')
             ->with('https://www.alphavantage.co/stock/query?function=TIME_SERIES_DAILY&symbol=IBM&apikey=demo')
             ->willReturn(['data' => 'fake_data', 'status' => 200]);

         // Call the actual method
         $parameters = ['symbol' => 'IBM'];
         $result = $nasdaqServiceMock->getOverview($parameters);

         // Assertions
         $this->assertEquals(['data' => 'fake_data', 'status' => 200], $result);
    }

    public function testGetStockDataSuccessfulResponse()
    {
        // Mocking Http facade
        Http::fake();

        // Mocking config values
        Config::set('services.alphavantage.url', 'https://www.alphavantage.co/stock/query');
        Config::set('services.alphavantage.key', 'demo');

        // Mocking NasdaqService and the getData method
        $nasdaqServiceMock = $this->getMockBuilder(NasdaqService::class)
            ->onlyMethods(['getData'])
            ->getMock();

        // Expecting the getData method to be called with the correct URL
        $nasdaqServiceMock->expects($this->once())
            ->method('getData')
            ->with('https://www.alphavantage.co/stock/query?function=TIME_SERIES_DAILY&symbol=IBM&apikey=demo')
            ->willReturn(['data' => 'fake_data', 'status' => 200]);

        // Call the actual method
        $parameters = ['symbol' => 'IBM'];
        $result = $nasdaqServiceMock->getStockData($parameters);

        // Assertions
        $this->assertEquals(['data' => 'fake_data', 'status' => 200], $result);

    }

}
