<?php

namespace App\Livewire;

use App\Domain\Company\Service\Company\CompanyServiceInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyForm extends Component
{

    use WithFileUploads;
    protected $debug = true;
    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|string|max:255|unique:companies,symbol')]
    public $symbol;

    #[Validate('required|string')]
    public $description;

    #[Validate('required|string')]
    public $address;

    #[Validate('image|max:1024')]
    public $logo;

    public function render()
    {
        return view('livewire.company-form');
    }


    public function submitForm()
    {

        $this->validate();
        $logoPath = $this->logo ? $this->logo->store('logos') : null;
        $parameters = [
            'name' => $this->name,
            'symbol' => $this->symbol,
            'logo' => $logoPath,
            'description' => $this->description,
            'address' => $this->description,
            'owner_id' => Auth::id()
        ];
        $company = resolve(CompanyServiceInterface::class)->create($parameters);
        $this->reset();
        return redirect()->to("/company/{$company->symbol}");

    }
}
