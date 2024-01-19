<?php
namespace Tests\Unit;

use App\Domain\Company\Model\Company;
use App\Domain\Company\Repository\CompanyRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class CompanyRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateCompanySuccessfully()
    {
        $companyModelMock = Mockery::mock(Company::class);
        $companyRepository = new CompanyRepository($companyModelMock);

        $parameters = [
            'name' => 'Test Company',
            'symbol' => 'TEST',
            'logo' => 'test_logo.png',
            'description' => 'Test company description',
            'address' => 'Test company address',
            'owner_id' => 3
        ];

        $companyModelMock->shouldReceive('create')->once()->with([
            'name' => 'Test Company',
            'symbol' => 'TEST',
            'logo' => 'test_logo.png',
            'description' => 'Test company description',
            'address' => 'Test company address',
            'owner_id' => 3,
        ])->times(1)->andReturn(new Company($parameters));

        $result = $companyRepository->create($parameters);

        $this->assertInstanceOf(Company::class, $result);
        $this->assertEquals('Test Company', $result->name);
    }

    public function testCreateCompanyFails()
    {
        $this->expectException(\Exception::class);

        $companyModelMock = Mockery::mock(Company::class);
        $companyRepository = new CompanyRepository($companyModelMock);

        $parameters = [
            'name' => 'Test Company',
            'symbol' => 'TEST',
            'logo' => 'test_logo.png',
            'description' => 'Test company description',
            'address' => 'Test company address',
        ];

        $companyModelMock->shouldReceive('create')->andThrow(\Exception::class, 'Something went wrong');

        $companyRepository->create($parameters);
    }

    public function testGetCompanySuccessful()
    {
        $companyModelMock = Mockery::mock(Company::class);
        $companyRepository = new CompanyRepository($companyModelMock);

        $symbol = 'TEST';

        $companyModelMock->shouldReceive('where')->once()->with('symbol', 'TEST')->andReturnSelf();
        $companyModelMock->shouldReceive('with')->once()->with('owner')->andReturnSelf();
        $companyModelMock->shouldReceive('firstOrFail')->once()->andReturn(new Company(['symbol' => 'TEST']));

        $result = $companyRepository->get($symbol);

        $this->assertInstanceOf(Company::class, $result);
        $this->assertEquals('TEST', $result->symbol);
    }

    public function testGetCompanyNotFound()
    {
        $this->expectException(ModelNotFoundException::class);

        $companyModelMock = Mockery::mock(Company::class);
        $companyRepository = new CompanyRepository($companyModelMock);

        $symbol = 'symbol';

        $companyModelMock->shouldReceive('where')->once()->with('symbol', 'symbol')->andReturnSelf();
        $companyModelMock->shouldReceive('with')->once()->with('owner')->andReturnSelf();
        $companyModelMock->shouldReceive('firstOrFail')->once()->andThrow(ModelNotFoundException::class);

        $companyRepository->get($symbol);
    }

    public function testGetAllCompanies()
    {
        $companyModelMock = Mockery::mock(Company::class);
        $companyRepository = new CompanyRepository($companyModelMock);

        $companyModelMock->shouldReceive('paginate')->once()->with(10)->andReturnSelf();
        $companyModelMock->shouldReceive('items')->once()->andReturn(
            [
                new Company(['name' => 'Company 1']),
                new Company(['name' => 'Company 2']),
            ]
        );

        $result = $companyRepository->gatAll();

        $this->assertCount(2, $result);
        $this->assertEquals('Company 1', $result[0]->name);
        $this->assertEquals('Company 2', $result[1]->name);
    }

    public function testGetAllCompaniesNoData()
    {
        $companyModelMock = Mockery::mock(Company::class);
        $companyRepository = new CompanyRepository($companyModelMock);

        $companyModelMock->shouldReceive('paginate')->once()->with(10)->andReturnSelf();
        $companyModelMock->shouldReceive('items')->once()->andReturn([]);

        $result = $companyRepository->gatAll();

        $this->assertEquals([], $result);
    }
}
