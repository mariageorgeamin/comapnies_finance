<?php

namespace App\Livewire;

use Livewire\Component;
use App\Domain\Company\Service\Nasdaq\NasdaqServiceInterface;

class CompanyStockData extends Component
{

    public $symbol;
    public $companyStocks;
    public function mount($symbol)
    {
        $this->symbol = $symbol;
        $this->getcompanyStocks();
    }

    public function render()
    {
        return view('livewire.company-stock-data');
    }

    public function getcompanyStocks() : void
    {
        $parameters = [
            'symbol' => $this->symbol,
        ];
        $result = resolve(NasdaqServiceInterface::class)->getStockData($parameters);

        if(!array_key_exists('Information',$result['data']))
            $this->companyStocks = $result['data'] ?? [];
    }
}
