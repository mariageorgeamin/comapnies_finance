<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div class="flex flex-col sm:flex-row mx-auto p-6 ">
                <div class="text-center mb-6 sm:mb-0 sm:mr-6 basis-1/3">
                    <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} Logo"
                         class="rounded-full h-80 w-80 mx-auto mb-2">
                </div>
                <div class="basis-2/3 pt-6">
                    <div class="mb-4">
                        <h1 class="text-5xl font-bold font-mono text-gray-600">{{ $company->name }}</h1>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-700 text-2xl">{{ $company->description }}</p>
                    </div>
                    <div class="mb-4 flex flex-row items-center">
                        <img src="{{ asset('images/icons/location.png') }}" alt="" class="w-5 h-4 pr-1 fill-current">
                        <p class="text-gray-700">{{ $company->address }}</p>
                    </div>
                    <div class="mb-4 flex flex-row items-center">
                        <img src="{{ asset('images/icons/manager.png') }}" alt="" class="w-5 h-4 pr-1 fill-current">
                        <p class="text-gray-700">{{ $company->owner->name }}</p>
                    </div>
                    <div class="mb-4 flex flex-row items-center">
                        <img src="{{ asset('images/icons/gmail.png') }}" alt="" class="w-5 h-4 pr-1 fill-current">
                        <p class="text-gray-700">{{ $company->owner->email }}</p>
                    </div>
                </div>
            </div>

            <livewire:company-details :symbol="$company->symbol"/>

            <livewire:company-stock-data :symbol="$company->symbol"/>
        </div>
    </div>
</div>
