<?php

namespace Tests\Feature;

use App\Domain\Company\Model\Company;
use App\Domain\Company\Service\Company\CompanyServiceInterface;
use App\Domain\User\Model\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Mockery;
use Tests\TestCase;

class CompanyProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the company profile Livewire component renders correctly.
     *
     * @return void
     */
    public function testCompanyProfileComponentRendersWithData()
    {
        $user = User::factory()->make([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
        // Create a mock for the CompanyServiceInterface
        $companyServiceMock = Mockery::mock(CompanyServiceInterface::class);
        $companyServiceMock->shouldReceive('get')->andReturnUsing(function ($symbol) use ($user) {
            $company = Company::factory()->make([
                'symbol' => $symbol,
                'name' => 'Test Company',
                'description' => 'Test Description',
                'address' => 'Test Address',
            ]);
            $company->owner = $user;
            return $company;
        });

        $this->app->instance(CompanyServiceInterface::class, $companyServiceMock);

        Livewire::test('company-profile', ['symbol' => 'TEST'])
            ->assertSeeHtml('Test Company')
            ->assertSeeHtml('Test Description')
            ->assertSeeHtml('Test Address')
            ->assertSeeHtml('John Doe')
            ->assertSeeHtml('john@example.com')
            ->assertSeeLivewire('company-details')
            ->assertSeeLivewire('company-historical-data');
    }
}
