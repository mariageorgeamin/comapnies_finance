<?php

namespace Database\Seeders;

use App\Domain\Company\Model\Company;
use App\Domain\User\Model\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name'        => 'IBM',
                'logo'        => "logos/IBM.jpg",
                'description' => "Our clients systems support modern society. In making them faster, more productive, and more secure, we do not just make business work better. We make the world work better.",
                'address'     => 'Armonk, New York, United States',
                'owner_id'    => User::first()->value('id'),
                'symbol'      => 'IBM',
            ],
            [
                'name'        => 'Apple',
                'logo'        => "logos/Apple.png",
                'description' => "Apple hardware, software, and services work together to give you and your employees the power and flexibility to do whatever needs doing — whether you’re a small business or enterprise.",
                'address'     => 'Cupertino, California, United States',
                'owner_id'    => User::first()->value('id'),
                'symbol'      => 'AAPL',
            ],
            [
                'name'        => 'Microsoft',
                'logo'        => "logos/Microsoft.png",
                'description' => "Microsoft Corporation is an American multinational technology corporation headquartered in Redmond, Washington. Microsoft's best-known software products are the Windows line of operating systems, the Microsoft 365 suite of productivity applications.",
                'address'     => 'Redmond, Washington, United States',
                'owner_id'    => User::first()->value('id'),
                'symbol'      => 'MSFT',
            ],
        ];

        Company::insert($companies);

    }
}
