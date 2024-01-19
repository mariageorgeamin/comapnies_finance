<div class="p-6 mx-auto overflow-x-auto">
    @if($companyStocks)
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Open</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">High</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Low</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Close</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Volume</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($companyStocks['Time Series (Daily)'] as $key => $item)
                    <tr>
                        <td class="px-6 py-2 sm:py-4 whitespace-no-wrap">{{ $key }}</td>
                        <td class="px-6 py-2 sm:py-4 whitespace-no-wrap">{{ $item['1. open'] }}</td>
                        <td class="px-6 py-2 sm:py-4 whitespace-no-wrap">{{ $item['2. high'] }}</td>
                        <td class="px-6 py-2 sm:py-4 whitespace-no-wrap">{{ $item['3. low'] }}</td>
                        <td class="px-6 py-2 sm:py-4 whitespace-no-wrap">{{ $item['4. close'] }}</td>
                        <td class="px-6 py-2 sm:py-4 whitespace-no-wrap">{{ $item['5. volume'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class = "text-center"> This Company symbol is not valid ( the api for demo allows only one symbol IBM and the api free key allows only 25 requests per day )</p>
    @endif
</div>
