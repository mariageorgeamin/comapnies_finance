<?php

namespace App\Domain\Company\Repository;

use App\Domain\Company\Model\Company as CompanyModel;

interface CompanyRepositoryInterface
{
    public function create( array $parameters) : CompanyModel;
    public function get(string $symbol) :  CompanyModel;
    public function gatAll(): array;

}
