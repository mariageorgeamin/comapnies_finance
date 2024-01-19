<?php

namespace Tests\Unit;

use App\Domain\Company\Model\Company;
use App\Domain\User\Model\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableAttributes()
    {
        $fillable = ['name', 'email', 'password'];
        $user = new User();

        $this->assertEquals($fillable, $user->getFillable());
    }

    public function testHiddenAttributes()
    {
        $hidden = ['password', 'remember_token'];
        $user = new User();

        $this->assertEquals($hidden, $user->getHidden());
    }
    public function testCompaniesRelationship()
    {
        $user = User::factory()->create();
        $company1 = Company::factory()->create(['owner_id' => $user->id]);
        $company2 = Company::factory()->create(['owner_id' => $user->id]);

        $this->assertInstanceOf(Company::class, $user->companies->first());
        $this->assertCount(2, $user->companies);
        $this->assertEquals($user->id, $user->companies->first()->owner_id);
    }

    public function testPasswordHashing()
    {
        $password = 'secret';
        $user = User::factory()->create(['password' => Hash::make($password)]);

        $this->assertTrue(Hash::check($password, $user->password));
    }


    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
