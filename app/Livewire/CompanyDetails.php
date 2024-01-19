<?php

namespace App\Livewire;
use App\Domain\Company\Service\Nasdaq\NasdaqServiceInterface;
use Livewire\Component;

class CompanyDetails extends Component
{
    public $symbol, $companyOverview;

    public function mount(string $symbol)
    {
        $this->symbol = $symbol;
        $this->getCompanyOverview();
    }

    public function render()
    {
        return view('livewire.company-details');
    }

    public function getCompanyOverview() : void
    {
        $parameters = [
            'symbol' => $this->symbol,
        ];

        $result = resolve(NasdaqServiceInterface::class)->getOverview($parameters);

        if(!array_key_exists('Information',$result['data']))
            $this->companyOverview = $result['data'] ?? null;
    }
}
