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
                                    Subject
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Destinatary
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Body
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Created At
                                </th>
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
                    ajax: "{{ route('emails.data') }}",
                    columns: [{
                            data: "DT_RowIndex",
                            "name": "DT_RowIndex",
                            "orderable": false,
                            "searchable": false
                        },

                        {
                            data: 'subject',
                            name: 'subject',
                            "searchable": false
                        },
                        {
                            data: 'destinatary',
                            name: 'destinatary'
                        },
                        {
                            data: 'body',
                            name: 'body'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },

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