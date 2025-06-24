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


                    {{-- DataTable --}}
                    <table id="users-table" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th>#</th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Identifier
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Phone
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    DNI
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Birthdate
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Age
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    City
                                </th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            {{-- DataTables will populate this section --}}
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <x-slot name="javascript">
        <script type="module">
            $(document).ready(function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('users.data') }}",
                    columns: [{
                            data: "DT_RowIndex",
                            "name": "DT_RowIndex",
                            "orderable": false,
                            "searchable": false
                        },

                        {
                            data: 'identifier',
                            name: 'identifier',
                            "searchable": false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'dni',
                            name: 'dni'
                        },
                        {
                            data: 'birth_date',
                            name: 'birth_date',
                            "searchable": false
                        },
                        {
                            data: 'age',
                            name: 'age',
                            "orderable": false,
                            "searchable": false
                        },
                        {
                            data: 'city_name',
                            name: 'city_name',
                            "searchable": false
                        },
                        {
                            data: "action",
                            "orderable": false,
                            "searchable": false
                        }

                    ],
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 15, 20, 50, 100]
                });
            });
        </script>
    </x-slot>
</x-app-layout>
