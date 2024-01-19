<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Livewire\CompanyStockData;
use App\Domain\Company\Service\Nasdaq\NasdaqServiceInterface;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;

class CompanyStockDataTest extends TestCase
{
    use RefreshDatabase;

    public function testCompanyStockDataTestComponentRendersWithData()
    {
        Http::fake([
            config('services.iex.url') . '/v1/data/core/historical_prices/AAPL?range=1m&token=' . config('services.iex.key') => Http::response([
                [
                    'priceDate' => '2023-01-01',
                    'open' => 100.0,
                    'high' => 105.0,
                    'low' => 95.0,
                    'close' => 102.0,
                    'volume' => 100000,
                ],
            ], 200),
        ]);

        $response = Livewire::test(CompanyStockDataTest::class, ['symbol' => 'AAPL']);

        $response->assertStatus(200);

        $response->assertSeeHtml('2023-01-01');
        $response->assertSeeHtml('100');
        $response->assertSeeHtml('105');
        $response->assertSeeHtml('95');
        $response->assertSeeHtml('102');
        $response->assertSeeHtml('100000');
    }

    public function testCompanyStockDataTestComponentDoesNotRenderWithoutData()
    {
        $response = Livewire::test(CompanyStockDataTest::class, ['symbol' => 'INVALID_SYMBOL']);

        $response->assertStatus(200);

        $response->assertSeeHtml('symbol is not valid');
    }
}
