    <form wire:submit="submitForm" class="bg-gray shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Company Name</label>
                        <input wire:model="name" type="text" id="name"
                               class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               required>
                        @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <label for="symbol" class="block text-gray-700 text-sm font-bold mb-2">Company symbol</label>
                        <input wire:model="symbol" type="text" id="symbol"
                               class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               required>
                        @error('symbol') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Company
                            Description</label>
                        <textarea wire:model="description" id="description"
                                  class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                  required></textarea>
                        @error('description') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

        </div>

        <div class="mb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Company Address</label>
                        <input wire:model="address" type="text" id="address"
                               class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               required>
                        @error('address') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">Company Logo</label>
                        <input wire:model="logo" type="file" id="logo"
                               class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               accept="image/*">
                        @error('logo') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
