<?php

namespace App\Domain\Company\Repository;

use App\Domain\Company\Model\Company as CompanyModel;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function  __construct(public CompanyModel $companyModel){}

    public function create( array $parameters) : CompanyModel
    {
        return $this->companyModel->create([
            'name' => $parameters['name'],
            'symbol' => $parameters['symbol'],
            'logo' => $parameters['logo'],
            'description' => $parameters['description'],
            'address' => $parameters['address'],
            'owner_id' => $parameters['owner_id']
        ]);
    }

    public function get(string $symbol) : CompanyModel
    {
        return  $this->companyModel->where('symbol' , $symbol)->with('owner')->firstOrFail();
    }

    public function gatAll() : array
    {
        return $this->companyModel->paginate(10)->items();
    }

}
