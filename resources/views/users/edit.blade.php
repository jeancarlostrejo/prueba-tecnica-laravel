<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold mb-6">Edit User: {{ $user->name }} </h1>
        <form method="POST" action="#">
            @csrf

            {{-- Identifier --}}
            <div class="mb-4">
                <label for="identifier" class="block text-sm font-medium text-gray-700">Identifier</label>
                <input type="text" name="identifier" id="identifier"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('identifier', $user->identifier) }}">
                @error('identifier')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-gray-400 focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('email', $user->email) }}" disabled>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Name --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('name', $user->name) }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Phone --}}
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('phone', $user->phone) }}">
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- DNI --}}
            <div class="mb-4">
                <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
                <input type="text" id="dni"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-gray-400 focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('dni', $user->dni) }}" disabled>
                @error('dni')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Birth Date --}}
            <div class="mb-4">
                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                <input type="date" name="birth_date" id="birth_date"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('birth_date', $user->birth_date->format('Y-m-d')) }}">
                @error('birth_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Country --}}
            <div class="mb-4">
                <label for="country_id" class="block text-sm font-medium text-gray-700">Country</label>
                <select name="country_id" id="country"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select a Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}"
                            {{ old('country_id', $user->city->state->country->id) == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- State --}}
            <div class="mb-4">
                <label for="state_id" class="block text-sm font-medium text-gray-700">State</label>
                <select name="state_id" id="state"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select a state</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}"
                            {{ old('state_id', $user->city->state->id) == $state->id ? 'selected' : '' }}>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
                @error('state_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- City --}}
            <div class="mb-4">
                <label for="city_id" class="block text-sm font-medium text-gray-700">City</label>
                <select name="city_id" id="city"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select a city</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}"
                            {{ old('city_id', $user->city->id) == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
                @error('city_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Update
                </button>

                <a href="{{ route('users.index') }}"
                    class="ml-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <x-slot name="javascript">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const countrySelect = document.getElementById('country');
                const stateSelect = document.getElementById('state');
                const citySelect = document.getElementById('city');

                // Función para cargar opciones en un select
                function loadOptions(selectElement, data) {
                    selectElement.innerHTML = '<option value="">Select a ' + selectElement.id + '</option>';
                    data.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.id;
                        option.textContent = item.name;
                        selectElement.appendChild(option);
                    });
                    selectElement.disabled = false;
                }

                // Manejar cambio en el select de País
                countrySelect.addEventListener('change', function() {
                    const countryId = this.value;
                    if (countryId) {
                        fetch(`/states/${countryId}`)
                            .then(response => response.json())
                            .then(data => {
                                loadOptions(stateSelect, data);

                                // Limpiar y deshabilitar el select de Ciudad cuando se cambia el País
                                citySelect.innerHTML = '<option value="">Selecciona una ciudad</option>';
                                citySelect.disabled = true;
                            })
                            .catch(error => console.error('Error to get states:', error));
                    } else {
                        stateSelect.innerHTML = '<option value="">Select a state</option>';
                        stateSelect.disabled = true;
                        citySelect.innerHTML = '<option value="">Select a city</option>';
                        citySelect.disabled = true;
                    }
                });

                // Manejar cambio en el select de Estado
                stateSelect.addEventListener('change', function() {
                    const stateId = this.value;
                    if (stateId) {
                        fetch(`/cities/${stateId}`)
                            .then(response => response.json())
                            .then(data => {
                                loadOptions(citySelect, data);
                            })
                            .catch(error => console.error('Error to get cities: ', error));
                    } else {
                        citySelect.innerHTML = '<option value="">Select a city</option>';
                        citySelect.disabled = true;
                    }
                });

                // Mantener selecciones previas en caso de error de validación
                // Para el país, simplemente se selecciona si hay un valor antiguo
                if ('{{ old('country_id') }}') {
                    countrySelect.value = '{{ old('country_id') }}';
                    // Trigger change para cargar los estados
                    countrySelect.dispatchEvent(new Event('change'));
                }

                // Para el estado y la ciudad, debemos esperar que las opciones se carguen dinámicamente
                const oldStateId = '{{ old('state_id') }}';
                const oldCityId = '{{ old('city_id') }}';

                if (oldStateId) {
                    const checkStateInterval = setInterval(() => {
                        // Si ya se cargaron los estados
                        if (stateSelect.options.length > 1) {
                            stateSelect.value = oldStateId;
                            // Trigger change para cargar las ciudades
                            stateSelect.dispatchEvent(new Event(
                                'change'));
                            clearInterval(checkStateInterval);
                        }
                    }, 100);
                }

                if (oldCityId) {
                    const checkCityInterval = setInterval(() => {
                        // Si ya se cargaron las ciudades
                        if (citySelect.options.length > 1) {
                            citySelect.value = oldCityId;
                            clearInterval(checkCityInterval);
                        }
                    }, 100);
                }
            });
        </script>
    </x-slot>
</x-app-layout>
