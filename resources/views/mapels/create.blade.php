<x-app-layout>
    <div class="p-6">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('mapels.index')}}">
                    <button
                        class="mb-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Tambah Data Mata Pelajaran
                </h4>
                
                @php
                    // dd($siswas);
                @endphp

                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('mapels.store') }}" method="POST" 
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Nama Mata Pelajaran</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="nama_mapel" placeholder="Nama Mata Pelajaran..." />
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