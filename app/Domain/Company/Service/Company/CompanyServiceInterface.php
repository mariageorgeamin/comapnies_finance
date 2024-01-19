<?php

namespace App\Domain\Company\Service\Company;

use App\Domain\Company\Model\Company as CompanyModel;

interface CompanyServiceInterface
{
    public function create( array $parameters) : CompanyModel;

    public function get(string $symbol) :  CompanyModel;

    public function gatAll() : array;

}
