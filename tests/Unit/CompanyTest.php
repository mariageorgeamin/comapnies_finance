<?php

namespace Tests\Unit;

use App\Domain\Company\Model\Company;
use App\Domain\User\Model\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableAttributes()
    {
        $fillable = ['name', 'logo', 'description', 'address', 'owner_id', 'symbol'];
        $company = new Company();

        $this->assertEquals($fillable, $company->getFillable());
    }

    public function testLogoAttributeAccessor()
    {
        // Test with known symbols
        $company = new Company(['symbol' => 'AAPL', 'logo' => 'apple_logo.png']);
        $this->assertEquals('apple_logo.png', $company->logo);

        $company = new Company(['symbol' => 'IBM', 'logo' => 'ibm_logo.png']);
        $this->assertEquals('ibm_logo.png', $company->logo);

        $company = new Company(['symbol' => 'MSFT', 'logo' => 'msft_logo.png']);
        $this->assertEquals('msft_logo.png', $company->logo);

        // Test with unknown symbol
        $company = new Company(['symbol' => 'XYZ', 'logo' => 'xyz_logo.png']);
        $this->assertEquals('storage/xyz_logo.png', $company->logo);
    }

    public function testOwnerRelationship()
    {
        $user = User::factory()->create();
        $company = Company::factory()->create(['owner_id' => $user->id]);

        $this->assertInstanceOf(User::class, $company->owner);
        $this->assertEquals($user->id, $company->owner->id);
    }


    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
