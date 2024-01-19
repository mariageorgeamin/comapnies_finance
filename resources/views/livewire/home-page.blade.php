<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div class="flex flex-wrap justify-center p-6">
                @forelse($companies as $company)
                    <a href="{{ route('company-details', $company->symbol) }}" wire:navigate class="max-w-md mx-4 my-4 bg-white overflow-hidden shadow-md rounded-md w-80">
                        <img src="{{ asset($company->logo) }}" alt="{{ $company->name }} Logo" class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $company->name }}</h3>
                            <p class="text-gray-600">{{ $company->description }}</p>
                        </div>
                    </a>
                @empty
                    <p>No Companies</p>
                @endforelse
            </div>
        </div>

    </div>
</div>
