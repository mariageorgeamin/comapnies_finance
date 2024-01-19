<?php

namespace App\Domain\Company\Service\Nasdaq;

interface NasdaqServiceInterface
{
    public function getOverview(array $parameters) :array;

    public function getStockData(array $parameters) :array;

    public function getData(string $url) :array;

}
