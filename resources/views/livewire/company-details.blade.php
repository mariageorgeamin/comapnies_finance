<div class="flex flex-wrap justify-evenly items-center p-6 mx-md " wire:poll.60s>
    @if($companyOverview)
        <div class="max-w-md  bg-white shadow-md rounded-md p-6 basis-full lg:basis-1/3 my-1">
            <h1 class="text-2xl font-semibold mb-4">{{ $companyOverview['Name'] }} ({{ $companyOverview['Symbol'] }})</h1>

            <div>
                <p class="text-gray-600">Revenue Per Share TTM: ${{ $companyOverview['RevenuePerShareTTM'] }}</p>
                <p class="text-gray-600">Profit Margin: ${{ $companyOverview['ProfitMargin'] }}</p>
                <!-- Add more data points as needed -->
            </div>
        </div>
        <div class="max-w-md bg-white shadow-md rounded-md p-6 basis-full lg:basis-1/3 my-1">
            <h1 class="text-2xl font-semibold mb-4">{{ $companyOverview['Name'] }} ({{ $companyOverview['Symbol'] }})</h1>

            <div>
                <p class="text-gray-600">52 Week High: ${{ $companyOverview['52WeekHigh'] }}</p>
                <p class="text-gray-600">52 Week Low: {{ $companyOverview['52WeekLow'] }}</p>
                <!-- Add more data points as needed -->
            </div>
        </div>
        <div class="max-w-md bg-white shadow-md rounded-md p-6 basis-full lg:basis-1/3 my-1">
            <h1 class="text-2xl font-semibold mb-4">{{ $companyOverview['Name'] }} ({{ $companyOverview['Symbol'] }})</h1>

            <div>
                <p class="text-gray-600">Market Capitalization: ${{ $companyOverview['MarketCapitalization'] }} </p>
                <p class="text-gray-600">Currency: {{ $companyOverview['Currency'] }}</p>
                <!-- Add more data points as needed -->
            </div>
        </div>
    @endif
</div>
