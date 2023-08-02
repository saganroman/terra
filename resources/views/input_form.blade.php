<x-app-layout>

    <div class="py-12">
        <div class="max-w-3xl mx-auto p-6">
            <h1 class="text-2xl font-bold mb-4">Input Form</h1>
            <form action="/handle-input-form" method="post">
                {{csrf_field()}}
                <div class="mb-4">
                    <label for="input1" class="block text-gray-700 font-bold mb-2">A:</label>
                    <input id="input1" name="input1"
                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                           value="{{ old('input1') }}" required>
                    @error('input1')
                    <p class="text-red-700 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="input2" class="block text-gray-700 font-bold mb-2">B:</label>
                    <input type="number" id="input2" name="input2"
                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                           value="{{ old('input2') }}">
                    @error('input2')
                    <p class="text-red-700 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="input3" class="block text-gray-700 font-bold mb-2">C:</label>
                    <input type="number" id="input3" name="input3"
                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                           value="{{ old('input3') }}" required>
                    @error('input3')
                    <p class="text-red-700 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                @error('failure')
                <p class="text-red-800 mt-1">{{ $message }}</p>
                @enderror
                <button type="submit"
                        class="bg-red-500 font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
