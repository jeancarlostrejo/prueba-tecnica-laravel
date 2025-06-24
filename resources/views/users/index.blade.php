<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Dismiss Alert --}}
                @if (session('success'))
                    <div x-data="{ open: true }" x-show="open"
                        class="relative bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
                        role="alert">
                        <strong class="font-bold">{{ session('success') }}</strong>
                        <button @click="open = false" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-700">
                            <span class="text-lg font-bold">×</span>
                        </button>
                    </div>
                @endif

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Users List') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
