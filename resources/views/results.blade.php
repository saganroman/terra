<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Results</h1>

        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">High</th>
                    <th class="px-4 py-2">Average</th>
                    <th class="px-4 py-2">Low</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                    <tr>
                        <td class="border px-4 py-2">{{ $result->id }}</td>
                        <td class="border px-4 py-2">{{ $result->high }}</td>
                        <td class="border px-4 py-2">{{ $result->average }}</td>
                        <td class="border px-4 py-2">{{ $result->low }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $results->links() }}
        </div>
    </div>
</x-app-layout>
