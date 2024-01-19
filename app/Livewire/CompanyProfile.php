<?php

namespace App\Livewire;

use App\Domain\Company\Service\Company\CompanyServiceInterface;
use Livewire\Component;

class CompanyProfile extends Component
{
    public $company;
    public function mount($symbol)
    {
        // Fetch company data from the database
        $this->company = resolve(CompanyServiceInterface::class)->get($symbol);
    }


    public function render()
    {
        return view('livewire.company-profile');
    }


}
