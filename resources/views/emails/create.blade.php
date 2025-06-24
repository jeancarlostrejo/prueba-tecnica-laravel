<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Email') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('emails.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="subject"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Subject') }}</label>
                            <input type="text" id="subject" name="subject"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200"
                                value="{{ old('subject') }}">
                            @error('subject')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-4">
                            <label for="destinatary"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Destinatary') }}</label>
                            <input type="text" id="destinatary" name="destinatary"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200"
                                value="{{ old('destinatary') }}">
                            @error('destinatary')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="body"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Body') }}</label>
                            <textarea id="body" name="body" rows="4"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">{{ __('Send Email') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
