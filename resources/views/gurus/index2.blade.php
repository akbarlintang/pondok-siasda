<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('siswas.add') }}" method="POST">
                        @csrf
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Masukkan Tahun Masuk</span>
                            <input type="integer"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="tahun" id="tahun" placeholder="Tahun Masuk..." />
                        </label>

                        <div class="mt-5">
                            <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Tambah</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>