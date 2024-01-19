<?php

namespace App\Domain\Company\Service\Company;

use App\Domain\Company\Model\Company as CompanyModel;
use App\Domain\Company\Repository\CompanyRepositoryInterface;

class CompanyService implements CompanyServiceInterface
{
    public function  __construct(public CompanyRepositoryInterface $companyRepo){}

    public function create( array $parameters) : CompanyModel
    {
        return $this->companyRepo->create($parameters);
    }

    public function get(string $symbol) :  CompanyModel
    {
        return  $this->companyRepo->get($symbol);
    }

    public function gatAll() : array
    {
        return $this->companyRepo->gatAll();
    }

}
