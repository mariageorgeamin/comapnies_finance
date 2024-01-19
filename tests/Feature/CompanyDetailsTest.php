<?php

namespace Tests\Feature;

use App\Livewire\CompanyDetails;
use App\Domain\Company\Service\Nasdaq\NasdaqServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class CompanyDetailsTest extends TestCase
{
    use RefreshDatabase;

    public function testCompanyDetailsComponentRendersWithData()
    {
        // Mocking external service response
        Http::fake([
            config('services.iex.url') . '/stable/stock/AAPL/quote?token=' . config('services.iex.key') => Http::response([
                'companyName' => 'Test Company',
                'symbol' => 'TEST',
                'latestPrice' => 100.0,
                'change' => 5.0,
                'changePercent' => 5.0,
                'latestVolume' => 100000,
                'open' => 95.0,
                'high' => 105.0,
                'low' => 90.0,
                'avgTotalVolume' => 150000,
                'marketCap' => 1000000,
                'currency' => 'USD',
            ], 200),
        ]);

        // Creating Livewire component and rendering it
        $response = Livewire::test(CompanyDetails::class, ['symbol' => 'AAPL']);

        // Assert that the Livewire component renders successfully
        $response->assertStatus(200);

        // Assert that specific content is present on the rendered page
        $response->assertSee('Test Company (TEST)');
        $response->assertSee('Change: $5');
        $response->assertSee('Volume: 100000');
        $response->assertSee('Open: $95');
        $response->assertSee('$105');
        $response->assertSee('90');
        $response->assertSee('$150000');
        $response->assertSee('$1000000');
    }

    public function testCompanyDetailsComponentDoesNotRenderWithoutData()
    {
        // Creating Livewire component and rendering it without mocking the external service response

        // Creating Livewire component and rendering it
        $response = Livewire::test(CompanyDetails::class, ['symbol' => 'AAPL']);

        // Assert that the Livewire component renders successfully
        $response->assertStatus(200);

        // Assert that specific content is NOT present on the rendered page
        $response->assertDontSee('Test Company (TEST)');
        $response->assertDontSee('Change: $5');
        $response->assertDontSee('Volume: 100000');
        $response->assertDontSee('Open: $95');
        $response->assertDontSee('High: $105');
        $response->assertDontSee('Low: 90');
        $response->assertDontSee('Avgerage Total Volume: $150000');
        $response->assertDontSee('Market Capacity: $1000000');
    }
}
