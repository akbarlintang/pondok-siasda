<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mb-2 mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-700">
            <main class="h-full pb-16 overflow-y-auto">
                <a href="{{ route('presensikbms.tanggal', [$jenjang, $tingkatan, $kelas, $mapel, $semester])}}">
                    <button
                        class="mb-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple float-right">
                        Kembali
                    </button>
                </a>
                <h4 class="mb-6 mt-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Tambah Tanggal Presensi KBM
                </h4>
                
                <div class="mt-1 px-4 py-3 mb-2 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form name="daftar" action="{{ route('presensikbms.tambah') }}" method="POST" 
                        enctype="multipart/form-data">
                        @csrf

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Jenjang</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{ strtoupper($jenjang) }}" placeholder="Jenjang..." disabled/>
                                <input type="hidden" name="jenjang" value="{{ $jenjang }}">
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tingkatan</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{ $tingkatan }}" placeholder="Tingkatan..." disabled/>
                                <input type="hidden" name="tingkatan" value="{{ $tingkatan }}">
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Kelas</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{ $kelas }}" placeholder="Nomor Induk Siswa..." disabled />
                                <input type="hidden" name="kelas" value="{{ $kelas }}">
                        </label>

                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Mata Pelajaran</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{ $mapel }}" placeholder="Nomor Induk Siswa..." disabled />
                                <input type="hidden" name="mapel" value="{{ $mapel }}">
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Semester</span>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md disabled:opacity-75"
                                value="{{ ucfirst($semester) }}" placeholder="Semester..." disabled />
                                <input type="hidden" name="semester" value="{{ $semester }}">
                        </label>
                        
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Tanggal KBM</span>
                            <input type="date"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:ring-2 focus:ring-blue-600 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
                                name="tanggal" placeholder="Tanggal KBM..." />
                        </label>

                        <div class="mt-5">
                            <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded shadow-sm focus:outline-none hover:bg-indigo-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>